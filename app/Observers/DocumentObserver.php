<?php

namespace App\Observers;

use App\Models\Document;
use App\Jobs\TranslateSlug;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class DocumentObserver
{
    public function saved(Document $document)
    {
        if ( ! $document->slug) {
            dispatch(new TranslateSlug($document));
        }
    }


}