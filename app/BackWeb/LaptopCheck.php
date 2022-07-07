<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class LaptopCheck extends Model
{
    protected $table = 'laptop_check';

    protected $fillable = [
        'process_id', 'price', 'inner_screen', 'outer_screen', 'condition', 'addition'
    ];

    protected $date = [
        'created_at', 'updated_at'
    ];

    public function sell()
    {
        return $this->belongsTo('App\BackWeb\Sell');
    }
}
