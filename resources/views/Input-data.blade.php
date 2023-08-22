<x-app-layout>
    <div name="main">
        <h1 class="font-roboto font-bold text-4xl mb-4">Input Data Karyawan</h1>
        <form action="{{ route('input-data') }}" method="POST" class="flex flex-col">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="nama">Nama</label>
                <x-input-field type="text" name="nama" id="nama" placeholder="Nama" autofocus />
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
            <div class="flex gap-4 justify-between mb-4">
                @livewire('periode')
                <div class="flex items-end">
                    <x-button class="py-3 bg-red-500 hover:bg-red-400 focus:bg-red-400 active:bg-red-600 focus:ring-red-300">Kirim</x-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
