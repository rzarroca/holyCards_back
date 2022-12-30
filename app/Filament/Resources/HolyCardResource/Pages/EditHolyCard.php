<?php

namespace App\Filament\Resources\HolyCardResource\Pages;

use App\Filament\Resources\HolyCardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHolyCard extends EditRecord
{
    protected static string $resource = HolyCardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
