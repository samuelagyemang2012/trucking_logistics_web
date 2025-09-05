<?php

namespace App\Http\Controllers;

use App\Mail\AccountActivatedEmail;
use App\Mail\AccountDeactivatedEmail;
use App\Mail\AccountDeletedEmail;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $companies = User::where(['role_id' => 3, 'status' => 12])->count();
        $customers = User::where(['role_id' => 2, 'status' => 12])->count();
        // $vehicles_number = Vehicle::where('company_id', $company->id)->count();

        return view('admin.dashboard')->with([
            'name' => $user->name,
            'companies' => $companies,
            'customers' => $customers
        ]);
    }

    public function showProfile()
    {
        $user = Auth::user();

        $arr = explode(" ", trim(strtoupper($user->name)));
        $first = ($arr[0]) ? $arr[0][0] : "#";
        $second = ($arr[count($arr) - 1]) ? $arr[count($arr) - 1][0] : "#";
        $initials = $first . $second;

        return view('admin.profile')->with([
            'user' => $user,
            'initials' => $initials
        ]);
    }

    public function deactivateCustomerCompany(Request $request)
    {
        $rules = ([
            'deactivate_id' => 'required'
        ]);

        $this->validate($request, $rules);

        $user = User::find($request->deactivate_id);

        if ($user) {
            $user->status = 13;
            $user->save();

            // mail
            try {
                Mail::to($user->email)->queue(new AccountDeactivatedEmail($user));
            } catch (\Exception $e) {
                // dd($e->getMessage());
                Log::error('Failed to queue welcome email: ' . $e->getMessage()); // Remove leading backslash statrt mail queue: php artisan queue:work
            }


            return redirect()->back()->with('success', 'Account deactivated.');
        } else {
            return redirect()->back();
        }
    }

    public function activateCustomerCompany(Request $request)
    {
        $rules = ([
            'activate_id' => 'required'
        ]);

        $this->validate($request, $rules);

        $user = User::find($request->activate_id);


        if ($user) {
            $user->status = 12;
            $user->save();

            // mail
            try {
                Mail::to($user->email)->queue(new AccountActivatedEmail($user));
            } catch (\Exception $e) {
                Log::error('Failed to queue welcome email: ' . $e->getMessage()); // Remove leading backslash statrt mail queue: php artisan queue:work
            }

            return redirect()->back()->with('success', 'Account activated.');
        } else {
            return redirect()->back();
        }
    }

    // public function deactivateAccount(Request $request)
    // {
    //     $rules = ([
    //         'deactivate_id' => 'required'
    //     ]);

    //     $this->validate($request, $rules);

    //     $user = User::find($request->deactivate_id);

    //     $company = Company::where('user_id', $user->id)->first();

    //     if ($user) {
    //         $user->status = 13;
    //         $user->save();
    //         $user->delete();

    //         if ($company) {
    //             $company->delete();
    //         }

    //         return redirect()->route('show.login')->with('danger', 'Account Deactivated.');
    //     } else {
    //         return redirect()->route('show.login')->with('danger', 'Account Deactivated.');
    //     }
    // }
}
