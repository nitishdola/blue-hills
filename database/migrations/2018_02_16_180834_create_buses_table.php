<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bus_name', 127);
            $table->string('bus_number', 10)->unique();
            $table->string('bus_type', 50);
            $table->integer('seat_layout_id', false, true);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('seat_layout_id', 'sl_fr')->references('id')->on('seat_layouts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
