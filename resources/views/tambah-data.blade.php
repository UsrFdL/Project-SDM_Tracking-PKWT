<x-app-layout>
    <div class="" name="main">
        <form action="{{ route('dashboard') }}" method="POST" class="flex flex-col">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nip" placeholder="Nama">
            </div>
            <div class="flex flex-col mb-4">
                <label for="nik">NIK</label>
                <input type="text" name="nik" id="nik" placeholder="NIK">
            </div>
            <div class="flex flex-col mb-4">
                <label for="nip">NIP</label>
                <input type="text" name="nip" id="nip" placeholder="NIP">
            </div>
            <div class="flex flex-col mb-4">
                <label for="divisi">Divisi</label>
                <select name="divisi" id="divisi">
                    <option value="0">Sekretaris</option>
                    <option value="1">Pengawas</option>
                </select>
            </div>
            <div class="flex flex-col mb-4">
                <label for="divisi">Departemen</label>
                <select name="divisi" id="divisi">
                    <option value="0">Keuangan</option>
                    <option value="2">Pengembangan</option>
                </select>
            </div>
            <div class="flex flex-col mb-4">
                <label for="divisi">Bagian</label>
                <select name="divisi" id="divisi">
                    <option value="0">Teknologi</option>
                    <option value="0">HC dan GA</option>
                </select>
            </div>
            {{-- <button type="submit" class="flex justify-start">kirim</button> --}}
            <div class="flex justify-end">
                <x-button class="flex justify-end">Kirim</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
