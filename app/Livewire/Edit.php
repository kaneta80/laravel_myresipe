<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\category;
use App\Models\ingredient;
use App\Models\recipe;
use App\Models\step;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public $count;
    public $categories;
    public $stepCount;
    public $recipe;
    public $steps;
    public $processCount;
    public $ingredientCount;
    public $ingredientSum;
    public $ingredient;

    public function mount()
    {
        $recipeId = request()->route('recipe');
        $this->recipe = recipe::findOrFail($recipeId);
        $this->ingredientCount = count($this->recipe->ingredients);
        $this->ingredientSum = $this->ingredientCount;
        $this->steps = step::where('recipe_id', $recipeId)->get();
        $this->processCount = count($this->steps);
        $this->stepCount = $this->processCount;
        $this->categories = category::select('category', 'id')->get();
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function stepIncrement()
    {
       
        $this->stepCount++;
    }

    public function stepDecrement()
    {
        $this->stepCount--;
    }

    public function render()
    {
        return view('livewire.edit');
    }
}
