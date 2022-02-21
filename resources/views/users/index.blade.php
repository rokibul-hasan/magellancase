<x-app-layout>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ __($title) }}
    </h2>


    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            
            @livewire('user-list')

        </div>


    </div>

</x-app-layout>
