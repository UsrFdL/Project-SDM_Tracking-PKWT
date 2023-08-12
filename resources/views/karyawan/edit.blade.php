{{-- @extends('layouts.app')

@section('content') --}}
<x-app-layout>
    <div class="container">
        <h2>Edit Data Karyawan</h2>
        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $karyawan->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ $karyawan->nik }}" required>
            </div>
            <!-- Tambahkan input fields untuk divisi, departemen, dan bagian -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-app-layout>

{{-- @endsection --}}
