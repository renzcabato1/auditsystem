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
        $issues = Issue::get();
        $ratings = Rating::get();
        $bu_codes = Code::orderBy('bu_name','asc')->get();
        $accounts = Account::with('employee_info')
        ->where('role','like','%2%')
        ->orWhere('role','like','%3%')
        ->orWhere('role','like','%4%')
        ->get();
        
        return view('view_issues',
        array(
            'header' => "Issues",
            'issues' => $issues,
            'ratings' => $ratings,
            'bu_codes' => $bu_codes,
            'accounts' => $accounts,
        ));

    }
    public function newIssue(Request $request)
    {

    }
}
