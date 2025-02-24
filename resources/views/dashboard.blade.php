<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="grid grid-cols-2 gap-2 py-6">
    <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg aspect-square">
            <div class="p-4 text-gray-900 dark:text-gray-100 flex items-center justify-center h-full">
                <h1><a href="{{ route("myAcutions") }}">مزاداتي</a></h1>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg aspect-square">
            <div class="p-4 text-gray-900 dark:text-gray-100 flex items-center justify-center h-full">
                <h1><a href="#">المزادات الرابحة</a></h1>
            </div>
        </div>
    </div><div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg aspect-square">
            <div class="p-4 text-gray-900 dark:text-gray-100 flex items-center justify-center h-full">
                <h1><a href="#">المزادات الخاسرة</a></h1>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
