<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $ingredients = [
            ['name' => 'Farine'],
            ['name' => 'Sucre'],
            ['name' => 'Œufs'],
            ['name' => 'Beurre'],
            ['name' => 'Lait'],
            ['name' => 'Sel'],
            ['name' => 'Levure chimique'],
            ['name' => 'Poivre'],
            ['name' => 'Huile d\'olive'],
            ['name' => 'Tomates'],
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }

    }
}
