<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "John Doe",
            'email' => "JohnDoe@GMaiL.com",
            'password' => password_hash("JohnGanteng", PASSWORD_BCRYPT)
        ]);
        DB::table('users')->insert([
            'name' => "Charlie",
            'email' => "CharliepUthi@GMaiL.com",
            'password' => password_hash("PhisaU", PASSWORD_BCRYPT)
        ]);
        DB::table('users')->insert([
            'name' => "Isabella",
            'email' => "rodriga@GMaiL.com",
            'password' => password_hash("mAthakir", PASSWORD_BCRYPT)
        ]);
    }
}
