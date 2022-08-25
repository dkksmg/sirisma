<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\SubDistrict;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcehSubDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [

            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Arongan Lambalek"],
            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Bubon"],
            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Johan Pahlawan"],
            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Kaway XVI"],
            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Meurebuo"],
            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Pantai Ceureumen"],
            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Panton Reu"],
            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Samatiga"],
            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Sungai Mas"],
            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Woyla"],
            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Woyla Barat"],
            ['id_prov' => '1', 'id_kota' => '1', 'nama_kecamatan' => "Woyla Timur"],
            ['id_prov' => '1', 'id_kota' => '2', 'nama_kecamatan' => "Babah Rot"],
            ['id_prov' => '1', 'id_kota' => '2', 'nama_kecamatan' => "Blangpidie"],
            ['id_prov' => '1', 'id_kota' => '2', 'nama_kecamatan' => "Jeumpa"],
            ['id_prov' => '1', 'id_kota' => '2', 'nama_kecamatan' => "Kuala Batee"],
            ['id_prov' => '1', 'id_kota' => '2', 'nama_kecamatan' => "Lembah Sabil"],
            ['id_prov' => '1', 'id_kota' => '2', 'nama_kecamatan' => "Manggeng"],
            ['id_prov' => '1', 'id_kota' => '2', 'nama_kecamatan' => "Setia"],
            ['id_prov' => '1', 'id_kota' => '2', 'nama_kecamatan' => "Susoh"],
            ['id_prov' => '1', 'id_kota' => '2', 'nama_kecamatan' => "Tangan-Tangan"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Baitussalam"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Blang Bintang"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Darul Imarah"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Darul Kamal"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Darussalam"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Indrapuri"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Ingin Jaya"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Kota Jantho"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Krueng Barona Jaya"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Kuta Baro"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Kuta Cot Glie"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Kuta Malaka"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Lembah Seulawah"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Leupung"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Lhoknga"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Lhoong"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Mesjid Raya"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Montasik"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Peukan Bada"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Pulo Aceh"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Seulimeum"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Simpang Tiga"],
            ['id_prov' => '1', 'id_kota' => '3', 'nama_kecamatan' => "Suka Makmur"],
            ['id_prov' => '1', 'id_kota' => '4', 'nama_kecamatan' => "Darul Hikmah"],
            ['id_prov' => '1', 'id_kota' => '4', 'nama_kecamatan' => "Indra Jaya"],
            ['id_prov' => '1', 'id_kota' => '4', 'nama_kecamatan' => "Jaya"],
            ['id_prov' => '1', 'id_kota' => '4', 'nama_kecamatan' => "Panga"],
            ['id_prov' => '1', 'id_kota' => '4', 'nama_kecamatan' => "Krueng Sabee"],
            ['id_prov' => '1', 'id_kota' => '4', 'nama_kecamatan' => "Pasie Raya"],
            ['id_prov' => '1', 'id_kota' => '4', 'nama_kecamatan' => "Sampoiniet"],
            ['id_prov' => '1', 'id_kota' => '4', 'nama_kecamatan' => "Setia Bakti"],
            ['id_prov' => '1', 'id_kota' => '4', 'nama_kecamatan' => "Teunom"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Bakongan"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Bakongan Timur"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Kluet Utara"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Kluet Selatan"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Kluet Tengah"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Kluet Timur"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Kota Bahagia"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Labuhan Haji"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Labuhan Haji Timur"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Labuhan Haji Barat"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Meukek"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Pasie Raja"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Sama Dua"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Sawang"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Tapak Tuan"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Trumon"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Trumon Tengah"],
            ['id_prov' => '1', 'id_kota' => '5', 'nama_kecamatan' => "Trumon Timur"],
            ['id_prov' => '1', 'id_kota' => '6', 'nama_kecamatan' => "Danau Paris"],
            ['id_prov' => '1', 'id_kota' => '6', 'nama_kecamatan' => "Gunung Meriah"],
            ['id_prov' => '1', 'id_kota' => '6', 'nama_kecamatan' => "Kota Baharu"],
            ['id_prov' => '1', 'id_kota' => '6', 'nama_kecamatan' => "Kuala Baru"],
            ['id_prov' => '1', 'id_kota' => '6', 'nama_kecamatan' => "Pulau Banyak"],
            ['id_prov' => '1', 'id_kota' => '6', 'nama_kecamatan' => "Pulau Banyak Barat"],
            ['id_prov' => '1', 'id_kota' => '6', 'nama_kecamatan' => "Simpang Kanan"],
            ['id_prov' => '1', 'id_kota' => '6', 'nama_kecamatan' => "Singkil"],
            ['id_prov' => '1', 'id_kota' => '6', 'nama_kecamatan' => "Singkil Utara"],
            ['id_prov' => '1', 'id_kota' => '6', 'nama_kecamatan' => "Singkohor"],
            ['id_prov' => '1', 'id_kota' => '6', 'nama_kecamatan' => "Suro Makmur"],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Banda Mulia"],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Bandar Pusaka"],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Bendahara"],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Karang Baru"],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Kejuruan Muda"],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Kota Kuala Simpang"],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Manyak Payed"],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Rantau "],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Sekerak"],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Seruway"],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Tamiang Hulu"],
            ['id_prov' => '1', 'id_kota' => '7', 'nama_kecamatan' => "Tenggulun"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Atu Lintang"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Bebesen"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Bies"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Bintang"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Celala"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Jagong Jeget"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Kebayakan"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Ketol"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Kute Panang"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Laut Tawar"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Linge"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Pegasing"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Rusip Antara"],
            ['id_prov' => '1', 'id_kota' => '8', 'nama_kecamatan' => "Silih Nara"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Badar"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Babussalam"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Bambel"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Babul Makmur"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Babul Rahmah"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Bukit Tusam"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Darul Hasanah"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Deleng Phokisen"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Ketambe"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Lawe Alas"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Lawe Bulan"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Lawe Sigala-Gala"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Lawe Sumur"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Leuser"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Semadam"],
            ['id_prov' => '1', 'id_kota' => '9', 'nama_kecamatan' => "Tanah Alas"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Banda Alam"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Birem Bayeun"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Darul Aman"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Darul Falah"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Darul Ihsan"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Idi Rayeuk"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Idi Timur"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Idi Tunong"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Indra Makmur"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Julok"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Madat"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Nurussalam"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Pante Beudari"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Peudawa"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Peureulak"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Peureulak Timur"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Peureulak Barat"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Peunaron"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Ranto Peureulak"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Rantau Selamat"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Sebarjadi"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Simpang Jernih"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Simpang Ulim"],
            ['id_prov' => '1', 'id_kota' => '10', 'nama_kecamatan' => "Sungai Raya"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Baktiya"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Baktiya Barat"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Banda Baro"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Cot Girek"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Dewantara"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Geureudong Pase"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Kuta Makmur"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Langkahan"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Lapang"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Lhoksukon"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Matangkuli"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Muara Batu"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Meurah Mulia"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Nibong"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Nisam"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Nisam Antara"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Paya Bakong"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Pirak Timur"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Samudera"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Sawang"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Seunudon"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Simpang Keramat"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Syamtalira Aron"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Syamtalira Bayu"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Tanah Jambo Aye"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Tanah Luas"],
            ['id_prov' => '1', 'id_kota' => '11', 'nama_kecamatan' => "Tanah Pasir"],
            ['id_prov' => '1', 'id_kota' => '12', 'nama_kecamatan' => "Bandar"],
            ['id_prov' => '1', 'id_kota' => '12', 'nama_kecamatan' => "Bener Kelipah"],
            ['id_prov' => '1', 'id_kota' => '12', 'nama_kecamatan' => "Bukit"],
            ['id_prov' => '1', 'id_kota' => '12', 'nama_kecamatan' => "Gajah Putih"],
            ['id_prov' => '1', 'id_kota' => '12', 'nama_kecamatan' => "Mesidah"],
            ['id_prov' => '1', 'id_kota' => '12', 'nama_kecamatan' => "Permata"],
            ['id_prov' => '1', 'id_kota' => '12', 'nama_kecamatan' => "Pintu Rime Gayo"],
            ['id_prov' => '1', 'id_kota' => '12', 'nama_kecamatan' => "Syiah Utama"],
            ['id_prov' => '1', 'id_kota' => '12', 'nama_kecamatan' => "Timang Gajah"],
            ['id_prov' => '1', 'id_kota' => '12', 'nama_kecamatan' => "Wih Pesam"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Gandapura"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Jangka"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Jeumpa"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Jeunieb"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Juli"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Kota Juang"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Kuala"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Kuta Blang"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Makmur"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Pandrah"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Peudada"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Peulimbang"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Peusangan"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Peusangan Selatan"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Peusangan Siblah Krueng"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Samalanga"],
            ['id_prov' => '1', 'id_kota' => '13', 'nama_kecamatan' => "Simpang Mamplam"],
            ['id_prov' => '1', 'id_kota' => '14', 'nama_kecamatan' => "Blang Jerango"],
            ['id_prov' => '1', 'id_kota' => '14', 'nama_kecamatan' => "Blang Kejeren"],
            ['id_prov' => '1', 'id_kota' => '14', 'nama_kecamatan' => "Blang Pegayon"],
            ['id_prov' => '1', 'id_kota' => '14', 'nama_kecamatan' => "Dabun Gelang"],
            ['id_prov' => '1', 'id_kota' => '14', 'nama_kecamatan' => "Kuta Panjang"],
            ['id_prov' => '1', 'id_kota' => '14', 'nama_kecamatan' => "Pantan Cuaca"],
            ['id_prov' => '1', 'id_kota' => '14', 'nama_kecamatan' => "Pining"],
            ['id_prov' => '1', 'id_kota' => '14', 'nama_kecamatan' => "Putri Betung"],
            ['id_prov' => '1', 'id_kota' => '14', 'nama_kecamatan' => "Rikit Gaib"],
            ['id_prov' => '1', 'id_kota' => '14', 'nama_kecamatan' => "Terangon"],
            ['id_prov' => '1', 'id_kota' => '14', 'nama_kecamatan' => "Tripe Jaya"],
            ['id_prov' => '1', 'id_kota' => '15', 'nama_kecamatan' => "Beutong"],
            ['id_prov' => '1', 'id_kota' => '15', 'nama_kecamatan' => "Beutong Ateuh Banggalang"],
            ['id_prov' => '1', 'id_kota' => '15', 'nama_kecamatan' => "Darul Makmur"],
            ['id_prov' => '1', 'id_kota' => '15', 'nama_kecamatan' => "Kuala"],
            ['id_prov' => '1', 'id_kota' => '15', 'nama_kecamatan' => "Kuala Pesisir"],
            ['id_prov' => '1', 'id_kota' => '15', 'nama_kecamatan' => "Seunagan"],
            ['id_prov' => '1', 'id_kota' => '15', 'nama_kecamatan' => "Seunagan Timur"],
            ['id_prov' => '1', 'id_kota' => '15', 'nama_kecamatan' => "Suka Makmue"],
            ['id_prov' => '1', 'id_kota' => '15', 'nama_kecamatan' => "Tadu Raya"],
            ['id_prov' => '1', 'id_kota' => '15', 'nama_kecamatan' => "Tripa Makmur"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Batee"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Delima"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Geumpang"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Geulumpang Tiga"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Glumpang Baro"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Grong Grong"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Indra Jaya"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Kembang Tanjong"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Keumala"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Kota Sigli"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Mane"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Muara Tiga"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Mutiara"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Mutiara Timur"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Padang Tiji"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Peukan Baro"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Pidie"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Sakti"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Simpang Tiga"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Tangse"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Tiro"],
            ['id_prov' => '1', 'id_kota' => '16', 'nama_kecamatan' => "Titeue"],
            ['id_prov' => '1', 'id_kota' => '17', 'nama_kecamatan' => "Bandar Baru"],
            ['id_prov' => '1', 'id_kota' => '17', 'nama_kecamatan' => "Bandar Dua"],
            ['id_prov' => '1', 'id_kota' => '17', 'nama_kecamatan' => "Jangka Buya"],
            ['id_prov' => '1', 'id_kota' => '17', 'nama_kecamatan' => "Meurah Dua"],
            ['id_prov' => '1', 'id_kota' => '17', 'nama_kecamatan' => "Meureudu"],
            ['id_prov' => '1', 'id_kota' => '17', 'nama_kecamatan' => "Panteraja"],
            ['id_prov' => '1', 'id_kota' => '17', 'nama_kecamatan' => "Trienggadeng"],
            ['id_prov' => '1', 'id_kota' => '17', 'nama_kecamatan' => "Ulim"],
            ['id_prov' => '1', 'id_kota' => '18', 'nama_kecamatan' => "Alafan"],
            ['id_prov' => '1', 'id_kota' => '18', 'nama_kecamatan' => "Salang"],
            ['id_prov' => '1', 'id_kota' => '18', 'nama_kecamatan' => "Simeulue Barat"],
            ['id_prov' => '1', 'id_kota' => '18', 'nama_kecamatan' => "Simeuleu Cut"],
            ['id_prov' => '1', 'id_kota' => '18', 'nama_kecamatan' => "Simeulue Tengah"],
            ['id_prov' => '1', 'id_kota' => '18', 'nama_kecamatan' => "Simeulue Timur"],
            ['id_prov' => '1', 'id_kota' => '18', 'nama_kecamatan' => "Teluk Dalam"],
            ['id_prov' => '1', 'id_kota' => '18', 'nama_kecamatan' => "Teupah Barat"],
            ['id_prov' => '1', 'id_kota' => '18', 'nama_kecamatan' => "Teupah Selatan"],
            ['id_prov' => '1', 'id_kota' => '18', 'nama_kecamatan' => "Teupah Tengah"],
            ['id_prov' => '1', 'id_kota' => '19', 'nama_kecamatan' => "Baiturrahman"],
            ['id_prov' => '1', 'id_kota' => '19', 'nama_kecamatan' => "Banda Raya"],
            ['id_prov' => '1', 'id_kota' => '19', 'nama_kecamatan' => "Jaya Baru"],
            ['id_prov' => '1', 'id_kota' => '19', 'nama_kecamatan' => "Kuta Alam"],
            ['id_prov' => '1', 'id_kota' => '19', 'nama_kecamatan' => "Kuta Raja"],
            ['id_prov' => '1', 'id_kota' => '19', 'nama_kecamatan' => "Lueng Bata"],
            ['id_prov' => '1', 'id_kota' => '19', 'nama_kecamatan' => "Meuraxa"],
            ['id_prov' => '1', 'id_kota' => '19', 'nama_kecamatan' => "Syiah Kuala"],
            ['id_prov' => '1', 'id_kota' => '19', 'nama_kecamatan' => "Ulee Kareng"],
            ['id_prov' => '1', 'id_kota' => '20', 'nama_kecamatan' => "Langsa Barat"],
            ['id_prov' => '1', 'id_kota' => '20', 'nama_kecamatan' => "Langsa Baro"],
            ['id_prov' => '1', 'id_kota' => '20', 'nama_kecamatan' => "Langsa Kota"],
            ['id_prov' => '1', 'id_kota' => '20', 'nama_kecamatan' => "Langsa Lama"],
            ['id_prov' => '1', 'id_kota' => '20', 'nama_kecamatan' => "Langsa Timur"],
            ['id_prov' => '1', 'id_kota' => '21', 'nama_kecamatan' => "Banda Sakti"],
            ['id_prov' => '1', 'id_kota' => '21', 'nama_kecamatan' => "Blang Mangat"],
            ['id_prov' => '1', 'id_kota' => '21', 'nama_kecamatan' => "Muara Dua"],
            ['id_prov' => '1', 'id_kota' => '21', 'nama_kecamatan' => "Muara Satu"],
            ['id_prov' => '1', 'id_kota' => '22', 'nama_kecamatan' => "Sukajaya"],
            ['id_prov' => '1', 'id_kota' => '22', 'nama_kecamatan' => "Sukakarya"],
            ['id_prov' => '1', 'id_kota' => '23', 'nama_kecamatan' => "Longkib"],
            ['id_prov' => '1', 'id_kota' => '23', 'nama_kecamatan' => "Penanggalan"],
            ['id_prov' => '1', 'id_kota' => '23', 'nama_kecamatan' => "Rundeng"],
            ['id_prov' => '1', 'id_kota' => '23', 'nama_kecamatan' => "Simpang Kiri"],
            ['id_prov' => '1', 'id_kota' => '23', 'nama_kecamatan' => "Sultan Daulat"],



            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Aek Kuasan"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Aek Ledong"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Aek Songsongan"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Air Batu"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Air Joman"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Bandar Pasir Mandoge"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Bandar Pulau"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Buntu Pane"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Kota Kisaran Barat"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Kota Kisaran Timur"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Meranti "],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Pulau Rakyat"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Pulo Bandring"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Rahuning"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Rawang Panca Arga"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Sei Dadap"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Sei Kepayang"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Sei Kepayang Barat"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Sei Kepayang Timur"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Setia Janji"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Silau Laut"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Simpang Empat"],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Tanjung Balai "],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Teluk Dalam "],
            ['id_prov' => '2', 'id_kota' => '24', 'nama_kecamatan' => "Tinggi Raja"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Air Putih"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Datuk Lima Puluh"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Datuk Tanah Datar"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Laut Tador"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Limapuluh"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Lima Puluh Pesisir"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Medang Deras"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Nibung Hangus"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Sei Balai"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Sei Suka"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Talawi"],
            ['id_prov' => '2', 'id_kota' => '25', 'nama_kecamatan' => "Tanjung Tiram"],


        ];
        foreach ($districts as $district) {
            SubDistrict::factory()->create($district);
        }
    }
}