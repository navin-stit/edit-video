<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class masters_model extends Model
{
     protected $fillable = [
        'img',        
        'image_size',
        'description',
        
    ];
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'masters';
}
