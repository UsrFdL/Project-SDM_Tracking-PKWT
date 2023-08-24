<nav class="fixed top-0 z-20 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="#" class="flex ml-2 md:mr-24">
                    <x-logo-inka aria-hidden="true" class="h-8"/>
                </a>
            </div>
            {{-- <div class="flex items-center">
                <div class="flex items-center ml-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900" role="none">
                                Neil Sims
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                neil.sims@flowbite.com
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">home</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Settings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Earnings</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-10 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('home') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="h-5" viewBox="0 0 105 105" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0C8.05888 0 0 8.05887 0 18V87C0 96.9411 8.05887 105 18 105H87C96.9411 105 105 96.9411 105 87V18C105 8.05888 96.9411 0 87 0H18ZM6 18C6 11.3726 11.3726 6 18 6H50V33H6V18ZM50 39H6V66H50L50 39ZM56 66L56 39H99V66H56ZM50 72H6V87C6 93.6274 11.3726 99 18 99H50V72ZM56 99V72H99V87C99 93.6274 93.6274 99 87 99H56ZM56 33V6H87C93.6274 6 99 11.3726 99 18V33H56Z" fill="#6b7280"/>
                    </svg>
                    <span class="ml-3">Aktif</span>
                </a>
            </li>
            <li>
                <a href="{{ route('akan-selesai') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="h-5" viewBox="0 0 110 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0C8.05888 0 0 8.05887 0 18V87C0 96.9411 8.05887 105 18 105H56L56 104L56 99V39H99H102H105V18C105 8.05888 96.9411 0 87 0H18ZM50 72V99H18C11.3726 99 6 93.6274 6 87V72H50ZM50 66H6V39H50L50 66ZM50 33H6V18C6 11.3726 11.3726 6 18 6H50V33ZM56 33V6H87C93.6274 6 99 11.3726 99 18V33H56ZM67 64C64.2386 64 62 66.2386 62 69C62 71.7614 64.2386 74 67 74H105C107.761 74 110 71.7614 110 69C110 66.2386 107.761 64 105 64H67Z" fill="#6b7280"/>
                    </svg>
                    <span class="ml-3">Akan Selesai</span>
                </a>
            </li>
            <li>
                <a href="{{ route('selesai') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="h-5" viewBox="0 0 105 105" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 18C0 8.05887 8.05888 0 18 0H87C96.9411 0 105 8.05888 105 18V39H102H99H56V99L56 104L56 105H18C8.05887 105 0 96.9411 0 87V18ZM50 99V72H6V87C6 93.6274 11.3726 99 18 99H50ZM6 66H50L50 39H6V66ZM6 33H50V6H18C11.3726 6 6 11.3726 6 18V33ZM56 6V33H99V18C99 11.3726 93.6274 6 87 6H56ZM69.0294 52.0294C70.9821 50.0768 74.1479 50.0768 76.1005 52.0294L86 61.9289L95.8995 52.0294C97.8521 50.0768 101.018 50.0768 102.971 52.0294C104.923 53.9821 104.923 57.1479 102.971 59.1005L93.0711 69L102.971 78.8995C104.923 80.8521 104.923 84.0179 102.971 85.9706C101.018 87.9232 97.8521 87.9232 95.8995 85.9706L86 76.0711L76.1005 85.9706C74.1479 87.9232 70.9821 87.9232 69.0294 85.9706C67.0768 84.0179 67.0768 80.8521 69.0294 78.8995L78.9289 69L69.0294 59.1005C67.0768 57.1479 67.0768 53.9821 69.0294 52.0294Z" fill="#6B7280"/>
                    </svg>
                    <span class="ml-3">Selesai</span>
                </a>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200">
            <li>
                <a href="{{ route('divisi') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Divisi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('departemen') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Departemen</span>
                </a>
            </li>
            <li>
                <a href="{{ route('bagian') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Bagian</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<div class="p-4 sm:ml-64">
    <div class="p-4 border-transparent border-2 border-gray-200 border-dashed rounded-lg mt-14">
        {{ $slot }}
    </div>
</div>
