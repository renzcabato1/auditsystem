<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    //
    public function team_name()
    {
        return $this->hasOne(AuditTeam::class,'id','created_team');
    }
    public function rating_value()
    {
        return $this->hasOne(Rating::class,'id','rating_id');
    }
    public function bu_code_info()
    {
        return $this->hasOne(Code::class,'id','code_id');
    }
    public function employee_info()
    {
        return $this->hasOne(Employee::class,'user_id','action_owner');
    }
}
