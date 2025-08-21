<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getCompanies(){
        $companies = User::where(['role_id' => 3, 'status' => 11])->get();
        return view('admin.users.all_companies')->with(['companies' => $companies]);
    }

    public function getCustomers()
    {
        $users = User::where(['role_id' => 2, 'status' => 11])->get();
        return view('admin.users.all_customers')->with(['users' => $users]);
    }

    public function getAdmins()
    {
        $admins = User::where(['role_id' => 1, 'status' => 11])->get();
        return view('admin.users.all_admins')->with(['admins' => $admins]);
    }
}
