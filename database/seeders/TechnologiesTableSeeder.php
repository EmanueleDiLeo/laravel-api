<?php

namespace Database\Seeders;

use App\Functions\Helper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<11; $i++){
            $new_technology = new Technology();
            $new_technology->name = $faker->name();
            $new_technology->version = $faker->randomFloat(2, 3, 5);
            $new_technology->description = $faker->words(200,true);
            $new_technology->date_updated = $faker->date();
            $new_technology->slug = Helper::generateSlug($new_technology->name, Technology::class);

            $new_technology->save();
        }

    }
}
