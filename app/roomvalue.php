<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roomvalue extends Model
{
    protected $fillable  = ['room_id','temperature','humidity','motion'];
}
