<?php

namespace Database\Seeders;

use App\Functions\Helper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
use Faker\Generator as Faker;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<30; $i++){
            $new_project = new Project();
            $new_project->type_id = Type::inRandomOrder()->first()->id;
            $new_project->name = $faker->name();
            $new_project->version = $faker->randomFloat(2, 3, 5);
            $new_project->description = $faker->words(300,true);
            $new_project->date_updated = $faker->date();
            $new_project->slug = Helper::generateSlug($new_project->name, Project::class);

            $new_project->save();
        }

    }
}
