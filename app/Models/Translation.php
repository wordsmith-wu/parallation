<?php

namespace App\Models;

class Translation extends Model
{
    protected $fillable = ['creation_id', 'change_id', 'usagecount', 'source_language', 'target_language', 'source', 'target'];
}
