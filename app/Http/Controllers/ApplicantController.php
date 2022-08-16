<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function index()
    {
        $provinces = Province::all();
        $id_user = Auth::user()->id;
        $data = Applicant::with(['user', 'province_ktp', 'district_ktp', 'sub_district_ktp', 'village_ktp', 'province_domisili', 'district_domisili', 'sub_district_domisili', 'village_domisili'])->findOrFail($id_user);
        // dd($data);
        return view('pages.profile.index', [
            'provinces' => $provinces,
            'data' => $data,
        ]);
    }
}