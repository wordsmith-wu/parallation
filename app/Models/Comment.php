<?php

namespace App\Models;

class Comment extends Model
{
    protected $fillable = ['paragraph_id', 'user_id', 'comment'];
}
