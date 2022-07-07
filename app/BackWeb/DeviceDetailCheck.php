<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class DeviceDetailCheck extends Model
{
    protected $table = 'device_detail_check';

    protected $fillable = [
        'screen_has_problem', 'wifi_has_problem', 'camera_has_problem', 'button_has_problem'
    ];

}
