<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       DB::table('users')->insert([
        'name'=> 'Admin' ,
        'email' => 'Admin@trilhas-1.com',
        'password' => Hash::make('12345678'),
       ]);
    }
}
