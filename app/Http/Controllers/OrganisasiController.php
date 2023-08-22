<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Departemen;
use App\Models\Divisi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index()
    {
        //
    }

    //kontroller untuk divisi
    public function divisi()
    {
        return view('divisi');
    }

    public function editDivisi(Request $request)
    {
        $validated = $request->validate([
            'divisi' => 'required',
        ],
        [
            'divisi.required' => 'Nama divisi harus diisi',
        ]);

        $divisi = Divisi::where('id', $request->input('id'))->first();
        if ($divisi->nama != $request->input('divisi')) {
            $divisi->nama = $request->input('divisi');
            $divisi->save();
            return redirect()->route('divisi')->with('success', 'Berhasil mengubah nama divisi');
        }
        else {
            return redirect()->route('divisi')->with('pesan', 'Tidak ada perubahan pada nama divisi');
        }
    }

    public function tambahDivisi(Request $request)
    {
        $validated = $request->validate([
            'divisi' => 'required',
        ],
        [
            'divisi.required' => 'Nama divisi harus diisi',
        ]);

        $divisi = Divisi::create([
            'nama' => $validated['divisi'],
        ]);

        if ($divisi) {
            return redirect()->route('divisi')->with('success', 'Divisi ' . $validated['divisi'] . ' berhasil ditambahkan');
        }
        else {
            return redirect()->route('divisi')->withErrors(['tambah.gagal' => 'Gagal menambahkan divisi ' . $validated['divisi']]);
        }
    }

    public function hapusDivisi(Request $request)
    {
        $divisi = Divisi::where('id', $request->input('id'))->first();
        $divisi->delete();
        $divisi->save();
        if ($divisi) {
            return redirect()->route('divisi')->with('success', 'Divisi ' . $divisi->nama . ' berhasil di hapus');
        }
        else {
            return redirect()->route('divisi')->withErrors(['tambah.gagal' => 'Gagal menghapus ' . $divisi->nama . ' divisi']);
        }
    }

    public function departemen()
    {
        return view('departemen');
    }

    public function bagian()
    {
        $bagians = Bagian::all();
        return view('bagian', compact('bagians'));
    }
}
