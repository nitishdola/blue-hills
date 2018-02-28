<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('route_id', false, true);
            $table->string('start_time', 80);
            $table->string('end_time', 80);
            $table->timestamps();

            $table->foreign('route_id', 'rt_fr')->references('id')->on('routes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route_schedules');
    }
}
