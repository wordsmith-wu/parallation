<?php

use Illuminate\Database\Seeder;
use App\Models\Document;

class DocumentsTableSeeder extends Seeder
{
    public function run()
    {
        $documents = factory(Document::class)->times(50)->make()->each(function ($document, $index) {
            if ($index == 0) {
                // $document->field = 'value';
            }
        });

        Document::insert($documents->toArray());
    }

}

