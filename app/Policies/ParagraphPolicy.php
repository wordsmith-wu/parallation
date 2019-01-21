<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Paragraph;

class ParagraphPolicy extends Policy
{
    public function update(User $user, Paragraph $paragraph)
    {
        // return $paragraph->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Paragraph $paragraph)
    {
        return true;
    }
}
