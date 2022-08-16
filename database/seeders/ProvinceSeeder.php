<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['nama_provinsi' => 'Aceh'],
            ['nama_provinsi' => 'Sumatra Utara'],
            ['nama_provinsi' => 'Sumatra Barat'],
            ['nama_provinsi' => 'Riau'],
            ['nama_provinsi' => 'Kepulauan Riau'],
            ['nama_provinsi' => 'Jambi'],
            ['nama_provinsi' => 'Bengkulu'],
            ['nama_provinsi' => 'Sumatra Selatan'],
            ['nama_provinsi' => 'Kepulauan Bangka Belitung'],
            ['nama_provinsi' => 'Lampung'],
            ['nama_provinsi' => 'Banten'],
            ['nama_provinsi' => 'DKI Jakarta'],
            ['nama_provinsi' => 'Jawa Barat'],
            ['nama_provinsi' => 'Jawa Tengah'],
            ['nama_provinsi' => 'Jawa Timur'],
            ['nama_provinsi' => 'DI Yogyakarta'],
            ['nama_provinsi' => 'Bali'],
            ['nama_provinsi' => 'Nusa Tenggara Barat'],
            ['nama_provinsi' => 'Nusa Tenggara Timur'],
            ['nama_provinsi' => 'Kalimantan Barat'],
            ['nama_provinsi' => 'Kalimantan Selatan'],
            ['nama_provinsi' => 'Kalimantan Tengah'],
            ['nama_provinsi' => 'Kalimantan Timur'],
            ['nama_provinsi' => 'Kalimantan Utara'],
            ['nama_provinsi' => 'Gorontalo'],
            ['nama_provinsi' => 'Sulawesi Selatan'],
            ['nama_provinsi' => 'Sulawesi Tenggara'],
            ['nama_provinsi' => 'Sulawesi Tengah'],
            ['nama_provinsi' => 'Sulawesi Utara'],
            ['nama_provinsi' => 'Sulawesi Barat'],
            ['nama_provinsi' => 'Maluku'],
            ['nama_provinsi' => 'Maluku Utara'],
            ['nama_provinsi' => 'Papua'],
            ['nama_provinsi' => 'Papua Barat'],
            ['nama_provinsi' => 'Papua Tengah'],
            ['nama_provinsi' => 'Papua Pegunungan'],
            ['nama_provinsi' => 'Papua Selatan'],
        ];

        foreach ($provinces as $province) {
            Province::factory()->create($province);
        }
    }
}