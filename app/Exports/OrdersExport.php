<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromQuery, WithHeadings, WithMapping
{
    public function __construct(
        public string $period = '1month'
    ) {}

    public function query()
    {
        $query = Order::query()->where('status', 'done');

        $query->where('created_at', '>=', match($this->period) {
            '1week'  => now()->subWeek(),
            '1month' => now()->subMonth(),
            '3month' => now()->subMonths(3),
            '1year'  => now()->subYear(),
            default  => now()->subMonth(),
        });

        return $query->orderBy('created_at', 'desc');
    }

    public function headings(): array
    {
        return [
            'Kode Order',
            'WhatsApp',
            'Metode Pembayaran',
            'ID Game',
            'ID Server',
            'Total (Rp)',
            'Status',
            'Tanggal',
        ];
    }

    public function map($order): array
    {
        return [
            $order->order_code,
            $order->whatsapp,
            $order->payment_method,
            $order->user_id_game ?? '-',
            $order->server_id_game ?? '-',
            $order->subtotal,
            $order->status,
            $order->created_at->format('d/m/Y H:i'),
        ];
    }
}
