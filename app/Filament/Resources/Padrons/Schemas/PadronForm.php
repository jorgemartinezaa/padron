<?php

namespace App\Filament\Resources\Padrons\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PadronForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                TextInput::make('apellido')
                    ->required()
                    ->maxLength(255),
                TextInput::make('curp')
                    ->label('CURP')
                    ->required()
                    ->maxLength(18)
                    ->minLength(18)
                    ->rule('regex:/^[A-Z]{4}[0-9]{6}[HM][A-Z]{5}[0-9A-Z][0-9]$/'),
                Select::make('tipo_telefono')->label('Tipo Teléfono')
    ->options([
        'tipo_telefono_1' => 'Tipo teléfono 1',
        'tipo_telefono_2' => 'Tipo teléfono 2',

    ]),
                Select::make('entidad')
                    ->label('Entidad')
                    ->required()
                    ->searchable()
                    ->options([
                        'Aguascalientes' => 'Aguascalientes',
                        'Baja California' => 'Baja California',
                        'Baja California Sur' => 'Baja California Sur',
                        'Campeche' => 'Campeche',
                        'Chiapas' => 'Chiapas',
                        'Chihuahua' => 'Chihuahua',
                        'Ciudad de México' => 'Ciudad de México',
                        'Coahuila' => 'Coahuila',
                        'Colima' => 'Colima',
                        'Durango' => 'Durango',
                        'Guanajuato' => 'Guanajuato',
                        'Guerrero' => 'Guerrero',
                        'Hidalgo' => 'Hidalgo',
                        'Jalisco' => 'Jalisco',
                        'México' => 'México',
                        'Michoacán' => 'Michoacán',
                        'Morelos' => 'Morelos',
                        'Nayarit' => 'Nayarit',
                        'Nuevo León' => 'Nuevo León',
                        'Oaxaca' => 'Oaxaca',
                        'Puebla' => 'Puebla',
                        'Querétaro' => 'Querétaro',
                        'Quintana Roo' => 'Quintana Roo',
                        'San Luis Potosí' => 'San Luis Potosí',
                        'Sinaloa' => 'Sinaloa',
                        'Sonora' => 'Sonora',
                        'Tabasco' => 'Tabasco',
                        'Tamaulipas' => 'Tamaulipas',
                        'Tlaxcala' => 'Tlaxcala',
                        'Veracruz' => 'Veracruz',
                        'Yucatán' => 'Yucatán',
                        'Zacatecas' => 'Zacatecas',
                    ]),
            ]);
    }
}
