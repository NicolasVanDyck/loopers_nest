<div id="carousel" class="carousel slide relative" data-bs-ride="carousel">
    <div {{ $attributes->merge(['class' => "carousel-inner relative w-full overflow-hidden" ]) }}>
        {{ $slot }}
    </div>
</div>
