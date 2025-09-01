@extends('base.admin_dashboard_base')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title"></h4>

                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->


        {{-- image --}}
        <div class="row ">
            <div class="col-md-8">

                {{-- Alert --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm border-theme-white-2"
                        role="alert">
                        <div
                            class="d-inline-flex justify-content-center align-items-center thumb-xs bg-success rounded-circle mx-auto me-1">
                            <i class="fas fa-check align-self-center mb-0 text-white "></i>
                        </div>
                        <span>{{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- --------- --}}

                <div class="card">
                    <div class="card-body p-4  rounded text-center">

                    </div><!--end card-body-->
                    <div class="position-relative mb-4">

                    </div>
                    <div class="card-body mt-n6">
                        <div class="row align-items-center">
                            <div class="col ">
                                <div>
                                    <div class="col">
                                        {{-- <h6 class="card-title">User Profile</h6> --}}
                                        {{-- <p class="mb-2 text-secondary">Update your company information here</p> --}}
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">

                                    <div class="position-relative">
                                        <span
                                            class="thumb-xxl justify-content-center d-flex align-items-center bg-success-subtle text-success rounded-circle me-2">{{$initials}}
                                        </span>
                                    </div>
                                    <div class=" text-truncate ms-3 ">
                                        <h5 class="m-0 fs-3 fw-bold">{{ $user->name }}</h5>
                                        {{-- <p class="text-muted mb-0">{{ $user->address }}</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Edit --}}
        <div class="row">
            <div class="col-md-8 ">

                <div class="">

                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">

                            </div>
                        </div>
                        <div class="card-body pt-0">

                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-white">
                                    <div>
                                        @if ($user->status == 12)
                                            <span class="badge border border-success text-success badge-pill">Active
                                            </span>
                                        @else
                                            <span class="badge border border-danger text-danger badge-pill">Inactive
                                            </span>
                                        @endif
                                    </div>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center bg-white">
                                    <div>
                                        <i style="font-size: 18px"
                                            class="la la-envelope text-muted me-2"></i>{{ $user->email }}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-white">
                                    <div>
                                        <i style="font-size: 18px"
                                            class="la la-phone text-muted font-16 me-2"></i>{{ $user->telephone }}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-white">
                                    <div>
                                        <i style="font-size: 18px"
                                            class="la la-id-card text-muted font-16 me-2"></i>{{ Str::title(Str::replace('_', ' ', $user->national_id)) }}
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-white">
                                    <div>
                                        <i style="font-size: 18px"
                                            class="la la-id-card text-muted font-16 me-2"></i>{{ Str::upper($user->id_number) }}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-white">
                                    <div>
                                        <i style="font-size: 18px"
                                            class="la la-map-marker text-muted font-16 me-2"></i>{{ $user->address }}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Deactivate --}}
        @if ($user->status == 12)
            <div class="row">
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-danger">Account Deactivation</h4>
                            {{-- <p class="text-secondary">Permanently deactivate your account here</p> --}}
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div>
                                <button class="btn btn-danger" type="submit" data-bs-toggle='modal'
                                    data-bs-target='#deactivate_customer'>Deactivate Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Activate --}}
        @if ($user->status == 13)
            <div class="row">
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-success">Account Activation</h4>
                            {{-- <p class="text-secondary">Permanently deactivate your account here</p> --}}
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div>
                                <button class="btn btn-success" type="submit" data-bs-toggle='modal'
                                    data-bs-target='#activate_customer'>Activate Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Delete Modal --}}
        <div class="modal fade" id="deactivate_customer" tabindex="-1" aria-labelledby="deactivate" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="deactivate">Deactivate Account?</h5>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.deactivate.customer.company') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <input name="deactivate_id" value="{{ $user->id }}" hidden>
                                        <p class="mb-0">
                                            Are you sure you want to delete this user?
                                        </p>
                                        <p></p>
                                        <p class="mb-0">
                                            The user won't be able to log in to the app or view any past information.
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
                                <div class="col-md-4">
                                    <a class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</a>
                                </div>

                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-sm btn-danger">Deactive account</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="activate_customer" tabindex="-1" aria-labelledby="activate" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="activate">Activate Account?</h5>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.activate.customer.company') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <input name="activate_id" value="{{ $user->id }}" hidden>
                                        <p class="mb-0">
                                            Are you sure you want to activate this user?
                                        </p>
                                        <p></p>
                                        {{-- <p class="mb-0">
                                            The user won't be able to log in to the app or view any past information.
                                        </p> --}}
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
                                <div class="col-md-4">
                                    <a class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</a>
                                </div>

                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-sm btn-success">Activate account</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
