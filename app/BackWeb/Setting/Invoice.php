<?php

namespace App\BackWeb\Setting;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    protected $fillable = [
        'partner_id', 'nomor_invoice'
    ];

    protected $date = [
        'created_at', 'updated_at'
    ];
}
