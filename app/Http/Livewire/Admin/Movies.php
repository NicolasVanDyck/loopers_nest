<?php

namespace App\Http\Livewire\Admin;

use App\Models\Genre;
use App\Models\Movie;
use Http;
use Livewire\Component;
use Livewire\WithPagination;

class Movies extends Component
{
    use WithPagination;

    // filter and pagination
    public $perPage = 5;
    public $name;
    public $genres;
    // show/hide the modal
    public $showModal = false;
    // array that contains the values for a new or updated version of the record
    public $newMovie = [
        'id'           => null,
        'title'        => null,
        'tmdb_id'      => null,
        'price'        => null,
        'release_date' => null,
        'overview'     => null,
        'genre_id'     => null,
        'cover'        => '/storage/covers/No_Cover.jpg',
    ];

    // validation rules (use the rules() method, not the $rules property)
    protected function rules()
    {
        return [
            'newMovie.tmdb_id'  => 'required|numeric|min:0|unique:movies,tmdb_id,' . $this->newMovie['id'],
            'newMovie.title'    => 'required',
            'newMovie.genre_id' => 'required|exists:genres,id',
            'newMovie.price'    => 'required|numeric|min:0',
        ];
    }

    // validation attributes
    protected $validationAttributes = [
        'newMovie.tmdb_id'  => 'tmdb id',
        'newMovie.title'    => 'movie title',
        'newMovie.genre_id' => 'genre',
        'newMovie.price'    => 'price',

    ];

    // set/reset $newRecord and validation
    public function setNewMovie(Movie $movie = null)
    {
        $this->resetErrorBag();
        if ($movie) {
            $this->newMovie['id'] = $movie->id;

            $this->newMovie['title'] = $movie->title;
            $this->newMovie['tmdb_id'] = $movie->tmdb_id;
            $this->newMovie['price'] = $movie->price;
            $this->newMovie['genre_id'] = $movie->genre_id;
            $this->newMovie['release_date'] = $movie->release_date;
            $this->newMovie['overview'] = $movie->overview;
            $this->newMovie['cover'] = $movie->cover;
        } else {
            $this->reset('newMovie');
        }
        $this->showModal = true;
    }

    // reset the paginator
    public function updated($propertyName, $propertyValue)
    {
        $this->resetPage();
    }

    // create a new record
    public function createMovie()
    {
        $this->validate();
        $movie = Movie::create([
            'tmdb_id'      => $this->newMovie['tmdb_id'],
            'title'        => $this->newMovie['title'],
            'price'        => $this->newMovie['price'],
            'genre_id'     => $this->newMovie['genre_id'],
            'release_date' => $this->newMovie['release_date'],
            'overview'     => $this->newMovie['overview'],
            'cover'        => $this->newMovie['cover'],
        ]);
        $this->showModal = false;
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html'       => "The movie <b><i>{$movie->title}</i></b> has been added",
        ]);
    }

    // update an existing record
    public function updateMovie(Movie $movie)
    {
        $this->validate();
        $movie->update([
            'mb_id'        => $this->newMovie['tmdb_id'],
            'title'        => $this->newMovie['title'],
            'price'        => $this->newMovie['price'],
            'genre_id'     => $this->newMovie['genre_id'],
            'release_date' => $this->newMovie['release_date'],
            'overview'     => $this->newMovie['overview'],
            'cover'        => $this->newMovie['cover'],
        ]);
        $this->showModal = false;
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html'       => "The movie <b><i>{$movie->title}</i></b> has been updated",
        ]);
    }

    // delete an existing record
    public function deleteMovie(Movie $movie)
    {
        $movie->delete();
        $this->dispatchBrowserEvent('swal:toast', [
            'background' => 'success',
            'html'       => "The record <b><i>{$movie->title}</i></b> has been deleted",
        ]);
    }

    public function getDataFromTMDBapi()
    {
        $this->validateOnly('newMovie.tmdb_id');
        $this->resetErrorBag();
        $response = Http::get("https://api.themoviedb.org/3/movie/" . $this->newMovie['tmdb_id'] . "?api_key=b5e41163045c9d15a91c85932fff4f4d&language=en-US");
        if ($response->successful()) {
            $data = $response->json();
            $this->newMovie['title'] = $data['original_title'];
            $this->newMovie['cover'] = $data['poster_path'];
            $this->newMovie['release_date'] = $data['release_date'];
            $this->newMovie['overview'] = $data['overview'];
        } else {
            $this->newMovie['title'] = null;
            $this->newMovie['cover'] = '/storage/covers/no-cover.png';
            $this->newMovie['release_date'] = null;
            $this->newMovie['overview'] = null;
            $this->addError('newMovie.tmdb_id', 'tmdb id not found');
        }
    }

    public function mount()
    {
        $this->genres = Genre::orderBy('name')->get();
    }

    public function render()
    {
        $movies = Movie::orderBy('title')
            ->where([
                ['title', 'like', "%{$this->name}%"],
            ])
            ->paginate($this->perPage);
        return view('livewire.admin.movies', compact('movies'))
            ->layout('layouts.loopers', [
                'description' => 'Manage the movies of our movie store',
                'title'       => 'Movies',
            ]);
    }
}
