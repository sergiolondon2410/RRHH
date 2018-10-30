<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'user_id', 'evaluator_id', 'status', 'evaluation_id'
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evaluator()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function answer($question_id)
    {
        return $this->hasMany(Answer::class)->where('question_id', $question_id)->first();
    }

    public function answersCompetence()
    {
        return $this->hasMany(Answer::class)->questionCompetence();
    }
}
