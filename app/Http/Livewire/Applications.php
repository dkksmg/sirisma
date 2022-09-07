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
    public $orderProducts = [];
    public $allProducts = [];

    public function mount()
    {
        $this->allProducts = Product::all();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1]
        ];
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['nama' => '', 'nim' => '', 'no_hp' => ''];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }
    public function render()
    {
        $type = ApplicationType::all();
        $lokasi = LokasiTujuan::all()->sortBy('lokasi_tujuan');
        $id_user = Auth::user()->id;
        $data = Applicant::with(['user'])->findOrNew($id_user);
        return view('livewire.applications', [
            'types' => $type,
            'data' => $data,
            'lokasis' => $lokasi
        ]);
    }
}