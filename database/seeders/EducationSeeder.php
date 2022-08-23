<?php

namespace Database\Seeders;

use App\Models\EducationLevels;
use Database\Factories\EducationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educations = [
            ['level_pendidikan' => 'SMA', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'SMK', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'D1', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'D2', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'D3', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'D4', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'S1', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'S2', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'S3', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'S4', 'created_at' => now(), 'updated_at' => now()],
            ['level_pendidikan' => 'Institusi/Organisasi', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($educations as $edu) {
            EducationLevels::insert($edu);
        }
    }
}