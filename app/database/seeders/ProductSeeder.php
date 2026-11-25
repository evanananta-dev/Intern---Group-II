<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'category_id' => 1,
            'name' => 'Toyota Avanza',
            'description' => 'Mobil keluarga',
            'image' => 'avanza.jpg',
            'transmission' => 'Manual',
            'passenger_capacity' => 7,
            'fuel_type' => 'bensin',
            'production_year' => 2021,
            'engine' => '1300 cc',
            'license_plate' => 'N 1234 AB',
            'price_per_day' => 350000,
            'status' => 'available',
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Honda Vario 160',
            'description' => 'Motor matic',
            'image' => 'vario.jpg',
            'transmission' => 'Automatic',
            'passenger_capacity' => 2,
            'fuel_type' => 'bensin',
            'production_year' => 2022,
            'engine' => '160 cc',
            'license_plate' => 'N 5678 CD',
            'price_per_day' => 100000,
            'status' => 'available',
        ]);
    }
}
