<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MasterController extends Controller
{
    public function getProvfromAPI()
    {
        $client = new Client();

        try {
            // Mengirim HTTP GET request ke URL yang diberikan
            $response = $client->get('http://119.2.50.170/sendpusk/api/migrasi/masterprovinsi');

            // Mendapatkan status code dari respons
            $statusCode = $response->getStatusCode();

            // Memeriksa apakah request berhasil
            if ($statusCode === 200) {
                // Mendapatkan body (konten) dari respons
                $data = $response->getBody()->getContents();
                $hasil = json_decode($data,true);
                foreach($hasil as $prov){
                    // dd($prov);
                   $dataprov = Province::where('nama_provinsi','=',ucwords(strtolower($prov['nama'])))
                   ->first();
                if($dataprov !=null){

                   $dataprov->update([
                    'kode_provinsi'=>$prov['kode_provinsi'],
                   ]);
                }
            }


                // Lakukan operasi apapun yang Anda butuhkan dengan data yang diterima
                return response()->json([
                    'message'=>'Berhasil update'
                ]);
            } else {
                // Jika request tidak berhasil, kembalikan respons dengan status code yang sesuai
                return response()->json(['message' => 'Failed to retrieve data from API'], $statusCode);
            }
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, tangani kesalahan dan kembalikan respons dengan pesan kesalahan
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
