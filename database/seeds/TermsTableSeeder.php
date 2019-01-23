<?php

use Illuminate\Database\Seeder;
use App\Models\Term;

class TermsTableSeeder extends Seeder
{
    public function run()
    {
		$source = '/home/wordsmith/Code/parallation/public/uploads/files/terms.txt';
		$lines = file($source);
		$terms = array();
		foreach ($lines as $line)
		{
			$split = explode('	',$line);
			$term = ['creation_id'=>1,
				'source_language_id'=>2,
				'target_language_id'=>1,
				'source_text'=>$split[0],
				'target_text'=>$split[1],
				'created_at'=>date("Y-m-d h:i:s"),
				'updated_at'=>date("Y-m-d h:i:s")
			];
			array_push($terms, $term);
		}

        Term::insert($terms);
    }

}

