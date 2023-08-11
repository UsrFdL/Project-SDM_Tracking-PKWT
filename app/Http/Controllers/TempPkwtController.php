<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempPkwtController extends Controller
{
    public function index() {
        //
    }

    public function tambahData() {
        return view('tambah-data');
    }

    public function store(Request $request) {
        dd($request);
    }

    public function home() {
        return view('home');
    }
}
