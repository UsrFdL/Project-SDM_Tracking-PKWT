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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //Validasi data input
        $validatedData = $request->validate([
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

        // Simpan data karyawan
        $cek = Karyawan::withTrashed()->where('nik', $validatedData['nik'])->first();
        if($cek) {
            return redirect()->route('detail', ['nik' => $cek->nik])->with('pesan', 'NIK ' . $cek->nik . ' sudah ada, dengan nama ' . $cek->nama);
        }
        else {
            $karyawan = new Karyawan();
            $karyawan->nama = $validatedData['nama'];
            $karyawan->nik = $validatedData['nik'];
            $karyawan->nip = $validatedData['nip'];
            $karyawan->divisi_id = $validatedData['divisi'];
            $karyawan->departemen_id = $validatedData['departemen'];
            $karyawan->bagian_id = $validatedData['bagian'];
            $karyawan->save();
    
            // Simpan data kontrak
            $kontrak = new Kontrak();
            $kontrak->karyawan_nik = $validatedData['nik'];
            $kontrak->lamaKontrak = $validatedData['lamaKontrak'];
            $kontrak->tglMulai = Carbon::parse($validatedData['start'])->format('Y-m-d');
            $kontrak->tglSelesai = Carbon::parse($validatedData['end'])->format('Y-m-d');
            $kontrak->save();
    
            return redirect()->route('home')->with('success', 'Karyawan dan kontrak berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
