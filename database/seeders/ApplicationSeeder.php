<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $applications = [
            ['id_user' => '1', 'kode_permohonan' => kodepermohonan(), 'id_applicant' => '1', 'jenis_permohonan' => '1', 'no_surat' => 'B.22.01/XXI/2022/01', 'asal_surat' => 'FIK UDINUS', 'tgl_surat' => now(), 'keperluan' => 'Penelitian Tesis di Puskesmas Tambakji', 'tgl_awal' => now(), 'tgl_akhir' => now(), 'judul_atau_data' => 'Efektivitas Media Booklet "SEGI BUSUI" Terhadap Pengetahuan dan Sikap Tentang Gizi Seimbang Pada Ibu Menyusui Bayi 0-6 Bulan', 'lokasi_tujuan' => '["Dinas Kesehatan","Puskesmas Bugangan","Puskesmas Kedungmundu"]', 'tanggal_permohonan' => now(), 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'created_at' => now(), 'updated_at' => now(),],
            ['id_user' => '2', 'kode_permohonan' => kodepermohonan(), 'id_applicant' => '2', 'jenis_permohonan' => '1', 'no_surat' => 'B.22.01/XXI/2022/0219', 'asal_surat' => 'FKES UDINUS', 'tgl_surat' => now(), 'keperluan' => 'Penelitian Tesis di Puskesmas Tambakji', 'tgl_awal' => now(), 'tgl_akhir' => now(), 'judul_atau_data' => 'Efektivitas Media Booklet "SEGI BUSUI" Terhadap Pengetahuan dan Sikap Tentang Gizi Seimbang Pada Ibu Menyusui Bayi 0-6 Bulan', 'lokasi_tujuan' => '["Dinas Kesehatan","Puskesmas Bugangan","Puskesmas Kedungmundu"]', 'tanggal_permohonan' => now(), 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'created_at' => now(), 'updated_at' => now(),],
        ];


        foreach ($applications as $application) {
            Application::insert($application);
        }
    }
}