<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguagesTableSeeder extends Seeder
{
    public function run()
    {
        $languages = factory(Language::class)->times(50)->make()->each(function ($language, $index) {
            if ($index == 0) {
                // $language->field = 'value';
            }
        });

        Language::insert($languages->toArray());
    }

}

