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

    //Controller untuk divisi
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
        if ($divisi->nama != $validated['divisi']) {
            $divisi->nama = $validated['divisi'];
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
        if ($divisi->departemen()->count() > 0){
            $divisiNames = [];
            foreach ($divisi->departemen as $departemen) {
                $divisiNames[] = $departemen->nama;
            }
            dd($divisiNames);
            $relasi = implode(", ", $divisiNames);
            return redirect()->route('divisi')->withErrors(['hapus.gagal' => 'Divisi ' . $divisi->nama . ' memiliki relasi dengan ' . $relasi]);
        }
        else {
            $divisi->delete();
            $divisi->save();
            if ($divisi) {
                return redirect()->route('divisi')->with('success', 'Divisi ' . $divisi->nama . ' berhasil di hapus');
            }
            else {
                return redirect()->route('divisi')->withErrors(['tambah.gagal' => 'Gagal menghapus ' . $divisi->nama . ' divisi']);
            }
        }
    }

    //Controller untuk departemen
    public function departemen()
    {
        $divisis = Divisi::all();
        return view('departemen', compact('divisis'));
    }

    public function tambahDepartemen(Request $request)
    {
        $validated = $request->validate([
            'divisi' => 'required',
            'departemen' => 'required',
        ],
        [
            'divisi.required' => 'Divisi harus dipilih',
            'departemen.required' => 'Nama departemen harus diisi',
        ]);

        $departemen = Departemen::create([
            'divisi_id' => $validated['divisi'],
            'nama' => $validated['departemen'],
        ]);

        if ($departemen) {
            return redirect()->route('departemen')->with('success', 'Departemen ' . $validated['departemen'] . ' berhasil ditambahkan');
        }
        else {
            return redirect()->route('departemen')->withErrors(['tambah.gagal' => 'Gagal menambahkan departemen ' . $validated['departemen']]);
        }
    }

    public function editDepartemen(Request $request)
    {
        $validated = $request->validate([
            'departemen' => 'required',
        ],
        [
            'departemen.required' => 'Nama divisi harus diisi',
        ]);

        $departemen = Departemen::where('id', $request->input('id'))->first();
        if ($departemen->nama != $request->input('departemen')) {
            $departemen->nama = $request->input('departemen');
            $departemen->save();
            return redirect()->route('departemen')->with('success', 'Berhasil mengubah nama departemen');
        }
        else {
            return redirect()->route('departemen')->with('pesan', 'Tidak ada perubahan pada nama departemen');
        }
    }

    public function hapusDepartemen(Request $request)
    {
        $departemen = Departemen::where('id', $request->input('id'))->first();
        if ($departemen->bagian()->count() > 0){
            $bagianNames = [];
            foreach ($departemen->bagian as $bagian) {
                $bagianNames[] = $bagian->nama;
            }
            $relasi = implode(", ", $bagianNames);
            return redirect()->route('departemen')->withErrors(['hapus.gagal' => 'Departemen ' . $departemen->nama . ' memiliki relasi dengan ' . $relasi]);
        }
        else {
            $departemen->delete();
            $departemen->save();
            if ($departemen) {
                return redirect()->route('departemen')->with('success', 'Departemen ' . $departemen->nama . ' berhasil di hapus');
            }
            else {
                return redirect()->route('departemen')->withErrors(['hapus.gagal' => 'Gagal menghapus departemen' . $departemen->nama]);
            }
        }
    }

    //Controller untuk bagian
    public function bagian()
    {
        $divisis = Divisi::all();
        $departemens = Departemen::with('divisi')->get();
        return view('bagian', compact('divisis', 'departemens'));
    }

    public function tambahBagian(Request $request)
    {
        $validated = $request->validate([
            'bagian' => 'required',
        ],
        [
            'bagian.required' => 'Nama bagian harus diisi',
        ]);

        $bagian = Bagian::create([
            'departemen_id' => $request->input('departemen'),
            'nama' => $request->input('bagian'),
        ]);

        if ($bagian) {
            return redirect()->route('bagian')->with('success', 'Departemen ' . $request->input('bagian') . ' berhasil ditambahkan');
        }
        else {
            return redirect()->route('bagian')->withErrors(['tambah.gagal' => 'Gagal menambahkan departemen ' . $request->input('bagian')]);
        }
    }

    public function editBagian(Request $request)
    {
        $validated = $request->validate([
            'bagian' => 'required',
        ],
        [
            'bagian.required' => 'Nama bagian harus diisi',
        ]);

        $bagian = Bagian::where('id', $request->input('id'))->first();
        if ($bagian->nama != $request->input('bagian')) {
            $bagian->nama = $request->input('bagian');
            $bagian->save();
            return redirect()->route('bagian')->with('success', 'Berhasil mengubah nama bagian');
        }
        else {
            return redirect()->route('bagian')->with('pesan', 'Tidak ada perubahan pada nama bagian');
        }
    }

    public function hapusBagian(Request $request)
    {
        $bagian = Bagian::where('id', $request->input('id'))->first();
        $bagian->delete();
        $bagian->save();
        if ($bagian) {
            return redirect()->route('bagian')->with('success', 'Bagian ' . $bagian->nama . ' berhasil di hapus');
        }
        else {
            return redirect()->route('bagian')->withErrors(['tambah.gagal' => 'Gagal menghapus bagian' . $bagian->nama]);
        }
    }
}
