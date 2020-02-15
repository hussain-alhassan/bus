<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInitialExtraUserColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->dateTime('birth_date')->nullable();
            $table->string('phone')->nullable();

            $table->string('national_id')->nullable();
            $table->dateTime('national_id_exp_date')->nullable();
            $table->string('national_id_issuance_city')->nullable();

            $table->string('passport_id')->nullable();
            $table->dateTime('passport_exp_date')->nullable();
            $table->string('passport_issuance_city')->nullable();

            $table->string('igama_id')->nullable();
            $table->dateTime('igama_exp_date')->nullable();
            $table->string('igama_issuance_city')->nullable();
            $table->char('role', 1)->default('t');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
