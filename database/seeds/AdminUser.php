<?php

use Illuminate\Database\Seeder;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
	      array('name'=>'Admin', 'email' => 'admin@bluehills.com', 'password' => bcrypt('password@blue')),
	    )); 
    }
}
