<?php

namespace App\BackWeb;

use Illuminate\Database\Eloquent\Model;

class SellMesinCuci extends Model
{
    protected $table = 'process_mesin_cuci';

    protected $fillable = [
        'customers_id', 'brand', 'type', 'condition', 'kondisi_fisik', 'rubber', 'tutup', 'tombol', 'pembuangan', 'pengering', 'air_otomatis', 'pemanas', 'lokasi_trade', 'price', 'voucher_id', 'jenis_layanan', 'status', 'note'
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
