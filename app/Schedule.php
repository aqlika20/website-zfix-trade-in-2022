<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['workers_id', 'sites_id', 'locations_id', 'quarantine_start', 'quarantine_end', 'on_site_start', 'on_site_end', 'rota_off_start', 'rota_off_end'];
}
