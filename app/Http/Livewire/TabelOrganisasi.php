<?php

namespace App\Http\Livewire;

use App\Models\Bagian;
use App\Models\Departemen;
use App\Models\Divisi;
use Livewire\Component;
use Livewire\WithPagination;

class TabelOrganisasi extends Component
{
    use WithPagination;

    public $query = '';
    public $sto;
    
    public function render()
    {
        if ($this->sto == 'divisi') {
            return view('livewire.tabel-organisasi', [
                'organisasis' => Divisi::whereNull('deleted_at')
                    ->with('departemen')
                    ->where('nama', 'like', '%' . $this->query . '%')->get()
            ]);
        }
        else if ($this->sto == 'departemen') {
            return view('livewire.tabel-organisasi', [
                'organisasis' => Departemen::whereNull('deleted_at')
                    ->with('divisi')
                    ->where('nama', 'like', '%' . $this->query . '%')->get()
            ]);
        }
        else if ($this->sto == 'bagian') {
            return view('livewire.tabel-organisasi', [
                'organisasis' => Bagian::whereNull('deleted_at')
                    ->with('departemen')
                    ->where('nama', 'like', '%' . $this->query . '%')->get()
            ]);
        }
    }
}
