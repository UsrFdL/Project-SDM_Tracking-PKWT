<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kontrak;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InputDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Input-data');
    }
    
    public function store(Request $request)
    {
        //Validasi data input
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required|numeric|digits_between:1,11',
            'nip' => 'required|numeric|digits_between:1,11',
            'divisi' => 'required',
            'departemen' => 'required',
            'bagian' => 'required',
            'lamaKontrak' => '',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
        ]);
        $start = Carbon::create(Carbon::parse($validated['start'])->format('Y-m-d'));
        $end = Carbon::create(Carbon::parse($validated['end'])->format('Y-m-d'));

        $yearsDifference = $start->diffInYears($end);
        $monthsDifference = $start->diffInMonths($end) % 12;
        $daysDifference = $start->diffInDays($end);

        // Simpan data karyawan
        $cek = Karyawan::withTrashed()->where('nik', $validated['nik'])->first();
        if($cek) {
            return redirect()->route('detail', ['nik' => $cek->nik])->with('pesan', 'NIK ' . $cek->nik . ' sudah ada, dengan nama ' . $cek->nama);
        }
        else {
            $karyawan = new Karyawan();
            if ($yearsDifference > 5 || ($yearsDifference == 5 && ($monthsDifference > 0 || $daysDifference > 0))) {
                return redirect()->route('input-data')->withErrors(['kontrak.lebih' => 'Lama kontrak tidak boleh lebih dari 5 tahun']);
            }
            else {
                $karyawan->nama = $validated['nama'];
                $karyawan->nik = $validated['nik'];
                $karyawan->nip = $validated['nip'];
                $karyawan->divisi_id = $validated['divisi'];
                $karyawan->departemen_id = $validated['departemen'];
                $karyawan->bagian_id = $validated['bagian'];
                $karyawan->save();
        
                // Simpan data kontrak
                $kontrak = new Kontrak();
                $kontrak->karyawan_nik = $validated['nik'];
                $kontrak->lamaKontrak = $validated['lamaKontrak'];
                $kontrak->tglMulai = Carbon::parse($validated['start'])->format('Y-m-d');
                $kontrak->tglSelesai = Carbon::parse($validated['end'])->format('Y-m-d');
                $kontrak->save();
        
                return redirect()->route('home')->with('success', 'Karyawan dan kontrak berhasil ditambahkan');
            }
        }
    }
}
