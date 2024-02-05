<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';

    protected $fillable = [
        'school_id',
        'edu_level',
        'grade',
        'seats',
        'actual_price'
    ];
}
