<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Order;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $cart = json_decode($request->cookie('cart', '{}'), true);

        if (isset($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        return redirect('/')->cookie('cart', json_encode($cart), 60 * 24 * 7);
    }
    public function index(Request $request)
    {
        $cart = json_decode($request->cookie('cart', '{}'), true);

        $items = [];
        $total = 0;

        foreach ($cart as $productId => $quantite) {
            $product = Product::find($productId);
            if ($product) {
                $items[] = [
                    'product' => $product,
                    'quantite' => $quantite,
                    'sous_total' => $product->prix * $quantite,
                ];
                $total += $product->prix * $quantite;
            }
        }

        return view('cart.index', ['items' => $items, 'total' => $total]);
    }

    public function checkout(Request $request)
    {
        $cart = json_decode($request->cookie('cart', '{}'), true);

        if (count($cart) === 0) {
            return redirect('/panier');
        }

        $total = 0;
        foreach ($cart as $productId => $quantite) {
            $product = Product::find($productId);
            if ($product) {
                $total += $product->prix * $quantite;
            }
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'statut' => 'en attente',
        ]);

        foreach ($cart as $productId => $quantite) {
            $product = Product::find($productId);
            if ($product) {
                $order->products()->attach($productId, [
                    'quantite' => $quantite,
                    'prix_unitaire' => $product->prix,
                ]);
            }
        }

        return redirect('/commande/confirmee/' . $order->id)->cookie('cart', '{}', -1);
    }

    public function confirmation($id)
    {
        $order = Order::with('products')->findOrFail($id);
        return view('cart.confirmation', ['order' => $order]);
    }   
    
}