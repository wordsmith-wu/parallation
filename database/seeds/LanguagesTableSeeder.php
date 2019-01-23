<?php

use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Models\User;

class LanguagesTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $creation_id = $user->id;
        $languages = [
        	['code' => 'en',
        	'description' => 'English',
            'creation_id' => $creation_id,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")],
        	['code' => 'zh',
        	'description' => 'Chinese',
            'creation_id' => $creation_id,
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")],
        ];

        Language::insert($languages);
    }

}

