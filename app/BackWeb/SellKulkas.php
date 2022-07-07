<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class SellKulkas extends Model
{
    protected $table = 'process_kulkas';

    protected $fillable = [
        'customers_id', 'brand', 'model', 'type', 'condition', 'kondisi_fisik', 'rubber', 'tutup_freezer', 'tray', 'ice_maker', 'price', 'lokasi_trade', 'voucher_id', 'jenis_layanan', 'status', 'note'
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
