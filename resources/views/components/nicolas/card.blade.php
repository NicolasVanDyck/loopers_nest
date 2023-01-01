<div class="relative">
    <img
        class="rounded-lg"
        src="{{ $image }}"
        alt="{{ $alt }}"
    />
    <div
        class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden opacity-0 hover:opacity-100 bg-black/60 rounded-lg">
        <div class="flex justify-center items-center h-full">
            <p class="p-4 text-white">{{ $slot }}</p>
        </div>
        <x-heroicon-o-shopping-bag
            class="absolute bottom-0 right-0 h-12 w-12 text-white"/>
    </div>

</div>
{{--<div id="carouselExampleSlidesOnly" class="carousel slide relative" data-bs-ride="carousel">--}}
{{--    <div class="carousel-inner relative w-full overflow-hidden">--}}
{{--        <div class="carousel-item active relative float-left w-full">--}}
{{--            <img--}}
{{--                src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp"--}}
{{--                class="block w-full"--}}
{{--                alt="Wild Landscape"--}}
{{--            />--}}
{{--            <div class="carousel-caption hidden md:block absolute text-center">--}}
{{--                <h5 class="text-xl">Second slide label</h5>--}}
{{--                <p>Some representative placeholder content for the second slide.</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="carousel-item relative float-left w-full">--}}
{{--            <img--}}
{{--                src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp"--}}
{{--                class="block w-full"--}}
{{--                alt="Camera"--}}
{{--            />--}}
{{--            <div class="carousel-caption hidden md:block absolute text-center">--}}
{{--                <h5 class="text-xl">Second slide label</h5>--}}
{{--                <p>Some representative placeholder content for the second slide.</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
