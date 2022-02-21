@props(['disabled' => false])

<input autocomplete="off" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border p-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input']) !!}>
