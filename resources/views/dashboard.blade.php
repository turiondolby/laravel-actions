<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <div>
                            <x-label for="post" :value="'Your post'" />

                            <x-input id="post" class="block mt-1 w-full" type="text" name="body" :value="old('post')" />
                        </div>

                        <x-button class="mt-1">
                            Create
                        </x-button>

                        @error('body')
                            <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
