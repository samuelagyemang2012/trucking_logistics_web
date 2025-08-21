@extends('base.admin_dashboard_base')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Change Password</h4>

                </div>
                <div class="col-md-8">

                    <div class="">

                        <div class="card">
                            <div class="card-header">
                                @if (session('info'))
                                    <div class="alert alert-info alert-dismissible fade show shadow-sm border-theme-white-2"
                                        role="alert">
                                        <div
                                            class="d-inline-flex justify-content-center align-items-center thumb-xs bg-info rounded-circle mx-auto me-1">
                                            <i class="fas fa-info align-self-center mb-0 text-white "></i>
                                        </div>
                                        <span>{{ session('info') }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                {{-- danger --}}
                                @if ($errors->any())
                                    <div class="alert">
                                        <ul class="list-group">
                                            @foreach ($errors->all() as $error)
                                                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {{--  --}}
                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div>
                                    <form action="{{ route('admin.password.change') }}" method="post">
                                        @csrf
                                        <div class="form-group mb-3 row">
                                            <label
                                                class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">New
                                                Password</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="password" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <label
                                                class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Confirm
                                                Password</label>
                                            <div class="col-lg-9 col-xl-8">
                                                <input class="form-control" type="password" name="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                <button type="submit" class="btn btn-primary rounded-pill">Change
                                                    Password</button>
                                                {{-- <button type="button" class="btn btn-danger">Cancel</button> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div><!--end card-body-->
                        </div><!--end card-->

                    </div>
                    {{-- </div>  --}}
                </div>
            </div>
        </div>
    </div>

@stop
