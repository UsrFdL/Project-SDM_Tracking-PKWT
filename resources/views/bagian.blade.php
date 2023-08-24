<x-app-layout>
    <div
        x-data="{
            data: null,
            divisi: 0,
            departemens: {{ $departemens }},
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
            <h1 class="font-roboto font-bold text-4xl">Daftar Bagian</h1> 
            <x-button @click="tambah = true" class="bg-red-500 hover:bg-red-400 focus:bg-red-400 active:bg-red-600 focus:ring-red-300 h-fit py-3">
                <svg class="h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M6 12H18M12 6V18" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                &nbsp;Tambah Bagian</x-button>
        </div>

        <!-- Modal tambah -->
        <div x-show="tambah" style="display: none" class="flex fixed inset-0 z-30 bg-gray-900 bg-opacity-50 items-center justify-center">
            <div @click.outside="close()" class="flex flex-col w-1/2 gap-2 bg-white h-auto px-6 py-8 shadow-xl rounded mx-2">
                <h1 class="font-roboto font-base text-2xl mb-4">Tambah Bagian</h1>
                <form action="{{ route('bagian.tambah') }}" method="POST">
                    @csrf
                    <div class="flex flex-col mb-4">
                        <label for="divisi" class="font-roboto font-base text-lg">Divisi</label>
                        <x-input-select name="divisi" id="divisi" x-model="divisi">
                            <option value="0"></option>
                            @foreach ($divisis as $divisi)
                                <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                            @endforeach
                        </x-input-select>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="departemen" class="font-roboto font-base text-lg">Departemen</label>
                        <x-input-select name="departemen" id="departemen">
                            <option value="0"></option>
                            <template x-for="departemen in departemens">
                                <template x-if="departemen.divisi_id == divisi">
                                    <option x-bind:value="departemen.id" x-text="departemen.nama"></option>
                                </template>
                            </template>
                        </x-input-select>
                    </div>
                    <div>
                        <label for="bagian" class="font-roboto font-base text-lg">Nama bagian</label>
                        <x-input-field id="bagian" name="bagian" type="text" placeholder="Nama bagian ..." />
                    </div>
                    <div class="flex items-center justify-end gap-4 mt-4">
                        <x-button type="button" class="bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-600 focus:ring-blue-300" @click="tambah = false">Batal</x-button>
                        <x-button class="bg-green-500 hover:bg-green-400 focus:bg-green-400 active:bg-green-600 focus:ring-green-300">Tambah</x-button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal edit -->
        <div x-show="edit" style="display: none" class="flex fixed inset-0 z-30 bg-gray-900 bg-opacity-50 items-center justify-center">
            <div @click.outside="close()" class="flex flex-col w-1/2 bg-white h-auto px-6 py-8 shadow-xl rounded mx-2">
                <h1 class="font-roboto font-base text-2xl mb-4">Edit Bagian</h1>
                <form action="{{ route('bagian.hapus') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" x-bind:value="data.id" />
                    <x-button class="bg-red-500 hover:bg-red-400 focus:bg-red-400 active:bg-red-600 focus:ring-red-300">Hapus</x-button>
                </form>
                <form action="{{ route('bagian.edit') }}" method="POST">
                    @csrf
                    <div class="my-4">
                        <label for="divisi" class="font-roboto font-base text-lg">Divisi</label>
                        <p id="divisi" class="ml-2.5 text-sm" x-text="departemens[data.departemen_id-1].divisi.nama"></p>
                    </div>
                    <div class="my-4">
                        <label for="departemen" class="font-roboto font-base text-lg">Departemen</label>
                        <p id="departemen" class="ml-2.5 text-sm" x-text="data.departemen.nama"></p>
                    </div>
                    <div>
                        <label for="bagian" class="font-roboto font-base text-lg">Bagian</label>
                        <div class="relative w-full">
                            <x-input-field id="bagian" name="bagian" type="text" x-bind:value="data.nama"/>
                            <div x-text="'#'+data.id" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500"></div>
                        </div>
                    </div>
                    <input type="hidden" name="id" x-bind:value="data.id" />
                    <div class="flex items-center justify-end gap-4 mt-4">
                        <x-button type="button" class="bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-600 focus:ring-blue-300" @click="edit = false">Batal</x-button>
                        <x-button class="bg-green-500 hover:bg-green-400 focus:bg-green-400 active:bg-green-600 focus:ring-green-300">Simpan</x-button>
                    </div>
                </form>
            </div>
        </div>
    @livewire('tabel-organisasi', ['sto' => 'bagian'])
</x-app-layout>