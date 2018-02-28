<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('route_schedules', function (Blueprint $table) {
            $table->boolean('status')->after('end_time')->default(1)->commect('1 active, 2 disabled, 0 deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('route_schedules', function (Blueprint $table) {
            //
        });
    }
}
