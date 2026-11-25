<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('../admin/dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/products', function () {
        return view('../admin/products');
    })->name('products');

    Route::get('/categories', function () {
        return view('../admin/categories');
    })->name('categories');

    Route::get('/users', function () {
        return view('../admin/users');
    })->name('users');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
