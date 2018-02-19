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
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('source_city', false, true);
            $table->integer('destination_city', false, true);
            $table->integer('journey_duration', false, true)->comment('Journey Duration in Seconds ');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('source_city', 'src_fr')->references('id')->on('cities');
            $table->foreign('destination_city', 'dest_fr')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
