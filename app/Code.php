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
}
