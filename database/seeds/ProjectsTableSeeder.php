<?php

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {

    		$user_ids = User::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $projects = factory(Project::class)->times(8)->make()->each(function ($project, $index)
                            use ($user_ids, $faker)
        {
        		$project->user_id = $faker->randomElement($user_ids);
        });

        Project::insert($projects->toArray());
    }

}

