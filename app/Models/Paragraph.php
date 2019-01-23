<?php

namespace App\Models;

class Paragraph extends Model
{
    protected $fillable = ['file_id', 'content', 'source_language_id', 'target_language_id', 'translation', 'translator_id', 'proofread_id', 'flag'];

    public function comments()
    {
    		return $this->hasMany(Comment::class);
    }
}
