<?php

namespace Database\Seeders;

use App\Functions\Helper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Faker\Generator as Faker;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<5; $i++){
            $new_type = new Type();
            $new_type->name = $faker->name();
            $new_type->slug = Helper::generateSlug($new_type->name, Type::class);

            $new_type->save();
        }

    }
}
