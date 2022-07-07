<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class TvPrice extends Model
{
    protected $table = 'tv_price';
 
    protected $fillable = [
        'brand', 'jenis_tv', 'inch', 'priceGradeA', 'priceGradeB', 'priceGradeC'
    ];

    public function sell()
    {
        return $this->belongsTo('App\BackWeb\SellTv');
    }
}
