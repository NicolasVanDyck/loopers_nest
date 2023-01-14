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
                    'name'       => 'action',
                    'created_at' => now()
                ],

                [
                    'name'       => 'adventure',
                    'created_at' => now()
                ],

                [
                    'name'       => 'animation',
                    'created_at' => now()
                ],

                [
                    'name'       => 'comedy',
                    'created_at' => now()
                ],

                [
                    'name'       => 'crime',
                    'created_at' => now()
                ],

                [
                    'name'       => 'documentary',
                    'created_at' => now()
                ],

                [
                    'name'       => 'drama',
                    'created_at' => now()
                ],

                [
                    'name'       => 'family',
                    'created_at' => now()
                ],

                [
                    'name'       => 'fantasy',
                    'created_at' => now()
                ],

                [
                    'name'       => 'history',
                    'created_at' => now()
                ],

                [
                    'name'       => 'horror',
                    'created_at' => now()
                ],

                [
                    'name'       => 'music',
                    'created_at' => now()
                ],

                [
                    'name'       => 'mystery',
                    'created_at' => now()
                ],

                [
                    'name'       => 'romance',
                    'created_at' => now()
                ],

                [
                    'name'       => 'science Fiction',
                    'created_at' => now()
                ],

                [
                    'name'       => 'tV Movie',
                    'created_at' => now()
                ],

                [
                    'name'       => 'thriller',
                    'created_at' => now()
                ],

                [
                    'name'       => 'war',
                    'created_at' => now()
                ],

                [
                    'name'       => 'western',
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
