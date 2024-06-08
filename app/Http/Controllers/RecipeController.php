<?php
namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Services\RecipeSearch;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'user_id' => 'required|exists:users,id',
                'servings' => 'required|integer',
                'preparation' => 'required|string',
                'preparation_time' => 'required|integer',
                'ingredients' => 'required|array',
                'ingredients.*.id' => 'required|exists:ingredients,id',
                'ingredients.*.quantity' => 'required|numeric',
            ]);

            $recipeData = $request->only(['name', 'creation_date', 'user_id', 'servings', 'preparation', 'preparation_time']);
            $recipe = Recipe::create($recipeData);

            foreach ($validated['ingredients'] as $ingredient) {
                $recipe->ingredients()->attach($ingredient['id'], ['quantity' => $ingredient['quantity']]);
            }

            return response()->json($recipe, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $recipe = Recipe::with('ingredients')->findOrFail($id);

            return response()->json($recipe);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function index(Request $request)
    {
        try {
            $filters = $request->all();
            $sortField = $request->input('sort') ?? null;
            $sortDirection = $request->input('sort_direction', 'asc');

            $filteredRecipes = RecipeSearch::filter($filters, $sortField ?? '', $sortDirection ?? '');


            return response()->json($filteredRecipes);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $recipe = Recipe::findOrFail($id);

            $validated = $request->validate([
                'name' => 'sometimes|string|max:255',
                'creation_date' => 'sometimes|date',
                'user_id' => 'sometimes|exists:users,id',
                'servings' => 'sometimes|integer',
                'preparation' => 'sometimes|string',
                'preparation_time' => 'sometimes|integer',
                'ingredients' => 'sometimes|array',
                'ingredients.*.id' => 'sometimes|exists:ingredients,id',
                'ingredients.*.quantity' => 'sometimes|numeric',
            ]);

            $recipe->update($validated);
            if (isset($validated['ingredients'])) {
                $recipe->ingredients()->detach();
                foreach ($validated['ingredients'] as $ingredient) {
                    $recipe->ingredients()->attach($ingredient['id'], ['quantity' => $ingredient['quantity']]);
                }
            }

            return response()->json($recipe);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $recipe = Recipe::findOrFail($id);
            $recipe->delete();

            return response()->json(['message' => 'Recipe deleted']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

