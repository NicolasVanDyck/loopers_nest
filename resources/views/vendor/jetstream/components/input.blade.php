@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 text-black focus:border-indigo-300 focus:ring focus:ring-red-600 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
