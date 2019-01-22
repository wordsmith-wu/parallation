<?php

namespace App\Observers;

use App\Models\File;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class FileObserver
{
		public function saved(File $file)
		{
				$file_id = $file->id;
				$source_language_id = $file->source_language_id;
				$target_language_id = $file->target_language_id;
				$paras = file($file->url);
				foreach ($paras as $content){
						\DB::table('paragraphs')->insert([
							'file_id' => $file_id,
							'content' => $content,
							'source_language_id' => $source_language_id,
							'target_language_id' => $target_language_id,
						]
					);
				}
		}

    public function creating(File $file)
    {
        //
    }

    public function updating(File $file)
    {
        //
    }
}