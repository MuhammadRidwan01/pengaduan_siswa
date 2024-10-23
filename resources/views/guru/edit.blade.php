<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tindak Lanjut Laporan Siswa') }}
            </h2>
            <span class="px-3 py-1 text-sm rounded-full 
                {{ $siswa->status === 'DONE' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' }}">
                Status: {{ $siswa->status }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Detail Laporan Section -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Detail Pelaporan</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Pelapor:</label>
                                    <p class="mt-1 text-gray-900 dark:text-white">{{ $siswa->pelapor }}</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Terlapor:</label>
                                    <p class="mt-1 text-gray-900 dark:text-white">{{ $siswa->terlapor }}</p>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Kelas:</label>
                                    <p class="mt-1 text-gray-900 dark:text-white">{{ $siswa->kelas }}</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Deskripsi Laporan</h3>
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                <p class="text-gray-900 dark:text-white">{{ $siswa->laporan }}</p>
                            </div>
                            @if($siswa->bukti)
                            <div class="mt-4">
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Bukti:</h4>
                                <img src="{{ asset('storage/'.$siswa->bukti) }}" alt="Bukti" class="rounded-lg max-w-xs shadow-lg hover:shadow-xl transition-shadow duration-300">
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Form Tindak Lanjut -->
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-6">Form Tindak Lanjut</h3>
                    <form action="{{ route('guru.update', $siswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="solusi">
                                Solusi/Tindakan
                            </label>
                            <textarea 
                                id="solusi" 
                                name="solusi" 
                                rows="4" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required
                            >{{ old('solusi', $siswa->solusi) }}</textarea>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="status">
                                Status
                            </label>
                            <select 
                                id="status" 
                                name="status" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-white dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            >
                                <option value="PENDING" {{ old('status', $siswa->status) === 'PENDING' ? 'selected' : '' }}>PENDING</option>
                                <option value="DONE" {{ old('status', $siswa->status) === 'DONE' ? 'selected' : '' }}>DONE</option>
                            </select>
                        </div>
                    
                        <div class="flex justify-end space-x-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>