<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class KulkasPrice extends Model
{
    protected $table = 'kulkas_price';
 
    protected $fillable = [
        'brand', 'model', 'type', 'priceGradeA', 'priceGradeB', 'priceGradeC'
    ];

    public function sell()
    {
        return $this->belongsTo('App\BackWeb\SellKulkas');
    }
}
