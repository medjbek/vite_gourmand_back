<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->listUserOrders(Auth::id());
        return response()->json($orders);
    }

    public function all()
    {
        $orders = $this->orderService->listAllOrders();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'event_at' => 'required|date',
            'guest_count' => 'required|integer|min:1',
            'km' => 'nullable|numeric|min:0',
        ]);

        $order = $this->orderService->createOrder($request->all());
        return response()->json($order, 201);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:accepted,preparing,delivering,delivered,completed',
        ]);

        $order = $this->orderService->updateOrderStatus($id, $request->status);

        return response()->json($order);
    }
}