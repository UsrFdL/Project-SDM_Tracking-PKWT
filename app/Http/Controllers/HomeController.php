<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $karyawans = Karyawan::all();
        return view('home', compact('karyawans'));
    }
}
