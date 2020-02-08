<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('from_city_id');
            $table->foreign('from_city_id')->references('id')->on('cities');

            $table->unsignedBigInteger('to_city_id');
            $table->foreign('to_city_id')->references('id')->on('cities');

            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id')->references('id')->on('offices');

            $table->dateTime('depart');
            $table->string('seats');
            $table->string('status');
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
        Schema::dropIfExists('bookings');
    }
}
