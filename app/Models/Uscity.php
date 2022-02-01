<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable=[
    'city',
    'city_ascii',
    'state_id',
    'state_name',
    'county_fips',
    'county_name',
    'lat',
    'lng',
    'population',
    'density',
    'source',
    'military',
    'incorporated',
    'timezone',
    'ranking',
    'zips',
    'idd',
];
}
