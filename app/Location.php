<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['sites_id', 'name', 'pic', 'pic_number', 'address', 'created_at', 'updated_at'];
}
