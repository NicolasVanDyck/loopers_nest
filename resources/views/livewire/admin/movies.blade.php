<div>
    <x-tmk.section class="mb-4 flex gap-2">
        <div class="flex-1">
            <x-jet-input id="search" type="text" placeholder="Filter Movie"
                         wire:model.debounce.500ms="name"
                         class="w-full shadow-md placeholder-gray-300"/>
        </div>
        <x-jet-button wire:click="setNewMovie()">
            New Movie
        </x-jet-button>
    </x-tmk.section>

    <x-tmk.section>
        <div class="my-4">{{ $movies->links() }}</div>
        <table class="text-center w-full border border-gray-300">
            <colgroup>
                <col class="w-14">
                <col class="w-20">
                <col class="w-16">
                <col class="w-30">
                <col class="w-max">
                <col class="w-24">
            </colgroup>
            <thead>
            <tr class="bg-red-600 text-black [&>th]:p-2 cursor-pointer">
                <th wire:click="resort('id')">
                    <span data-tippy-content="Order by id">#</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-black inline-block
                        {{$orderAsc ?: 'rotate-180'}}
                        {{$orderBy === 'id' ? 'inline-block' : 'hidden'}}
                        "/>
                </th>
                <th></th>
                <th wire:click="resort('price')">
                    <span data-tippy-content="Order by price">price</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-black inline-block
                        {{$orderAsc ?: 'rotate-180'}}
                        {{$orderBy === 'price' ? 'inline-block' : 'hidden'}}
                        "/>
                </th>
                <th wire:click="resort('release_date')">
                    <span data-tippy-content="Order by release">release</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-black inline-block
                        {{$orderAsc ?: 'rotate-180'}}
                        {{$orderBy === 'release_date' ? 'inline-block' : 'hidden'}}
                        "/>
                </th>
                <th wire:click="resort('title')" class="text-left">
                    <span data-tippy-content="Order by title">title</span>
                    <x-heroicon-s-chevron-up
                        class="w-5 text-black inline-block
                        {{$orderAsc ?: 'rotate-180'}}
                        {{$orderBy === 'title' ? 'inline-block' : 'hidden'}}
                        "/>
                </th>
                <th>
                    <x-tmk.form.select id="perPage"
                                       wire:model="perPage"
                                       class="block mt-1 w-full">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </x-tmk.form.select>
                </th>
            </tr>
            </thead>
            <tbody>
            @forelse($movies as $movie)
                <tr
                    wire:key="movie_{{$movie->id}}"
                    class="border-t border-gray-300">
                    <td>{{$movie->id}}</td>
                    <td>
                        <img
                            src="{{ $movie->cover ? "https://image.tmdb.org/t/p/original" . $movie->cover : '/storage/covers/No_Cover.jpg' }}"
                            alt="{{$movie->title}}"
                            class="my-2 border object-cover">
                    </td>
                    <td>€ {{$movie->price}}</td>
                    <td>{{\Carbon\Carbon::parse($movie->release_date)->format('F d, Y')}}</td>
                    <td class="text-left">{{$movie->title}}</td>
                    <td>
                        <div class="border border-gray-300 rounded-md overflow-hidden m-2 grid grid-cols-2 h-10">
                            <button
                                wire:click="setNewMovie({{$movie->id}})"
                                class="text-gray-400 hover:text-sky-100 hover:bg-sky-500 transition border-r border-gray-300">
                                <x-phosphor-pencil-line-duotone class="inline-block w-5 h-5"/>
                            </button>
                            <button
                                x-data=""
                                @click="confirm('Are you sure you want to delete this movie?') ? $wire.deleteMovie({{ $movie->id }}) : ''"
                                class="text-gray-400 hover:text-red-100 hover:bg-red-500 transition">
                                <x-phosphor-trash-duotone class="inline-block w-5 h-5"/>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="border-t border-gray-300 p-4 text-center text-gray-500">
                        <div class="font-bold italic text-sky-800">No movies found</div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </x-tmk.section>

    <x-jet-dialog-modal id="movieModal"
                        wire:model="showModal">
        <x-slot name="title">
            <h3 class="text-black">{{ is_null($newMovie['id']) ? 'New movie' : 'Edit movie' }}</h3></x-slot>
        <x-slot name="content">
            @if ($errors->any())
                <x-tmk.alert type="danger">
                    <x-tmk.list>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </x-tmk.list>
                </x-tmk.alert>
            @endif
            @if(is_null($newMovie['id']))
                <x-jet-label for="tmdb_id" value="TMDB id"/>
                <div class="flex flex-row gap-2 mt-2">
                    <x-jet-input id="tmdb_id" type="text" placeholder="TMDB id"
                                 wire:model.defer="newMovie.tmdb_id"
                                 class="flex-1"/>
                    <x-jet-button
                        wire:click="getDataFromTMDBapi()"
                        wire:loading.attr="disabled">
                        Get Movie info
                    </x-jet-button>
                </div>
            @endif
            <div class="flex flex-row gap-4 mt-4">
                <div class="flex-1 flex-col gap-2">
                    <p class="text-lg font-medium text-black">{!! $newMovie['title'] ?? '&nbsp;' !!}</p>
                    <input type="hidden" wire:model.defer="newMovie.title">
                    <p class="text-sm text-teal-700">{!! $newMovie['tmdb_id'] ? 'TMDB id: ' . $newMovie['tmdb_id'] : '&nbsp;' !!}</p>
                    <input type="hidden" wire:model.defer="newRecord.tmdb_id">
                    <x-jet-label for="genre_id" value="Genre" class="mt-4"/>
                    <x-tmk.form.select wire:model.defer="newMovie.genre_id" id="genre_id"
                                       class="block mt-1 w-full text-black">
                        <option value="">Select a genre</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </x-tmk.form.select>
                    <x-jet-label for="price" value="Price" class="mt-4"/>
                    <x-jet-input id="price" type="number" step="0.01"
                                 wire:model.defer="newMovie.price"
                                 class="mt-1 block w-full"/>
                </div>
                <img src=
                         "{{ $newMovie['cover'] ? "https://image.tmdb.org/t/p/original" . $newMovie['cover'] : '/storage/covers/No_Cover.jpg' }}"
                     alt=""
                     class="mt-4 w-40 h-40 border border-gray-300 object-cover">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button @click="show = false">Cancel</x-jet-secondary-button>
            @if(is_null($newMovie['id']))
                <x-jet-button
                    wire:click="createMovie()"
                    wire:loading.attr="disabled"
                    class="ml-2">Save new Movie
                </x-jet-button>
            @else
                <x-jet-button
                    color="success"
                    wire:click="updateMovie({{ $newMovie['id'] }})"
                    wire:loading.attr="disabled"
                    class="ml-2">Update movie
                </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
</div>
