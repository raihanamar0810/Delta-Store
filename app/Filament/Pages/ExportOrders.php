<?php

namespace App\Filament\Pages;

use App\Exports\OrdersExport;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Maatwebsite\Excel\Facades\Excel;

class ExportOrders extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-arrow-down-tray';
    protected static ?string $navigationLabel = 'Export Data';
    protected static ?string $title = 'Export Data Penjualan';
    protected static ?int $navigationSort = 3;
    protected string $view = 'filament.pages.export-orders';

    public string $period = '1month';

    protected function getActions(): array
    {
        return [
            Action::make('export')
                ->label('Download Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(function () {
                    return Excel::download(
                        new OrdersExport($this->period),
                        'rekap-penjualan-' . $this->period . '-' . now()->format('Y-m-d') . '.xlsx'
                    );
                }),
        ];
    }
}
