<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ClimaController;

class Clima extends Model
{
    use HasFactory;
    protected $table = 'city_records';
}
