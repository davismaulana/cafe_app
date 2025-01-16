<?php

namespace App\Services;

use App\Models\Menu;
use App\Repositories\OrderRepository;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders()
    {
        return $this->orderRepository->all();
    }

    public function getOrder($id)
    {
        return $this->orderRepository->find($id);
    }

    public function createOrder(array $data)
    {
        $totalPrice = 0;
        foreach ($data['menus'] as $menu) {
            $menuModel = Menu::find($menu['id']);
            $totalPrice += $menuModel->price * $menu['quantity'];
        }

        $order = $this->orderRepository->create([
            'customer_name' => $data['customer_name'],
            'total_price' => $totalPrice
        ]);

        $this->orderRepository->attachMenus($order, $data['menus']);

        return $order;
    }

    public function updateOrder($id, array $data)
    {
        return $this->orderRepository->update($id, $data);
    }

    public function deleteOrder($id)
    {
        return $this->orderRepository->delete($id);
    }

    public function countData()
    {
        return $this->orderRepository->count();
    }
}