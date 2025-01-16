<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Models\Order;

class OrderRepository
{
    /**
     * Retrieve all orders with associated menus.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Order[]
     */
    public function all()
    {
        return Order::with('menus')->get();
    }

    public function find($id)
    {
        return Order::with('menus')->findOrFail($id);
    }

    public function attachMenus($ordedr, array $menus)
    {
        foreach ($menus as $menu) {
            $menuModel = Menu::find($menu['id']);
            $ordedr->menus()->attach($menuModel->id, [
                'quantity' => $menu['quantity'],
                'price' => $menuModel->price
            ]);
        }
    }

    public function create(array $data)
    {
        return Order::create($data);
    }

    public function update($id, array $data)
    {
        $order = Order::findOrFail($id);
        $order->update($data);
        return $order;
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    }

    public function count()
    {
        $count = Order::count();
        return $count;
    }
}