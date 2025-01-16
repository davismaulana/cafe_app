<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\EmployeeService;
use App\Services\OrderService;

class HomeController extends Controller
{
    protected $categoryService;
    protected $employeeService;
    protected $orderService;

    public function __construct(CategoryService $categoryService, EmployeeService $employeeService, OrderService $orderService)
    {
        $this->categoryService = $categoryService;
        $this->employeeService = $employeeService;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $totalCategories = $this->categoryService->countData();
        $totalEmployees = $this->employeeService->countData();
        $totalOrders = $this->orderService->countData();

        return view('dashboard.index', compact('totalCategories','totalEmployees','totalOrders'));
    }
}