<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use App\Models\Mongo\MenuOrderStat;
use Carbon\Carbon;

class OrderService
{
    public function listUserOrders($userId)
    {
        return Order::with('menu')->where('user_id', $userId)->get();
    }

    public function listAllOrders()
    {
        return Order::with('menu')->orderBy('created_at', 'desc')->get();
    }

    public function updateOrderStatus($id, $status): Order
    {
        $order = Order::findOrFail($id);

        $order->status = $status;
        $order->save();

        $order->statusHistories()->create([
            'status' => $status,
            'changed_by' => Auth::id(),
        ]);

        return $order->load('menu');
    }

    public function createOrder(array $data): Order
    {
        $menu = Menu::findOrFail($data['menu_id']);

        if ($data['guest_count'] < $menu->minimum_people) {
            throw new \Exception('Nombre de personnes insuffisant');
        }

        $price = $menu->base_price * $data['guest_count'];

        if ($data['guest_count'] >= $menu->minimum_people + 5) {
            $price *= 0.9; // remise 10%
        }

        $delivery_price = 0;
        if (stripos($data['address'], 'bordeaux') === false) {
            $delivery_price = 5 + 0.59 * ($data['km'] ?? 0);
            $price += $delivery_price;
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'menu_id' => $menu->id,
            'customer_last_name' => $data['last_name'],
            'customer_first_name' => $data['first_name'],
            'customer_email' => $data['email'],
            'customer_phone' => $data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'event_at' => $data['event_at'],
            'location' => $data['location'],
            'guest_count' => $data['guest_count'],
            'menu_price' => $menu->base_price,
            'delivery_price' => $delivery_price,
            'discount' => $data['discount'] ?? 0,
            'total_price' => $price,
            'status' => 'pending',
        ]);

        $order->statusHistories()->create([
            'status' => 'pending',
            'changed_by' => Auth::id(),
        ]);

        Mail::to(Auth::user()->email)->send(new OrderConfirmation($order));

        return $order;
    }
}