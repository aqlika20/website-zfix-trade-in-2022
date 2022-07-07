<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class DeviceCheck extends Model
{
    protected $table = 'device_check';

    protected $fillable = [
        'process_id', 'screen_has_problem', 'wifi_has_problem', 'camera_has_problem', 'button_has_problem', 'price'
    ];
    
    protected $date = [
        'created_at', 'updated_at'
    ];

    public function sell()
    {
        return $this->belongsTo('App\BackWeb\Sell');
    }

    public function device()
    {
        return $this->belongsTo('App\BackWeb\device');
    }
}
