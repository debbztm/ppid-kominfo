<?php

namespace Database\Seeders;

use App\Models\MaHallMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaHallMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "menu" => "Informasi Ketenaga Listrikan",
            ], [

                "menu" => "Informasi Geologi Mineral dan Batubara",
            ], [
                "menu" => "Informasi Bagian Tata Usaha"
            ]
        ];

        foreach ($data as $d) {
            MaHallMenu::create($d);
        }
    }
}
