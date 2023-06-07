<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>"Admin",
            'email'=>'admin@gmail.com',
            'email_verified_at'=> Carbon::now(),
            'created_at'=> Carbon::now(),
            'password' => Hash::make('password'),
        ]);
    }
}
