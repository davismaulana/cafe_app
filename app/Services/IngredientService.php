<?php

namespace App\Services;

use App\Repositories\IngredientRepository;

class IngredientService
{
    protected $ingredientRepository;

    public function __construct(IngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    public function getAllIngredients()
    {
        return $this->ingredientRepository->all();
    }

    public function getIngredient($id)
    {
        return $this->ingredientRepository->find($id);
    }

    public function createIngredient(array $data)
    {
        return $this->ingredientRepository->create($data);
    }

    public function updateIngredient($id, array $data)
    {
        return $this->ingredientRepository->update($id, $data);
    }

    public function deleteIngredient($id)
    {
        return $this->ingredientRepository->delete($id);
    }
    public function countData()
    {
        return $this->ingredientRepository->count();
    }
}