<?php

use Illuminate\Database\Seeder;
use App\Models\Term;

class TermsTableSeeder extends Seeder
{
    public function run()
    {
        $terms = factory(Term::class)->times(50)->make()->each(function ($term, $index) {
            if ($index == 0) {
                // $term->field = 'value';
            }
        });

        Term::insert($terms->toArray());
    }

}

