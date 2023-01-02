<?php

namespace App\Http\Controllers;

class Home extends Controller
{
    public function index()
    {
        //Popular movies
        $responsePopular = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key=b5e41163045c9d15a91c85932fff4f4d&language=en-US&page=1');
        $responsePopular = json_decode($responsePopular, true);
        $moviesPopular = $responsePopular['results'];

        //Top Rated movies
        $responseTopRated = file_get_contents('https://api.themoviedb.org/3/movie/top_rated?api_key=b5e41163045c9d15a91c85932fff4f4d&language=en-US&page=1');
        $responseTopRated = json_decode($responseTopRated, true);
        $moviesTopRated = $responseTopRated['results'];

        //upcoming movies
        $responseUpcoming = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key=b5e41163045c9d15a91c85932fff4f4d&language=en-US&page=1');
        $responseUpcoming = json_decode($responseUpcoming, true);
        $moviesUpcoming = $responseUpcoming['results'];


        $base_url = "https://image.tmdb.org/t/p/original";
        return view('home', compact('moviesPopular', 'base_url', 'moviesTopRated', 'moviesUpcoming'));
    }
}
