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
        'id', 'name', 'type'
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
                return 'bank account';
            case 1:
                return 'pocket money';
            case 2:
                return 'PayPal account';
            case 3:
                return 'credit card';
            case 4:
                return 'meal card';
            case 5:
                return 'other';

        }

        return 'Unknown';
    }
}
