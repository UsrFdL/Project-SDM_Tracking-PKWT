{{-- @extends('layouts.app')

@section('content') --}}
<x-app-layout>
    <div class="container">
        <h2>Tambah Data Karyawan</h2>
        <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <!-- Tambahkan input fields untuk divisi, departemen, dan bagian -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-app-layout>

{{-- @endsection --}}
