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
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
        // Insert some genres (inside up-function, after create-method)
        DB::table('genres')->insert(
            [
                [
                    'name'       => 'Action',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Adventure',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Animation',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Comedy',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Crime',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Documentary',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Drama',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Family',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Fantasy',
                    'created_at' => now()
                ],

                [
                    'name'       => 'History',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Horror',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Music',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Mystery',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Romance',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Science Fiction',
                    'created_at' => now()
                ],

                [
                    'name'       => 'TV Movie',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Thriller',
                    'created_at' => now()
                ],

                [
                    'name'       => 'War',
                    'created_at' => now()
                ],

                [
                    'name'       => 'Western',
                    'created_at' => now()
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
        Schema::dropIfExists('genres');
    }
};
