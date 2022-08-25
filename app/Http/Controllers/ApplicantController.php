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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ApplicantRequest;

class ApplicantController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        $educations = EducationLevels::all()->sortByDesc('level_pendidikan');
        $statuses = StatusApplicant::all()->sortBy('status_pemohon');
        $id_user = Auth::user()->id;
        // DB::enableQueryLog();
        $data = Applicant::with(['user', 'province_ktp', 'district_ktp', 'sub_district_ktp', 'village_ktp', 'province_domisili', 'district_domisili', 'sub_district_domisili', 'village_domisili'])->where('id_user', $id_user)->firstOrNew();
        // dd(DB::getQueryLog());
        return view('pages.profile.index', [
            'provinces' => $provinces,
            'educations' => $educations,
            'statuses' => $statuses,
            'data' => $data,
        ]);
    }
    public function create()
    {
        $provinces = Province::all();
        $educations = EducationLevels::all()->sortByDesc('level_pendidikan');
        $statuses = StatusApplicant::all();
        return view('pages.profile.create', [
            'provinces' => $provinces,
            'educations' => $educations,
            'statuses' => $statuses,
        ]);
    }
    public function store(request $request)
    {
        $validasi = $this->validate($request, [
            'nik_pemohon' => 'required|min:16|numeric',
            'nim_pemohon' => 'required|min:3|alpha_num',
            'nohp_pemohon' => 'required|min:10|numeric',
            'jenjang_pemohon' => 'required',
            'status_pemohon' => 'required',
            'asal_pemohon' => 'required|max:50',
            'progdi_pemohon' => 'required|max:20',
            'semester_pemohon' => 'required|max:10|numeric',
            'alamat_ktp' => 'required|max:255',
            'alamat_domisili' => 'required|max:255',
            'provinsi_ktp' => 'required',
            'kotakab_ktp' => 'required',
            'kecamatan_ktp' => 'required',
            'keldesa_ktp' => 'required',
            'provinsi_domisili' => 'required',
            'kotakab_domisili' => 'required',
            'kecamatan_domisili' => 'required',
            'keldesa_domisili' => 'required',
            'file_ktp'     => 'required|image|mimes:jpeg,jpg,png|max:512',
            'file_ktm'     => 'required|image|mimes:jpeg,jpg,png|max:512'
        ]);

        if ($validasi == true) {
            $ktp_enc = md5(sha1(bcrypt($request->nik_pemohon . '' . $request->file('file_ktp'))));
            $ktm_enc = md5(sha1(bcrypt($request->nik_pemohon . '' . $request->file('file_ktm'))));
            $file_ext_ktp = $request->file('file_ktp')->guessExtension();
            $file_ext_ktm = $request->file('file_ktm')->guessExtension();
            $file_ktp =  $request->file('file_ktp')->storeAs(
                'assets/upload/ktp',
                'file-ktp-' . $ktp_enc . '.' . $file_ext_ktp,
                'public'
            );
            $file_ktm = $request->file('file_ktm')->storeAs(
                'assets/upload/ktm',
                'file-ktm-' . $ktm_enc . '.' . $file_ext_ktm,
                'public'
            );
            $data = [
                'id_user' => Auth::user()->id,
                'nik' => $request->nik_pemohon,
                'nim' => $request->nim_pemohon,
                'no_hp' => $request->nohp_pemohon,
                'alamat_ktp' => $request->alamat_ktp,
                'alamat_domisili' => $request->alamat_domisili,
                'provinsi_ktp' => $request->provinsi_ktp,
                'kotakab_ktp' => $request->kotakab_ktp,
                'kecamatan_ktp' => $request->kecamatan_ktp,
                'kelurahan_ktp' => $request->keldesa_ktp,
                'provinsi_domisili' => $request->provinsi_domisili,
                'kotakab_domisili' => $request->kotakab_domisili,
                'kecamatan_domisili' => $request->kecamatan_domisili,
                'kelurahan_domisili' => $request->keldesa_domisili,
                'status' => $request->status_pemohon,
                'jenjang' => $request->jenjang_pemohon,
                'asal' => $request->asal_pemohon,
                'program_studi' => $request->progdi_pemohon,
                'semester' => $request->semester_pemohon,
                'file_ktp'     => $file_ktp,
                'file_ktm'     => $file_ktm,
            ];
            // dd($data);
            Applicant::create($data);
            return redirect()->route('profile')->with(['success' => 'Data Anda berhasil di perbarui!']);
        } else {

            return redirect()->back()->with(['error' => 'Gagal menyimpan Data Anda']);
        }
    }
    public function edit($id)
    {
        $provinces = Province::all();
        $educations = EducationLevels::all()->sortByDesc('level_pendidikan');
        $statuses = StatusApplicant::all()->sortBy('status_pemohon');
        $id_user = Auth::user()->id;
        // DB::enableQueryLog();
        $data = Applicant::with(['user', 'province_ktp', 'district_ktp', 'sub_district_ktp', 'village_ktp', 'province_domisili', 'district_domisili', 'sub_district_domisili', 'village_domisili'])->where('id_user', $id_user)->firstOrNew();
        // dd(DB::getQueryLog());
        return view('pages.profile.edit', [
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