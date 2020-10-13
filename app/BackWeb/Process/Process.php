<?php

namespace App\BackWeb\Process;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
   
    protected $table = 'processes';

    protected $fillable = [
        'users_id', 'vouchers_id', 'imei', 'phone_type', 'phone_manufacturer', 'phone_model', 'phone_ram', 'phone_storage', 'screen_has_problem', 'screen_image', 'status'
    ];

    protected $date = [
        'created_at', 'updated_at'
    ];

    public function users()
    {
        return $this->belongsTo('App\BackWeb\Setting\UserManagement');
    }

    public function vouchers()
    {
        return $this->belongsTo('App\BackWeb\Partner\GenerateVoucher');
    }

}
