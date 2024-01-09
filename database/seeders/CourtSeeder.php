<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courts')->insert([
            'name' => "NextGen Sports Hall",
            'address' => "Jl. Mayjen Sungkono No.89, Gn. Sari, Kec. Dukuhpakis, Surabaya, Jawa Timur 60225",
            'price' => "Rp. 600.000,-",
            'image_path' => "p1"
        ]);
        DB::table('courts')->insert([
            'name' => "Lapangan Basket Unesa",
            'address' => "Jl. Ketintang No.2, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231",
            'price' => "Rp. 300.000,-",
            'image_path' => "p2"
        ]);
        DB::table('courts')->insert([
            'name' => "Lapangan Basket Araya",
            'address' => "Medokan Semampir, Sukolilo, Surabaya, East Java 60119",
            'price' => "Rp. 250.000,-",
            'image_path' => "p3"
        ]);
        DB::table('courts')->insert([
            'name' => "Lapangan Basket Flexy",
            'address' => "Campus ITS, Jl. ITS Raya, Keputih, Kec. Sukolilo, Surabaya, Jawa Timur 60117",
            'price' => "Rp. 350.000,-",
            'image_path' => "p4"
        ]);
        DB::table('courts')->insert([
            'name' => "DBL Arena",
            'address' => "Jl. Ahmad Yani No.114, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231",
            'price' => "Rp. 500.000,-",
            'image_path' => "p5"
        ]);
        DB::table('courts')->insert([
            'name' => "GOR Lila Buana",
            'address' => "Jl. Gatot Subroto No.114, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231",
            'price' => "Rp. 450.000,-",
            'image_path' => "p6"
        ]);
    }
}
