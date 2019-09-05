<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $connection = 'hr_portal';
    protected $visible = array('id', 'user_id', 'last_name', 'first_name', 'middle_name','company','department','users');
    public function company()
    {
        return $this->belongsToMany(Company::class);
    }
    public function department()
    {
        return $this->belongsToMany(Department::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
