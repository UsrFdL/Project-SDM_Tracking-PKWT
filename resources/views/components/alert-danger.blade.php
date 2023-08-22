<div id="errorAlert" style="display: {{ $errors->any() ? 'flex' : 'none' }}" class="flex-row p-4 mt-4 mr-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 mr-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Danger</span>
    <div>
        <span class="font-medium">Terdapat error</span>
        <ul class="mt-1.5 ml-4 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var errorAlert = document.getElementById('errorAlert');

        // Mengecek apakah ada error pada awal
        if (errorAlert.style.display === 'flex') {
            // Menunggu 3 detik dan kemudian menyembunyikan pesan error
            setTimeout(function () {
                errorAlert.style.display = 'none';
            }, 8000); // 3000 milidetik = 3 detik
        }
    });
</script>