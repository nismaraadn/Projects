<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'ProductID' => 'PR001',
                'ProductName' => 'Vanilla Whisper',
                'Price' => 100.000,
                'Stock' => 100,
                'Description' => 'A delicate and sweet fragrance with warm vanilla notes.',
            ],
            [
                'ProductID' => 'PR002',
                'ProductName' => 'Citrus Sunshine',
                'Price' => 125.000,
                'Stock' => 120,
                'Description' => 'A bright and refreshing scent with zesty citrus tones.',
            ],
            [
                'ProductID' => 'PR003',
                'ProductName' => 'Velvet Rose',
                'Price' => 150.000,
                'Stock' => 80,
                'Description' => 'A luxurious and romantic fragrance with deep rose notes.',
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'ProductID' => $product['ProductID'],
                'ProductName' => $product['ProductName'],
                'Price' => $product['Price'],
                'Stock' => $product['Stock'],
                'Description' => $product['Description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}