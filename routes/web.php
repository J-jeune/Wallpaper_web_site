<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/produits/{id}', [ProductController::class, 'show']);
Route::post('/panier/ajouter/{id}', [CartController::class, 'add']);
Route::get('/panier', [CartController::class, 'index']);
Route::get('/commande/confirmee/{id}', [CartController::class, 'confirmation']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/panier/valider', [CartController::class, 'checkout']);
});
require __DIR__.'/auth.php';
