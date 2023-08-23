<?php

namespace App\Http\Livewire;

use App\Models\Bagian;
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
        $divisis = Divisi::all();
        $departemens = Departemen::all();
        $bagians = Bagian::all();

        return view('livewire.sto', compact('divisis', 'departemens', 'bagians'));
    }
}
