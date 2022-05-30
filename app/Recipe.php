<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'recipe_code'
    ];

    public function recipeDetails(){
        return $this->hasMany(RecipeItem::class, 'recipe_id', 'id');
    }
}
