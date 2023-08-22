<?php

namespace App\Http\Middleware;

use App\Models\Karyawan;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeleksiKontrak
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $karyawans = Karyawan::with(['kontrak' => function ($query) {
        //     $query->latest('tglSelesai')->limit(1);
        // }])->get();
        $karyawans = Karyawan::withTrashed()->get();

        // dd($karyawans[8]->kontrak->last());

        foreach ($karyawans as $karyawan) {
            if ($karyawan->kontrak->count() > 0) {
                if ($karyawan->kontrak->last()->tglSelesai < Carbon::now()) {
                    $karyawan->delete(); // Soft delete karyawan jika kontrak telah habis
                } elseif ($karyawan->trashed() && $karyawan->kontrak->last()->tglSelesai > Carbon::now()) {
                    $karyawan->restore(); // Restore karyawan jika ada kontrak yang belum selesai
                }

                //update lama kontrak
                foreach ($karyawan->kontrak as $kontrak) {
                    $startDate = Carbon::create($kontrak->tglMulai);
                    $endDate = Carbon::create($kontrak->tglSelesai);
                    $diff = $startDate->diff($endDate);
                    $parts = [];
                    if ($diff->y !== 0) {
                        $parts[] = $diff->y . ' tahun';
                    }
                    if ($diff->m !== 0) {
                        $parts[] = $diff->m . ' bulan';
                    }
                    if ($diff->d !== 0 || ($diff->m === 0 && $diff->y === 0)) {
                        $parts[] = $diff->d . ' hari';
                    }
                    $lama = join(', ', $parts);
                    $kontrak->lamaKontrak = $lama;
                    $kontrak->save();
                }
            }
        }
        
        return $next($request);
    }
}
