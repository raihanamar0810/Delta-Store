<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Data Pesanan';
    protected static ?string $modelLabel = 'Pesanan';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('order_code')
                ->label('Kode Order')
                ->disabled(),

            TextInput::make('whatsapp')
                ->label('No WhatsApp'),

            Select::make('payment_method')
                ->label('Metode Pembayaran')
                ->options([
                    'QRIS' => 'QRIS',
                    'Bank' => 'Bank Jago',
                ]),

            TextInput::make('user_id_game')
                ->label('ID Pengguna Game'),

            TextInput::make('server_id_game')
                ->label('ID Server Game'),

            TextInput::make('subtotal')
                ->label('Total (Rp)')
                ->numeric()
                ->prefix('Rp')
                ->disabled(),

            Select::make('status')
                ->label('Status')
                ->options([
                    'pending'   => 'Pending',
                    'paid'      => 'Dibayar',
                    'done'      => 'Selesai',
                    'cancelled' => 'Dibatalkan',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_code')
                    ->label('Kode Order')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->searchable(),

                TextColumn::make('payment_method')
                    ->label('Pembayaran')
                    ->badge(),

                TextColumn::make('subtotal')
                    ->label('Total')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending'   => 'warning',
                        'paid'      => 'info',
                        'done'      => 'success',
                        'cancelled' => 'danger',
                        default     => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending'   => 'Pending',
                        'paid'      => 'Dibayar',
                        'done'      => 'Selesai',
                        'cancelled' => 'Dibatalkan',
                    ]),

                SelectFilter::make('payment_method')
                    ->label('Metode Pembayaran')
                    ->options([
                        'QRIS' => 'QRIS',
                        'Bank' => 'Bank Jago',
                    ]),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'edit'  => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
