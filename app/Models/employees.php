<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class employees extends Model {
    
    public function getUserData(){
        return $this->hasOne(User::class, 'id' , 'user_id');
    }
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
        'last_login',
    ];
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'employes';

}
