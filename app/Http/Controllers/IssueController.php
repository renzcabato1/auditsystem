<?php

namespace App\Http\Controllers;
use App\Issue;
use App\Rating;
use App\Code;
use App\Account;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    //
    public function viewIssues()
    {
        $issues = Issue::with('team_name','rating_value')->get();
        $ratings = Rating::get();
        $bu_codes = Code::orderBy('bu_name','asc')->get();
        
        return view('view_issues',
        array(
            'header' => "Issues",
            'issues' => $issues,
            'ratings' => $ratings,
            'bu_codes' => $bu_codes,
        ));

    }
    public function newIssue(Request $request)
    {
       $new_issue = new Issue;
       $new_issue->engagement_title = $request->engagement_title; 
       $new_issue->issue = $request->issue;
       $new_issue->rating_id = $request->rating;
       $new_issue->code_id = $request->bu_code;
       $name_explode = explode('-',$request->action_owner);
       $new_issue->action_owner = $name_explode[0];
       $new_issue->role = $name_explode[1];
       $new_issue->committed_date = $request->date_target;

       $approvers = Code::findOrfail($request->bu_code);
       $new_issue->cluster_head = $approvers->cluster_head;
       $new_issue->bu_head = $approvers->bu_head;
       $new_issue->created_by = auth()->user()->id;
       $new_issue->created_team = auth()->user()->team_id()->team_id;
       $new_issue->save();
       $request->session()->flash('status','Successfully added');
       return back();
    }
    public function viewProcessOwner(Request $request)
    {
        $accounts = Code::with('cluster_head_info','bu_head_info','managers_data','managers_data.employee_info')->where('id',$request->bu_code)->first();
        return $accounts;
    }
}
