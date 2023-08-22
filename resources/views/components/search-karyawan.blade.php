<form>
    <div class="flex">
        <select name="kategori" id="kategori" wire:model="kategori" class="inline-flex flex-shrink-0 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-red-500 focus:border-red-500 p-2.5">
            <option value="nama">Nama</option>
            <option value="nik">NIK</option>
            <option value="nip">NIP</option>
        </select>
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" wire:model="query" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-r-lg bg-gray-50 focus:ring-red-500 focus:border-red-500 placeholder="Cari Nama Karyawan..." required>
        </div>
    </div>
</form>