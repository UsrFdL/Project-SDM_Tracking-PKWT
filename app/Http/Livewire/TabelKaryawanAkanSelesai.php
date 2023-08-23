<?php

namespace App\Http\Livewire;

use App\Models\Karyawan;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TabelKaryawanAkanSelesai extends Component
{
    use WithPagination;

    public $query = '';
    public $kategori = 'nama';

    public function render()
    {
        $karyawans = Karyawan::whereNull('deleted_at')
            ->where($this->kategori, 'like', '%' . $this->query . '%')
            ->whereHas('kontrak', function ($query) {
                $query->latest('tglSelesai')
                ->whereDate('tglSelesai', '<=', Carbon::now()->addDays(7))
                ->whereDate('tglSelesai', '>', Carbon::now());
            })
            ->paginate(15);
            
        return view('livewire.tabel-karyawan-akan-selesai', [
            'karyawans' => $karyawans
        ]);        
    }
}
