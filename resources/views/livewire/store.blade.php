<div>
    {{-- filter section: artist or title, genre, max price and records per page --}}
    <div class="grid grid-cols-10 gap-4">
        <div class="col-span-10 md:col-span-5 lg:col-span-3">
            <x-jet-label for="name" value="Search"/>
            <div
                class="relative">
                <x-jet-input id="name" type="text"
                             wire:model="name"
                             class="block mt-1 w-full text-black"
                             placeholder="Search Movie"/>
                <div
                    class="w-5 absolute right-4 top-3 cursor-pointer">
                    <x-phosphor-x-duotone/>
                </div>
            </div>
        </div>
        <div class="col-span-5 md:col-span-2 lg:col-span-2 text-black">
            <x-jet-label for="genre" value="Genre"/>
            <x-tmk.form.select id="genre"
                               wire:model="genre"
                               class="block mt-1 w-full">
                <option class="text-gray-400" value="%">All Genres</option>
                @foreach($allGenres as $g)
                    <option class="text-gray-400" value="{{$g->id}}">{{$g->name}}({{$g->movies_count}})
                    </option>
                @endforeach

            </x-tmk.form.select>
        </div>
        <div class="col-span-5 md:col-span-3 lg:col-span-2 text-black">
            <x-jet-label for="perPage" value="Movies per page"/>
            <x-tmk.form.select id="perPage"
                               wire:model="perPage"
                               class="block mt-1 w-full ">
                <option class="text-gray-400" value="3">3</option>
                <option class="text-gray-400" value="6">6</option>
                <option class="text-gray-400" value="9">9</option>
                <option class="text-gray-400" value="12">12</option>
                <option class="text-gray-400" value="15">15</option>
                <option class="text-gray-400" value="18">18</option>
                <option class="text-gray-400" value="24">24</option>
            </x-tmk.form.select>
        </div>
        <div class="col-span-10 lg:col-span-3">
            <x-jet-label for="price">Price &le;
                <output id="pricefilter" name="pricefilter">{{$price}}</output>
            </x-jet-label>
            <x-jet-input type="range" id="price" name="price"
                         wire:model="price"
                         min="{{$priceMin}}"
                         max="{{$priceMax}}"
                         oninput="pricefilter.value = price.value"
                         class="block mt-4 w-full h-2 bg-red-100 accent-red-600 appearance-none"/>
        </div>
    </div>
    {{--    master section--}}
    <div class="grid grid-cols-3 lg:grid-cols-4 2xl:grid-cols-5 gap-4 m-8">
        @foreach($movies as $movie)
            <div class="relative"
                 wire:key="movie-{{$movie->id}}">
                <img
                    class="rounded-lg w-full "
                    src="{{$base_url}}{{$movie->cover}}"
                    alt="{{ $movie->title }}"
                />
                <div
                    class="absolute top-0 right-0 bottom-0 left-0 w-full overflow-hidden opacity-0 hover:opacity-100 bg-black/60 rounded-lg">
                    <div class="flex justify-center items-center h-full">
                        <p class="p-4 text-white text-sm hidden md:block ">{{ $movie->overview }}</p>
                    </div>
                    <x-heroicon-o-shopping-bag
                        class="absolute bottom-0 right-0 h-5 w-5 text-white cursor-pointer outline-0"
                        data-tippy-content="Not implemented"/>
                    <x-fas-list
                        wire:click="showOverview({{$movie->id}})"
                        class="absolute bottom-0 left-6 h-5 w-5 text-white cursor-pointer md:hidden outline-0"
                        data-tippy-content="Show overview"/>
                    <x-bi-person-badge
                        wire:click="showActors({{$movie->id}})"
                        class="absolute bottom-0 left-0 h-5 w-6 text-white cursor-pointer outline-0"
                        data-tippy-content="Show Actors"/>
                </div>
            </div>
        @endforeach
    </div>
    {{--    Detail section--}}
    <div
        x-data="{ open: @entangle('showModal') }"
        x-cloak
        x-show="open"
        x-transition.duration.500ms
        class="fixed z-40 inset-0 p-8 grid h-screen place-items-center backdrop-blur-sm backdrop-grayscale-[.7] bg-slate-100/70">
        <div
            @click.away="open = false;"
            @keyup.enter.window="open = false;"
            @keyup.esc.window="open = false;"
            class="bg-black p-4 border border-gray-300 max-w-2xl">
            <div class="flex justify-between space-x-4 pb-2 border-b border-gray-300">
                <h3 class="font-body text-red-600">
                    {{ $selectedMovie->title ?? 'Title' }}<br/>
                    <span class="font-body">{{ $selectedMovie->artist ?? 'Cast' }}</span>
                </h3>
                <img class="w-20"
                     src="{{$base_url}}{{$selectedMovie->cover ?? asset('storage/covers/No_Cover.jpg') }}"
                     alt="">
            </div>
            @isset($selectedMovie->cast)
                <table class="w-full text-left align-top">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Character</th>
                        <th class="px-4 py-2">Profile</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($selectedMovie['cast'] as $cast)
                        <tr class="border-t border-gray-100">
                            <td class="px-4 py-2">{{$cast['name']}}</td>
                            <td class="px-4 py-2">{{$cast['character']}}</td>
                            <td class="px-4 py-2"><img class="w-10" src="{{$base_url}}{{$cast['profile_path']}}" alt="">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endisset
        </div>
    </div>
    <div
        x-data="{ open: @entangle('showModal2') }"
        x-cloak
        x-show="open"
        x-transition.duration.500ms
        class="fixed z-40 inset-0 p-8 grid h-screen place-items-center backdrop-blur-sm backdrop-grayscale-[.7] bg-slate-100/70">
        <div
            @click.away="open = false;"
            @keyup.enter.window="open = false;"
            @keyup.esc.window="open = false;"
            class="bg-black p-4 border border-gray-300 max-w-2xl">
            <div class="flex justify-between space-x-4 pb-2 border-b border-gray-300">
                <h3 class="font-body text-red-600">
                    {{ $selectedMovie->title ?? 'Title' }}<br/>
                    <span class="font-body">Overview</span>
                </h3>
                <img class="w-20"
                     src="{{$base_url}}{{$selectedMovie->cover ?? asset('storage/covers/No_Cover.jpg') }}"
                     alt="">
            </div>
            @isset($selectedMovie->overview)
                <p>{{$selectedMovie->overview}}</p>
            @endisset
        </div>
    </div>

    <div class="my-4">{{ $movies->links() }}</div>
</div>
