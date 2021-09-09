<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lider;
use File;

class LiderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(public_path("data/liders_alt.json"));
        $liders= json_decode($json);
        foreach ($liders as $key => $value) {
            Lider::create([
                "name" => $value->name,
                "last" => $value->last,
                "dni" => $value->dni,
                "phone" => $value->phone,
                "phone2" => 0,
                "status" => 1,
                "coordinator_id" => 1,
                "user_id" => 1,
            ]);
        }
    }
}
