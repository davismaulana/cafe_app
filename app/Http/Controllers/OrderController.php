<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller
{
    protected $orderService;
    protected $menuService;

    public function __construct(OrderService $orderService , MenuService $menuService)
    {
        $this->orderService = $orderService;
        $this->menuService = $menuService;
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrders();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $menus = $this->menuService->getAllMenus();
        return view('orders.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'menus' => 'required|array',
            'menus.*.id' => 'required|exists:menus,id',
            'menus.*.quantity' => 'required|integer|min:1',
        ]);

        $this->orderService->createOrder($request->all());
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show($id)
    {
        $order = $this->orderService->getOrder($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = $this->orderService->getOrder($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required',
            'total_price' => 'required|numeric',
        ]);

        $this->orderService->updateOrder($id, $request->all());
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $this->orderService->deleteOrder($id);
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}