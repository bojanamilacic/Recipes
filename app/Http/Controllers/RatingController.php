<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'recipe_id' => [
                    'required',
                    'exists:recipes,id',
                    function ($attribute, $value, $fail) use ($request) {
                        $recipe = Recipe::find($value);
                        if ($recipe && $recipe->user_id === $request->user_id) {
                            $fail('The user cannot rate their own recipe.');
                        }
                    }
                ],
                'value' => 'required|integer|min:1|max:10',
            ]);

            $existingRating = Rating::where('user_id', $validated['user_id'])
                ->where('recipe_id', $validated['recipe_id'])
                ->first();

            if ($existingRating) {
                return response()->json(['message' => 'User has already rated this recipe'], 400);
            }

            $rating = Rating::create($validated);

            return response()->json($rating, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $rating = Rating::findOrFail($id);

            return response()->json($rating);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        try {
            $ratings = Rating::all();

            return response()->json($ratings);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $rating = Rating::findOrFail($id);

            $validated = $request->validate([
                'user_id' => 'sometimes|exists:users,id',
                'recipe_id' => 'sometimes|exists:recipes,id',
                'rating' => 'sometimes|integer|min:1|max:10',
            ]);

            $rating->update($validated);

            return response()->json($rating);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $rating = Rating::findOrFail($id);
            $rating->delete();

            return response()->json(['message' => 'Rating deleted']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

