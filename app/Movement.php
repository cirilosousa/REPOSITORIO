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
