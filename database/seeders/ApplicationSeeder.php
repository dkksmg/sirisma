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
            ['id_user' => '1', 'kode_permohonan' => '337479PL01', 'id_applicant' => '1', 'jenis_permohonan' => '1', 'keperluan' => 'Penelitian Tesis di Puskesmas Tambakji', 'waktu_awal' => now(), 'waktu_akhir' => now(), 'judul_rencana_penelitian' => 'Efektivitas Media Booklet "SEGI BUSUI" Terhadap Pengetahuan dan Sikap Tentang Gizi Seimbang Pada Ibu Menyusui Bayi 0-6 Bulan', 'tanggal_permohonan' => now(-2), 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'status_permohonan' => 'Draft', 'update_waktu_status' => now(), 'created_at' => now(), 'updated_at' => now(),],
            ['id_user' => '1', 'kode_permohonan' => '337479PL02', 'id_applicant' => '1', 'jenis_permohonan' => '1', 'keperluan' => 'Penelitian Tesis di Puskesmas Rowosari', 'waktu_awal' => now(), 'waktu_akhir' => now(), 'judul_rencana_penelitian' => 'Deteksi penyakit menular ISPA di wilayah puskemas Rowosari', 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'tanggal_permohonan' => now(-3), 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'status_permohonan' => 'Kirim', 'update_waktu_status' => now(-23), 'created_at' => now(-23), 'updated_at' => now(),],
            ['id_user' => '1', 'kode_permohonan' => '337479PL03', 'id_applicant' => '1', 'jenis_permohonan' => '1', 'keperluan' => 'Penelitian Tesis di Puskesmas Kedungmundu', 'waktu_awal' => now(), 'waktu_akhir' => now(), 'judul_rencana_penelitian' => 'Deteksi penyakit menular ISPA di wilayah Puskemas Kedungmundu', 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'tanggal_permohonan' => now(-4), 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'status_permohonan' => 'Periksa', 'update_waktu_status' => now(-2), 'created_at' => now(-2), 'updated_at' => now(),],
            ['id_user' => '1', 'kode_permohonan' => '337479PL04', 'id_applicant' => '1', 'jenis_permohonan' => '1', 'keperluan' => 'Penelitian Tesis di Puskesmas Kedungmundu', 'waktu_awal' => now(), 'waktu_akhir' => now(-3), 'judul_rencana_penelitian' => 'Deteksi penyakit menular ISPA di wilayah Puskemas Kedungmundu', 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'tanggal_permohonan' => now(-5), 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'status_permohonan' => 'Setujui', 'update_waktu_status' => now(-5), 'created_at' => now(-5), 'updated_at' => now(),],
            ['id_user' => '1', 'kode_permohonan' => '337479PL05', 'id_applicant' => '1', 'jenis_permohonan' => '1', 'keperluan' => 'Penelitian Tesis di Puskesmas Kedungmundu', 'waktu_awal' => now(), 'waktu_akhir' => now(), 'judul_rencana_penelitian' => 'Deteksi penyakit menular ISPA di wilayah Puskemas Kedungmundu', 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'tanggal_permohonan' => now(-1), 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'status_permohonan' => 'Tolak', 'update_waktu_status' => now(-10), 'created_at' => now(-10), 'updated_at' => now(),],
        ];


        foreach ($applications as $application) {
            Application::insert($application);
        }
    }
}