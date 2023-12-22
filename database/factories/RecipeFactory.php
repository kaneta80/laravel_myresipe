<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->city,
            'category_id'=>$this->faker->numberBetween(1,7),
            'user_id'=>$this->faker->numberBetween(1,2),
            'url'=>$this->faker->url(),
            'review'=>$this->faker->numberBetween(1,5),
            'serving'=>$this->faker->numberBetween(1,10),
            'point'=>$this->faker->realText(100),
            'latestCook'=>Carbon::now()->subMonths(3)->format('Y-m-d'),
        ];
    }
}
