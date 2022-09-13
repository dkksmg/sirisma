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
            ['id_user' => '1', 'kode_permohonan' => kodepermohonan(), 'id_applicant' => '1', 'jenis_permohonan' => '1', 'no_surat' => 'AXS123', 'asal_surat' => 'FIK UDINUS', 'tgl_surat' => now(), 'keperluan' => 'Penelitian Tesis di Puskesmas Tambakji', 'tgl_awal' => now(), 'tgl_akhir' => now(), 'judul_atau_data' => 'Efektivitas Media Booklet "SEGI BUSUI" Terhadap Pengetahuan dan Sikap Tentang Gizi Seimbang Pada Ibu Menyusui Bayi 0-6 Bulan', 'lokasi_tujuan' => '["Dinas Kesehatan","Puskesmas Bugangan","Puskesmas Kedungmundu"]', 'tanggal_permohonan' => now(), 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'created_at' => now(), 'updated_at' => now(),],
            // ['id_user' => '1', 'kode_permohonan' => kodepermohonan(), 'id_applicant' => '1', 'jenis_permohonan' => '1', 'no_surat' => 'AXS12345', 'asal_surat' => 'FKES UDINUS', 'tgl_surat' => now(), 'keperluan' => 'Penelitian Tesis di Puskesmas Tambakaji dan Rowosari', 'tgl_awal' => now(), 'tgl_akhir' => now(), 'judul_atau_data' => 'Efektivitas Media Booklet "SEGI BUSUI" Terhadap Pengetahuan dan Sikap Tentang Gizi Seimbang Pada Ibu Menyusui Bayi 0-6 Bulan', 'lokasi_tujuan' => '["Dinas Kesehatan","Puskesmas Bugangan","Puskesmas Kedungmundu"]', 'tanggal_permohonan' => now(-1), 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'created_at' => now(), 'updated_at' => now(),],
            // ['id_user' => '1', 'kode_permohonan' => kodepermohonan(), 'id_applicant' => '1', 'jenis_permohonan' => '1', 'keperluan' => 'Penelitian Tesis di Puskesmas Rowosari', 'waktu_awal' => now(), 'waktu_akhir' => now(), 'judul_rencana_penelitian' => 'Deteksi penyakit menular ISPA di wilayah puskemas Rowosari', 'lokasi_tujuan' => '["Dinas Kesehatan Kota Semarang","Puskesmas Bugangan","Puskesmas Kedungmundu"]', 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'tanggal_permohonan' => now(-3), 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'status_permohonan' => 'Kirim', 'update_waktu_status' => now(-23), 'created_at' => now(-23), 'updated_at' => now(),],
            // ['id_user' => '1', 'kode_permohonan' => kodepermohonan(), 'id_applicant' => '1', 'jenis_permohonan' => '1', 'keperluan' => 'Penelitian Tesis di Puskesmas Kedungmundu', 'waktu_awal' => now(), 'waktu_akhir' => now(), 'judul_rencana_penelitian' => 'Deteksi penyakit menular ISPA di wilayah Puskemas Kedungmundu', 'lokasi_tujuan' => '["Dinas Kesehatan Kota Semarang","Puskesmas Bugangan","Puskesmas Kedungmundu"]', 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'tanggal_permohonan' => now(-4), 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'status_permohonan' => 'Periksa', 'update_waktu_status' => now(-2), 'created_at' => now(-2), 'updated_at' => now(),],
            // ['id_user' => '1', 'kode_permohonan' => kodepermohonan(), 'id_applicant' => '1', 'jenis_permohonan' => '1', 'keperluan' => 'Penelitian Tesis di Puskesmas Kedungmundu', 'waktu_awal' => now(), 'waktu_akhir' => now(-3), 'judul_rencana_penelitian' => 'Deteksi penyakit menular ISPA di wilayah Puskemas Kedungmundu', 'lokasi_tujuan' => '["Dinas Kesehatan Kota Semarang","Puskesmas Bugangan","Puskesmas Kedungmundu"]', 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'tanggal_permohonan' => now(-5), 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'status_permohonan' => 'Setujui', 'update_waktu_status' => now(-5), 'created_at' => now(-5), 'updated_at' => now(),],
            // ['id_user' => '1', 'kode_permohonan' => kodepermohonan(), 'id_applicant' => '1', 'jenis_permohonan' => '1', 'keperluan' => 'Penelitian Tesis di Puskesmas Kedungmundu', 'waktu_awal' => now(), 'waktu_akhir' => now(), 'judul_rencana_penelitian' => 'Deteksi penyakit menular ISPA di wilayah Puskemas Kedungmundu', 'lokasi_tujuan' => '["Dinas Kesehatan Kota Semarang","Puskesmas Bugangan","Puskesmas Kedungmundu"]', 'file_surat_pemohon' => 'assets/upload/file/surat_pemohon.pdf', 'tanggal_permohonan' => now(-1), 'file_proposal_pemohon' => 'assets/upload/file/file_proposal.pdf', 'file_surat_permohonan' => 'assets/upload/file/surat_jadi.pdf', 'status_permohonan' => 'Tolak', 'update_waktu_status' => now(-10), 'created_at' => now(-10), 'updated_at' => now(),],
        ];


        foreach ($applications as $application) {
            Application::insert($application);
        }
    }
}