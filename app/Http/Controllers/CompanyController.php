<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $company = Company::where('user_id', $user->id)->first();
        $vehicles_number = Vehicle::where('company_id', $company->id)->count();
        $drivers_number = Driver::where('company_id', $company->id)->count();

        return view('company.dashboard')->with([
            'vehicle_number' => $vehicles_number,
            'drivers_number' => $drivers_number,
            'name' => $user->name,
            'id' => $user->id
        ]);
    }

    public function showProfile()
    {
        $user = Auth::user();
        $company = Company::where('user_id', $user->id)->first();

        return view('company.profile')->with([
            'user' => $user,
            'company' => $company
        ]);
    }

    public function deactivateAccount(Request $request)
    {
        $rules = ([
            'deactivate_id' => 'required'
        ]);

        $this->validate($request, $rules);

        $user = User::find($request->deactivate);
        $company = Company::where('user_id', $user->id)->first();

        if ($user) {
            $user->status = 13;
            $user->save();
            $user->delete();
            $company->delete();

            return redirect()->route('show.login')->with('danger', 'Account Deactivated.');
        } else {
            return redirect()->back();
        }
    }
    //upload file
}
