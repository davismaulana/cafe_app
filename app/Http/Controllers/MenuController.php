<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\MenuService;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $menus = $this->menuService->getAllMenus();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $this->menuService->createMenu($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu item created successfully.');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $menu = $this->menuService->getMenu($id);
        return view('menus.edit', compact('menu','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $this->menuService->updateMenu($id, $request->all());
        return redirect()->route('menus.index')->with('success', 'Menu item updated successfully.');
    }

    public function destroy($id)
    {
        $this->menuService->deleteMenu($id);
        return redirect()->route('menus.index')->with('success', 'Menu item deleted successfully.');
    }
}