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
        // Create fake categories
        $this->call('CategorySeeder');

        // Create fake appreciations
        $this->call('AppreciationSeeder');
    }
}
