<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\category;

class Counter extends Component
{
    public $count = 4;
    public $categories;
    public $stepCount = 4;

    public function mount()
    {
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
        return view('livewire.counter');
    }
}
