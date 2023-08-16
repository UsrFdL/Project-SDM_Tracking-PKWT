<x-app-layout>
    {{-- <div class="bg-white rounded-lg py-2 px-6">
        <h1 class="text-xl p-4 mb-4">Detail Data Karyawan</h1>
        <div class="flex flex-col mb-4">
            <label for="nama">Nama</label>
            <x-input-field type="text" name="nama" id="nama" value="{{ $karyawan->nama }}" />
        </div>
        <div class="flex flex-col mb-4">
            <label for="nik">NIK</label>
            <x-input-field type="text" name="nik" id="nik" value="{{ $karyawan->nik }}" />
        </div>
        <div class="flex flex-col mb-4">
            <label for="nip">NIP</label>
            <x-input-field type="text" name="nip" id="nip" value="{{ $karyawan->nip }}" />
        </div>
        <div class="flex flex-col mb-4">
            <label for="divisi">Divisi</label>
            <x-input-field type="text" name="divisi" id="divisi" value="{{ $karyawan->divisi->nama }}" />
        </div>
        <div class="flex flex-col mb-4">
            <label for="departemen">Departemen</label>
            <x-input-field type="text" name="departemen" id="departemen" value="{{ $karyawan->departemen->nama }}" />
        </div>
        <div class="flex flex-col mb-4">
            <label for="bagian">Bagian</label>
            <x-input-field type="text" name="bagian" id="bagian" value="{{ $karyawan->bagian->nama }}" />
        </div>
        <div class="flex flex-row mb-4">
            @php
                $kontrakCount = count($karyawan->kontrak);
            @endphp
            @for ($i = 0; $i < $kontrakCount; $i++)
                @php
                    $kontrak = $karyawan->kontrak[$i];
                @endphp
                <table>
                    <thead>
                        <tr class="border-2">
                            <th colspan="2" class="px-6 py-2 border-2">{{ "Kontrak " . ($i+1) }}</th>
                        </tr>
                        <tr class="border-2">
                            <td class="px-6 py-2 border-2">Awal</td>
                            <td class="px-6 py-2 border-2">Akhir</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-2">
                            <td class="px-6 py-2 border-2">{{ date('d-m-Y', strtotime($kontrak->tglMulai)) }}</td>
                            <td class="px-6 py-2 border-2">{{ date('d-m-Y', strtotime($kontrak->tglSelesai)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="px-6 py-2 border-2 text-center">{{ $kontrak->lamaKontrak }}</td>
                        </tr>
                    </tbody>
                </table>
            @endfor
        </div>
    </div> --}}
    <div>
        <h1 class="font-poppins text-4xl mb-4">Detail Data {{ $karyawan->nama }}</h1>
        <div class="flex gap-4 justify-end mb-4">
            @if ($karyawan->deleted_at == null)
                <form action="{{ route('detail', ['id' => $karyawan->id]) }}" method="POST">
                    @csrf
                    <x-button>Berhenti</x-button></form>
            @endif
            <x-button class="bg-green-500 hover:bg-green-400 focus:bg-green-400 active:bg-green-600 focus:ring-green-300">Tambah Kontrak</x-button>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
    </div>
</x-app-layout>