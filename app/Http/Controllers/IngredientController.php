<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class IngredientController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'type' => ['required', 'string', 'max:255', Rule::in(['fruit', 'vegetables', 'meats', 'spices', 'other'])],
                'unit' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::in(['piece', 'liter', 'milliliter', 'kg', 'g'])
                ],
            ], [
                'type.in' => 'The type field must be one of: fruit, vegetables, meats, spices, other.',
                'unit.in' => 'The unit field must be one of: piece, liter, milliliter, kg, g.'
            ]);

            $ingredient = Ingredient::create($validated);

            return response()->json($ingredient, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $ingredient = Ingredient::findOrFail($id);

            return response()->json($ingredient);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        try {
            $ingredients = Ingredient::all();

            return response()->json($ingredients);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $ingredient = Ingredient::findOrFail($id);

            $validated = $request->validate([
                'name' => 'sometimes|string|max:255',
                'price' => 'sometimes|numeric',
                'type' => 'sometimes|string|max:255',
                Rule::in(['fruit', 'vegetables', 'meats', 'spices', 'other']),
                'unit' => 'sometimes|string|max:255',
            ]);

            $ingredient->update($validated);

            return response()->json($ingredient);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $ingredient = Ingredient::findOrFail($id);
            $ingredient->delete();

            return response()->json(['message' => 'Ingredient deleted']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}

