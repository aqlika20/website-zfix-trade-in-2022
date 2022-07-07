<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class SellLaptop extends Model
{
    protected $table = 'process_laptop';

    protected $fillable = [
        'customers_id', 'brand', 'memory', 'storages', 'jenis_storage', 'lokasi_trade', 'kondisi_laptop', 'jenis_layar', 'baterai', 'kondisi_layar', 'kondisi_fisik', 'keyboard', 'trackpad', 'port', 'wifi', 'camera', 'speaker', 'processor', 'ukuran_laptop', 'os', 'inner_screen', 'outer_screen', 'condition', 'addition', 'more_addition', 'price', 'jenis_layanan', 'voucher_id', 'status', 'note'
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
