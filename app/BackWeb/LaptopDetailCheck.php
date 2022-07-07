<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class LaptopDetailCheck extends Model
{
    protected $table = 'laptop_detail_check';

    protected $fillable = [
        'inner_screen', 'outer_screen', 'addition', 'condition'
    ];
}
