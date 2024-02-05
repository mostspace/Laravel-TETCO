<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalLevel extends Model
{
    protected $table = 'educational_levels';

    protected $fillable = [
        'level_name',
        'price_limit',
    ];
}
