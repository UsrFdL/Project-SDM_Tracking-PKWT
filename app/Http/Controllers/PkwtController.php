<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PkwtController extends Controller
{
    public function index() {
        return view('dashboard');
    }

    public function store(Request $request) {
        dd($request);
    }
}
