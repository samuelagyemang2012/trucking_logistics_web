<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\ProductType;
use App\Models\User;
use App\Models\VehicleType;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function index(Request $request): object
    {
        $status = $request->query('status');

        if($status === 'pending')
        {
            $jobs = Job::query()->where('status_id',1);
        }else if($status === 'completed'){
            $jobs = Job::query()->where('status_id',3);
        }
        else if($status === 'all'){
            $jobs = Job::query();
        }else {
            $jobs = Job::query();
        }


        $jobs = $jobs->latest()->paginate(10);
        $customers = User::all();
        $productTypes = ProductType::all();
        $vehicleTypes = VehicleType::all();

        return view('admin.jobs.index', compact('jobs','customers', 'productTypes', 'vehicleTypes'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_id'        => 'required|exists:users,id',
            'product_type_id'    => 'required|integer',
            'weight'             => 'nullable|numeric',
            'height'             => 'nullable|numeric',
            'width'              => 'nullable|numeric',
            'breadth'            => 'nullable|numeric',
            'image'              => 'nullable|string',
            'vehicle_type_id'    => 'required|string',
            'number_of_vehicles' => 'required|integer|min:1',
            'pickup_date'        => 'required|date',
            'pickup_point'       => 'required|string',
            'destination_point'  => 'required|string',
            'price'              => 'nullable|numeric',
            'insurance_package'  => 'nullable|string',
            'status_id'          => 'nullable|integer',
            'decline_reason'     => 'nullable|string',
        ]);
        $validated['id'] = Str::uuid();

        $job = Job::create($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully.');
    }

    public function show(Job $job, Request $request): Application|Factory|string
    {
        $job->load(['customer', 'productType', 'vehicleType']);

//        if ($request->wantsJson()) {
            return view('admin.jobs.partials.job-view', compact('job'))->render();
//        }
//        return view('admin.jobs.show', compact('job'));
    }

    public function edit(Job $job,Request $request): string
    {

        $customers = User::all();
        $productTypes = ProductType::all();
        $vehicleTypes = VehicleType::all();

        return view('admin.jobs.partials.job-form', compact('job', 'customers', 'productTypes', 'vehicleTypes'))->render();

    }

    public function update(Request $request, Job $job): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'product_type_id'    => 'required|integer',
            'weight'             => 'nullable|numeric',
            'height'             => 'nullable|numeric',
            'width'              => 'nullable|numeric',
            'breadth'            => 'nullable|numeric',
            'image'              => 'nullable|string',
            'vehicle_type_id'    => 'required|string',
            'number_of_vehicles' => 'required|integer|min:1',
            'pickup_date'        => 'required|date',
            'pickup_point'       => 'required|string',
            'destination_point'  => 'required|string',
            'price'              => 'nullable|numeric',
            'insurance_package'  => 'nullable|string',
            'status_id'          => 'integer',
            'decline_reason'     => 'nullable|string',
        ]);

        $job->update($validated);

        return response()->json(['message' => 'Job updated successfully']);

    }

    public function destroy(Job $job): RedirectResponse
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully.');
    }
}
