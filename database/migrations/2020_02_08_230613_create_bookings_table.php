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

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('office_id')->index();
            $table->foreign('office_id')->references('id')->on('offices')
                ->onDelete('cascade');

            $table->unsignedBigInteger('trip_id')->index();
            $table->foreign('trip_id')->references('id')->on('trips')
                ->onDelete('cascade');

            $table->integer('seats');
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
