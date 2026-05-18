<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'whatsapp'       => 'required|string',
            'payment_method' => 'required|string',
            'items'          => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity'   => 'required|integer|min:1',
        ]);

        // Hitung subtotal
        $subtotal = 0;

        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);
            $subtotal += $product->price * $item['quantity'];
        }

        // Buat order code unik
        $orderCode = 'DS-' . strtoupper(uniqid());

        // Simpan order
        $order = Order::create([
            'order_code'     => $orderCode,
            'whatsapp'       => $request->whatsapp,
            'payment_method' => $request->payment_method,
            'user_id_game'   => $request->user_id_game,
            'server_id_game' => $request->server_id_game,
            'subtotal'       => $subtotal,
            'status'         => 'pending',
        ]);

        // Simpan items
        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);

            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item['product_id'],
                'quantity'   => $item['quantity'],
                'price'      => $product->price,
            ]);
        }

        return response()->json([
            'order_code' => $order->order_code,
            'subtotal'   => $order->subtotal,
            'status'     => $order->status,
        ], 201);
    }

    public function show($orderCode)
    {
        $order = Order::with('items.product')
            ->where('order_code', $orderCode)
            ->first();

        if (!$order) {
            return response()->json([
                'message' => 'Order tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'order_code'     => $order->order_code,
            'payment_method' => $order->payment_method,
            'subtotal'       => $order->subtotal,
            'status'         => $order->status,
            'whatsapp'       => $order->whatsapp,
            'items'          => $order->items->map(function ($item) {
                return [
                    'product_name' => $item->product->name,
                    'quantity'     => $item->quantity,
                    'price'        => $item->price,
                ];
            }),
        ]);
    }

    public function cancel($orderCode)
    {
        $order = Order::where('order_code', $orderCode)->first();

        if ($order) {
            $order->update([
                'status' => 'cancelled'
            ]);
        }

        return response()->json([
            'message' => 'Order dibatalkan'
        ]);
    }
}
