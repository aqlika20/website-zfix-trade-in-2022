<?php

namespace App\BackWeb\Partner;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';

    protected $fillable = [
        'voucher_key', 'status', 'partners_id'
    ];

    protected $date = [
        'created_at', 'updated_at'
    ];

    public function partners()
    {
        return $this->belongsTo('App\BackWeb\Partner\Partner');
    }
}
