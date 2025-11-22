<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('services')->delete();

        $json = FacadesFile::get('database/data/services.json');
        $array = json_decode($json, true);

        foreach ($array as $item) {
            Service::create(array(
                'client_id' => $item['client_id'],
                'car_id' => $item['car_id'],
                'log_number' => $item['lognumber'],
                'event' => $item['event'],
                'event_time' => $item['eventtime'],
                'document_id' => $item['document_id'],
            ));
        }

        $this->command->info('Services imported successfully!');
    }
}
