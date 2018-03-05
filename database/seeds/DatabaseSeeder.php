<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call('AdminUser');
        //$this->command->info("Admin Users table seeded :)"); 

        $this->call('Stoppages');
        $this->command->info("Stoppages table seeded :)");
    }
}
