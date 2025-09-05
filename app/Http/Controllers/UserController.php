<?php

namespace App\Http\Controllers;

use App\DataTables\AdminDriversDataTable;
use App\DataTables\CompaniesDataTable;
use App\DataTables\CustomersDataTable;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getCompany($id)
    {
        $user = User::where(['id' => $id])->first();
        $company = Company::where(['user_id' => $id])->first();


        $logo = $user->profile_picture;

        if (!$logo) {
            $arr = explode(" ", trim(strtoupper($user->name)));
            $first = ($arr[0]) ? $arr[0][0] : "#";
            $second = ($arr[count($arr) - 1]) ? $arr[count($arr) - 1][0] : "#";
            $logo = $first . $second;
        }


        return view('admin.users.companies.get_company')
            ->with([
                'user' => $user,
                'company' => $company,
                'logo' => $logo
            ]);
    }

    public function getCompanies(CompaniesDataTable $dataTable)
    {
        // $companies = User::where(['role_id' => 3, 'status' => 12])->get();
        // return view('admin.users.all_companies')->with(['companies' => $companies]);
        return $dataTable->render('admin.users.companies.all_companies', []);
    }

    public function getCustomer($id)
    {
        $user = User::where(['id' => $id])->first();

        $arr = explode(" ", trim(strtoupper($user->name)));
        $first = ($arr[0]) ? $arr[0][0] : "#";
        $second = ($arr[count($arr) - 1]) ? $arr[count($arr) - 1][0] : "#";
        $initials = $first . $second;

        return view('admin.users.customers.get_customer')
            ->with(['user' => $user, 'initials' => $initials]);
    }

    public function getCustomers(CustomersDataTable $dataTable)
    {
        // $users = User::where(['role_id' => 2, 'status' => 12])->get();
        return $dataTable->render('admin.users.customers.all_customers', []);
    }

    public function getCompanyDrivers(AdminDriversDataTable $dataTable, $id)
    {   
        $user = User::where(['id' => $id])->first();
      
        return $dataTable->with(['id' => $id])->render('admin.users.companies.get_company_drivers',['name'=>$user->name]);
    } 

    public function update(Request $request)
    {
        $rules = ([
            'name' => 'required|string|min:2',
            'telephone' => 'required|numeric',
            'address' => 'nullable|string|max:300',
        ]);

        $this->validate($request, $rules);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $user->email;
        $user->telephone = $request->telephone;
        $user->address = $request->address;

        // if ($image) {
        //     $filename = time() . '_' . $image->getClientOriginalName();
        //     $image->storeAs("company_logos/", $filename, 'public');
        //     $user->profile_picture = $filename;
        // }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updateCompany(Request $request)
    {
        $rules = ([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'telephone' => 'required|numeric',
            'tin_number' => 'required|string|max:11',
            'address' => 'required|string|max:300',
            'profile_picture' => 'image|mimes:jpg,jpeg,png|max:5120|nullable',
            // 'company_certificate' => 'file|extensions:pdf|nullable',
            // 'password' => 'required|string|min:8|confirmed'
        ]);

        $this->validate($request, $rules);

        // --------------------------
        $image = $request->profile_picture;

        // ---------------------------
        $user = Auth::user();
        $company = Company::where('user_id', $user->id)->first();

        if ($company) {
            $company->tin_number = $request->tin_number;
            $company->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->address = $request->address;

        if ($image) {
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs("company_logos/", $filename, 'public');
            $user->profile_picture = $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
