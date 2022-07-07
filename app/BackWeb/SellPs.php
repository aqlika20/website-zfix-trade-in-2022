<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class SellPs extends Model
{
    protected $table = 'process_ps';

    protected $fillable = [
        'customers_id', 'brand', 'type', 'model', 'storages', 'lokasi_trade', 'addition', 'condition', 'kondisi_ps', 'body', 'console', 'port', 'add_games', 'price', 'voucher_id', 'jenis_layanan', 'status', 'note', 'more_addition', 'jenis_ps'
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
