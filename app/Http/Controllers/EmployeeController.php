<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        $employees = $this->employeeService->getAllEmployees();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'NIK' => 'required|unique:employees,NIK',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|unique:employees,phone',
            'address' => 'required',
        ]);

        $this->employeeService->createEmployee($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {
        $employee = $this->employeeService->getEmployee($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'NIK' => 'required|unique:employees,NIK,' . $id,
            'email' => 'required|email|unique:employees,email,' . $id,
            'phone' => 'required|unique:employees,phone,' . $id,
            'address' => 'required',
        ]);

        $this->employeeService->updateEmployee($id, $request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $this->employeeService->deleteEmployee($id);
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
