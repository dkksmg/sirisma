<?php

namespace App\Http\Livewire\Permohonan;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Application;
use App\Models\LokasiTujuan;
use App\Models\AddOnApplicant;
use App\Models\ApplicationType;
use Illuminate\Support\Facades\DB;

class Edit extends Component
{
    public $no_surat;
    public $asal_surat;
    public $tgl_surat;
    public $judul_penelitian;
    public $keperluan;
    public $lokasi;
    public $app;
    public $dataApplicants = [];

    public function mount($id_app)
    {
        $application = Application::with(['applicant', 'user', 'type', 'addonapplicant'])->findOrFail($id_app);
        if ($application) {
            $this->app = $application;
            $this->no_surat = $application->no_surat;
            $this->asal_surat = $application->asal_surat;
            $this->judul_penelitian = $application->judul_atau_data;
            $this->keperluan = $application->keperluan;
            foreach ($application->addonapplicant as $pemohon) {
                $data[] = array(
                    'idp' => $pemohon->id,
                    'nama_pemohon' => $pemohon->nama_pemohon,
                    'nim' => $pemohon->nim_pemohon,
                    'nik' => $pemohon->nik,
                    'no_hp' => $pemohon->no_hp
                );
            }
            $this->dataApplicants = $data;
        }
    }
    public function addPemohon()
    {
        $this->dataApplicants[] = ['idp' => '', 'nama_pemohon' => '', 'nim' => '', 'nik' => '', 'no_hp' => ''];
    }

    public function removePemohon($index)
    {
        // dd($this->dataApplicants[$index]);
        if (empty($this->dataApplicants[$index]['idp'])) {
            unset($this->dataApplicants[$index]);
            $this->dataApplicants = array_values($this->dataApplicants);
        } elseif (!empty($this->dataApplicants[$index])) {
            AddOnApplicant::where('id', $this->dataApplicants[$index]['idp'])->delete();
            unset($this->dataApplicants[$index]);
            $this->dataApplicants = array_values($this->dataApplicants);
        }
    }
    public function render()
    {
        $types = ApplicationType::all();
        $lokasi = LokasiTujuan::all()->sortBy('lokasi_tujuan');
        return view('livewire.permohonan.edit', [
            'types' => $types,
            'lokasis' => $lokasi,
        ]);
    }
}