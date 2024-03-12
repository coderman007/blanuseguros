@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#CFC8AE] text-lg font-medium leading-5 text-[#CFC8AE] focus:outline-none focus:border-[#CFC8AE] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-gray-100 dark:text-gray-400 hover:text-[#CFC8AE] focus:outline-none focus:text-[#CFC8AE] focus:border-[#CFC8AE] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
