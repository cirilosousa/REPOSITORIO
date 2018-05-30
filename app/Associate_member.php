<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Associate_member extends Model
{ 
    protected $fillable = [
        'main_user_id', 
        'associated_user_id', 
    ];
    
    protected $hidden = [
        'created_at'    
    ];    
  
}
