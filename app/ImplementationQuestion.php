<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImplementationQuestion extends Model
{
    //

    public function implementation()
    {
        return $this->belongsTo(Implementation::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
