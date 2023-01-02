@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center px-1 pt-1 border-b-2 border-red-400 text-md font-body leading-5 text-white focus:outline-none focus:border-indigo-700 transition'
                : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md font-body leading-5 text-gray-400 hover:text-white focus:outline-none focus:text-white transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
