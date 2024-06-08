<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'type',
        'unit'
    ];

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'ingredient_recipes')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
