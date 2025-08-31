<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bidimensional array representing countries and their states
        $countries = [
            'UY' => [
                ['code' => 'AR', 'name' => 'Artigas'],
                ['code' => 'CA', 'name' => 'Canelones'],
                ['code' => 'CL', 'name' => 'Cerro Largo'],
                ['code' => 'CO', 'name' => 'Colonia'],
                ['code' => 'DU', 'name' => 'Durazno'],
                ['code' => 'FS', 'name' => 'Flores'],
                ['code' => 'FD', 'name' => 'Florida'],
                ['code' => 'LA', 'name' => 'Lavalleja'],
                ['code' => 'MA', 'name' => 'Maldonado'],
                ['code' => 'MO', 'name' => 'Montevideo'],
                ['code' => 'PA', 'name' => 'Paysandú'],
                ['code' => 'RN', 'name' => 'Río Negro'],
                ['code' => 'RV', 'name' => 'Rivera'],
                ['code' => 'RO', 'name' => 'Rocha'],
                ['code' => 'SA', 'name' => 'Salto'],
                ['code' => 'SJ', 'name' => 'San José'],
                ['code' => 'SO', 'name' => 'Soriano'],
                ['code' => 'TA', 'name' => 'Tacuarembó'],
                ['code' => 'TT', 'name' => 'Treinta y Tres'],
            ],
            'CU' => [
                ['code' => 'PRI', 'name' => 'Pinar del Río'],
                ['code' => 'ART', 'name' => 'Artemisa'],
                ['code' => 'LHA', 'name' => 'La Habana'],
                ['code' => 'MAY', 'name' => 'Mayabeque'],
                ['code' => 'MTZ', 'name' => 'Matanzas'],
                ['code' => 'VCL', 'name' => 'Villa Clara'],
                ['code' => 'CFG', 'name' => 'Cienfuegos'],
                ['code' => 'SSP', 'name' => 'Sancti Spíritus'],
                ['code' => 'CAV', 'name' => 'Ciego de Ávila'],
                ['code' => 'CMG', 'name' => 'Camagüey'],
                ['code' => 'LTU', 'name' => 'Las Tunas'],
                ['code' => 'HOL', 'name' => 'Holguín'],
                ['code' => 'GRA', 'name' => 'Granma'],
                ['code' => 'SCU', 'name' => 'Santiago de Cuba'],
                ['code' => 'GTM', 'name' => 'Guantánamo'],
                ['code' => 'IJV', 'name' => 'Isla de la Juventud'],
            ],
        ];

        foreach ($countries as $countryCode => $states) {
            $country = Country::where('code', $countryCode)->first();
            if (!$country)
                continue;
            $country_id = $country->id;
            foreach ($states as $state) {
                DB::table('states')->updateOrInsert(
                    [
                        'code' => strtoupper($state['code']),
                        'country_id' => $country_id
                    ], // code state and country just once
                    [
                        'name' => $state['name'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
            }
        }
    }
}
