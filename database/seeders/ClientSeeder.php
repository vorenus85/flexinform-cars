<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;

class ClientSeeder extends Seeder
{
    
    public function run(): void
    {
        
        DB::table('clients')->delete();

        $json = FacadesFile::get('database/data/clients.json');
        $array = json_decode($json, true);

        foreach ($array as $item) {
            Client::create(array(
                'id' => $item['id'],
                'name' => $item['name'],
                'card_number' => $item['idcard']
            ));
        }

        $this->command->info('Clients imported successfully!');
    }
}
