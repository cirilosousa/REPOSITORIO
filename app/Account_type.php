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
        'id', 'name',
    ];

        public function typeToStr()
    {
        switch ($this->name) {
            case 0:
                return 'Bank account';
            case 1:
                return 'Pocket money';
            case 2:
                return 'PayPal account';
            case 2:
                return 'Credit card';
            case 2:
                return 'Meal card';
        }

        return 'Unknown';
    }

}
