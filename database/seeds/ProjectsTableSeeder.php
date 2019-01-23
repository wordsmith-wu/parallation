<?php

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {

        $countries = ['墨西哥','印尼','土耳其','埃及'];
        $sizes = ['2500','8000','4000'];
        $types = ['空分','液化装置'];
        $names = array();



		$user_ids = User::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $projects = array();

        foreach ($countries as $country){
            foreach ($sizes as $size){
                foreach ($types as $type){
                    $project = ['name'=>$country . $size . $type,
                                'description'=>$faker->text(),
                                'user_id'=>$faker->randomElement($user_ids),
                                'created_at'=>date("Y-m-d h:i:s"),
                                'updated_at'=>date("Y-m-d h:i:s")];
                    array_push($projects, $project);
                }
            }
        }

        Project::insert($projects);
    }

}

