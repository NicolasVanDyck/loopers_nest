<x-loopers-layout>
    <x-slot name="description">Playground</x-slot>
    <x-slot name="title">Looper's Playground</x-slot>

    <div class="grid grid-cols-3">
        <div>
            <x-nicolas.carousel class="rounded-lg">
                @foreach($movies as $movie)
                    @if($movie == $movies[0])
                        <div class="carousel-item relative active float-left w-full">
                            <img
                                src="{{$base_url}}{{ $movie['poster_path'] }}"
                                class="block w-full"
                                alt="{{$movie['title']}}"
                            />
                        </div>
                    @else
                        <div class="carousel-item relative float-left w-full">
                            <img
                                src="{{$base_url}}{{ $movie['poster_path'] }}"
                                class="block w-full"
                                alt="{{$movie['title']}}"
                            />
                        </div>
                    @endif
                @endforeach
            </x-nicolas.carousel>
        </div>
    </div>
    <x-nicolas.card>
        <x-slot name="image">{{$base_url}}/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg
        </x-slot>
        <x-slot name="alt">{{ $movies[0]['title'] }}</x-slot>
        {{$movies[0]['overview']}}
    </x-nicolas.card>
</x-loopers-layout>
