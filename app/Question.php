<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'text', 'competence_id', 'scale_id', 'evaluation_type_id'
    ];

    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function scale()
    {
        return $this->belongsTo(Scale::class);
    }

    public function evaluationType()
    {
        return $this->belongsTo(EvaluationType::class);
    }

    public function evaluations()
    {
        return $this->belongsToMany(Evaluation::class);
    }
}
