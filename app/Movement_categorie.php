<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement_Categorie extends Model
{
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
          
    ];   

    public function movement()
    {
        return $this->hasMany('App\Movement');
    }    

    public $timestamps = false;  
}
