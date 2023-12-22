<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ingredient_recipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredient_recipe')->insert([
            [
                'recipe_id'=>1,
                'ingredient_id'=>2,
                'quantity'=>3
            ]
        ]);
    }
}
