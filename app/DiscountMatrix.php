<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountMatrix extends Model
{
    protected $table = 'discount_matrix';

    protected $fillable = [
        // other fillable fields...
        'from',
        'to',
        'applied_discount'
    ];
}
