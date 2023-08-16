<?php

namespace App\Http\Livewire;

use App\Models\Karyawan;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TabelKaryawan extends Component
{
    use WithPagination;

    public $query = '';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        // return view('livewire.tabel-karyawan', [
        //     'karyawans' => Karyawan::where('nama', 'like', '%'.$this->query.'%')->paginate(15),
        // ]);
        /* return view('livewire.tabel-karyawan', [
            'karyawans' => Karyawan::whereHas('kontrak', function ($query) {
                $query->where('tglSelesai', '>=', Carbon::now());
            })->where('nama', 'like', '%' . $this->query . '%')->paginate(15),
        ]); */
        return view('livewire.tabel-karyawan', [
            'karyawans' => Karyawan::whereNull('deleted_at')
                ->where('nama', 'like', '%' . $this->query . '%')
                ->paginate(15),
        ]);
    }
}
