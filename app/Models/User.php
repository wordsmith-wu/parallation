<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;

use Spatie\Permission\Traits\HasRoles;

use App\Models\Document;


class User extends Authenticatable implements MustVerifyEmailContract
{
		use HasRoles;
    use Notifiable, MustVerifyEmailTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','introduction','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }
}
