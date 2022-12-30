<?php

namespace App\Filament\Resources\HolyCardResource\Pages;

use App\Filament\Resources\HolyCardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHolyCard extends CreateRecord
{
    protected static string $resource = HolyCardResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
