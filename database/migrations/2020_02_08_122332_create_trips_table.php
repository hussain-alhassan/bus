<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trip_number');

            $table->unsignedBigInteger('agency_id')->index();
            $table->foreign('agency_id')->references('id')->on('agencies')
                ->onDelete('cascade');

            $table->unsignedBigInteger('from_city_id')->index();
            $table->foreign('from_city_id')->references('id')->on('cities')
                ->onDelete('cascade');

            $table->unsignedBigInteger('to_city_id')->index();
            $table->foreign('to_city_id')->references('id')->on('cities')
                ->onDelete('cascade');

            $table->dateTime('depart');
            $table->string('duration');
            $table->integer('available_seats');
            $table->integer('price');
            $table->boolean('is_wifi');
            $table->boolean('is_refreshment');
            $table->boolean('is_meal');
            $table->boolean('is_bathroom');
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
        Schema::dropIfExists('trips');
    }
}
