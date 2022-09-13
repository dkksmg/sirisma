<?php

namespace Database\Seeders;

use App\Models\LogSurat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LogSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logs = [
            [
                'id_application' => '1', 'status_surat' => 'kirim', 'update_oleh' => '1', 'update_waktu' => now(), 'keterangan' => '', 'created_at' => now(), 'updated_at' => now(),
            ],
            // [
            //     'id_application' => '2', 'status_surat' => 'kirim', 'update_oleh' => '1', 'update_waktu' => now(), 'keterangan' => '', 'created_at' => now(), 'updated_at' => now(),
            // ],
            // [
            //     'id_application' => '1', 'status_surat' => 'proses', 'update_oleh' => '3', 'update_waktu' => now(-2), 'keterangan' => 'sesuai', 'created_at' => now(), 'updated_at' => now(),
            // ],
            // [
            //     'id_application' => '1', 'status_surat' => 'tolak', 'update_oleh' => '3', 'update_waktu' => now(-3), 'keterangan' => 'tidak sesuai', 'created_at' => now(), 'updated_at' => now(),
            // ],
        ];
        foreach ($logs as $log) {
            LogSurat::insert($log);
        }
    }
}