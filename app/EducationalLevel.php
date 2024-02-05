<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalLevel extends Model
{
    protected $table = 'educational_levels';

    protected $fillable = [
        // other fillable fields...
        'price_limit',
    ];

    public $timestamps = false;
}
