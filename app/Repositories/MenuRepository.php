<?php

namespace App\Repositories;

use App\Models\Menu;

class MenuRepository
{
    public function all()
    {
        return Menu::with('category', 'ingredients')->get();
    }

    public function find($id)
    {
        return Menu::with('category', 'ingredients')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Menu::create($data);
    }

    public function update($id, array $data)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($data);
        return $menu;
    }

    public function delete($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
    }

    public function count()
    {
        $count = Menu::count();
        return $count;
    }
}