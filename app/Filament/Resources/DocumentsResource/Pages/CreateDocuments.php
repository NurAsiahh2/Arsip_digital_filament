<?php

namespace App\Filament\Resources\DocumentsResource\Pages;

use App\Filament\Resources\DocumentsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDocuments extends CreateRecord
{
    protected static string $resource = DocumentsResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect ke halaman List setelah data berhasil dibuat
        return $this->getResource()::getUrl('index');
    }
}