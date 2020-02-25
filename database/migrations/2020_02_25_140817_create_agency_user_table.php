<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencyUserTable extends Migration
{
    public function up()
    {
        Schema::create('agency_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agency_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agency_user');
    }
}
