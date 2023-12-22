<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];

    public function recipes()
    {
        return $this->belongsToMany(recipe::class, 'ingredient_recipe')
        ->withPivot(['id', 'quantity']);
    }
}
