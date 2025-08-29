@extends('base.company_dashboard_base')

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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4  rounded text-center">

                    </div><!--end card-body-->
                    <div class="position-relative mb-4">
                        <div class="shape overflow-hidden">
                            {{-- <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                            </svg> --}}
                        </div>
                    </div>
                    <div class="card-body mt-n6">
                        <div class="row align-items-center">
                            <div class="col ">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative">

                                        <img src="{{ asset('/images/logos/4.png') }}" class="rounded-circle img-fluid">

                                    </div>
                                    <div class=" text-truncate ms-3 ">
                                        <h5 class="m-0 fs-3 fw-bold">{{ $user->name }}</h5>
                                        <p class="text-muted mb-0">{{ $user->address }}</p>
                                    </div><!--end media body-->
                                </div><!--end media-->
                            </div><!--end col-->
                        </div><!--end row-->
                        <!--end row-->

                    </div><!--end card-body-->
                </div>
                {{-- <div class="col-md-5">

                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Company Information</h4>
                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">

                        <ul class="list-unstyled mb-0">
                            <li class=""><i class="las la-user-tie me-2 text-secondary fs-22 align-middle"></i>
                                <b> Company Name </b> : {{ $user->name }}
                            </li>
                            <li class="mt-2"><i class="las la-envelope me-2 text-secondary fs-22 align-middle"></i> <b>
                                    Email </b> : {{ $user->email }}</li>
                            <li class="mt-2"><i class="las la-phone me-2 text-secondary fs-22 align-middle"></i> <b>
                                    Telephone </b> : {{ $user->telephone }}</li>
                            <li class="mt-2"><i class="las la-address-card me-2 text-secondary fs-22 align-middle"></i>
                                <b>
                                    Tax Identification Number</b> : {{ Str::upper($company->tin_number) }}
                            </li>
                            <li class="mt-2"><i class="las la-map-marker text-secondary fs-22 align-middle me-2"></i> <b>
                                    Address </b> : {{ $user->address }}</li>
                        </ul>

                    </div>
                </div> --}}

                {{-- ------------------------------------------- --}}
            </div>
        </div>

        {{-- Edit --}}
        <div class="row">
            <div class="col-md-8 ">

                <div class="">

                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Edit Profile</h4>
                                    <p class="mb-2 text-secondary">Update your company information here</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <form action="" method="">
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 mb-lg-0 align-self-center form-label">Name</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="la la-user"></i></span>
                                            <input type="text" class="form-control" value="{{ $user->name }}"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 mb-lg-0 align-self-center form-label">Email</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="la la-envelope"></i></span>
                                            <input type="email" class="form-control" value="{{ $user->email }}"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                </div>

                                {{-- Tel --}}
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 mb-lg-0 align-self-center form-label">Telephone</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="las la-phone"></i></span>
                                            <input type="tel" name="telephone" class="form-control"
                                                placeholder="Telephone" value="{{ $user->telephone }}">
                                        </div>
                                    </div>
                                </div>

                                {{-- TIN --}}
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3  mb-lg-0 align-self-center form-label">TIN
                                        Number</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="las la-address-card"></i></span>
                                            <input type="text" class="form-control" value="{{ $company->tin_number }}"
                                                placeholder="TIN">
                                        </div>
                                    </div>
                                </div>

                                {{-- Address --}}
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 mb-lg-0 align-self-center form-label">Address</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="las la-map-marker"></i></span>
                                            <input type="text" class="form-control" value="{{ $user->address }}"
                                                placeholder="1 ABC Street">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-9 col-xl-8 offset-lg-3">
                                        <button type="submit" class="btn btn-primary ">Save Changes</button>
                                        {{-- <button type="button" class="btn btn-danger">Cancel</button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Password --}}
        <div class="row">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Password</h4>
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div>
                            <form action="" method="post">
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 mb-lg-0 align-self-center form-label">New
                                        Password</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control" type="password" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 mb-lg-0 align-self-center form-label">Confirm
                                        Password</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control" type="password" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9 col-xl-8 offset-lg-3">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        {{-- <button type="button" class="btn btn-danger">Cancel</button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Deactivate --}}
        <div class="row">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-danger">Account Deactivation</h4>
                        <p class="text-secondary">Permanently deactivate your account here</p>
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div>
                            <button class="btn btn-danger" type="submit" data-bs-toggle='modal'
                                data-bs-target='#deactivate'>Deactivate My
                                Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@stop
