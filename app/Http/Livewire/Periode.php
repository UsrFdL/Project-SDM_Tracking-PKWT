<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Periode extends Component
{
    public $mulai;
    public $selesai;

    public function render()
    {
        return view('livewire.periode');
    }

    public function mount()
    {
        $this->mulai = Carbon::now()->format('d-m-Y');
        $this->selesai = Carbon::now()->format('d-m-Y');
    }

    public function selisih()
    {
        if ($this->mulai) {
            $startDate = Carbon::createFromFormat('d-m-Y', $this->mulai);
            $endDate = Carbon::createFromFormat('d-m-Y', $this->selesai);
            $diff = $startDate->diff($endDate);
            $parts = [];

            if ($diff->y !== 0) {
                $parts[] = $diff->y . ' tahun';
            }
            if ($diff->m !== 0) {
                $parts[] = $diff->m . ' bulan';
            }
            if ($diff->d !== 0) {
                $parts[] = $diff->d . ' hari';
            }

            return join(', ', $parts);
            // return "{$diff->y} years, {$diff->m} months, and {$diff->d} days";
        }
    }
}
