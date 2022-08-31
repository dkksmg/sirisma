<?php

namespace Database\Seeders;

use App\Models\Applicant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $applicant = new Applicant;
        $applicant->id_user = "1";
        $applicant->nik = '337410121211';
        $applicant->nim = '202212109201';
        $applicant->no_hp = '082227250034';
        $applicant->alamat_ktp = 'Puri Dinar Elok Semarang';
        $applicant->alamat_domisili = 'Puri Dinar Elok Semarang';
        $applicant->provinsi_ktp = '1';
        $applicant->kotakab_ktp = '1';
        $applicant->kecamatan_ktp = '1';
        $applicant->kelurahan_ktp = '1';
        $applicant->provinsi_domisili = '1';
        $applicant->kotakab_domisili = '1';
        $applicant->kecamatan_domisili = '1';
        $applicant->kelurahan_domisili = '1';
        $applicant->status = 'Mahasiswa';
        $applicant->jenjang = 'S1';
        $applicant->asal = 'Universitas Dian Nuswantoro';
        $applicant->program_studi = 'Teknik Informatika';
        $applicant->semester = '5';
        $applicant->file_ktp = 'Cikiwir';
        $applicant->file_ktm = 'Cikiwir';
        $applicant->save();
    }
}