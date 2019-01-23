<?php

namespace App\Models;

class Comment extends Model
{
    protected $fillable = ['comment'];

    public function paragraph()
    {
    		return $this-belongsTo(Paragraph::class);
    }

    public function user()
    {
    		return $this-belongsTo(User::calss);
    }
}
