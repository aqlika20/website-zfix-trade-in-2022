<?php

namespace App\BackWeb\Partner;

use Illuminate\Database\Eloquent\Model;

class RegisterNewPartner extends Model
{

    protected $table = 'partners';

    protected $fillable = [
        'pic', 'address', 'contact_pic', 'partner_key', 'users_id'
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
        return $this->belongsTo('App\BackWeb\Setting\UserManagement');
    }

}
