<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class HandphonePrice extends Model
{
    protected $table = 'handphone_price';
 
    protected $fillable = [
        'brand', 'storage', 'ram', 'priceGradeA', 'priceGradeB', 'priceGradeC'
    ];

    public function sell()
    {
        return $this->belongsTo('App\BackWeb\SellPhone');
    }
}
