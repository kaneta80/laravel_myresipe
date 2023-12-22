<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class step extends Model
{
    use HasFactory;

    protected $fillable=[
        'recipe_id',
        'step',
        'step_number'
    ]; 

    // public function recipes()
    // {
    //     return $this->hasOne()
    // }
}
