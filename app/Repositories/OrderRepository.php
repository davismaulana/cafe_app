<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function all()
    {
        return Order::all();
    }

    public function find($id)
    {
        return Order::findOrFail($id);
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
}