@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md text-gray-400']) }}>
    {{ $value ?? $slot }}
</label>
