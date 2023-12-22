<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ingredient_recipe>
 */
class ingredient_recipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_id' => $this->faker->numberBetween(1, 50), // 仮の範囲、実際に使っている RecipeFactory のデータに合わせて調整してください
            'ingredient_id' => $this->faker->numberBetween(1, 30), // 仮の範囲、実際に使っている IngredientFactory のデータに合わせて調整してください
            'quantity' => $this->faker->numberBetween(1, 10), 
        ];
    }
}
