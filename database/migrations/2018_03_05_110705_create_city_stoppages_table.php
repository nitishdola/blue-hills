<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityStoppagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_stoppages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 127);
            $table->integer('city_id',false, true);
            $table->integer('time_difference')->comment('in seconds');
            $table->boolean('is_end_point')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('city_id', 'city_idfr')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_stoppages');
    }
}
