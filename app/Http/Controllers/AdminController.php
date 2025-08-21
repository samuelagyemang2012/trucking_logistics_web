<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $companies = User::where(['role_id' => 3, 'status' => 11])->count();
        $customers = User::where(['role_id' => 2, 'status' => 11])->count();
        // $vehicles_number = Vehicle::where('company_id', $company->id)->count();

        return view('admin.dashboard')->with([
            'name' => $user->name,
            'companies' => $companies,
            'customers' => $customers
        ]);
    }

    public function showChangePassword()
    {
        return view('admin.change_password');
    }

    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);

        $user = Auth::user();

        $new_password = Hash::make($request->password);
        $user->password = $new_password;
        $user->status = 11;

        $user->save();

        return redirect()->route('admin.dashboard');
    }
}
