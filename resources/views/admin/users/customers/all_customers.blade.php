@extends('base.admin_dashboard_base')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Manage Customers</h4>

                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->


        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-auto">

                                {{-- success --}}
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                                        <span>{{ session('success') }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                {{-- error --}}
                                @if ($errors->any())
                                    <div class="alert">
                                        <ul class="list-group">
                                            @foreach ($errors->all() as $error)
                                                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            {{-- <div class="col-auto ms-auto">
                                <button class="btn bg-primary text-white rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#addVehicle"><i class="fas fa-plus me-1"></i> Add Vehicle</button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">

                            <table class="table mb-0" id="">
                                {{ $dataTable->table() }}
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn';

            $(document).ready(function() {
                setTimeout(function() {
                    $('.dt-buttons').addClass('mb-1');
                    $('.dt-paging').addClass('mt-1');
                }, 1);
            });
        </script>

        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush

    {{-- Deactivate Modal --}}
    {{-- <div class="modal fade" id="deactivate_id" tabindex="-1" aria-labelledby="deactivate_id" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="deactivate_id">Deactivate Account</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.deactivate.customer.company') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input id="user_id" name="user_id" value="" hidden>

                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <p class="mb-0">
                                        Are you sure you want to delete your account?
                                    </p>
                                    <p></p>
                                    <p class="mb-0">
                                        This action is permanent and cannot be undone. You will lose
                                        access to all your data, including your profile, vehicles, and company
                                        information.
                                    </p>
                                    <p></p>
                                    <p class="mb-0">
                                        <strong> Please confirm to proceed.</strong>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                            </div>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    {{-- end modal --}}
@stop
