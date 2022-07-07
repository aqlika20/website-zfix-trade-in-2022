<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class MesinCuciPrice extends Model
{
    protected $table = 'mesin_cuci_price';
 
    protected $fillable = [
        'brand','type', 'priceGradeA', 'priceGradeB', 'priceGradeC'
    ];

    public function sell()
    {
        return $this->belongsTo('App\BackWeb\SellTv');
    }
}
