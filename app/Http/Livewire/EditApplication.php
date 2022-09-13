<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Application;
use App\Models\ApplicationType;

class EditApplication extends Component
{
    public $no_surat;
    public function mount()
    {
    }
    public function getApplication($id)
    {
        $types = ApplicationType::all();
        $app = Application::with(['applicant', 'user', 'type', 'addonapplicant'])->findOrFail($id);
        $this->emit('getApplication', $app);
    }
    public function render()
    {
        return view('livewire.edit-application');
    }
}