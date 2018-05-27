<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
	protected $fillable = [
		'account_id',
        'movement_category_id',
        'date',
        'value',
        'start_balance',
        'end_balance',
        'description',
        'type',
        'created_at';
    ]

    protected $hidden = [
        'start_balance',
        'end_balance',  
    ];
}
