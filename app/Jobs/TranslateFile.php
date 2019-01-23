<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\File;
use App\Models\Language;
use App\Models\Paragraph;
use App\Handlers\TranslationHandler;

class TranslateFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $file;
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        foreach ($this->file->paragraphs as $paragraph){
            $translation = app(TranslationHandler::class)->niuTranslate($paragraph->content,Language::find($paragraph->source_language_id)->code,Language::find($paragraph->target_language_id)->code);
            \DB::table('paragraphs')->where('id',$paragraph->id)->update(['translation'=>$translation]);
        }

    }
}
