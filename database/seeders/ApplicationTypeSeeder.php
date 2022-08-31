<?php

namespace Database\Seeders;

use App\Models\ApplicationType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplicationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['jenis_permohonan' => 'Penelitian', 'status_opsi' => 'y', 'created_at' => now(), 'updated_at' => now()],
            ['jenis_permohonan' => 'Magang', 'status_opsi' => 'n', 'created_at' => now(), 'updated_at' => now()],
            ['jenis_permohonan' => 'Pengambilan Data', 'status_opsi' => 'n', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($types as $type) {
            ApplicationType::insert($type);
        }
    }
}