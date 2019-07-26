<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class music_model extends Model
{
   protected $fillable = [
        'music',      
     ];
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'music';
}
