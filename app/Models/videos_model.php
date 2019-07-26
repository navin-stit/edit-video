<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class videos_model extends Model
{
     protected $fillable = [
        'links',        
        'name',        
        'description',        
    ];
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'videos';
}
