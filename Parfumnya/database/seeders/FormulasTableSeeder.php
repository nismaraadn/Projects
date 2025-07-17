<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormulasTableSeeder extends Seeder
{
    public function run(): void
    {
        $formulas = [
            // Vanilla Whisper (PR001)
            ['ProductID' => 'PR001', 'MaterialID' => 'MT001', 'Quantity' => 20, 'Measure' => 'ml'],
            ['ProductID' => 'PR001', 'MaterialID' => 'MT004', 'Quantity' => 25, 'Measure' => 'ml'],
            ['ProductID' => 'PR001', 'MaterialID' => 'MT007', 'Quantity' => 5, 'Measure' => 'ml'],

            // Citrus Sunshine (PR002)
            ['ProductID' => 'PR002', 'MaterialID' => 'MT002', 'Quantity' => 15, 'Measure' => 'ml'],
            ['ProductID' => 'PR002', 'MaterialID' => 'MT005', 'Quantity' => 10, 'Measure' => 'ml'],
            ['ProductID' => 'PR002', 'MaterialID' => 'MT004', 'Quantity' => 40, 'Measure' => 'ml'],
            ['ProductID' => 'PR002', 'MaterialID' => 'MT009', 'Quantity' => 5, 'Measure' => 'ml'],

            // Velvet Rose (PR003)
            ['ProductID' => 'PR003', 'MaterialID' => 'MT003', 'Quantity' => 25, 'Measure' => 'ml'],
            ['ProductID' => 'PR003', 'MaterialID' => 'MT006', 'Quantity' => 10, 'Measure' => 'ml'],
            ['ProductID' => 'PR003', 'MaterialID' => 'MT004', 'Quantity' => 50, 'Measure' => 'ml'],
            ['ProductID' => 'PR003', 'MaterialID' => 'MT008', 'Quantity' => 5, 'Measure' => 'ml'],
        ];

        foreach ($formulas as $formula) {
            DB::table('formulas')->insert([
                'ProductID' => $formula['ProductID'],
                'MaterialID' => $formula['MaterialID'],
                'Quantity' => $formula['Quantity'],
                'Measure' => $formula['Measure'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}