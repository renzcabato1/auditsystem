<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    public function employee_info()
    {
        return $this->belongsToMany(Employee::class,'user_id','user_id');
    }
    
}
