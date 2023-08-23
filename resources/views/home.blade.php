<x-app-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="font-roboto font-bold text-4xl">Daftar Karyawan Aktif</h1>
        <a href="{{ route('input-data') }}">
            <x-button class="bg-red-500 hover:bg-red-400 focus:bg-red-400 active:bg-red-600 focus:ring-red-300 h-fit py-3">
                <svg class="h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 12H18M12 6V18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                &nbsp;Tambah Karyawan</x-button>
        </a>
    </div>
    @livewire('tabel-karyawan')
</x-app-layout>
