<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class SellPhone extends Model
{

    protected $table = 'process_phone';

    protected $fillable = [
        'customers_id','brand', 'ram', 'storages', 'screen_has_problem', 'wifi_has_problem', 'camera_has_problem', 'button_has_problem', 'price', 'jenis_layanan', 'finger', 'vibration', 'lokasi_trade'
    ];

    protected $date = [
        'created_at', 'updated_at'
    ];
    
    public function users()
    {
        return $this->belongsTo('App\BackWeb\Setting\UserManagement', 'customers_id');
    }

    public function vouchers()
    {
        return $this->belongsTo('App\BackWeb\Partner\Voucher', 'voucher_id');
    }
}
