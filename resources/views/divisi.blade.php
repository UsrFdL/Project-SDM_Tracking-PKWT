<x-app-layout>
    <div
        x-data="{
            data: null,
            tambah: false,
            edit: false,
            toggle() {
                this.tambah = this.edit ? this.close() : true
                this.edit = this.edit ? this.close() : true
            },
            close() {
                this.tambah = false
                this.edit = false
            }
        }"
        @keydown.escape.prevent.stop="close()"
    >
        <div class="flex justify-between items-center mb-4">
            <h1 class="font-roboto font-bold text-4xl">Daftar Divisi</h1>
            <x-button @click="tambah = true" class="bg-red-500 hover:bg-red-400 focus:bg-red-400 active:bg-red-600 focus:ring-red-300 h-fit py-3">
                <svg class="h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 12H18M12 6V18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                &nbsp;Tambah Divisi</x-button>
        </div>
        <div x-show="tambah" style="display: none" class="flex fixed inset-0 z-30 bg-gray-900 bg-opacity-50 items-center justify-center">
            <div @click.outside="close()" class="flex flex-col w-1/2 gap-2 bg-white h-auto px-6 py-8 shadow-xl rounded mx-2">
                <form action="{{ route('divisi.tambah') }}" method="POST">
                    @csrf
                    <label for="divisi" class="font-roboto font-base text-2xl mb-2">Tambah Divisi</label>
                    <x-input-field id="divisi" name="divisi" type="text" placeholder="Nama divisi ..." />
                    <div class="flex items-center justify-end gap-4 mt-4">
                        <x-button type="button" class="bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-600 focus:ring-blue-300" @click="tambah = false">Batal</x-button>
                        <x-button class="bg-green-500 hover:bg-green-400 focus:bg-green-400 active:bg-green-600 focus:ring-green-300">Tambah</x-button>
                    </div>
                </form>
            </div>
        </div>
        <div x-show="edit" style="display: none" class="flex fixed inset-0 z-30 bg-gray-900 bg-opacity-50 items-center justify-center">
            <div @click.outside="close()" class="flex flex-col w-1/2 bg-white h-auto px-6 py-8 shadow-xl rounded mx-2">
                <h1 class="font-roboto font-base text-2xl mb-4">Edit Divisi</h1>
                <form action="{{ route('divisi.hapus') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" x-bind:value="data.id" />
                    <x-button class="bg-red-500 hover:bg-red-400 focus:bg-red-400 active:bg-red-600 focus:ring-red-300">Hapus</x-button>
                </form>
                <form action="{{ route('divisi.edit') }}" method="POST">
                    @csrf
                    <div class="my-4">
                        <label for="divisi" class="font-roboto font-base text-lg">Divisi</label>
                        <x-input-field id="divisi" name="divisi" type="text" x-bind:value="data.nama"/>
                    </div>
                    <input type="hidden" name="id" x-bind:value="data.id" />
                    <div class="flex items-center justify-end gap-4 mt-4">
                        <x-button type="button" class="bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-600 focus:ring-blue-300" @click="edit = false">Batal</x-button>
                        <x-button class="bg-green-500 hover:bg-green-400 focus:bg-green-400 active:bg-green-600 focus:ring-green-300">Simpan</x-button>
                    </div>
                </form>
            </div>
        </div>
        @livewire('tabel-organisasi', ['sto' => 'divisi'])
    </div>
</x-app-layout>
