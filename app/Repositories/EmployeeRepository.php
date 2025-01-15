<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{
    public function all()
    {
        return Employee::all();
    }

    public function find($id)
    {
        return Employee::findOrFail($id);
    }

    public function create(array $data)
    {
        return Employee::create($data);
    }

    public function update($id, array $data)
    {
        $ingredient = Employee::findOrFail($id);
        $ingredient->update($data);
        return $ingredient;
    }

    public function delete($id)
    {
        $ingredient = Employee::findOrFail($id);
        $ingredient->delete();
    }
}