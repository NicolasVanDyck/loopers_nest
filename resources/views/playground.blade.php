@foreach($movies as $movie)
    <p>[
        'title' => '{{$movie['title']}}',
        'tmdb_id' => '{{$movie['id']}}',
        'price' => 4.99,
        'release_date' => '{{$movie['release_date']}}',
        'cover' => '{{$movie['poster_path']}}',
        'created_at' => now()],
    </p>
@endforeach
