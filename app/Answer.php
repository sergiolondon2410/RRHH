<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'measure_id', 'question_id', 'application_id'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function measure()
    {
        return $this->belongsTo(Measure::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
