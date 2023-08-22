<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kontrak;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($nik)
    {
        $karyawan = Karyawan::withTrashed()->where('nik', $nik)->first();
        return view('detail-karyawan', compact('karyawan'));
    }

    public function berhenti(Request $request ,$nik)
    {
        $karyawan = Karyawan::where('nik', $nik)->first();
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

    public function tambahKontrak($nik)
    {
        $karyawan = Karyawan::withTrashed()->where('nik', $nik)->first();
        return view('tambah-kontrak', compact('karyawan'));
    }

    public function storeKontrak(Request $request, $nik)
    {
        $karyawan = Karyawan::withTrashed()->where('nik', $nik)->first();

        if ($karyawan->kontrak->last()->tglSelesai > Carbon::now()) {
            $kontrakTerakhir = $karyawan->kontrak->last();
            $kontrakTerakhir->tglSelesai = Carbon::parse($request->input('start'))->format('Y-m-d');
            $kontrakTerakhir->save();
        }
        
        $kontrak = new Kontrak();
        $kontrak->karyawan_nik = $nik;
        $kontrak->lamaKontrak = $request->input('lamaKontrak');
        $kontrak->tglMulai = Carbon::parse($request->input('start'))->format('Y-m-d');
        $kontrak->tglSelesai = Carbon::parse($request->input('end'))->format('Y-m-d');
        $kontrak->save();

        return redirect()->route('detail', ['nik' => $nik])->with('success', 'Kontrak berhasil ditambahkan');
    }

    public function editDetail(Request $request, $nik) 
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nik' => 'required|numeric|digits_between:1,11',
            'nip' => 'required|numeric|digits_between:1,11',
            'divisi' => 'required',
            'departemen' => 'required',
            'bagian' => 'required',
        ]);

        
        $karyawan = Karyawan::withTrashed()->where('nik', $nik)->first();
        $karyawan->nama = $validatedData['nama'];
        $karyawan->nik = $validatedData['nik'];
        $karyawan->nip = $validatedData['nip'];
        $karyawan->divisi_id = $validatedData['divisi'];
        $karyawan->departemen_id = $validatedData['departemen'];
        $karyawan->bagian_id = $validatedData['bagian'];
        $karyawan->save();

        return back()->with('success', 'Detail karyawan berhasil diperbarui');
    }
}
