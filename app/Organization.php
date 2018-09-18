<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //

    protected $fillable = [
        'name', 'taxes_id', 'phone', 'employee_quantity', 'logo_url'
    ];

}
