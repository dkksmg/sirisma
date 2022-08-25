<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nik_pemohon' => 'required|min:16|max:30|numeric',
            'nim_pemohon' => 'required|min:3|max:40|numeric',
            'nohp_pemohon' => 'required|min:10|max:40|numeric',
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
        ];
    }
}