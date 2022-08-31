<?php

namespace Database\Seeders;

use App\Models\EducationLevelPenelitians;
use App\Models\EducationLevels;
use App\Models\EducationLevelsPenelitian;
use Database\Factories\EducationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationPenelitianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educations = [
            ['level_pendidikan' => 'D1', 'biaya' => '100000', 'keterangan' => 'per judul per peneliti', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'D2', 'biaya' => '100000', 'keterangan' => 'per judul per peneliti', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'D3', 'biaya' => '100000', 'keterangan' => 'per judul per peneliti', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'D4', 'biaya' => '200000', 'keterangan' => 'per judul per peneliti', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'S1', 'biaya' => '200000', 'keterangan' => 'per judul per peneliti', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'S2', 'biaya' => '300000', 'keterangan' => 'per judul per peneliti', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'S3', 'biaya' => '300000', 'keterangan' => 'per judul per peneliti', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'Institusi/Organisasi', 'biaya' => '400000', 'keterangan' => 'per judul per peneliti', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($educations as $edu) {
            EducationLevelPenelitians::insert($edu);
        }
    }
}