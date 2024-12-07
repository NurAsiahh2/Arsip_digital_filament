<?php

namespace App\Filament\Resources\AuditLogsResource\Pages;

use App\Filament\Resources\AuditLogsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuditLogs extends EditRecord
{
    protected static string $resource = AuditLogsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
