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
        for ($i=0; $i < 12; $i++) 
        { 
            Appreciation::create([
                'content' => $faker->sentence(6),
                'category_id' => rand(1,5),
            ]);
        }
    }
}
