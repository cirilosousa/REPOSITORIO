 <?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;



class Account extends Model
{
 
    protected $fillable = [
        'owner_id'~,
        'account_type_id',
            'date',
            'created_at',
            'code',
            'description',
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
}
