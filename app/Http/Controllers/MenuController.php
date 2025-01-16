<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\IngredientService;
use Illuminate\Http\Request;
use App\Services\MenuService;

class MenuController extends Controller
{
    protected $menuService;
    protected $categoryService;
    protected $ingredientService;

    public function __construct(
        MenuService $menuService , 
        CategoryService $categoryService, 
        IngredientService $ingredientService
    )
    {
        $this->menuService = $menuService;
        $this->categoryService = $categoryService;
        $this->ingredientService = $ingredientService;
    }

    public function index()
    {
        $menus = $this->menuService->getAllMenus();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $ingredients = $this->ingredientService->getAllIngredients()->sortBy('name');
        $categories = $this->categoryService->getAllCategories();
        return view('menus.create', compact('categories','ingredients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'ingredients' => 'required|array'
        ]);

        $menu = $this->menuService->createMenu($request->only(['name', 'description', 'price', 'category_id']));

        $menu->ingredients()->attach($request->ingredients);

        return redirect()->route('menus.index')->with('success', 'Menu item created successfully.');
    }

    public function show($id)
    {
        $menu = $this->menuService->getMenu($id);
        return view('menus.show', compact('menu'));
    }

    public function edit($id)
    {
        $categories = $this->categoryService->getAllCategories();
        $menu = $this->menuService->getMenu($id);
        $ingredients = $this->ingredientService->getAllIngredients()->sortBy('name');

        $currentIngredients = $menu->ingredients->pluck('id')->toArray();

        return view('menus.edit', compact('menu','categories','ingredients','currentIngredients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'ingredients' => 'required|array'
        ]);

        $menu = $this->menuService->updateMenu($id, $request->all());
        $menu->ingredients()->sync($request->ingredients);
        return redirect()->route('menus.index')->with('success', 'Menu item updated successfully.');
    }

    public function destroy($id)
    {
        $this->menuService->deleteMenu($id);
        return redirect()->route('menus.index')->with('success', 'Menu item deleted successfully.');
    }
}