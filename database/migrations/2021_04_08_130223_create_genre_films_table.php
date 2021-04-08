<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenreFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_films', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id')->nullable();
            $table->unsignedBigInteger('genre_id')->nullable();
            $table->timestamps();
            $table->foreign('film_id')
                ->references('id')
                ->on('films')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_films');
    }
}
