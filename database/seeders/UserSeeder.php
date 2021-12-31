<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(public_path("data/users.json"));
        $users = json_decode($json);
        foreach ($users as $key => $value) {
            User::create([
                "name" => $value->name,
                "last" => $value->last,
                "dni" => $value->dni,
                "phone" => $value->phone,
                "role" => 1,
                "email" => $value->email,
                "password" => bcrypt('123456')
            ]);
        }
    }
}
