<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(6);

        $totalMobil = Product::whereHas('category', fn($q) => $q->where('name', 'Mobil'))->count();
        $totalMotor = Product::whereHas('category', fn($q) => $q->where('name', 'Motor'))->count();

        return view('home', compact('products', 'totalMobil', 'totalMotor'));
    }
}