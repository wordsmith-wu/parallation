<?php

namespace App\Models;

class File extends Model
{
    protected $fillable = ['name', 'source_language_id', 'target_language_id', 'url', 'download_url', 'paragraphs_count', 'words_count', 'type', 'user_id', 'project_id', 'status', 'completed'];
}
