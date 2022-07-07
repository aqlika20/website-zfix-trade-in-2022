<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class PsDetailCheck extends Model
{
    protected $table = 'ps_detail_check';

    protected $fillable = [
        'addition', 'condition'
    ];
}
