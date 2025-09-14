<?php

declare(strict_types=1);

namespace Modules\Property\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Property\Models\PropertyStatus;
use Modules\Property\Models\PropertyType;

final class StaticDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        PropertyType::create([
            'type' => [
                'en' => 'Apartment',
                'sq' => 'Apartament',
                'it' => 'Appartamento',
            ]
        ]);

        PropertyType::create([
            'type' => [
                'en' => 'Villa',
                'sq' => 'Vilë',
                'it' => 'Villa',
            ]
        ]);

        PropertyType::create([
            'type' => [
                'en' => 'House',
                'sq' => 'Shtepi',
                'it' => 'Casa',
            ]
        ]);

        PropertyType::create([
            'type' => [
                'en' => 'Land',
                'sq' => 'Tokë',
                'it' => 'Terreno',
            ]
        ]);

        PropertyType::create([
            'type' => [
                'en' => 'Shop',
                'sq' => 'Dyqan',
                'it' => 'Negozio',
            ]
        ]);

        PropertyType::create([
            'type' => [
                'en' => 'Commercial',
                'sq' => 'Komercial',
                'it' => 'Commerciale',
            ]
        ]);


        PropertyType::create([
            'type' => [
                'en' => 'Garage',
                'sq' => 'Garazhd',
                'it' => 'Garage',
            ]
        ]);

        PropertyStatus::create([
            'status' => [
                'en' => 'Existing',
                'sq' => 'Ekzistuese',
                'it' => 'Esistente',
            ]
        ]);

        PropertyStatus::create([
            'status' => [
                'en' => 'New',
                'sq' => 'E re',
                'it' => 'Nuovo',
            ]
        ]);

        PropertyStatus::create([
            'status' => [
                'en' => 'Building',
                'sq' => 'Në ndërtim',
                'it' => 'In Costruzione',
            ]
        ]);
    }
}
