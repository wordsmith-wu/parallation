<?php

namespace App\Observers;

use App\Models\File;
use App\Jobs\TranslateFile;
use App\Jobs\TranslateSlug;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class FileObserver
{
		public function saved(File $file)
		{
			$paras = file($file->path);
			foreach ($paras as $content){
					\DB::table('paragraphs')->insert([
						'file_id' => $file->id,
						'content' => $content,
						'source_language_id' => $file->source_language_id,
						'target_language_id' => $file->target_language_id,
					]
				);
			}

    	// if (! $file->slug){
    	// 	dispatch(new TranslateSlug($file));
    	// }
    				
    	dispatch(new TranslateFile($file));



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