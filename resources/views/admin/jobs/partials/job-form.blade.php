<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer <span class="text-danger">*</span></label>
            <select name="customer_id" class="form-control" required>
                <option value="">-- Select Customer --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ (isset($job) && $job->customer_id == $customer->id) ? 'selected' : '' }}>
                        {{ $customer->name }} ({{ $customer->email }})
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="product_type_id" class="form-label">Product Type <span class="text-danger">*</span></label>
            <select name="product_type_id" class="form-control" required>
                <option value="">-- Select Product Type --</option>
                @foreach($productTypes as $type)
                    <option value="{{ $type->id }}"
                        {{ (isset($job) && $job->product_type_id == $type->id) ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="vehicle_type_id" class="form-label">Vehicle Type <span class="text-danger">*</span></label>
            <select name="vehicle_type_id" class="form-control" required>
                <option value="">-- Select Vehicle Type --</option>
                @foreach($vehicleTypes as $vehicle)
                    <option value="{{ $vehicle->id }}"
                        {{ (isset($job) && $job->vehicle_type_id == $vehicle->id) ? 'selected' : '' }}>
                        {{ $vehicle->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="number_of_vehicles" class="form-label">Number of Vehicles <span class="text-danger">*</span></label>
            <input type="number" name="number_of_vehicles" class="form-control"
                   value="{{ $job->number_of_vehicles ?? '' }}"
                   placeholder="1" required min="1">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="pickup_date" class="form-label">Pickup Date <span class="text-danger">*</span></label>
            <input type="date" name="pickup_date" class="form-control"
                   value="{{ isset($job) ? \Carbon\Carbon::parse($job->pickup_date)->format('F j, Y') : '' }}" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="price" class="form-label">Price (GHS)</label>
            <input type="number" step="0.01" name="price" class="form-control"
                   value="{{ $job->price ?? '' }}"
                   placeholder="e.g. 150.00" min="0">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="pickup_point" class="form-label">Pickup Point <span class="text-danger">*</span></label>
            <input type="text" name="pickup_point" class="form-control"
                   value="{{ $job->pickup_point ?? '' }}"
                   placeholder="Pickup location" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="destination_point" class="form-label">Destination Point <span class="text-danger">*</span></label>
            <input type="text" name="destination_point" class="form-control"
                   value="{{ $job->destination_point ?? '' }}"
                   placeholder="Destination location" required>
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="weight" class="form-label">Weight (kg)</label>
            <input type="number" step="0.01" name="weight" class="form-control"
                   value="{{ $job->weight ?? '' }}"
                   placeholder="Weight" min="0">
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="height" class="form-label">Height (cm)</label>
            <input type="number" step="0.01" name="height" class="form-control"
                   value="{{ $job->height ?? '' }}"
                   placeholder="Height" min="0">
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="width" class="form-label">Width (cm)</label>
            <input type="number" step="0.01" name="width" class="form-control"
                   value="{{ $job->width ?? '' }}"
                   placeholder="Width" min="0">
        </div>
    </div>

    <div class="col-md-3">
        <div class="mb-3">
            <label for="breadth" class="form-label">Breadth (cm)</label>
            <input type="number" step="0.01" name="breadth" class="form-control"
                   value="{{ $job->breadth ?? '' }}"
                   placeholder="Breadth" min="0">
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label for="image" class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control"
                   value="{{ $job->image ?? 'https://example.com/image.jpg' }}"
                   placeholder="https://example.com/image.jpg">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="insurance_package" class="form-label">Insurance Package</label>
            <input type="text" name="insurance_package" class="form-control"
                   value="{{ $job->insurance_package ?? '' }}"
                   placeholder="Optional">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="status_id" class="form-label">Status <span class="text-danger">*</span></label>
            <select name="status_id" class="form-control" required>
                <option value="1" {{ (isset($job) && $job->status_id == 1) ? 'selected' : '' }}>Pending</option>
                <option value="2" {{ (isset($job) && $job->status_id == 2) ? 'selected' : '' }}>Active</option>
                <option value="3" {{ (isset($job) && $job->status_id == 3) ? 'selected' : '' }}>Completed</option>
                <option value="4" {{ (isset($job) && $job->status_id == 4) ? 'selected' : '' }}>Declined</option>
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3">
            <label for="decline_reason" class="form-label">Decline Reason</label>
            <textarea name="decline_reason" class="form-control" rows="3"
                      placeholder="Reason if declined">{{ $job->decline_reason ?? '' }}</textarea>
            <small class="text-muted">Only required if status is "Declined"</small>
        </div>
    </div>
</div>
