<?php

namespace App\Models;

class Document extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'category_id', 'paragraphs_count', 'words_count', 'last_translator_id', 'order', 'slug'];
}
