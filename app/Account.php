<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'owner_id', 'account_type_id', 'date', 'code', 'description', 'start_balance', 'current_balance', 'last_movement_date', 'deleted_at', 'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function typeToStr()
    {
        switch ($this->type) {
            case 0:
                return 'Administrator';
            case 1:
                return 'Publisher';
            case 2:
                return 'Client';
        }

        return 'Unknown';
    }
}
