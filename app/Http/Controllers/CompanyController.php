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


    //upload file
}
