<?php

namespace App\Models;
use App\Models\music_model;
use App\Models\gender_model;
use App\Models\videos_model;
use App\Models\masters_model;
use Illuminate\Database\Eloquent\Model;

class customer_orders_model extends Model
{
    
    public function getVideos(){
        return $this->hasOne(videos_model::class, 'id' , 'video_id');
    }
    public function getGender(){
        return $this->hasOne(gender_model::class, 'id' , 'gender');
    }
    public function getMusic(){
        return $this->hasOne(music_model::class, 'id' , 'music');
    }
    public function getImageData(){
        return $this->hasOne(masters_model::class, 'id' , 'image_id');
    }


    
     protected $fillable = [
        'image',
        'image_description',
        'image_size',
        'gender',
        'music',
        'music_type',
        'logo',
        'product_link',
        'customer_id',
        'video_id',
    ];
   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'customer_orders';
}
