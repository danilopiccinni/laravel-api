<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $arrayProjects = config('projects');

        foreach($arrayProjects as $singleProject) {
            $newProject = new Project();

            $newProject->title = $singleProject['title'];
            $newProject->repo = $singleProject['repo'];
            $newProject->description = $singleProject['description'];
            $newProject->thumb = $singleProject['thumb'];
            $newProject->slug = Str::slug($singleProject['title'], '-');

            $newProject->save();


        // for($i=0; $i < 10; $i++) {

        //     $newProject = new Project();

        //     $newProject->title = $faker->sentence(2);
        //     $newProject->repo = $faker->word();
        //     $newProject->description = $faker->text();
        //     $newProject->languages = $faker->words(4 , true);
        //     $newProject->thumb = $faker->word();
        //     $newProject->slug = Str::slug($newProject->title, '-');

        //     $newProject->save();
        }
    }
}
