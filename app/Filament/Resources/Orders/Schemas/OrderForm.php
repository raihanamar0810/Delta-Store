<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_code')
                    ->required(),
                TextInput::make('whatsapp')
                    ->required(),
                TextInput::make('payment_method')
                    ->required(),
                TextInput::make('user_id_game')
                    ->default(null),
                TextInput::make('server_id_game')
                    ->default(null),
                TextInput::make('subtotal')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
            ]);
    }
}
