<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalPemasukan = Order::where('status', 'done')->sum('subtotal');
        $totalPesanan   = Order::count();
        $pesananPending = Order::where('status', 'pending')->count();
        $pesananSelesai = Order::where('status', 'done')->count();

        $pemasukanBulanIni = Order::where('status', 'done')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('subtotal');

        $pemasukanMingguIni = Order::where('status', 'done')
            ->where('created_at', '>=', now()->startOfWeek())
            ->sum('subtotal');

        return [
            Stat::make('Total Pemasukan', 'Rp ' . number_format($totalPemasukan, 0, ',', '.'))
                ->description('Dari semua pesanan selesai')
                ->color('success')
                ->icon('heroicon-o-banknotes'),

            Stat::make('Pemasukan Bulan Ini', 'Rp ' . number_format($pemasukanBulanIni, 0, ',', '.'))
                ->description(now()->format('F Y'))
                ->color('info')
                ->icon('heroicon-o-calendar'),

            Stat::make('Pemasukan Minggu Ini', 'Rp ' . number_format($pemasukanMingguIni, 0, ',', '.'))
                ->description('7 hari terakhir')
                ->color('warning')
                ->icon('heroicon-o-arrow-trending-up'),

            Stat::make('Total Pesanan', $totalPesanan)
                ->description('Semua pesanan masuk')
                ->color('gray')
                ->icon('heroicon-o-shopping-cart'),

            Stat::make('Pesanan Pending', $pesananPending)
                ->description('Menunggu pembayaran')
                ->color('warning')
                ->icon('heroicon-o-clock'),

            Stat::make('Pesanan Selesai', $pesananSelesai)
                ->description('Sudah diproses')
                ->color('success')
                ->icon('heroicon-o-check-circle'),
        ];
    }
}
