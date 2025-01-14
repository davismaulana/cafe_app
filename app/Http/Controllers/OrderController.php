<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrders();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'total_price' => 'required|numeric',
        ]);

        $this->orderService->createOrder($request->all());
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
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