<?php

namespace Database\Seeders;

use App\Models\StatusApplicant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['status_pemohon' => 'Mahasiswa', 'created_at' => now(), 'updated_at' => now()],
            ['status_pemohon' => 'Dosen', 'created_at' => now(), 'updated_at' => now()],
            ['status_pemohon' => 'Lainnya', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($statuses as $status) {
            StatusApplicant::insert($status);
        }
    }
}