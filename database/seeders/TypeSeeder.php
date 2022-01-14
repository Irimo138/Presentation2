<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.euskadi.eus/culture/events/v1.0/eventType');
        $jsonArray = json_decode($res->getBody()->getContents(), true);
        foreach($jsonArray as $type){
            DB::table('types')->insert([
                'name' => $type["nameEu"],
            ]);
        }

    }
}
