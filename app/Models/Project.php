<?php

namespace App\Models;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'slug'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function documents()
    {
    	return $this->hasMany(Document::class);
    }
}
