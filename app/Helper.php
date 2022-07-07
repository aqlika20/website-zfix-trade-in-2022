<?php

namespace App;

use App\Role;
use App\Bank;
use App\Site;
use App\Location;
use App\Worker;
use App\Privilege;
use Carbon\Carbon;
use App\BackWeb\Partner\Voucher;

class Helper{

    // status process laptop

    public static $baru = 1;
    public static $process = 2;
    public static $tolak = 3;
    public static $selesai = 3;
    public static $rejected = -3;
    public static $approve = 4;

    // -----------------------------------
    
    public static function getVoucherKey($raw_partner_key) {
        $raw = date("l jS \of F Y h:i:s A").rand().Carbon::now();
        $raw = strtoupper(substr(md5($raw), 0, 6));
        $voucher_exist = Voucher::where([
            ['voucher_key', '=', $raw_partner_key.'-'.$raw]
        ])->first();
        if ($voucher_exist) {
            return getVoucherKey($raw_partner_key);
        }
        else {
            return $raw;
        }
    }

    public static function moneyFormat($number){
        // return 'Rp. ' . number_format((float) preg_replace('/[.,]/', '', $number), 0, ',', '.');
        return number_format((float) preg_replace('/[.,]/', '', $number), 0, ',', '.');
    }

    public static function resetMoneyFormat($number){
        // return 'Rp. ' . number_format((float) preg_replace('/[.,]/', '', $number), 0, ',', '.');
        return str_replace("Rp", "", str_replace(".", "", $number));
    }

    public static function capitalize($text){
        return ucwords($text);
    }

}