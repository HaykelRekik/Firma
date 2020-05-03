<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'maxtemperature',
        'maxhumidity',
       
        
        

    ];
//     public function user()
//     {
//         return $this->belongsTo('App\User');
//     }
// }
}