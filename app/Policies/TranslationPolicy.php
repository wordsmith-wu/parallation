<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Translation;

class TranslationPolicy extends Policy
{
    public function update(User $user, Translation $translation)
    {
        // return $translation->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Translation $translation)
    {
        return true;
    }
}
