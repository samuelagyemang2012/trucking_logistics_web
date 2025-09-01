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
                                        {{-- Profile pic --}}

                                        <img src="{{ url('storage/company_logos/' . $user->profile_picture) }}"
                                            class="rounded-circle img-fluid">

                                    </div>
                                    <div class=" text-truncate ms-3 ">
                                        <h5 class="m-0 fs-3 fw-bold">{{ $user->name }}</h5>
                                        <p class="text-muted mb-0">{{ $user->address }}</p>
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
                                <div class="col">
                                    <h4 class="card-title">Edit Profile</h4>
                                    <p class="mb-2 text-secondary">Update your company information here</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">

                            <form action="{{ route('company.profile.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3 row">
                                    {{-- <div>
                                        <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                                    </div> --}}
                                    <label class="col-xl-3 col-lg-3 mb-lg-0 align-self-center form-label">Name</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="la la-user"></i></span>
                                            <input type="text" class="form-control" value="{{ $user->name }}"
                                                placeholder="" name="name">
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
                                                placeholder="Email" name="email">
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
                                                placeholder="Telephone" value="{{ $user->telephone }}" name="telephone">
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
                                                placeholder="TIN" name="tin_number">
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
                                                placeholder="" name="address">
                                        </div>
                                    </div>
                                </div>

                                {{-- Logo --}}
                                <div class="form-group mb-3 row">
                                    <label class="form-label">Upload your Company Logo
                                        here</label>
                                    <div
                                        class="preview-box d-block justify-content-center rounded  border-dashed border-theme-color overflow-hidden p-3">
                                    </div>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <input type="file" id="input-file" name="profile_picture"
                                                accept="image/jpeg,image/png" onchange={handleChange()} hidden />
                                            <div>
                                                <label class="btn-upload btn btn-outline-primary btn-sm mt-3 btn-outline"
                                                    for="input-file">Upload
                                                    File</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-lg-9 col-xl-8 ">
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
                            <form action="{{ route('password.change') }}" method="post">
                                @csrf
                                <div class="form-group mb-3 row">
                                    <input type="text" name="session_name" value="password.change" hidden>
                                    <label class="col-xl-3 col-lg-3 mb-lg-0 align-self-center form-label">New
                                        Password</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input name="password" class="form-control" type="password"
                                            placeholder="New Password" required>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="col-xl-3 col-lg-3 mb-lg-0 align-self-center form-label">Confirm
                                        Password</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input name="password_confirmation" class="form-control" type="password"
                                            placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-lg-9 col-xl-8">
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

        {{-- Delete --}}
        <div class="row">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-danger">Account Deletion</h4>
                        <p class="text-secondary">Permanently delete your account here</p>
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div>
                            <button class="btn btn-danger" type="submit" data-bs-toggle='modal'
                                data-bs-target='#delete_id'>Delete My
                                Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@stop
