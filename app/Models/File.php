<?php

namespace App\Models;

class File extends Model
{
    protected $fillable = ['name', 'source_language_id', 'target_language_id', 'url', 'path','download_url', 'paragraphs_count', 'words_count', 'type', 'user_id', 'project_id', 'status', 'completed'];

    public function paragraphs()
    {
    		return $this->hasMany(Paragraph::class);
    }

    public function user()
    {
    		return $this->belongsTo(User::class);
    }

    public function project()
    {
    		return $this->belongsTo(Project::class);
    }    
}
