<?php

use App\Models\LoadOrder;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $latestLoadOrders = LoadOrder::with(['author', 'game'])
        ->latest()
        ->take(5)
        ->get();

    return Inertia::render('home', [
        'latestLoadOrders' => $latestLoadOrders,
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
