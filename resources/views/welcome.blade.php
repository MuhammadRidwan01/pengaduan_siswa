<!-- resources/views/home.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-xl text-blue-600 dark:text-blue-400">
                SIPESSAT
            </h1>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Sistem Pengaduan Siswa') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-4">Selamat Datang di SIPESSAT</h2>
                    <p class="mb-4">Sistem Pengaduan Siswa SMK Informatika Pessat (SIPESSAT) dirancang untuk memfasilitasi pelaporan dan penanganan masalah yang dihadapi oleh siswa.</p>
                    
                    @guest
                        <p class="mb-4">Silakan login untuk mengakses sistem dan membuat pengaduan.</p>
                        <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Login</a>
                    @else
                        <p class="mb-4">Anda telah login. Silakan gunakan menu di atas untuk mengakses fitur-fitur sistem.</p>
                    @endguest
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Left Section: Steps -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2 class="text-2xl font-semibold mb-4">Langkah-langkah Pelaporan</h2>
                        <ol class="list-decimal list-inside space-y-2">
                            <li>Login ke akun Anda</li>
                            <li>Klik tombol "Buat Pengaduan Baru"</li>
                            <li>Isi formulir dengan detail pengaduan</li>
                            <li>Unggah bukti pendukung (jika ada)</li>
                            <li>Kirim pengaduan</li>
                            <li>Pantau status pengaduan Anda</li>
                        </ol>
                    </div>
                </div>

                <!-- Right Section: Stats Cards and News -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Stats Cards -->
                        <div class=" gap-6 mb-8">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total Laporan</dt>
                                                <dd class="flex items-baseline">
                                                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $totalLaporan }}</div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Menunggu Tindakan</dt>
                                                <dd class="flex items-baseline">
                                                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $pendingLaporan }}</div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                                <div class="p-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-5 w-0 flex-1">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Selesai Ditangani</dt>
                                                <dd class="flex items-baseline">
                                                    <div class="text-2xl font-semibold text-gray-900 dark:text-white">{{ $completedLaporan }}</div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- News -->
<div class="">
    <!-- Latest News Section -->
    <h2 class="text-2xl font-semibold mb-4">Berita Terbaru</h2>
    <div id="news-container" class="space-y-6 flex flex-wrap justify-between">
        @forelse($news as $article)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-6">
                <!-- Image Section -->
                @if(isset($article['urlToImage']))
                    <a href="{{ $article['url'] }}" target="_blank">
                        <img src="{{ $article['urlToImage'] }}" alt="News image" class="rounded-t-lg w-full h-48 object-cover">
                    </a>
                @endif
                <!-- Text Content -->
                <div class="p-5">
                    <a href="{{ $article['url'] }}" target="_blank">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $article['title'] }}</h5>
                    </a>
                    <p class="mb-2 text-sm text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($article['publishedAt'])->format('d M Y') }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $article['description'] }}</p>
                    <!-- Footer -->
                    <a href="{{ $article['url'] }}" target="_blank" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <p>Tidak ada berita terbaru saat ini.</p>
        @endforelse
    </div>
</div>

        </div>
    </div>
</x-app-layout>
