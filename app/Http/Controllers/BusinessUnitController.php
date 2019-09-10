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
    public function newBusinessUnit(Request $request)
    {
        
        $request->validate(['bu_code' => 'required|unique:codes,bu_code|max:255']); 
        $code = new Code;
        $code->cluster_id = $request->cluster;
        $code->bu_name = $request->bu_name;
        $code->bu_code = $request->bu_code;
        $code->save();
        $request->session()->flash('status','Successfully added');
        return back();
    }
    public function editBusinessUnit(Request $request,$codeId)
    {
        $request->validate(['bu_code' => 'required|unique:codes,bu_code,'.$codeId.'|max:255']); 
        $code = Code::findOrfail($codeId);
        $code->cluster_id = $request->cluster;
        $code->bu_name = $request->bu_name;
        $code->bu_code = $request->bu_code;
        $code->save();
        $request->session()->flash('status','Successfully Updated');
        return back();

    }
    
}
