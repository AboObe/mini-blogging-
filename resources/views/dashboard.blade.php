<x-app-layout>
    <x-slot name="header">
        <a href="{{ url('/') }}" class="font-semibold text-gray-600 
        hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline 
        focus:outline-2 focus:rounded-sm focus:outline-red-500">Posts</a>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
