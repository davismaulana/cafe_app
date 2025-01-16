<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;

class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepository $categoryRepository)
    {
        $this->employeeRepository = $categoryRepository;
    }

    public function getAllEmployees()
    {
        return $this->employeeRepository->all();
    }

    public function getEmployee($id)
    {
        return $this->employeeRepository->find($id);
    }

    public function createEmployee(array $data)
    {
        return $this->employeeRepository->create($data);
    }

    public function updateEmployee($id, array $data)
    {
        return $this->employeeRepository->update($id, $data);
    }

    public function deleteEmployee($id)
    {
        return $this->employeeRepository->delete($id);
    }

    public function countData()
    {
        return $this->employeeRepository->count();
    }
}