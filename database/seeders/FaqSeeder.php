<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            [
                'judul_faq' => 'Bagaimana Cara Pengajuan Penelitian ?',
                'isi_faq' => 'Anda dapat mengajukan pengajuan melalui laman permohonan', 'created_at' => now(), 'updated_at' => now()
            ],
            [
                'judul_faq' => 'Berkas apa yang perlu disiapkan untuk pengajuan permohonan Penelitian ?',
                'isi_faq' => 'Berkas yang diperlukan adalah Surat permohonan dari Instansi Anda, file proposal*', 'created_at' => now(), 'updated_at' => now()
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::insert($faq);
        }
    }
}