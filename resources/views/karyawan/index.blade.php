{{-- @extends('layouts.app')

@section('content') --}}

<x-app-layout>
    <div class="container">
        <h2>Data Karyawan</h2>
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nik</th>
                    <th>Divisi</th>
                    <th>departemen</th>
                    <th>Bagian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($karyawans as $karyawan)
                    <tr>
                        <td>{{ $karyawan->nama ?? 'None'}}</td>
                        <td>{{ $karyawan->nik ?? 'None'}}</td>
                        <td>{{ $karyawan->divisi->nama ?? 'None'}}</td>
                        <td>{{ $karyawan->departemen->nama ?? 'None'}}</td>
                        <td>{{ $karyawan->bagian->nama ?? 'None'}}</td>
                        <td>
                            <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
{{--
@endsection --}}
