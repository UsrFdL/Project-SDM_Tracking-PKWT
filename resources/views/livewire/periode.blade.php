<div>
    <div rangepicker class="flex items-center gap-4">
        <div>
            <label for="mulai">Mulai</label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input type="text" name="start" id="mulai" wire:model="mulai"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date">
            </div>
        </div>
        <div>
            <label for="selesai">Selesai</label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input type="text" name="end" id="selesai" wire:model="selesai"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Select date">
            </div>
        </div>
        <div class="w-auto">
            <h3>Lama Kerja</h3>
            <p class="bg-white border border-gray-400 rounded-lg p-2">{{ $this->selisih() }}&nbsp;</p>
        </div>
    </div>
    {{-- <input type="date" name="" id="coba"> --}}
    <script>
        const mulai = document.getElementById("mulai");
        const selesai = document.getElementById("selesai");

        // menambahkan event listener untuk changeDate event
        mulai.addEventListener("changeDate", function(e) {
            // mendapatkan value dari input
            const value = e.target.value;

            // mengirimkan value ke variabel livewire
            @this.set('mulai', value);
        });

        // menambahkan event listener untuk changeDate event
        selesai.addEventListener("changeDate", function(e) {
            // mendapatkan value dari input
            const value = e.target.value;

            // mengirimkan value ke variabel livewire
            @this.set('selesai', value);
        });
    </script>
</div>
