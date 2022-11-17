<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Applicant;
use App\Models\LokasiTujuan;
use App\Models\ApplicationType;
use Illuminate\Support\Facades\Auth;

class Applications extends Component
{
    public $dataApplicants = [];
    // public $allProducts = [];

    public function mount()
    {
        $id_user = Auth::user()->id;
        $user = Applicant::with(['user'])->where('id_user', $id_user)->first();
        $this->dataApplicants = [
            ['nama_pemohon' => $user->user->name, 'nim' => $user->nim, 'nik' => $user->nik, 'no_hp' => $user->no_hp]
        ];
    }

    public function addPemohon()
    {
        $this->dataApplicants[] = ['nama_pemohon' => '', 'nim' => '', 'nik' => '', 'no_hp' => ''];
    }

    public function removePemohon($index)
    {
        unset($this->dataApplicants[$index]);
        $this->dataApplicants = array_values($this->dataApplicants);
    }
    public function render()
    {
        $type = ApplicationType::all();
        $lokasi = LokasiTujuan::all()->sortBy('lokasi_tujuan');
        $id_user = Auth::user()->id;
        $data = Applicant::with(['user'])->where('id_user', $id_user)->first();
        info($this->dataApplicants);
        return view('livewire.applications', [
            'types' => $type,
            'data' => $data,
            'lokasis' => $lokasi
        ]);
    }
}