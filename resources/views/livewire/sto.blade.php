<div>
    <div class="flex flex-col mb-4">
        <label for="divisi">Divisi</label>
        <x-input-select name="divisi" id="divisi" wire:model="hasDivisi">
            <option value="0"></option>
            @foreach ($divisis as $divisi)
                <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
            @endforeach
        </x-input-select>
    </div>
    <div class="flex flex-col mb-4">
        <label for="departemen">Departemen</label>
        <x-input-select name="departemen" id="departemen" wire:model="hasDepartemen">
            <option value="0"></option>
            @foreach ($departemens->where('divisi_id', $hasDivisi) as $departemen)
                <option value="{{ $departemen->id }}">{{ $departemen->nama }}</option>
            @endforeach
        </x-input-select>
    </div>
    <div class="flex flex-col mb-4">
        <label for="bagian">Bagian</label>
        <x-input-select name="bagian" id="bagian">
            @foreach ($bagians->where('departemen_id', $hasDepartemen) as $bagian)
                <option value="{{ $bagian->id }}">{{ $bagian->nama }}</option>
            @endforeach
        </x-input-select>
    </div>
</div>
