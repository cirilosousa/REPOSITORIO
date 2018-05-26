<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Associate_member extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'main_user_id', 'associate_user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */ 
    protected $hidden = [
        'created_at',
    ];

}
