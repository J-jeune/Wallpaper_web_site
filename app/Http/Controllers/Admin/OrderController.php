<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function show(string $id)
    {
        $order = Order::with('user', 'products')->findOrFail($id);
        return view('admin.orders.show', ['order' => $order]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate(['statut' => 'required']);
        $order = Order::findOrFail($id);
        $order->statut = $request->statut;
        $order->save();

        return redirect('/admin/orders');
    }
}