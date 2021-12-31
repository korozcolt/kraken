<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Censo;
use File;

class CensoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Censo::truncate();
        $json = File::get(public_path("data/censo.json"));
        $censos= json_decode($json);
        foreach ($censos as $key => $value) {
            Censo::create([
                "name" => $value->name,
                "last" => $value->last,
                "dni" => $value->dni,
                "study" => $value->study,
                "program" => $value->program,
            ]);
        }

    }
}
