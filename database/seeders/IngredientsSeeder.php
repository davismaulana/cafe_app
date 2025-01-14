<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            ['name' => 'Espresso'],
            ['name' => 'Milk'],
            ['name' => 'Sugar'],
            ['name' => 'Whipped Cream'],
            ['name' => 'Chocolate Syrup'],
            ['name' => 'Black Tea Leaves'],
            ['name' => 'Green Tea Leaves'],
            ['name' => 'Honey'],
            ['name' => 'Lemon Slices'],
            ['name' => 'Matcha Powder'],
            ['name' => 'Coconut Water'],
            ['name' => 'Orange Juice'],
            ['name' => 'Soda Water'],
            ['name' => 'Strawberry Syrup'],
            ['name' => 'Eggs'],
            ['name' => 'Bacon'],
            ['name' => 'Sausage'],
            ['name' => 'Hash Browns'],
            ['name' => 'Toast'],
            ['name' => 'Avocado'],
            ['name' => 'Chicken Breast'],
            ['name' => 'Lettuce'],
            ['name' => 'Tomato'],
            ['name' => 'Mayonnaise'],
            ['name' => 'Mixed Greens'],
            ['name' => 'Cherry Tomatoes'],
            ['name' => 'Feta Cheese'],
            ['name' => 'Balsamic Vinaigrette'],
            ['name' => 'Flour'],
            ['name' => 'Butter'],
            ['name' => 'Chocolate Chips'],
            ['name' => 'Strawberries'],
        ];

        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }

        $this->command->info('Ingredients seeded successfully!');
    }
}
