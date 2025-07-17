<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsTableSeeder extends Seeder
{
    public function run(): void
    {
        $materials = [
            [
                'MaterialID' => 'MT001',
                'MaterialName' => 'Vanilla Extract',
                'Price' => 5000,
                'Measure' => '500 ml',
                'Quantity' => 1000,
                'Description' => 'Pure vanilla extract for sweet, warm notes',
            ],
            [
                'MaterialID' => 'MT002',
                'MaterialName' => 'Lemon Essential Oil',
                'Price' => 3000,
                'Measure' => '500 ml',
                'Quantity' => 500,
                'Description' => 'Fresh, citrusy lemon essential oil',
            ],
            [
                'MaterialID' => 'MT003',
                'MaterialName' => 'Rose Absolute',
                'Price' => 10000,
                'Measure' => '500 ml',
                'Quantity' => 250,
                'Description' => 'Concentrated rose essence for deep floral notes',
            ],
            [
                'MaterialID' => 'MT004',
                'MaterialName' => 'Alcohol Base',
                'Price' => 1500,
                'Measure' => '500 ml',
                'Quantity' => 5000,
                'Description' => 'Perfume-grade alcohol base',
            ],
            [
                'MaterialID' => 'MT005',
                'MaterialName' => 'Bergamot Oil',
                'Price' => 4000,
                'Measure' => '500 ml',
                'Quantity' => 500,
                'Description' => 'Fresh, citrusy bergamot essential oil',
            ],
            [
                'MaterialID' => 'MT006',
                'MaterialName' => 'Jasmine Absolute',
                'Price' => 12000,
                'Measure' => '500 ml',
                'Quantity' => 200,
                'Description' => 'Rich, floral jasmine essence',
            ],
            [
                'MaterialID' => 'MT007',
                'MaterialName' => 'Sandalwood Oil',
                'Price' => 8000,
                'Measure' => '500 ml',
                'Quantity' => 300,
                'Description' => 'Warm, woody sandalwood essential oil',
            ],
            [
                'MaterialID' => 'MT008',
                'MaterialName' => 'Patchouli Oil',
                'Price' => 3500,
                'Measure' => '500 ml',
                'Quantity' => 400,
                'Description' => 'Earthy, musky patchouli essential oil',
            ],
            [
                'MaterialID' => 'MT009',
                'MaterialName' => 'Lavender Oil',
                'Price' => 2500,
                'Measure' => '500 ml',
                'Quantity' => 600,
                'Description' => 'Calming, floral lavender essential oil',
            ],
        ];

        foreach ($materials as $material) {
            DB::table('materials')->insert([
                'MaterialID' => $material['MaterialID'],
                'MaterialName' => $material['MaterialName'],
                'Price' => $material['Price'],
                'Measure' => $material['Measure'],
                'Quantity' => $material['Quantity'],
                'Description' => $material['Description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}