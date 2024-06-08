<?php

namespace App\Services;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder;

class RecipeSearch
{
    public static function filter(array $filters, string $sortField = 'name', string $sortDirection = 'asc')
    {
        $query = Recipe::query()->with('comments')->withAvg('ratings', 'value');


        if (isset($filters['user_id'])) {
            $query->where('user_id', $filters['user_id']);
        }

        if (isset($filters['user_name'])) {
            $query->whereHas('user', function ($q) use ($filters) {
                $q->where('first_name', 'like', '%' . $filters['user_name'] . '%')
                    ->orWhere('last_name', 'like', '%' . $filters['user_name'] . '%');
            });
        }


        if (isset($filters['recipe_name'])) {
            $query->where('name', 'like', '%' . $filters['recipe_name'] . '%');
        }


        if (isset($filters['servings_from'])) {
            $query->where('servings', '>=', $filters['servings_from']);
        }
        if (isset($filters['servings_to'])) {
            $query->where('servings', '<=', $filters['servings_to']);
        }


        if (isset($filters['preparation_time_from'])) {
            $query->where('preparation_time', '>=', $filters['preparation_time_from']);
        }
        if (isset($filters['preparation_time_to'])) {
            $query->where('preparation_time', '<=', $filters['preparation_time_to']);
        }

        if (isset($filters['rating_from'])) {
            $query->whereHas('ratings', function (Builder $query) use ($filters) {
                $query->where('value', '>=', $filters['rating_from']);
            });
        }
        if (isset($filters['rating_to'])) {
            $query->whereHas('ratings', function (Builder $query) use ($filters) {
                $query->where('value', '<=', $filters['rating_to']);
            });
        }
        if (isset($filters['ingredient_name'])) {
            $query->whereHas('ingredients', function (Builder $query) use ($filters) {
                $query->where('name', 'like', '%' . $filters['ingredient_name'] . '%');
            });
        }
        switch ($sortField) {
            case 'name':
                $query->orderBy('name', $sortDirection);
                break;
            case 'date':
                $query->orderBy('created_at', $sortDirection);
                break;
            case 'average_rating':
                $query->orderBy('ratings_avg_value', $sortDirection);
                break;
            case 'num_comments':
                $query->withCount('comments')->orderBy('comments_count', $sortDirection);
                break;
            default:
                $query->orderBy('name', $sortDirection);
                break;
        }


        return $query->get();
    }
}
