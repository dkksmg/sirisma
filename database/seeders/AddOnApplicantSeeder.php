<?php

namespace Database\Seeders;

use App\Models\AddOnApplicant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddOnApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $applicants = [
            [
                'id_application' => '1', 'nama_pemohon' => 'Ardian F Firmansyah', 'nim_pemohon' => '121021029012', 'nik' => '21212121', 'no_hp' => '082227250034', 'created_at' => now(), 'updated_at' => now()
            ],  [
                'id_application' => '1', 'nama_pemohon' => 'Rakha', 'nim_pemohon' => '032802803928032', 'nik' => '032803280382', 'no_hp' => '08522745619029', 'created_at' => now(), 'updated_at' => now()
            ]
        ];

        foreach ($applicants as $applicant) {
            AddOnApplicant::insert($applicant);
        }
    }
}