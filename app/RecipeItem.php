<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeItem extends Model
{
    protected $fillable = [
        'recipe_id',
        'obat_id',
        'signa_id',
        'stok'
    ];

    public function detailObat(){
        return $this->hasOne(Obatalkes::class, 'obatalkes_id','obat_id');
    }

    public function detailSigna(){
        return $this->hasOne(Signa::class, 'signa_id','signa_id');
    }
}