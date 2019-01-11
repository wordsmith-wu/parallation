<?php

namespace App\Models;
use App\Models\User;
use App\Models\Category;


class Document extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'category_id', 'paragraphs_count', 'words_count', 'last_translator_id', 'order', 'slug'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
