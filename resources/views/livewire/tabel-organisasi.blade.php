<div class="flex flex-col gap-4">
    <div class="flex items-center w-full gap-4">
        <div class="w-full">
            <form>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="default-search" wire:model="query" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500 placeholder="Cari Nama Karyawan..." required>
                </div>
            </form>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-lg text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 w-0 text-center">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="text-base">
                @php $i = 1 @endphp
                @foreach ($organisasis as $organisasi)
                <tr class="bg-white border-b hover:bg-gray-100">
                    <th scope="row" class="px-6 py-4 w-0 text-center font-medium text-gray-900 whitespace-nowrap">
                        {{ $i }} @php $i++ @endphp
                    </th>
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $organisasi->nama }}
                    </th>
                    <td class="px-6 py-4 text-right text-blue-500">
                        <button class="font-medium text-blue-600 hover:underline" x-on:click="edit = true, data = {{ $organisasi }}">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
