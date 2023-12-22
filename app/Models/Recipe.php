<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'name',
        'url',
        'user_id',
        'review',
        'serving',
        'category_id',
        'point',
        'latestCook'
    ];
    
    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_recipe')
        ->withPivot('quantity');
    }

    public function scopeSortOrder($query, $sortOrder)
    {
        if($sortOrder === null || $sortOrder === \Constant::RECIPE_ORDER['review']){
            return $query->orderBy('review', 'desc');
        }
        if($sortOrder === \Constant::RECIPE_ORDER['later']){
            return $query->orderBy('created_at', 'desc');
        }
        if($sortOrder === \Constant::RECIPE_ORDER['older']){
            return $query->orderBy('created_at', 'asc');
        }
    }

    
    public function scopeSearchKeyword($query, $keyword)
    {
        if(!is_null($keyword))
        {
           //全角スペースを半角に
           $spaceConvert = mb_convert_kana($keyword,'s');

           //空白で区切る
           $keywords = preg_split('/[\s]+/', $spaceConvert,-1,PREG_SPLIT_NO_EMPTY);

           //単語をループで回す
           foreach($keywords as $word)
           {
               $query->where('name','like','%'.$word.'%');
           }

           return $query;  

        } else {
            return;
        }
    }
}
