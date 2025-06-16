<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThuongHieuSeeder extends Seeder
{

    public function run(): void
    {
        $thuongHieus = [
            ['TenThuongHieu' => 'CITIZEN', 'created_at' => now(), 'updated_at' => now()],
            ['TenThuongHieu' => 'TOMMY HILFIGER', 'created_at' => now(), 'updated_at' => now()],
            ['TenThuongHieu' => 'ALFEX', 'created_at' => now(), 'updated_at' => now()],
            ['TenThuongHieu' => 'ENICAR', 'created_at' => now(), 'updated_at' => now()],
            ['TenThuongHieu' => 'CASIO', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('thuong_hieu')->insert($thuongHieus);
    }
}
