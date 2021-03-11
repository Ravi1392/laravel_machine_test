<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('admin')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            // 'name' => "Ravi",
            // 'email' => "admin@gmail.com",
            'mobile' => 1234567891,
            'password' => 1234,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
