<?php

namespace App\Observers;

use App\Models\Document;
use App\Handlers\SlugTranslateHandler;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class DocumentObserver
{
    public function saving(Document $document)
    {
        if ( ! $document->slug) {
            $document->slug = app(SlugTranslateHandler::class)->translate($document->title);
        }
    }


}