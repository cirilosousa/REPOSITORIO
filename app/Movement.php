<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Movement extends Model
{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'id',
        'account_id', 
        'movement_category_id', 
        'date', 
        'value', 
        'start_balance', 
        'end_balance',
        'description',
        'type',
        'document_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',  
    ];     

    public function type()
    {
        switch ($this->movement_category_id ) {
            case 1:
                return 'Food';
            case 2:
                return 'Clothes';
            case 3:
                return 'Services';
            case 4:
                return 'Electricity';
            case 5:
                return 'Phone';
            case 6:
                return 'Fuel';
            case 7:
                return 'Insurance';
            case 8:
                return 'Entertainment';
            case 9:
                return 'Culture';
            case 10:
                return 'Trips';
            case 11:
                return 'Mortgage payment';
            case 12:
                return 'Salary';
            case 13:
                return 'Bonus';
            case 14:
                return 'Royalties';
            case 15:
                return 'Interests';
            case 16:
                return 'Gifts';
            case 17:
                return 'Dividends';
            case 18:
                return 'Product sales';
        }
    }

    public function document()
    {
        return $this->belongsTo('App\Document');
    }

    public function movement_categorie()
    {
        return $this->belongsTo('App\Movement_categorie');
    }

    public function account()
    {
        return $this->belongsTo('App\Account', 'account_id');
    }

}
