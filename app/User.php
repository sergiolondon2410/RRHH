<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'user_type_id', 'organization_id', 'document', 'profile_img', 'boss_id', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function store()
    // {

    // }

    public function user_type()
    {
        return $this->belongsTo(UserType::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function fullname()
    {
        return $this->name.' '.$this->last_name;
    }
}
