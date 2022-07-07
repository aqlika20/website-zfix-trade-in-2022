<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class TvDetailCheck extends Model
{
    protected $table = 'tv_detail_check';

    protected $fillable = [
        'inner_screen', 'outer_screen', 'addition', 'condition'
    ];
}
