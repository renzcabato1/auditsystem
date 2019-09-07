<?php

namespace App\Http\Controllers;
Use App\User;
Use App\Account;
Use App\Role;
Use App\Employee;
Use App\ManageUser;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    //
    public function viewManageAccount()
    {
        $roles = Role::orderBy('role_name','asc')->get();
        $role_array = collect($roles)->toArray();

        $accounts = Account::with('employee_info','employee_info.companies','employee_info.departments','manage_user.info_of_employee','manage_user.info_of_employee.departments','manage_user.info_of_employee.companies')
        ->where('role','like','%2%')
        ->orWhere('role','like','%3%')
        ->orWhere('role','like','%4%')
        ->get();
        
        return view('manage_account_users',array(
            'header' => "Manage Users",
            'roles' => $roles,
            'role_array' => $role_array,
            'accounts' => $accounts,
           
        ));
    }
    public function editManageAccount($account_id)
    {
        $roles = Role::orderBy('role_name','asc')->get();
        $role_array = collect($roles)->toArray();

        $accounts = Account::with('employee_info','employee_info.companies','employee_info.departments','manage_user.info_of_employee','manage_user.info_of_employee.departments','manage_user.info_of_employee.companies')->where('id','=',$account_id)
        ->first();

        // dd($accounts);
        
        return view('edit_manage_user',array(
            'header' => "Manage Users",
            'roles' => $roles,
            'role_array' => $role_array,
            'accounts' => $accounts,
           
        ));
    }
}
