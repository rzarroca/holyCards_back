<?php

namespace App\Filament\Resources\HolyCardResource\Pages;

use App\Filament\Resources\HolyCardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHolyCards extends ListRecords
{
    protected static string $resource = HolyCardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
