<?php

namespace App\Http\Livewire;

use App\Models\Genre;
use App\Models\Movie;
use Http;
use Livewire\Component;
use Livewire\WithPagination;

class Store extends Component
{
    use WithPagination;

    public $perPage = 6;
    public $name;
    public $genre = '%';
    public $price;
    public $priceMin, $priceMax;


    public $selectedMovie;
    public $showModal = false;
    public $showModal2 = false;

    public function updated($propertyName, $propertyValue)
    {
        // dump($propertyName, $propertyValue);
        $this->resetPage();
    }

    public function showOverview(Movie $movie)
    {
        $this->selectedMovie = $movie;
//        dump($this->selectedMovie->toArray());
        $this->showModal2 = true;
    }

    public function showActors(Movie $movie)
    {
        $this->selectedMovie = $movie;
        $url = "https://api.themoviedb.org/3/movie/{$movie->tmdb_id}/credits?api_key=b5e41163045c9d15a91c85932fff4f4d&language=en-US";
        $response = Http::get($url)->json();
        $this->selectedMovie['cast'] = $response['cast'];
//        dd($this->selectedMovie->toArray());
        $this->showModal = true;
//        dump($this->selectedMovie);
    }

    public function mount()
    {
        $this->priceMin = ceil(Movie::min('price'));
        $this->priceMax = ceil(Movie::max('price'));
        $this->price = $this->priceMax;
    }

    public function render()
    {
        //Popular movies
//        $responsePopular = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key=b5e41163045c9d15a91c85932fff4f4d&language=en-US&page=1');
//        $responsePopular = json_decode($responsePopular, true);
//        $moviesPopular = $responsePopular['results'];

        $allGenres = Genre::has('movies')->withCount('movies')->get();
        $movies = Movie::orderBy('title')
            ->where([
                ['title', 'like', "%{$this->name}%"],
                ['genre_id', 'like', $this->genre],
                ['price', '<=', $this->price],
            ])
            ->paginate($this->perPage);
//        dump($movies->toArray()[0]);

        $base_url = "https://image.tmdb.org/t/p/original";

        return view('livewire.store', compact('movies', 'base_url', 'allGenres'))
            ->layout('layouts.loopers', [
                'description' => "Looper's Nest Store Page",
                'title'       => 'Store',
            ]);
    }
}
