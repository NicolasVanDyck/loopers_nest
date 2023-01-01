<x-loopers-layout>
    <x-slot name="description">Playground</x-slot>
    <x-slot name="title">Looper's Playground</x-slot>

    <x-nicolas.carousel>
        <div class="carousel-item active relative float-left w-full">
            <img
                src="https://image.tmdb.org/t/p/original/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg"
                class="block w-full"
                alt="Wild Landscape"
            />
            <div class="carousel-caption hidden md:block absolute text-center">
                <h5 class="text-xl">test</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        @foreach($movies as $movie)
            <div class="carousel-item relative float-left w-full">
                <img
                    src="https://image.tmdb.org/t/p/original{{ $movie['poster_path'] }}"
                    class="block w-full"
                    alt="Wild Landscape"
                />
                <div class="carousel-caption hidden md:block absolute text-center">
                    <h5 class="text-xl">{{$movie['title']}}</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
        @endforeach
    </x-nicolas.carousel>

    {{--    <div id="carouselExampleSlidesOnly" class="carousel slide relative" data-bs-ride="carousel">--}}
    {{--        <div class="carousel-inner relative w-full overflow-hidden">--}}
    {{--            <div class="carousel-item active relative float-left w-full">--}}
    {{--                <img--}}
    {{--                    src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp"--}}
    {{--                    class="block w-full"--}}
    {{--                    alt="Wild Landscape"--}}
    {{--                />--}}
    {{--                <div class="carousel-caption hidden md:block absolute text-center">--}}
    {{--                    <h5 class="text-xl">Second slide label</h5>--}}
    {{--                    <p>Some representative placeholder content for the second slide.</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="carousel-item relative float-left w-full">--}}
    {{--                <img--}}
    {{--                    src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp"--}}
    {{--                    class="block w-full"--}}
    {{--                    alt="Camera"--}}
    {{--                />--}}
    {{--                <div class="carousel-caption hidden md:block absolute text-center">--}}
    {{--                    <h5 class="text-xl">Second slide label</h5>--}}
    {{--                    <p>Some representative placeholder content for the second slide.</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="carousel-item relative float-left w-full">--}}
    {{--                <img--}}
    {{--                    src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp"--}}
    {{--                    class="block w-full"--}}
    {{--                    alt="Exotic Fruits"--}}
    {{--                />--}}
    {{--                <div class="carousel-caption hidden md:block absolute text-center">--}}
    {{--                    <h5 class="text-xl">Second slide label</h5>--}}
    {{--                    <p>Some representative placeholder content for the second slide.</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--        @foreach($movies as $movie)--}}
    {{--            <div class="carousel-item active relative float-left w-full">--}}
    {{--                <img--}}
    {{--                    src="https://image.tmdb.org/t/p/original{{ $movie['poster_path'] }}"--}}
    {{--                    class="block w-full"--}}
    {{--                    alt="Wild Landscape"--}}
    {{--                />--}}
    {{--                <div class="carousel-caption hidden md:block absolute text-center">--}}
    {{--                    <h5 class="text-xl">{{$movie['title']}}</h5>--}}
    {{--                    <p>Some representative placeholder content for the second slide.</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        @endforeach--}}
    {{--        <p>[--}}
    {{--            'title' => '{{$movie['title']}}',--}}
    {{--            'tmdb_id' => '{{$movie['id']}}',--}}
    {{--            'price' => 4.99,--}}
    {{--            'release_date' => '{{$movie['release_date']}}',--}}
    {{--            'cover' => '{{$movie['poster_path']}}',--}}
    {{--            'created_at' => now()],--}}
    {{--        </p>--}}

</x-loopers-layout>
