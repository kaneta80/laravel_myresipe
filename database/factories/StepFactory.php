<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Step>
 */
class StepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // for($i=1; $i<=30; $i++){
        //     $recipeId = $i;
        
        // return [
        //     'recipe_id'=>$loop->iteration,
        //     'step_number'=>$this->faker->numberBetween(1,10),
        //     'step'=>$this->faker->realText(25),
        // ];
        // }
        $data = [];

        for ($i = 1; $i <= 30; $i++) {
            $data[] = [
                'recipe_id' => $i, 
                'step_number' => $this->faker->numberBetween(1, 10),
                'step' => $this->faker->text(25),
            ];
        }
        // dd($data);
        return $data;
        
    }
}
