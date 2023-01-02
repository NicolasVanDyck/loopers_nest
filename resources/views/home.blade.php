<x-loopers-layout>
    <x-slot name="description">Home</x-slot>
    <x-slot name="title">Looper's Nest</x-slot>

    <p class="text-2xl my-2 flex justify-center">Looper's Nest. The only streaming service that matters.</p>

    <div class="grid grid-cols-3 gap-4 border-t-4 border-t-gray-600/20">
        <div>
            <p class="flex justify-center m-4 text-3xl">Most Popular</p>
            <x-nicolas.carousel class="rounded-lg">
                @foreach($moviesPopular as $movie)
                    @if($movie == $moviesPopular[0])
                        <div class="carousel-item relative active float-left w-full">
                            <img
                                src="{{$base_url}}{{ $movie['poster_path'] }}"
                                class="block w-full"
                                alt="{{$movie['title']}}"
                            />
                            <div class="box-shadow absolute bottom-0 top-0 w-full"></div>
                        </div>
                    @else
                        <div class="carousel-item relative float-left w-full">
                            <img
                                src="{{$base_url}}{{ $movie['poster_path'] }}"
                                class="block w-full"
                                alt="{{$movie['title']}}"
                            />
                            <div class="box-shadow absolute bottom-0 top-0 w-full"></div>
                        </div>
                    @endif
                @endforeach
            </x-nicolas.carousel>
        </div>
        <div>
            <p class="flex justify-center m-4 text-3xl">Top Rated</p>
            <x-nicolas.carousel class="rounded-lg">
                @foreach($moviesTopRated as $movie)
                    @if($movie == $moviesTopRated[0])
                        <div class="carousel-item relative active float-left w-full">
                            <img
                                src="{{$base_url}}{{ $movie['poster_path'] }}"
                                class="block w-full"
                                alt="{{$movie['title']}}"
                            />
                            <div class="box-shadow absolute bottom-0 top-0 w-full"></div>
                        </div>
                    @else
                        <div class="carousel-item relative float-left w-full">
                            <img
                                src="{{$base_url}}{{ $movie['poster_path'] }}"
                                class="block w-full"
                                alt="{{$movie['title']}}"
                            />
                            <div class="box-shadow absolute bottom-0 top-0 w-full"></div>
                        </div>
                    @endif
                @endforeach
            </x-nicolas.carousel>
        </div>
        <div>
            <p class="flex justify-center m-4 text-3xl">Upcoming</p>
            <x-nicolas.carousel class="rounded-lg">
                @foreach($moviesUpcoming as $movie)
                    @if($movie == $moviesUpcoming[0])
                        <div class="carousel-item relative active float-left w-full">
                            <img
                                src="{{$base_url}}{{ $movie['poster_path'] }}"
                                class="block w-full"
                                alt="{{$movie['title']}}"
                            />
                            <div class="box-shadow absolute bottom-0 top-0 w-full"></div>
                        </div>
                    @else
                        <div class="carousel-item relative float-left w-full">
                            <img
                                src="{{$base_url}}{{ $movie['poster_path'] }}"
                                class="block w-full"
                                alt="{{$movie['title']}}"
                            />
                            <div class="box-shadow absolute bottom-0 top-0 w-full"></div>
                        </div>
                    @endif
                @endforeach
            </x-nicolas.carousel>
        </div>
    </div>
    @push('script')
        <script>
            console.log('The Vinyl Shop JavaScript works! 🙂')
        </script>
    @endpush

</x-loopers-layout>
