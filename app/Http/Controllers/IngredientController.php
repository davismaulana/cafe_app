<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IngredientService;

class IngredientController extends Controller
{
    protected $ingredientService;

    public function __construct(IngredientService $ingredientService)
    {
        $this->ingredientService = $ingredientService;
    }

    public function index()
    {
        $ingredients = $this->ingredientService->getAllIngredients()->sortBy('name');
        return view('ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('ingredients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:ingredients,name',
        ]);

        $data = $request->all();
        $data['name'] = ucwords(strtolower($data['name']));

        $this->ingredientService->createIngredient($data);
        return redirect()->route('ingredients.index')->with('success', 'Ingredient created successfully.');
    }

    public function edit($id)
    {
        $ingredient = $this->ingredientService->getIngredient($id);
        return view('ingredients.edit', compact('ingredient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $data['name'] = ucwords(strtolower($data['name']));

        $this->ingredientService->updateIngredient($id, $data);
        return redirect()->route('ingredients.index')->with('success', 'Ingredient updated successfully.');
    }

    public function destroy($id)
    {
        $this->ingredientService->deleteIngredient($id);
        return redirect()->route('ingredients.index')->with('success', 'Ingredient deleted successfully.');
    }
}