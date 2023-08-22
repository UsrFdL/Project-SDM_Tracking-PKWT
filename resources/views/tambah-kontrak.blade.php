<x-app-layout>
    <div class="bg-white rounded-lg py-4 px-6">
        <a href="{{ route('detail', ['nik' => $karyawan->nik]) }}">
            <button class="inline-flex items-center font-roboto text-blue-500 mb-4">
                <svg class="h-3.5 mr-1" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg" aria-labelledby="backAltIconTitle" stroke="#3f83f8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" color="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title id="backAltIconTitle">Back</title> <path d="M4 12l15-9v18z"></path> </g></svg>
                <p>Kembali</p>
            </button>
        </a>
        <h1 class="font-roboto font-bold text-4xl mb-4">Tambah Kontrak</h1>
        <div class="flex pb-4 gap-10">
            <div class="w-1/2">
                <div class="flex flex-col mb-4">
                    <label for="nama">Nama</label>
                    <x-input-field type="text" name="nama" id="nama" placeholder="{{ $karyawan->nama }}" disabled />
                </div>
                <div class="flex flex-col mb-4">
                    <label for="nik">NIK</label>
                    <x-input-field type="text" name="nik" id="nik" placeholder="{{ $karyawan->nik }}" disabled />
                </div>
                <div class="flex flex-col mb-4">
                    <label for="nip">NIP</label>
                    <x-input-field type="text" name="nip" id="nip" placeholder="{{ $karyawan->nip }}" disabled />
                </div>
            </div>
            <div class="w-1/2">
                <div class="flex flex-col mb-4">
                    <label for="divisi">Divisi</label>
                    <x-input-field type="text" name="divisi" id="divisi" placeholder="{{ $karyawan->divisi->nama }}" disabled />
                </div>
                <div class="flex flex-col mb-4">
                    <label for="departemen">Departemen</label>
                    <x-input-field type="text" name="departemen" id="departemen" placeholder="{{ $karyawan->departemen->nama }}" disabled />
                </div>
                <div class="flex flex-col mb-4">
                    <label for="bagian">Bagian</label>
                    <x-input-field type="text" name="bagian" id="bagian" placeholder="{{ $karyawan->bagian->nama }}" disabled />
                </div>
            </div>
        </div>
        <form action="{{ route('detail.tambah-kontrak', ['nik' => $karyawan->nik]) }}" method="POST">
            @csrf
            <div class="flex gap-4 justify-between">
                @livewire('periode')
                <div class="flex flex-col justify-end">
                    <x-button class="bg-red-500 hover:bg-red-400 focus:bg-red-400 active:bg-red-600 focus:ring-red-300">Tambah</x-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>