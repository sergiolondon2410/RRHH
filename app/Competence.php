<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $fillable = [
        'name', 'description', 'color', 'competence_type_id'
    ];

    public function competence_type()
    {
        return $this->belongsTo(CompetenceType::class);
    }

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }
}