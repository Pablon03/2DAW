<!-- resources/views/latest-posts.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latest Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($posts as $post)
                        <div class="mb-4">
                            <h3 class="font-bold text-xl mb-2">{{ $post->title }}</h3>
                            <p class="text-gray-700 text-base">{{ $post->content }}</p>
                            <p class="text-gray-600 text-xs mt-1">{{ $post->created_at->format('F j, Y, g:i a') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
