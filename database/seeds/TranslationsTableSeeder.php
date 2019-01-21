<?php

use Illuminate\Database\Seeder;
use App\Models\Translation;

class TranslationsTableSeeder extends Seeder
{
    public function run()
    {
        $translations = factory(Translation::class)->times(50)->make()->each(function ($translation, $index) {
            if ($index == 0) {
                // $translation->field = 'value';
            }
        });

        Translation::insert($translations->toArray());
    }

}

