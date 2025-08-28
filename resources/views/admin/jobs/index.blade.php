@extends('base.admin_dashboard_base')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    {{-- <h4 class="page-title">Customers</h4> --}}

                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <h4 class="card-title">Jobs Posted</h4>
                            </div>

                            <div class="col-auto ms-auto">
                                <div class="">
                                    <button class="btn bg-primary text-white rounded-pill" data-bs-toggle="modal"
                                            data-bs-target="#addJobModal"><i class="fas fa-plus me-1"></i> Add New Job</button>
                                </div>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0" id="datatable_1">
                                <thead class="table-light">
                                <tr>
                                    <th>Customer</th>
                                    <th>No Vehicles</th>
                                    <th>Pickup Date</th>
                                    <th>Pickup Point</th>
                                    <th>Destination Point</th>
                                    <th>Price</th>
                                    <th>Insurance Package</th>
                                    <th>Status</th>
                                    <th class="">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td>{{ $job->customer->name }}</td>
                                        <td>{{ $job->number_of_vehicles }}</td>
                                        <td>{{ $job->pickup_date }}</td>
                                        <td>{{ $job->pickup_point }}</td>
                                        <td>{{ $job->destination_point }}</td>
                                        <td>GHS {{ number_format($job->price, 2) }}</td>
                                        <td>{{ $job->insurance_package ?? 'N/A' }}</td>
                                        <td>
                                            @php
                                                $statusMap = [1 => 'Pending', 2 => 'Active', 3 => 'Completed', 4 => 'Declined'];
                                                $statusClass = [1 => 'warning', 2 => 'info', 3 => 'success', 4 => 'danger'];
                                            @endphp
                                            <span class="badge bg-{{ $statusClass[$job->status_id] ?? 'secondary' }}">
                                                    {{ $statusMap[$job->status_id] ?? 'Unknown' }}
                                                </span>
                                        </td>
                                        <td class="">
                                            <div class="d-flex gap-1" role="group">
                                            <button class="btn btn-sm btn-info view-job-btn"
                                                    data-job-id="{{ $job->id }}"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    data-bs-original-title="View Details">
                                                <i class="las la-eye fs-18"></i>
                                            </button>

{{--                                            <button class="btn btn-sm btn-warning edit-job-btn"--}}
{{--                                                    data-job-id="{{ $job->id }}"--}}
{{--                                                    data-bs-toggle="tooltip"--}}
{{--                                                    data-bs-placement="top"--}}
{{--                                                    data-bs-original-title="Edit Job">--}}
{{--                                                <i class="las la-edit fs-18"></i>--}}
{{--                                            </button>--}}

                                            <form action="{{ route('admin.jobs.destroy', $job->id) }}"
                                                  method="POST"
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this job?')"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Delete Job">
                                                    <i class="las la-trash fs-18"></i>
                                                </button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>

    <!-- Add Job Modal -->
    <div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="addJobLabel">Add New Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.jobs.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        @include('admin.jobs.partials.job-form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Job</button>
               p     </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Job Modal -->
    <div class="modal fade" id="viewJobModal" tabindex="-1" aria-labelledby="viewJobLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white" id="viewJobLabel">Job Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="jobDetailsContent">
                        <!-- Job details will be loaded here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" id="editFromViewBtn">Edit Job</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Job Modal -->
    <div class="modal fade" id="editJobModal" tabindex="-1" aria-labelledby="editJobLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-dark" id="editJobLabel">Edit Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editJobForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div id="editJobContent">
                            <!-- Edit form will be loaded here -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Update Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('libs/vanilla-datatables/vanilla-dataTables.min.js') }}"></script>
        <script src="{{ asset('js/pages/editable.init.js') }}"></script>
        <script>
            $(document).ready(function() {
                // View Job Modal
                $('.view-job-btn').on('click', function() {
                    const jobId = $(this).data('job-id');

                    // Show loading
                    $('#jobDetailsContent').html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading...</div>');
                    $('#viewJobModal').modal('show');

                    // Fetch job details
                    $.ajax({
                        url: `/admin/jobs/${jobId}`,
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        success: function(response) {
                            $('#jobDetailsContent').html(response);
                        },
                        error: function() {
                            $('#jobDetailsContent').html('<div class="alert alert-danger">Error loading job details</div>');
                        }
                    });
                });

                // Edit Job Modal
                $('.edit-job-btn').on('click', function() {
                    const jobId = $(this).data('job-id');
                    openEditModal(jobId);
                });

                // Edit from view modal
                $('#editFromViewBtn').on('click', function() {
                    const jobId = $('.view-job-btn:first').data('job-id'); // Get current job ID
                    $('#viewJobModal').modal('hide');
                    setTimeout(() => openEditModal(jobId), 300); // Wait for view modal to close
                });

                function openEditModal(jobId) {
                    // Show loading
                    $('#editJobContent').html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading...</div>');
                    $('#editJobModal').modal('show');

                    // Set form action
                    $('#editJobForm').attr('action', `/admin/jobs/${jobId}`);

                    // Fetch job edit form
                    $.ajax({
                        url: `/admin/jobs/${jobId}/edit`,
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        success: function(response) {
                            $('#editJobContent').html(response);
                        },
                        error: function() {
                            $('#editJobContent').html('<div class="alert alert-danger">Error loading edit form</div>');
                        }
                    });
                }

                // Handle form submissions with AJAX for better UX
                $('#editJobForm').on('submit', function(e) {
                    e.preventDefault();

                    const form = $(this);
                    const submitBtn = form.find('button[type="submit"]');
                    const originalText = submitBtn.text();

                    submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Updating...');

                    $.ajax({
                        url: form.attr('action'),
                        method: 'POST',
                        data: form.serialize(),
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        success: function(response) {
                            $('#editJobModal').modal('hide');
                            // Reload the page or update the table row
                            location.reload();
                        },
                        error: function(xhr) {
                            let errorMsg = 'Error updating job';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                errorMsg = xhr.responseJSON.message;
                            }
                            alert(errorMsg);
                        },
                        complete: function() {
                            submitBtn.prop('disabled', false).text(originalText);
                        }
                    });
                });
            });
        </script>
    @endpush

@stop
