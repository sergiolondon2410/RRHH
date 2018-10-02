<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetenceType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function competeces()
    {
        return $this->hasMany(Competence::class);
    }
}
