<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            // 'nama_pemohon' => 'required|min:5|alpha',
            'jenis_permohonan' => 'required',
            'keperluan_pemohon' => 'required|min:5',
            'judul_penelitian' => 'required|min:5',
            'waktu_awal' => 'required',
            'waktu_akhir' => 'required',
            'file_pengantar'     => 'required|file|mimes:pdf|max:712',
            'file_proposal'     => 'required|file|mimes:pdf|max:3072'
        ];
    }
    public function messages()
    {
        return [
            // 'nama_pemohon.required' => 'Nama Pemohon Wajib diisi',
            // 'nama_pemohon.min' => 'Nama Pemohon berisi minimal 5 karakter',
            // 'nama_pemohon.alpha' => 'Nama Pemohon hanya boleh berisi huruf',
            'jenis_permohonan.required' => 'Jenis Permohonan Wajib dipilih',
            'keperluan_pemohon.required' => 'Keperluan Pemohon Wajib diisi',
            'keperluan_pemohon.min' => 'Keperluan Pemohon berisi minimal 5 karakter',
            'judul_penelitian.required' => 'Judul Penelitian Wajib diisi',
            'judul_penelitian.min' => 'Keperluan Pemohon berisi minimal 5 karakter',
            'waktu_awal.required' => 'Waktu Awal  Wajib diisi',
            'waktu_akhir.required' => 'Waktu Akhir Wajib diisi',
            'file_pengantar.required' => 'File Pengantar Wajib diisi',
            'file_pengantar.mimes' => 'File Pengantar harus berupa file berformat pdf',
            'file_pengantar.max' => 'File Pengantar harus tidak boleh lebih dari 700 KB',
            'file_proposal.required' => 'File Pengantar Wajib diisi',
            'file_proposal.mimes' => 'File Proposal harus berupa file berformat pdf',
            'file_proposal.max' => 'File Proposal harus tidak boleh lebih dari 3 MB',
        ];
    }
}