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
        'name', 'last_name', 'email', 'password', 'user_type_id', 'organization_id', 'document', 'profile_img', 'boss_id', 'level', 'position', 'area'
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

    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->last_name;
    }

    public function applications() //Son la aplicaciones en las que es evaluado
    {
        return $this->hasMany(Application::class);
    }

    public function evalapplications() //Son la aplicaciones en las que es evaluador (incluye autoevaluaciones)
    {
        return $this->hasMany(Application::class, 'evaluator_id');
    }
}
