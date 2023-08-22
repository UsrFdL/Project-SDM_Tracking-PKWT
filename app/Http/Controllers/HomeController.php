<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function selesai() {
        return view('selesai');
    }

    public function akanSelesai() {
        return view('akan-selesai');
    }
}
