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


    public function type(){
        
        switch ($this->account_type_id) {
            case 1:
                return 'Bank Account';
            case 2:
                return 'Pocket Money';
            case 3:
                return 'PayPal Account';
            case 4:
                return 'Credit Card';
            case 5:
                return 'Meal Card';
            case 6:
                return 'Other';
        }
    }


    public function movement()
    {
        return $this->hasMany('App\Movement');
    }    

    public $timestamps = false;  
}
