<?php

namespace App\Repositories;

use App\Models\Ingredient;

class IngredientRepository
{
    public function all()
    {
        return Ingredient::all();
    }

    public function find($id)
    {
        return Ingredient::findOrFail($id);
    }

    public function create(array $data)
    {
        return Ingredient::create($data);
    }

    public function update($id, array $data)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($data);
        return $ingredient;
    }

    public function delete($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
    }
}