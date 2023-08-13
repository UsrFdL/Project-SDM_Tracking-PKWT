<x-app-layout>
    <div name="main">
        <form action="{{ route('input-data') }}" method="POST" class="flex flex-col">
            @csrf
            @livewire('input-data-karyawan')
            @livewire('sto')
            @livewire('periode')
            {{-- <button type="submit" class="flex justify-start">kirim</button> --}}
            <div class="flex justify-end">
                <x-button class="flex justify-end">Kirim</x-button>
            </div>
        </form>
    </div>
</x-app-layout>
