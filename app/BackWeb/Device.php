<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'device';

    protected $fillable = [
        'brand', 'ram', 'storage', 'priceGradeA', 'priceGradeB', 'priceGradeC'
    ];

    public function sellphone()
    {
        return $this->belongsTo('App\BackWeb\SellPhone');
    }
}
