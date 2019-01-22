<?php

namespace App\Models;

class Term extends Model
{
    protected $fillable = ['creation_id', 'change_id', 'usagecount', 'source_language_id', 'target_language_id', 'source_text', 'target_text'];
}
