<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Term;

class TermPolicy extends Policy
{
    public function update(User $user, Term $term)
    {
        // return $term->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Term $term)
    {
        return true;
    }
}
