<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ingredient;
use App\Models\ingredient_recipe;
use App\Models\Recipe;
use App\Models\Step;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            
        ]);

        ingredient::factory(30)->create();
        Recipe::factory(50)->create();
        $this->call([
            stepSeeder::class,            
        ]);
        ingredient_recipe::factory(150)->create();
        $this->call([
            ingredient_recipeSeeder::class
        ]);
    }
}
