<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class Playground extends Controller
{
    public function index()
    {
//        $array = ["Action","Adventure","Animation","Comedy","Crime","Documentary","Drama",];
        $response = file_get_contents('https://api.themoviedb.org/3/movie/popular?api_key=b5e41163045c9d15a91c85932fff4f4d&language=en-US&page=1');
        $response = json_decode($response,true);
        $movies = $response['results'];
        return view('playground',compact('movies'));
    }
}
