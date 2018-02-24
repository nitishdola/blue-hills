<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bus_id', false, true);
            $table->integer('route_id', false, true);
            $table->timestamps();

            $table->foreign('bus_id', 'busr_fr')->references('id')->on('buses');
            $table->foreign('route_id', 'route_fr')->references('id')->on('routes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_routes');
    }
}
