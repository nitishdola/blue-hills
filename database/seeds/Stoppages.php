<?php

use Illuminate\Database\Seeder;

class Stoppages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city_stoppages')->insert(array(
	      array('name'=>'Paltan Bazar',  'city_id' => '1', 'time_difference' => '-3600', 'is_end_point' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

	      array('name'=>'ISBT Guwahati', 'city_id' => '1', 'time_difference' => '0', 'is_end_point' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

	      array('name'=>'Khanapara',     'city_id' => '1', 'time_difference' => '1800', 'is_end_point' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

	      array('name'=>'Itanagar',     'city_id' => '4', 'time_difference' => '0', 'is_end_point' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),
	      
	      array('name'=>'Tezu',     	'city_id' => '5', 'time_difference' => '0', 'is_end_point' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),

	      array('name'=>'Roing',     	'city_id' => '6', 'time_difference' => '0', 'is_end_point' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')),


	    )); 
    }
}
