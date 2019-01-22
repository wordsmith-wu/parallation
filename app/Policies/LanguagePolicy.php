<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Language;

class LanguagePolicy extends Policy
{
    public function update(User $user, Language $language)
    {
        // return $language->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Language $language)
    {
        return true;
    }
}
