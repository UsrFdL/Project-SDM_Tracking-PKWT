<?php

namespace App\Http\Livewire;

use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class TabelKaryawan extends Component
{
    use WithPagination;

    public $query = '';
    public $kategori = 'nama';

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.tabel-karyawan', [
            'karyawans' => Cache::remember('karyawans', 60, function () {
                return Karyawan::whereNull('deleted_at')
                    ->with('departemen', 'divisi', 'bagian')
                    ->where($this->kategori, 'like', '%' . $this->query . '%')
                    ->paginate(50);
            }),
        ]);
    }
}
