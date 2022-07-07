<?php

namespace App\BackWeb\Setting;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';

    protected $fillable = [
        'customers_id', 'title', 'type', 'description', 'read'
    ];

    protected $date = [
        'created_at', 'updated_at'
    ];

    public function users()
    {
        return $this->belongsTo('App\BackWeb\Setting\UserManagement', 'customers_id');
    }

}
