<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.permohonan.list');
    }
    public function input()
    {
        $provinces = Province::all();
        return view('pages.permohonan.tambah', [
            'provinces' => $provinces,
        ]);
    }
    public function getkotakab(request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kotakabs = District::where('id_prov', $id_provinsi)->get();

        $option = '<option> - Pilih Kota/Kabupaten -</option>';
        foreach ($kotakabs as $kotakab) {
            $option .= "<option value='$kotakab->id_kota'>$kotakab->nama_kota</option>";
        }
        echo $option;
    }
    public function getkecamatan(request $request)
    {
        $id_kotakab = $request->id_kotakab;
        $kecamatans = SubDistrict::where('id_kota', $id_kotakab)->get();

        $option = '<option> - Pilih Kecamatan -</option>';
        foreach ($kecamatans as $kecamatan) {
            $option .= "<option value='$kecamatan->id_kec'>$kecamatan->nama_kecamatan</option>";
        }
        echo $option;
    }
    public function getkeldesa(request $request)
    {
        if ($request->ajax()) {
            $id_kotakab = $request->id_kotakab;
            $id_kecamatan = $request->id_kecamatan;
            $kelurahans = Village::where([
                ['id_kota', '=', $id_kotakab],
                ['id_kec', '=', $id_kecamatan],
            ])->orderBy('nama_kelurahan', 'asc')->get();
            $option = '<option> - Pilih Kelurahan/Desa -</option>';
            foreach ($kelurahans as $kelurahan) {
                $option .= "<option value='$kelurahan->id_kel'>$kelurahan->nama_kelurahan</option>";
            }
            echo $option;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}