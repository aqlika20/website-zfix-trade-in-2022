<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class LaptopPrice extends Model
{
    protected $table = 'laptop_price';

    protected $fillable = [
        'brand', 'memory', 'storages', 'priceGradeA', 'priceGradeB', 'priceGradeC', 'jenis_storage', 'processor', 'os', 'ukuran_laptop'
    ];

    public function sell()
    {
        return $this->belongsTo('App\BackWeb\Sell');
    }
}
