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
            $table->longText('overview');
            $table->string('cover')->nullable();
            $table->timestamps();
        });
        // Insert some records (inside up-function, after create method)
        DB::table('movies')->insert(
            [
                [
                    'genre_id'     => 15,
                    'title'        => 'Avatar: The Way of Water',
                    'tmdb_id'      => 76600,
                    'price'        => 10.99,
                    'release_date' => '2022-12-14',
                    'overview'     => "Set more than a decade after the events of the first film, learn the story of the Sully family (Jake, Neytiri, and their kids), the trouble that follows them, the lengths they go to keep each other safe, the battles they fight to stay alive, and the tragedies they endure.",
                    'cover'        => '/t6HIqrRAclMCA60NsSmeqe9RmNV.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => 1,
                    'title'        => 'Violent Night',
                    'tmdb_id'      => 899112,
                    'price'        => 9.99,
                    'release_date' => '2022-11-30',
                    'overview'     => "When a team of mercenaries breaks into a wealthy family compound on Christmas Eve, taking everyone inside hostage, the team isn’t prepared for a surprise combatant: Santa Claus is on the grounds, and he’s about to show why this Nick is no saint.",
                    'cover'        => '/1XSYOP0JjjyMz1irihvWywro82r.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => 2,
                    'title'        => 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe',
                    'tmdb_id'      => 411,
                    'price'        => 4.99,
                    'release_date' => '2005-12-07',
                    'overview'     => "Siblings Lucy, Edmund, Susan and Peter step through a magical wardrobe and find the land of Narnia. There, they discover a charming, once peaceful kingdom that has been plunged into eternal winter by the evil White Witch, Jadis. Aided by the wise and magnificent lion, Aslan, the children lead Narnia into a spectacular, climactic battle to be free of the Witch's glacial powers forever.",
                    'cover'        => '/iREd0rNCjYdf5Ar0vfaW32yrkm.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => 9,
                    'title'        => 'Troll',
                    'tmdb_id'      => 736526,
                    'price'        => 4.99,
                    'release_date' => '2022-12-01',
                    'overview'     => "Deep inside the mountain of Dovre, something gigantic awakens after being trapped for a thousand years. Destroying everything in its path, the creature is fast approaching the capital of Norway. But how do you stop something you thought only existed in Norwegian folklore?",
                    'cover'        => '/9z4jRr43JdtU66P0iy8h18OyLql.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => 1,
                    'title'        => 'Black Adam',
                    'tmdb_id'      => 436270,
                    'price'        => 5.99,
                    'release_date' => '2022-10-19',
                    'overview'     => "Nearly 5,000 years after he was bestowed with the almighty powers of the Egyptian gods—and imprisoned just as quickly—Black Adam is freed from his earthly tomb, ready to unleash his unique form of justice on the modern world.",
                    'cover'        => '/pFlaoHTZeyNkG83vxsAJiGzfSsa.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => 1,
                    'title'        => 'Avatar',
                    'tmdb_id'      => 19995,
                    'price'        => 4.99,
                    'release_date' => '2009-12-15',
                    'overview'     => "In the 22nd century, a paraplegic Marine is dispatched to the moon Pandora on a unique mission, but becomes torn between following orders and protecting an alien civilization.",
                    'cover'        => '/jRXYjXNq0Cs2TcJjLkki24MLp7u.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => 17,
                    'title'        => 'Savage Salvation',
                    'tmdb_id'      => 740952,
                    'price'        => 4.99,
                    'release_date' => '2022-12-02',
                    'overview'     => "Newly engaged Shelby John and Ruby Red want a fresh start after their struggles with addiction, but when Shelby discovers his beloved Ruby dead on their porch, he embarks on a vengeful killing spree of the dealers who supplied her. Armed with nothing but adrenaline and a nail gun, Shelby begins to unleash chaos on the town’s criminal underbelly, as he hunt’s down crime lord Coyote. Sheriff Church must race against the clock to put an end to Shelby's vigilante justice before the entire town descends into a bloodbath.",
                    'cover'        => '/fJRt3mmZEvf8gQzoNLzjPtWpc9o.jpg',
                    'created_at'   => now()
                ],
                [
                    'genre_id'     => 11,
                    'title'        => 'Prey for the Devil',
                    'tmdb_id'      => 676547,
                    'price'        => 10.99,
                    'release_date' => '2022-10-23',
                    'overview'     => "In response to a global rise in demonic possessions, the Catholic Church reopens exorcism schools to train priests in the Rite of Exorcism. On this spiritual battlefield, an unlikely warrior rises: a young nun, Sister Ann. Thrust onto the spiritual frontline with fellow student Father Dante, Sister Ann finds herself in a battle for the soul of a young girl and soon realizes the Devil has her right where he wants her.",
                    'cover'        => '/jXwYESgxqkXlYvoTyUTO2hqKK7T.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 1,
                    'title'        => 'The Woman King',
                    'tmdb_id'      => 724495,
                    'price'        => 4.99,
                    'release_date' => '2022-09-15',
                    'overview'     => "The story of the Agojie, the all-female unit of warriors who protected the African Kingdom of Dahomey in the 1800s with skills and a fierceness unlike anything the world has ever seen, and General Nanisca as she trains the next generation of recruits and readies them for battle against an enemy determined to destroy their way of life.",
                    'cover'        => '/438QXt1E3WJWb3PqNniK0tAE5c1.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 1,
                    'title'        => 'The Big 4',
                    'tmdb_id'      => 683328,
                    'price'        => 4.99,
                    'release_date' => '2022-12-19',
                    'overview'     => "A by-the-book female detective teams up with four down-on-their-luck assassins to investigate her father's murder.",
                    'cover'        => '/jrw684BhFJZ9Jac6KJda3hSQkxt.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 3,
                    'title'        => "Guillermo del Toro's Pinocchio",
                    'tmdb_id'      => 555604,
                    'price'        => 9.99,
                    'release_date' => '2022-11-09',
                    'overview'     => "During the rise of fascism in Mussolini's Italy, a wooden boy brought magically to life struggles to live up to his father's expectations.",
                    'cover'        => '/vx1u0uwxdlhV2MUzj4VlcMB0N6m.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 13,
                    'title'        => 'Glass Onion: A Knives Out Mystery',
                    'tmdb_id'      => 661374,
                    'price'        => 4.99,
                    'release_date' => '2022-11-23',
                    'overview'     => "World-famous detective Benoit Blanc heads to Greece to peel back the layers of a mystery surrounding a tech billionaire and his eclectic crew of friends.",
                    'cover'        => '/vDGr1YdrlfbU9wxTOdpf3zChmv9.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 3,
                    'title'        => 'Strange World',
                    'tmdb_id'      => 877269,
                    'price'        => 4.99,
                    'release_date' => '2022-11-23',
                    'overview'     => "A journey deep into an uncharted and treacherous land, where fantastical creatures await the legendary Clades—a family of explorers whose differences threaten to topple their latest, and by far most crucial, mission.",
                    'cover'        => '/jXGMJUq9zcrScs02qkQuCtmWwaI.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 1,
                    'title'        => 'My Name Is Vendetta',
                    'tmdb_id'      => 873126,
                    'price'        => 5.99,
                    'release_date' => '2022-11-30',
                    'overview'     => "After old enemies kill his family, a former mafia enforcer and his feisty daughter flee to Milan, where they hide out while plotting their revenge.",
                    'cover'        => '/7l3war94J4tRyWUiLAGokr3ViF2.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 3,
                    'title'        => 'A Frozen Rooster',
                    'tmdb_id'      => 573171,
                    'price'        => 4.99,
                    'release_date' => '2022-12-14',
                    'overview'     => "The rooster Toto has a new enemy: a pirate who plans to turn him into a cryogenically frozen rooster.",
                    'cover'        => '/gBBCBMXKzWRADtliUYfV69aVIcz.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 1,
                    'title'        => 'Black Panther: Wakanda Forever',
                    'tmdb_id'      => 505642,
                    'price'        => 4.99,
                    'release_date' => '2022-11-09',
                    'overview'     => "Queen Ramonda, Shuri, M’Baku, Okoye and the Dora Milaje fight to protect their nation from intervening world powers in the wake of King T’Challa’s death. As the Wakandans strive to embrace their next chapter, the heroes must band together with the help of War Dog Nakia and Everett Ross and forge a new path for the kingdom of Wakanda.",
                    'cover'        => '/sv1xJUazXeYqALzczSZ3O6nkH75.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 1,
                    'title'        => 'Detective Knight: Rogue',
                    'tmdb_id'      => 1024546,
                    'price'        => 4.99,
                    'release_date' => '2022-10-21',
                    'overview'     => "As Los Angeles prepares for Halloween, mask-wearing armed robbers critically wound detective James Knight’s partner in a shootout following a heist. With Knight in hot pursuit, the bandits flee L.A. for New York, where the detective’s dark past collides with his present case and threatens to tear his world apart…unless redemption can claim Knight first.",
                    'cover'        => '/2wj5iUJ2B5AQ1lFctJgUrHHsp9B.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 5,
                    'title'        => 'Lesson Plan',
                    'tmdb_id'      => 1049233,
                    'price'        => 3.99,
                    'release_date' => '2022-11-23',
                    'overview'     => "After a teacher dies, his best friend — a former cop — takes a job at the school where he worked to confront the gang he thinks was responsible.",
                    'cover'        => '/wawP3mOUeRBrAtnbPwWK5eFaMdV.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 17,
                    'title'        => 'The Independent',
                    'tmdb_id'      => 878183,
                    'price'        => 4.99,
                    'release_date' => '2022-11-02',
                    'overview'     => "It's the final weeks of the most consequential presidential election in history. America is poised to elect either its first female president or its first viable independent candidate. Reporting history as it's made, an idealistic young journalist teams up with her idol, legendary journalist Nick Booker, to uncover a conspiracy that places the fate of the election, and the country, in their hands.",
                    'cover'        => '/q8cHBw3y55Uotk2jGHfuRq2rnzK.jpg',
                    'created_at'   => now()
                ],

                [
                    'genre_id'     => 9,
                    'title'        => 'R.I.P.D. 2: Rise of the Damned',
                    'tmdb_id'      => 1013860,
                    'price'        => 4.99,
                    'release_date' => '2022-11-15',
                    'overview'     => "When Sheriff Roy Pulsipher finds himself in the afterlife, he joins a special police force and returns to Earth to save humanity from the undead.",
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
