<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{ 

    use SoftDeletes;
    public $timestamps = false;

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
