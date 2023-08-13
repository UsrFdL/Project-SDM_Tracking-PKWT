<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Karyawan;
use Livewire\Component;

class ShowKaryawan extends Component
{
    use WithPagination;

    public $query = '';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.show-karyawan', [
            'karyawans' => Karyawan::where('nama', 'like', '%'.$this->query.'%')->paginate(15),
        ]);
    }
}
