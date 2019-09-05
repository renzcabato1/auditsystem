<?php

namespace App\Http\Controllers;
Use App\User;
Use App\Account;
Use App\Role;
Use App\Employee;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function view_users()
    {
    
      
        $roles = Role::orderBy('role_name','asc')->get();
        $role_array = collect($roles)->toArray();

        $accounts = Account::leftJoin('hr_portal.users as hr_users','accounts.user_id','=','hr_users.id')
        ->leftJoin('hr_portal.employees as employee_data','hr_users.id','=','employee_data.user_id')
        ->leftJoin('hr_portal.department_employee as department_employee','employee_data.id','=','department_employee.employee_id')
        ->leftJoin('hr_portal.departments as departments','department_employee.department_id','=','departments.id')
        ->select('accounts.*','hr_users.*','employee_data.*','accounts.id as account_id','departments.name as department_name')
        ->get();

        $account_id = collect($accounts->pluck('user_id'))->toArray();

        $employees = Employee::with('company','department','users')
        ->where('status','Active')
        // // ->whereNotIn('user_id',$account_id)
        ->orderBy('first_name','asc')
        ->get();
        return ($employees);
        return view('users',array(
            'header' => "Users",
            'roles' => $roles,
            'role_array' => $role_array,
            'employees' => $employees,
            'accounts' => $accounts,
        ));
        
    }
    public function change_password(Request $request)
    {
        $this->validate(request(),[
            'password' => 'required|min:8|confirmed',
            ]    
        ); 
        $data =  User::find(auth()->user()->id);
        $data->password = bcrypt($request->input('password'));
        $data->save();
        $request->session()->flash('status','Your Password Successfully Changed!');
        return back();
    }
}
