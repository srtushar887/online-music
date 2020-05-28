<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->integer('album_id')->nullable();
            $table->integer('artist_id')->nullable();
            $table->integer('genres_id')->nullable();
            $table->integer('language_id')->nullable();
            $table->integer('is_paid')->nullable();
            $table->text('demo_song')->nullable();
            $table->text('main_song')->nullable();
            $table->text('song_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
