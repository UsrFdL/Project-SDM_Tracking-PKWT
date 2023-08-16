<x-app-layout>
    <div name="main">
        <h1 class="text-xl mb-4">Input Data Karyawan</h1>
        <form action="{{ route('input-data') }}" method="POST" class="flex flex-col">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="nama">Nama</label>
                <x-input-field type="text" name="nama" id="nama" placeholder="Nama" />
            </div>
            <div class="flex flex-col mb-4">
                <label for="nik">NIK</label>
                <x-input-field type="text" name="nik" id="nik" placeholder="NIK" />
            </div>
            <div class="flex flex-col mb-4">
                <label for="nip">NIP</label>
                <x-input-field type="text" name="nip" id="nip" placeholder="NIP" />
            </div>
            @livewire('sto')
            @livewire('periode')
            {{-- <button type="submit" class="flex justify-start">kirim</button> --}}
            <div class="flex justify-end">
                <x-button class="flex justify-end">Kirim</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
