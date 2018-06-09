<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_type extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];    

    public function account()
    {
        return $this->hasMany('App\Account');
    }

    public $timestamps = false;   
}