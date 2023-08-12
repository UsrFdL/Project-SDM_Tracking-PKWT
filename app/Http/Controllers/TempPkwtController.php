<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Divisi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class TempPkwtController extends Controller
{
    public function index() {
        //
    }

    public function tambahData() {
        return view('tambah-data')->with(['divisi' => Divisi::all(), 'departemen' => Departemen::all()]);
    }

    public function store(Request $request) {
        dd($request);
    }

    public function home() {
        // dd(Karyawan::find(1)->departemen->nama);
        // dd(departemen::with('divisi')->get());
        $data = Karyawan::all();
        return view('home')->with('db', $data);
    }
}
