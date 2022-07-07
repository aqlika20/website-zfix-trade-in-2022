<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class SellTv extends Model
{
    protected $table = 'process_tv';

    protected $fillable = [
        'customers_id', 'brand', 'jenis_tv', 'inch', 'lokasi_trade', 'inner_screen', 'outer_screen', 'addition', 'condition', 'wifi', 'suara', 'port', 'kondisi_tv', 'kondisi_layar', 'price', 'voucher_id', 'jenis_layanan', 'status', 'note',
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
