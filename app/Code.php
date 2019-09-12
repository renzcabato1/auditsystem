<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    //
    public function cluster_info()
    {
        return $this->hasOne(Cluster::class,'id','cluster_id');
    }
    public function cluster_head_info()
    {
        return $this->hasOne(Employee::class,'user_id','cluster_head');
    }
    public function bu_head_info()
    {
        return $this->hasOne(Employee::class,'user_id','bu_head');
    }
    public function managers_data()
    {
        return $this->hasMany(BuManager::class,'bu_id','id');
    }
}
