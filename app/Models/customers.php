<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{

    public function getUserData(){
        return $this->hasOne(User::class, 'id' , 'user_id');
    }


    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name'
        ,'image',
        'user_id',
         'last_login',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $table='customers';
}
