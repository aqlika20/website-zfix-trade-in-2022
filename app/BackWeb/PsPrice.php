<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class PsPrice extends Model
{
    protected $table = 'ps_price';

    protected $fillable = [
        'brand', 'storages', 'jenis_ps', 'type', 'priceGradeA', 'priceGradeB', 'priceGradeC'
    ];

    public function sell()
    {
        return $this->belongsTo('App\BackWeb\SellPs');
    }
}
