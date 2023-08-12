<?php

namespace App\Http\Livewire;

use App\Models\Departemen;
use App\Models\Divisi;
use App\Models\Karyawan;
use Livewire\Component;

class Sto extends Component
{
    public $hasDivisi;
    public $hasDepartemen;

    public function render()
    {
        return view('livewire.sto')->with(['divisis' => Divisi::all(), 'departemens' => Departemen::all()]);
    }
}
