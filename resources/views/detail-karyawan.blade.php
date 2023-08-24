<x-app-layout>
    <div x-data="{ edit: false, edtKontrak: false }" class="bg-white rounded-lg py-4 px-6">
        <a href="{{ route('home') }}">
            <button class="inline-flex items-center font-roboto text-blue-500 mb-4">
                <svg class="h-3.5 mr-1" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg" aria-labelledby="backAltIconTitle" stroke="#3f83f8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" color="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title id="backAltIconTitle">Back</title> <path d="M4 12l15-9v18z"></path> </g></svg>
                <p>Kembali</p>
            </button>
        </a>
        <h1 class="font-roboto font-bold text-4xl mb-4">Detail Data Karyawan</h1>
        <div class="flex gap-4 justify-end mb-4">
            @if ($karyawan->deleted_at == null)
                <form action="{{ route('detail.berhenti', ['nik' => $karyawan->nik]) }}" method="POST">
                    @csrf
                    <x-button class="bg-red-500 hover:bg-red-400 focus:bg-red-400 active:bg-red-600 focus:ring-red-300">Berhenti</x-button></form>
            @endif
            <a href="{{ route('detail.tambah-kontrak', ['nik' => $karyawan->nik]) }}">
                <x-button class="bg-green-500 hover:bg-green-400 focus:bg-green-400 active:bg-green-600 focus:ring-green-300">Tambah Kontrak</x-button></a>
        </div>
        <div class="border-2 rounded-lg p-6 mb-4">
            <form action="{{ route('detail.edit', ['nik' => $karyawan->nik]) }}" method="POST">
                @csrf
                <div class="flex gap-10">
                    <div class="w-1/2">
                        <div class="flex flex-col mb-4">
                            <label for="nama" class="font-bold">Nama</label>
                            <p :class="{ 'hidden': edit, 'block': ! edit }" class="ml-4">{{ $karyawan->nama }}</p>
                            <div :class="{ 'hidden': ! edit, 'block': edit }" class="hidden">
                                <x-input-field type="text" name="nama" id="nama" value="{{ $karyawan->nama }}"/>
                            </div>
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="nik" class="font-bold">NIK</label>
                            <p :class="{ 'hidden': edit, 'block': ! edit }" class="ml-4">{{ $karyawan->nik }}</p>
                            <div :class="{ 'hidden': ! edit, 'block': edit }" class="hidden">
                                <x-input-field type="text" name="nik" id="nik" value="{{ $karyawan->nik }}"/>
                            </div>
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="nip" class="font-bold">NIP</label>
                            <p :class="{ 'hidden': edit, 'block': ! edit }" class="ml-4">{{ $karyawan->nip }}</p>
                            <div :class="{ 'hidden': ! edit, 'block': edit }" class="hidden">
                                <x-input-field type="text" name="nip" id="nip" value="{{ $karyawan->nip }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div :class="{ 'hidden': edit, 'block': ! edit }">
                            <div class="flex flex-col mb-4">
                                <label for="divisi" class="font-bold">Divisi</label>
                                <p :class="{ 'hidden': edit, 'block': ! edit }" class="ml-4">{{ $karyawan->divisi->nama }}</p>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="departemen" class="font-bold">Departemen</label>
                                <p :class="{ 'hidden': edit, 'block': ! edit }" class="ml-4">{{ $karyawan->departemen->nama }}</p>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="bagian" class="font-bold">Bagian</label>
                                <p :class="{ 'hidden': edit, 'block': ! edit }" class="ml-4">{{ $karyawan->bagian->nama }}</p>
                            </div>
                        </div>
                        <div :class="{ 'hidden': ! edit, 'block': edit }" class="hidden"
                            x-data="{ 
                                divisi: null,
                                departemen: null,
                                bagian: null
                            }">
                            @livewire('sto')
                            <template x-init="divisi = {{ $karyawan->divisi->id }}"></template>
                            <template x-init="departemen = {{ $karyawan->departemen->id }}"></template>
                            <template x-init="bagian = {{ $karyawan->bagian->id }}"></template>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-4">
                    {{-- <a href="{{ route('detail.tambah-kontrak', ['nik' => $karyawan->nik]) }}"> --}}
                    <div :class="{ 'hidden': edit, 'block': ! edit }">
                        <x-button type="button" @click="edit = ! edit" class="bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-600 focus:ring-blue-300">Edit profil</x-button>
                    </div>
                    <div :class="{ 'hidden': ! edit, 'flex': edit }" class="hidden gap-2">
                        <x-button type="button" @click="edit = ! edit" class="bg-red-500 hover:bg-red-400 focus:bg-red-400 active:bg-red-600 focus:ring-red-300">Batal</x-button>
                        <x-button class="bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-600 focus:ring-blue-300">Save</x-button>
                    </div>
                    {{-- </a> --}}
                </div>
            </form>
        </div>
        <div class="relative overflow-x-auto mb-4 border-2 rounded-lg">
            <div class="flex flex-row">
            @php
                $kontrakCount = count($karyawan->kontrak);
            @endphp
            @for ($i = 0; $i < $kontrakCount; $i++)
                @php
                    $kontrak = $karyawan->kontrak[$i];
                @endphp
                    <table class="flex-shrink-0 {{ $i > 0 ? 'border-l' : '' }}">
                        <thead>
                            <tr class="border-b">
                                <th colspan="2" class="px-6 py-2 items-center">
                                    <form action="{{ route('kontrak.hapus', ['nik' => $karyawan->nik]) }}" method="POST">
                                        @csrf
                                        {{ "Kontrak " . ($i+1) }}
                                        <input type="hidden" name="kontrak" value="{{ $kontrak->id }}">
                                        <button :class="{'': edtKontrak, 'hidden': ! edtKontrak}" class="hidden">
                                            <svg class="h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#f98080"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12V17" stroke="#f98080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 12V17" stroke="#f98080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#f98080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#f98080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#f98080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                            <tr>
                                <td class="px-6 py-2 border-b">Awal</td>
                                <td class="px-6 py-2 border-b border-l">Akhir</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-6 py-2 border-b">{{ date('d-m-Y', strtotime($kontrak->tglMulai)) }}</td>
                                <td class="px-6 py-2 border-b border-l">{{ date('d-m-Y', strtotime($kontrak->tglSelesai)) }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="px-6 py-2 text-center">{{ $kontrak->lamaKontrak }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endfor
                <table class="flex-shrink-0 border-r">
                    <tr class="border-b border-transparent">
                        <th rowspan="3" colspan="2" class="px-6 py-2 border-b border-l text-center">Lama Kerja</th>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="border-b">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="px-6 border-l text-center">{{ $duration }}</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="flex justify-end">
            <x-button type="button" x-on:click="edtKontrak = ! edtKontrak" x-text="edtKontrak ? 'Batal' : 'Edit Kontrak'" class="bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 active:bg-blue-600 focus:ring-blue-300"></x-button>
        </div>
    </div>
    {{-- <div>
        <h1 class="font-roboto text-4xl mb-4">Detail Data {{ $karyawan->nama }}</h1>
        <div class="flex gap-4 justify-end mb-4">
            @if ($karyawan->deleted_at == null)
                <form action="{{ route('detail', ['id' => $karyawan->id]) }}" method="POST">
                    @csrf
                    <x-button>Berhenti</x-button></form>
            @endif
            <form action="{{ route('detail.tambah-kontrak', ['id' => $karyawan->id]) }}" method="GET">
                <x-button>Tambah Kontrak</x-button></form>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-0">
                            Kontrak
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Divisi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Departemen
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Bagian
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Mulai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Selesai
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lama
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $kontrakCount = count($karyawan->kontrak);
                    @endphp
                    @for ($i = 0; $i < $kontrakCount; $i++)
                        @php
                            $kontrak = $karyawan->kontrak[$i];
                        @endphp
                        <tr class="bg-white border-b">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $i+1 }}
                            </th>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $kontrak->karyawan_nik }}
                            </th>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $karyawan->nama }}
                            </th>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $karyawan->divisi->nama }}
                            </th>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $karyawan->departemen->nama }}
                            </th>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $karyawan->bagian->nama }}
                            </th>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ date('d-m-Y', strtotime($kontrak->tglMulai)) }}
                            </th>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ date('d-m-Y', strtotime($kontrak->tglSelesai)) }}
                            </th>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $kontrak->lamaKontrak }}
                            </th>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div> --}}
</x-app-layout>