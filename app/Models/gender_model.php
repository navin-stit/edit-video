<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gender_model extends Model
{
   protected $fillable = [
        'gender',      
       ];
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'gender';
}
