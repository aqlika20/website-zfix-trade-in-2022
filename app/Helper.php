<?php

namespace App;

use App\Role;
use App\Bank;
use App\Site;
use App\Location;
use App\Worker;
use App\Privilege;

class Helper{

    public static function defineRoleBy($type, $value){
        switch($type){
            case 'id':
                $role = Role::where('id', $value)->first();
                break;
        }

        return $role;
    }

    public static function definePrivilegeBy($type, $value){
        switch($type){
            case 'id':
                $privilege = Privilege::where('id', $value)->first();
                break;
        }

        return $privilege;
    }

    public static function defineBankBy($type, $value){
        switch($type){
            case 'id':
                $bank = Bank::where('id', $value)->first();
                break;
        }

        return $bank;
    }

    public static function defineSiteBy($type, $value){
        switch($type){
            case 'id':
                $site = Site::where('id', $value)->first();
                break;
        }
        return $site;
    }

    public static function defineLocationBy($type, $value){
        switch($type){
            case 'id':
                $site = Location::where('id', $value)->first();
                break;
        }
        return $site;
    }

    public static function defineGenderBy($type, $value){
        switch($type){
            case 'identifier':
                $gender = Gender::where('identifier', $value)->first();
                break;
            case 'id':
                $gender = Gender::where('id', $value)->first();
                break;
        }
        return $gender;
    }

    public static function defineDependentBy($type, $value){
        switch($type){
            case 'id':
                $dependent = Dependent::where('id', $value)->first();
                break;
        }
        return $dependent;
    }

    public static function defineTradeBy($type, $value){
        switch($type){
            case 'id':
                $trade = Trade::where('id', $value)->first();
                break;
        }
        return $trade;
    }

    public static function defineBadgeIDBy($type, $value){
        switch($type){
            case 'badge_id':
                $worker_id = Worker::where('badge_id', $value)->first();
                break;
        }
        return $worker_id;
    }

    public static function convertToRupiah($number){
        $number = 'Rp ' . number_format($number, 0, ',', '.');

        return $number;
    }

    public static function convertDate($date){
        $date = date('d-m-yy', strtotime($date));

        return $date;
    }

}