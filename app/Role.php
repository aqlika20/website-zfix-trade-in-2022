<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['sites_id', 'locations_id', 'name', 'rate_hour', 'rate_overtime', 'rate_quarantine'];
}
