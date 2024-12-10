<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuditLogsResource\Pages;
use App\Filament\Resources\AuditLogsResource\RelationManagers;
use App\Models\AuditLogs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuditLogsResource extends Resource
{
    protected static ?string $model = AuditLogs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->required(),
                Forms\Components\Select::make('Action')
                ->options([
                    'create_document' => 'Mengupload Dokumen',
                    'delete_document' => 'Menghapus Dokumen',
                    'update_document' => 'Memperbarui Dokumen',
                ])
                ->required(),
                Forms\Components\Select::make('documents_id')
                ->relationship('documents', 'title')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('Action.name'),
                Tables\Columns\TextColumn::make('documents.title'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('update_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuditLogs::route('/'),
            'create' => Pages\CreateAuditLogs::route('/create'),
            'edit' => Pages\EditAuditLogs::route('/{record}/edit'),
        ];
    }
}
