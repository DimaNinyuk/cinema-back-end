<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyingSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buying_seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seat_id')->nullable();
            $table->unsignedBigInteger('buying_id')->nullable();
            $table->foreign('seat_id')->references('id')->on('seats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('buying_id')->references('id')->on('buyings')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('buying_seats');
    }
}
