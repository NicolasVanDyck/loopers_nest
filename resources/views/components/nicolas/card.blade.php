@props([
    'type' => 'normal'
])

@php
    $options = [
        'normal' => 'rounded-lg w-full',
        'full' => 'rounded-t-full w-full',
        'none' => 'rounded-none w-full',
    ];
    $style = $options[$type] ?? $options['normal']
@endphp


<div {{$attributes->merge(['class' => "relative"])}}
     wire:key="movie-{{$id}}">
    <img
        class="{{$style}} "
        src="{{$baseurl}}{{$cover}}"
        alt="{{ $title }}"
    />
    <div
        class="absolute top-0 right-0 bottom-0 left-0 overflow-hidden opacity-0 hover:opacity-100 bg-black/60 {{$style}}">
        <div class="flex justify-center items-center h-full">
            <p class="p-4 text-white text-sm hidden md:block ">{{ $overview }}</p>
        </div>
        <x-heroicon-o-shopping-bag
            class="absolute bottom-0 right-0 h-5 w-5 text-white cursor-pointer outline-0"
            data-tippy-content="Not implemented"/>
        <x-fas-list
            wire:click="showOverview({{$id}})"
            class="absolute bottom-0 left-6 h-5 w-5 text-white cursor-pointer md:hidden outline-0"
            data-tippy-content="Show overview"/>
        <x-bi-person-badge
            wire:click="showActors({{$id}})"
            class="absolute bottom-0 left-0 h-5 w-6 text-white cursor-pointer outline-0"
            data-tippy-content="Show Actors"/>
    </div>
</div>
