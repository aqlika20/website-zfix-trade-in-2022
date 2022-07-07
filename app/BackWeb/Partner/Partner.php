<?php

namespace App\BackWeb\Partner;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{

    protected $table = 'partners';

    protected $fillable = [
       'name', 'pic', 'address', 'contact', 'partner_key', 'users_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $date = [
        'created_at', 'updated_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function users()
    {
        return $this->belongsTo('App\BackWeb\Setting\UserManagement', 'users_id');
    }

}
