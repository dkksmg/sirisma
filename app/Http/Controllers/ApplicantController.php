<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\Applicant;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use App\Models\EducationLevels;
use App\Models\StatusApplicant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        $educations = EducationLevels::all()->sortByDesc('level_pendidikan');
        $statuses = StatusApplicant::all()->sortBy('status_pemohon');
        $id_user = Auth::user()->id;
        $data = Applicant::with(['user', 'province_ktp', 'district_ktp', 'sub_district_ktp', 'village_ktp', 'province_domisili', 'district_domisili', 'sub_district_domisili', 'village_domisili'])->find($id_user);
        // dd($statuses);
        return view('pages.profile.index', [
            'provinces' => $provinces,
            'educations' => $educations,
            'statuses' => $statuses,
            'data' => $data,
        ]);
    }
    public function getkotakab(request $request)
    {
        $id_kota = $request->id_kota;

        $id_provinsi = $request->id_provinsi;
        $kotakabs = District::where('id_prov', $id_provinsi)->get();

        $option = '<option> - Pilih Kota/Kabupaten -</option>';
        foreach ($kotakabs as $kotakab) {
            if ($id_kota) {
                // edit
                if ($id_kota == $kotakab->id_kota) {
                    $option .= "<option value='$kotakab->id_kota' selected>$kotakab->nama_kota</option>";
                } else {

                    $option .= "<option value='$kotakab->id_kota' >$kotakab->nama_kota</option>";
                }
            } else {
                // tambah
                $option .= "<option value='$kotakab->id_kota' >$kotakab->nama_kota</option>";
            }
        }
        echo json_encode($option);
    }
    public function getkecamatan(request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $id_kota = $request->id_kota;
        $kecamatans = SubDistrict::where('id_kota', $id_kota)->get();

        $option = '<option> - Pilih Kecamatan -</option>';
        foreach ($kecamatans as $kecamatan) {
            if ($id_kecamatan) {
                if ($id_kecamatan == $kecamatan->id_kec) {
                    $option .= "<option value='$kecamatan->id_kec' selected>$kecamatan->nama_kecamatan</option>";
                } else {
                    $option .= "<option value='$kecamatan->id_kec'>$kecamatan->nama_kecamatan</option>";
                }
            } else {
                $option .= "<option value='$kecamatan->id_kec'>$kecamatan->nama_kecamatan</option>";
            }
        }
        echo json_encode($option);
    }
    public function getkeldesa(request $request)
    {
        $id_keldesa = $request->id_keldesa;

        $id_kecamatan = $request->id_kecamatan;
        $kelurahans = Village::where([
            ['id_kec', '=', $id_kecamatan],
        ])->orderBy('nama_kelurahan', 'asc')->get();

        $option = '<option> - Pilih Kelurahan/Desa -</option>';
        foreach ($kelurahans as $kelurahan) {
            if ($id_keldesa) {
                if ($id_keldesa == $kelurahan->id_kel) {

                    $option .= "<option value='$kelurahan->id_kel' selected>$kelurahan->nama_kelurahan</option>";
                } else {
                    $option .= "<option value='$kelurahan->id_kel' >$kelurahan->nama_kelurahan</option>";
                }
            } else {
                $option .= "<option value='$kelurahan->id_kel' >$kelurahan->nama_kelurahan</option>";
            }
        }

        echo json_encode($option);
    }
    public function getdataedit(request $request)
    {
        $id_pemohon = $request->id_pemohon;

        $data = Applicant::where('id_user', $id_pemohon)->first();

        echo json_encode($data);
    }
}