<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password_reset extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token',
        'created_at',  
    ];   
}
