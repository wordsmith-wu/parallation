<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Document;

class DocumentPolicy extends Policy
{
    public function update(User $user, Document $document)
    {
        // return $document->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Document $document)
    {
        return true;
    }
}
