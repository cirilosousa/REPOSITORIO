<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'type',
        'original_name',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',  
    ];    

    public function movement()
    {
        return $this->hasMany('App\Movement', 'id');
    }
}
