<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name', 
        'email', 
        'password', 
        'admin', 
        'blocked', 
        'phone',
        'profile_photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'profile_settings',
        'remember_token',  
        'created_at',
        'updated_at',
    ];


    public function accounts()
    {
        return $this->hasMany('App\Account', 'owner_id');
    }

    public function associates()
    {
        return $this->belongsToMany('App\User', 'associate_members', 'main_user_id', 'associated_user_id');
    }

    public function associate_of()
    {
        return $this->belongsToMany('App\User', 'associate_members', 'associated_user_id', 'main_user_id');
    }

}
