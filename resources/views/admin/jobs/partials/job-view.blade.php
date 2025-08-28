<div class="row">
    <!-- Customer Information -->
    <div class="col-md-12">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-light">
                <h6 class="mb-0"><i class="fas fa-user me-2"></i>Customer Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $job->customer->name }}</p>
                        <p><strong>Email:</strong> {{ $job->customer->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Phone:</strong> {{ $job->customer->phone ?? 'N/A' }}</p>
                        <p><strong>Address:</strong> {{ $job->customer->address ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Job Details -->
    <div class="col-md-12">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-light">
                <h6 class="mb-0"><i class="fas fa-briefcase me-2"></i>Job Details</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Product Type:</strong> {{ $job->productType->name ?? 'N/A' }}</p>
                        <p><strong>Vehicle Type:</strong> {{ $job->vehicleType->name ?? 'N/A' }}</p>
                        <p><strong>Number of Vehicles:</strong> {{ $job->number_of_vehicles }}</p>
                        <p><strong>Pickup Date:</strong> {{ \Carbon\Carbon::parse($job->pickup_date)->format('F j, Y') }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Price:</strong> GHS {{ number_format($job->price, 2) }}</p>
                        <p><strong>Insurance Package:</strong> {{ $job->insurance_package ?? 'N/A' }}</p>
                        <p><strong>Status:</strong>
                            @php
                                $statusMap = [1 => 'Pending', 2 => 'Active', 3 => 'Completed', 4 => 'Declined'];
                                $statusClass = [1 => 'warning', 2 => 'info', 3 => 'success', 4 => 'danger'];
                            @endphp
                            <span class="badge bg-{{ $statusClass[$job->status_id] ?? 'secondary' }}">
                                {{ $statusMap[$job->status_id] ?? 'Unknown' }}
                            </span>
                        </p>
                        <p><strong>Created:</strong> {{ $job->created_at->format('F j, Y g:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Location Information -->
    <div class="col-md-12">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-light">
                <h6 class="mb-0"><i class="fas fa-map-marker-alt me-2"></i>Location Details</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Pickup Point:</strong><br>{{ $job->pickup_point }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Destination Point:</strong><br>{{ $job->destination_point }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Package Dimensions -->
    @if($job->weight || $job->height || $job->width || $job->breadth)
        <div class="col-md-12">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-header bg-light">
                    <h6 class="mb-0"><i class="fas fa-cube me-2"></i>Package Dimensions</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p><strong>Weight:</strong> {{ $job->weight ? $job->weight . ' kg' : 'N/A' }}</p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Height:</strong> {{ $job->height ? $job->height . ' cm' : 'N/A' }}</p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Width:</strong> {{ $job->width ? $job->width . ' cm' : 'N/A' }}</p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Breadth:</strong> {{ $job->breadth ? $job->breadth . ' cm' : 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Image -->
    @if($job->image)
        <div class="col-md-12">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-header bg-light">
                    <h6 class="mb-0"><i class="fas fa-image me-2"></i>Package Image</h6>
                </div>
                <div class="card-body text-center">
                    <img src="{{ $job->image }}" alt="Package Image" class="img-fluid" style="max-height: 300px;">
                </div>
            </div>
        </div>
    @endif

    <!-- Decline Reason -->
    @if($job->decline_reason)
        <div class="col-md-12">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-header bg-danger">
                    <h6 class="mb-0 text-white"><i class="fas fa-exclamation-triangle me-2"></i>Decline Reason</h6>
                </div>
                <div class="card-body">
                    <p class="mb-0">{{ $job->decline_reason }}</p>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    // Store job ID for edit button
    document.querySelector('#editFromViewBtn').setAttribute('data-job-id', '{{ $job->id }}');
</script>
