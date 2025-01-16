<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Services\CategoryService;
use App\Services\EmployeeService;
use App\Services\IngredientService;
use App\Services\MenuService;
use App\Services\OrderService;

class HomeController extends Controller
{
    protected $categoryService;
    protected $employeeService;
    protected $orderService;
    protected $menuServices;
    protected $ingredientServices;

    public function __construct(
        CategoryService $categoryService, 
        EmployeeService $employeeService, 
        OrderService $orderService,
        MenuService $menuService,
        IngredientService $ingredientService
    )
    {
        $this->categoryService = $categoryService;
        $this->employeeService = $employeeService;
        $this->orderService = $orderService;
        $this->menuServices = $menuService;
        $this->ingredientServices = $ingredientService;
    }

    public function index()
    {
        $totalCategories = $this->categoryService->countData();
        $totalEmployees = $this->employeeService->countData();
        $totalOrders = $this->orderService->countData();
        $totalMenus = $this->menuServices->countData();
        $totalIngredients = $this->ingredientServices->countData();

        return view('dashboard.index', compact(
            'totalCategories',
            'totalEmployees',
            'totalOrders',
            'totalMenus',
            'totalIngredients'
        ));
    }
}