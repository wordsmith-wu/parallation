<?php

namespace App\Observers;

use App\Models\Document;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class DocumentObserver
{
    public function creating(Document $document)
    {
        //
    }

    public function updating(Document $document)
    {
        //
    }
}