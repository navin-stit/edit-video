<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subscribe_member_model extends Model
{
    
   protected $fillable = [
       
        'video_type',      
     ];
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'subscribemembers';
}
