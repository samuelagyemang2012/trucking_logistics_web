<?php

namespace App\Http\Controllers;

use App\DataTables\VehiclesDataTable;
use App\Models\Company;
use App\Models\Status;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
// use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    public function index(VehiclesDataTable $dataTable)
    {

        // return view('company.vehicles.all');
        $types = VehicleType::all();
        $status = Status::whereBetween('id', [8, 11])->get();
        return $dataTable->render('company.vehicles.all', [
            'types' => $types,
            'status' => $status
        ]);
    }

    public function add(Request $request)
    {
        $rules = ([
            'vehicle_type' => 'required|numeric',
            'model' => 'required|string',
            'registration_number' => 'required|unique:vehicles',
            'number_plate' => 'required|string|unique:vehicles',
            'mileage' => 'numeric|nullable',
            'payload' => 'numeric|nullable',
            'manufacture_year' => 'numeric|min:1900|nullable',
            'status' => 'required|numeric'
        ]);

        $this->validate($request, $rules);

        $user = Auth::user();
        $company = Company::where(['user_id' => $user->id])->first();
        // dd($request);

        $vehicle = Vehicle::create([
            'type' => $request->vehicle_type,
            'company_id' => $company->id,
            'model' => $request->model,
            'registration_number' => $request->registration_number,
            'number_plate' => $request->number_plate,
            'mileage' => $request->mileage,
            'payload' => $request->payload,
            'manufacture_year' => $request->manufacture_year,
            'status_id' =>  $request->status
        ]);

        return redirect()->route('vehicles.index')->with('success', $vehicle->model . ' added successfully.');
    }

    public function get($id)
    {
        $vehicle = Vehicle::where(['id' => $id])->first();
        return  response()->json(['vehicle' => $vehicle]);
    }

    public function update(Request $request)
    {
        $rules = ([
            'vehicle_id' => 'required',
            'vehicle_type' => 'required|numeric',
            'model' => 'required|string',
            'registration_number' => 'required',
            'number_plate' => 'required|string',
            'mileage' => 'numeric|nullable',
            'payload' => 'numeric|nullable',
            'manufacture_year' => 'numeric|min:1900|nullable',
            'status' => 'required|numeric'
        ]);

        $this->validate($request, $rules);

        // $user = Auth::user();
        // $company = Company::where(['user_id' => $user->id])->first();

        $vehicle = Vehicle::find($request->vehicle_id);
        // dd($vehicle);

        if ($vehicle) {
            $vehicle->type = $request->vehicle_type;
            $vehicle->model = $request->model;
            $vehicle->registration_number = $request->registration_number;
            $vehicle->number_plate = $request->number_plate;
            $vehicle->mileage = $request->mileage;
            $vehicle->payload = $request->payload;
            $vehicle->manufacture_year = $request->manufacture_year;
            $vehicle->status_id =  $request->status;

            $vehicle->save();

            return redirect()->route('vehicles.index')->with('success', $vehicle->model . ' updated successfully.');
        } else {
            return redirect()->route('vehicles.index')->with('danger', 'Update failed.');
        }
    }

    public function delete(Request $request)
    {
        $rules = $request->validate([
            'delete_id' => 'required'
        ]);

        $vehicle = Vehicle::find($request->delete_id);

        if ($vehicle) {
            $vehicle->delete();

            return redirect()->route('vehicles.index')->with('success', $vehicle->model . ' deleted successfully.');
        } else {
            return redirect()->route('vehicles.index')->with('danger', 'Deletion failed.');
        }
    }
}
