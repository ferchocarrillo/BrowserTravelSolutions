<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CityRecord extends Model
{

    protected $fillable = [
        'ciudad',
        'tiempo',
        'temperatura',
        'pronostico'
    ];


}
