<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genre_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->unsignedInteger('tmdb_id')->default(1);
            $table->float('price', 5, 2)->default(4.99);
            $table->string('release_date');
            $table->string('cover');
            $table->timestamps();
        });
        // Insert some records (inside up-function, after create method)
        DB::table('movies')->insert(
            [
                [
                    'genre_id'     => '15',
                    'title'        => 'Avatar: The Way of Water',
                    'tmdb_id'      => '76600',
                    'price'        => 10.99,
                    'release_date' => '2022-12-14',
                    'cover'        => '/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => '1',
                    'title'        => 'Violent Night',
                    'tmdb_id'      => '899112',
                    'price'        => 9.99,
                    'release_date' => '2022-11-30',
                    'cover'        => '/1XSYOP0JjjyMz1irihvWywro82r.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => '2',
                    'title'        => 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe',
                    'tmdb_id'      => '411',
                    'price'        => 4.99,
                    'release_date' => '2005-12-07',
                    'cover'        => '/iREd0rNCjYdf5Ar0vfaW32yrkm.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => '9',
                    'title'        => 'Troll',
                    'tmdb_id'      => '736526',
                    'price'        => 4.99,
                    'release_date' => '2022-12-01',
                    'cover'        => '/9z4jRr43JdtU66P0iy8h18OyLql.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => '1',
                    'title'        => 'Black Adam',
                    'tmdb_id'      => '436270',
                    'price'        => 5.99,
                    'release_date' => '2022-10-19',
                    'cover'        => '/pFlaoHTZeyNkG83vxsAJiGzfSsa.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => '1',
                    'title'        => 'Avatar',
                    'tmdb_id'      => '19995',
                    'price'        => 4.99,
                    'release_date' => '2009-12-15',
                    'cover'        => '/jRXYjXNq0Cs2TcJjLkki24MLp7u.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => '17',
                    'title'        => 'Savage Salvation',
                    'tmdb_id'      => '740952', 'price' => 4.99,
                    'release_date' => '2022-12-02',
                    'cover'        => '/fJRt3mmZEvf8gQzoNLzjPtWpc9o.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => '11',
                    'title'        => 'Prey for the Devil',
                    'tmdb_id'      => '676547',
                    'price'        => 10.99,
                    'release_date' => '2022-10-23',
                    'cover'        => '/jXwYESgxqkXlYvoTyUTO2hqKK7T.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '1',
                    'title'        => 'The Woman King',
                    'tmdb_id'      => '724495',
                    'price'        => 4.99,
                    'release_date' => '2022-09-15',
                    'cover'        => '/438QXt1E3WJWb3PqNniK0tAE5c1.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '1',
                    'title'        => 'The Big 4',
                    'tmdb_id'      => '683328',
                    'price'        => 4.99,
                    'release_date' => '2022-12-19',
                    'cover'        => '/jrw684BhFJZ9Jac6KJda3hSQkxt.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '3',
                    'title'        => "Guillermo del Toro's Pinocchio",
                    'tmdb_id'      => '555604',
                    'price'        => 9.99,
                    'release_date' => '2022-11-09',
                    'cover'        => '/vx1u0uwxdlhV2MUzj4VlcMB0N6m.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '13',
                    'title'        => 'Glass Onion: A Knives Out Mystery',
                    'tmdb_id'      => '661374',
                    'price'        => 4.99,
                    'release_date' => '2022-11-23',
                    'cover'        => '/vDGr1YdrlfbU9wxTOdpf3zChmv9.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '3',
                    'title'        => 'Strange World',
                    'tmdb_id'      => '877269',
                    'price'        => 4.99,
                    'release_date' => '2022-11-23',
                    'cover'        => '/jXGMJUq9zcrScs02qkQuCtmWwaI.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '1',
                    'title'        => 'My Name Is Vendetta',
                    'tmdb_id'      => '873126',
                    'price'        => 5.99,
                    'release_date' => '2022-11-30',
                    'cover'        => '/7l3war94J4tRyWUiLAGokr3ViF2.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '3',
                    'title'        => 'A Frozen Rooster',
                    'tmdb_id'      => '573171',
                    'price'        => 4.99,
                    'release_date' => '2022-12-14',
                    'cover'        => '/gBBCBMXKzWRADtliUYfV69aVIcz.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '1',
                    'title'        => 'Black Panther: Wakanda Forever',
                    'tmdb_id'      => '505642',
                    'price'        => 4.99,
                    'release_date' => '2022-11-09',
                    'cover'        => '/sv1xJUazXeYqALzczSZ3O6nkH75.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '1',
                    'title'        => 'Detective Knight: Rogue',
                    'tmdb_id'      => '1024546', 'price' => 4.99,
                    'release_date' => '2022-10-21',
                    'cover'        => '/2wj5iUJ2B5AQ1lFctJgUrHHsp9B.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '5',
                    'title'        => 'Lesson Plan',
                    'tmdb_id'      => '1049233',
                    'price'        => 3.99,
                    'release_date' => '2022-11-23',
                    'cover'        => '/wawP3mOUeRBrAtnbPwWK5eFaMdV.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '17',
                    'title'        => 'The Independent',
                    'tmdb_id'      => '878183',
                    'price'        => 4.99,
                    'release_date' => '2022-11-02',
                    'cover'        => '/q8cHBw3y55Uotk2jGHfuRq2rnzK.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => '9',
                    'title'        => 'R.I.P.D. 2: Rise of the Damned',
                    'tmdb_id'      => '1013860',
                    'price'        => 4.99,
                    'release_date' => '2022-11-15',
                    'cover'        => '/g4yJTzMtOBUTAR2Qnmj8TYIcFVq.jpg',
                    'created_at'   => now()
                ],
            ]
        );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
