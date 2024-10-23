<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('siswa.create') }}" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Buat Laporan
                        </a>
                    </div>
                    
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 bg-white dark:bg-gray-900">
                        <!-- Search and filter section -->
                        <div class="flex flex-col md:flex-row items-center justify-between pb-4 space-y-4 md:space-y-0">
                            <div>
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari laporan...">
                                </div>
                            </div>
                        </div>
                    
                        <!-- Table section -->
                        <div class="relative overflow-x-auto rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-blue-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">NO</th>
                                        <th scope="col" class="px-6 py-4">PELAPOR</th>
                                        <th scope="col" class="px-6 py-4">KELAS</th>
                                        <th scope="col" class="px-6 py-4">TERLAPOR</th>
                                        <th scope="col" class="px-6 py-4">LAPORAN</th>
                                        <th scope="col" class="px-6 py-4">BUKTI</th>
                                        <th scope="col" class="px-6 py-4">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($laporans as $laporan)
<tr class="bg-white border-b hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 transition-all duration-200">
    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $loop->iteration }}</td>
    <td class="px-6 py-4">{{ $laporan->pelapor }}</td>
    <td class="px-6 py-4">{{ $laporan->kelas }}</td>
    <td class="px-6 py-4">{{ $laporan->terlapor }}</td>
    <td class="px-6 py-4">
        <div class="max-w-xs overflow-hidden">
            {{ $laporan->laporan }}
        </div>
    </td>
    <td class="px-6 py-4">
        <div class="relative group">
            <img src="{{ asset('storage/'.$laporan->bukti) }}" alt="Bukti" 
                class="w-20 h-20 object-cover rounded-lg transition-transform duration-300 transform hover:scale-110 cursor-pointer">
                {{-- untuk tool tip --}}
                <div class="hidden group-hover:block absolute z-10 p-2 bg-black bg-opacity-75 text-white text-xs rounded bottom-full left-1/2 transform -translate-x-1/2">
                Klik untuk memperbesar
                </div>
        </div>
    </td>
    <td class="px-6 py-4">
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                    {{ $laporan->status === 'DONE' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 cursor-pointer' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' }}">
                    {{-- {{ $laporan->status }} --}}
                    @if($laporan->status === 'DONE')
            <x-sheet>
                <x-sheet.trigger>OPEN</x-sheet.trigger>
                <x-sheet.content>
                    <x-sheet.header>
                        <x-sheet.title>{{$laporan->laporan}}</x-sheet.title>
                        <x-sheet.description>
                            {{$laporan->solusi}}
                        </x-sheet.description>
                    </x-sheet.header>
                    <div class="p-4">
                        <strong>Detail Laporan:</strong>
                        <p><strong>Pelapor:</strong> {{ $laporan->pelapor }}</p>
                        <p><strong>Kelas:</strong> {{ $laporan->kelas }}</p>
                        <p><strong>Terlapor:</strong> {{ $laporan->terlapor }}</p>
                        <p><strong>Laporan:</strong> {{ $laporan->laporan }}</p>
                        <p><strong>Bukti:</strong> {{ $laporan->laporan }}</p>
                        <img src="{{ asset('storage/'.$laporan->bukti) }}" alt="Bukti" class="w-full h-auto mt-2">
                        <p><strong>Solusi:</strong> {{ $laporan->solusi }}</p>
                    </div>
                </x-sheet.content>
            </x-sheet>
        @else
        PENDING
        @endif
        </span>

        
    </td>
</tr>
@endforeach

                                </tbody>
                            </table>
                        </div>
                    
                        <!-- Pagination section -->
                        <div class="mt-4">
                            {{ $laporans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>