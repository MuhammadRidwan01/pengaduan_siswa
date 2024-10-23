<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($articles as $article)
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md overflow-hidden">
                                <img src="{{ $article['urlToImage'] ?? '/api/placeholder/400/200' }}" alt="{{ $article['title'] }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="font-bold text-lg mb-2">{{ $article['title'] }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">{{ $article['source']['name'] }} - {{ \Carbon\Carbon::parse($article['publishedAt'])->format('M d, Y') }}</p>
                                    <p class="text-sm mb-4">{{ $article['description'] }}</p>
                                    <a href="{{ $article['url'] }}" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:underline">Read more</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>