<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id)
    {
        $karyawan = Karyawan::withTrashed()->where('id', $id)->first();
        return view('detail-karyawan', compact('karyawan'));
    }

    public function berhenti(Request $request ,$id)
    {
        $karyawan = Karyawan::where('id', $id)->first();
        $kontrak = $karyawan->kontrak->last();

        $startDate = Carbon::create($kontrak->tglMulai);
        $endDate = Carbon::create(Carbon::now());
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
        $lama = join(', ', $parts);

        $kontrak->lamaKontrak = $lama;
        $kontrak->tglSelesai = Carbon::now();
        $kontrak->save();
        return back()->with('success', 'Berhasil');
    }
}
