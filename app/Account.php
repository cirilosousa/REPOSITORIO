<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{ 
    protected $fillable = [
        'id', 
        'owner_id', 
        'account_type_id',
        'date',
        'code',
        'description',
        'start_balance',
        'current_balance',
        'last_movement_date',
    ];
    
    protected $hidden = [
        'deleted_at',
        'created_at'    
    ];    
  
  public function type()
    {
        switch ($this->type) {
            case 0:
                return 'Bank Account';
            case 1:
                return 'Pocket Money';
            case 2:
                return 'PayPal Account';
            case 3:
                return 'Credit Card';
            case 4:
                return 'Meal Card';
            case 5:
                return 'Other';
        }
    }

    public function movements()
    {
        return $this->hasMany('App\Movement');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function account_type()
    {
        return $this->belongsTo('App\Account_type', 'id');
    }


}
