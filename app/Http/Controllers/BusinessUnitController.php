<?php

namespace App\Http\Controllers;
use App\Code;
use App\Cluster;
use Illuminate\Http\Request;

class BusinessUnitController extends Controller
{
    //
    public function viewBusinessUnit()
    {
        $codes = Code::with('cluster_info')->orderBy('bu_name','asc')->get();
        $clusters = Cluster::orderBy('cluster_name','asc')->get();
        return view('view_business_units',
        array(
            'header' => "Business Unit",
            'codes' =>  $codes,
            'clusters' =>  $clusters,
        ));
    }
}
