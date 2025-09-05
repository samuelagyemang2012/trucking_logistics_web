<?php

namespace App\Http\Controllers;

use App\DataTables\DriversDataTable;
use App\Models\Company;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DriverController extends Controller
{
    public function index(DriversDataTable $dataTable)
    {
        return $dataTable->render('company.drivers.all');
    }

    public function add(Request $request)
    {
        $rules = ([
            'name' => 'required|string',
            'email' => 'email|nullable|unique:users',
            'telephone' => 'required|numeric|unique:users',
            'national_id' => 'required|in:ghana_card,passport',
            'id_number' => 'required|string|unique:users',
        ]);

        $this->validate($request, $rules);

        $user = Auth::user();
        $company = Company::where(['user_id' => $user->id])->first();
        // dd($request);

        $new_user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make(Str::random(10)),
            'national_id' => $request->national_id,
            'id_number' => $request->id_number,
            'role_id' => 4,
            'status' => 12
        ]);

        Driver::create([
            'user_id' => $new_user->id,
            'company_id' => $company->id
        ]);

        return redirect()->route('drivers.index')->with('success', $new_user->name . ' added successfully.');
    }


    public function get($id)
    {
        $driver = User::where('id', $id)->select(
            'users.name',
            'users.national_id',
            'users.email',
            'users.telephone',
            'users.id_number'
        )->first();
        return  response()->json(['driver' => $driver]);
    }
}
