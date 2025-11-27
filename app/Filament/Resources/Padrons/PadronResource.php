<?php

namespace App\Filament\Resources\Padrons;

use App\Filament\Resources\Padrons\Pages\CreatePadron;
use App\Filament\Resources\Padrons\Pages\EditPadron;
use App\Filament\Resources\Padrons\Pages\ListPadrons;
use App\Filament\Resources\Padrons\Schemas\PadronForm;
use App\Filament\Resources\Padrons\Tables\PadronsTable;
use App\Models\Padron;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PadronResource extends Resource
{
    protected static ?string $model = Padron::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Padrón';

    protected static ?string $modelLabel = 'Padrón';

    protected static ?string $pluralModelLabel = 'Padrón';

    public static function form(Schema $schema): Schema
    {
        return PadronForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PadronsTable::configure($table);
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
            'index' => ListPadrons::route('/'),
            'create' => CreatePadron::route('/create'),
            'edit' => EditPadron::route('/{record}/edit'),
        ];
    }
}
