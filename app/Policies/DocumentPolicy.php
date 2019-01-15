<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Document;

class DocumentPolicy extends Policy
{
    public function update(User $user, Document $document)
    {
        // return $document->user_id == $user->id;
        return $user->isAuthorOf($document);
    }

    public function destroy(User $user, Document $document)
    {
        return $user->isAuthorOf($document);
    }
}
