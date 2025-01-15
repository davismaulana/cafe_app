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
        $employee = Employee::findOrFail($id);
        $employee->update($data);
        return $employee;
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
    }
}