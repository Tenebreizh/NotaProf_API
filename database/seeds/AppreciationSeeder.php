<?php

use Illuminate\Database\Seeder;
use App\Appreciation;
use Faker\Generator as Faker;

class AppreciationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        factory('App\Appreciation',12)->create();
    }
}
