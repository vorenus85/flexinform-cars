<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;

class CarSeeder extends Seeder
{
     /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('cars')->delete();

        $json = FacadesFile::get('database/data/cars.json');
        $array = json_decode($json, true);

        foreach ($array as $item) {
            Car::create(array(
                'client_id' => $item['client_id'],
                'type' => $item['type'],
                'registered' => $item['registered'],
                'ownbrand' => $item['ownbrand'],
                'accidents' => $item['accident'],
            ));
        }

        $this->command->info('Cars imported successfully!');
    }
}
