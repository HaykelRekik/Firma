<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'room_id',
        'type',
        'max_value',
       
    ];
}
