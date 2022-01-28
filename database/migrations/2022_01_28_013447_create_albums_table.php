<?php

use Database\Seeders\DatabaseSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('name_string');
            $table->enum('albumType_string', ['single', 'ep', 'album', 'cd']);
            $table->decimal('price_decimal');
            $table->enum('gender_enum', ['eletronica', 'rock', 'alternativo','pop', 'ambiente', 'filme', 'acustico', 'funk', 'classico', 'reggae', 'podcasts', 'sertanejo', 'blues', 'kids', 'audiobooks']);
            $table->string('description_string');
            $table->time('duration_time');
            $table->date('release_date');
            $table->string('tags_string');
            $table->integer('amount_purchases_int');
            $table->integer('amount_played_int');
            $table->string('cover_uri_string');
            $table->string('album_spotify_uri_string');
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
        Schema::dropIfExists('album');
    }
}
