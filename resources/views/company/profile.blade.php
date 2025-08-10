@extends('base.dashboard_base')

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Profile</h4>

                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Personal Information</h4>
                            </div><!--end col-->
                            <div class="col-auto">
                                <a href="#" class="float-end text-muted d-inline-flex text-decoration-underline"><i
                                        class="iconoir-edit-pencil fs-18 me-1"></i>Edit</a>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">

                        <ul class="list-unstyled mb-0">
                            <li class=""><i class="las la-user-tie me-2 text-secondary fs-22 align-middle"></i>
                                <b> Company Name </b> : 06 June 1989
                            </li>
                            <li class="mt-2"><i class="las la-envelope me-2 text-secondary fs-22 align-middle"></i> <b>
                                    Email </b> : some@gmail.com</li>
                            <li class="mt-2"><i class="las la-phone me-2 text-secondary fs-22 align-middle"></i> <b>
                                    Telephone </b> : 15252565223</li>
                            <li class="mt-2"><i class="las la-address-card me-2 text-secondary fs-22 align-middle"></i>
                                <b>
                                    Tax Identification Number</b> : 9090909099
                            </li>
                            <li class="mt-2"><i class="las la-map-marker text-secondary fs-22 align-middle me-2"></i> <b>
                                    Address </b> : 1 Alewa Street</li>
                        </ul>

                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
            <div class="col-md-8">

                <div class="">

                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Company Information</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Company
                                    Name</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" value="Rosa">
                                </div>
                            </div>
                            {{-- <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Last
                                    Name</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" value="Dodson">
                                </div>
                            </div> --}}
                            {{-- <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Company
                                    Name</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="text" value="MannatThemes">
                                    <span class="form-text text-muted font-12">We'll never share your email with anyone
                                        else.</span>
                                </div>
                            </div> --}}
                            {{-- email --}}
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email</label>
                                <div class="col-lg-9 col-xl-8">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="la la-envelope"></i></span>
                                        <input type="email" class="form-control" value=" email@gmail.com"
                                            placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            {{-- Tel --}}
                            <div class="form-group mb-3 row">
                                <label
                                    class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Telephone</label>
                                <div class="col-lg-9 col-xl-8">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="las la-phone"></i></span>
                                        <input type="tel" class="form-control" value="+123456789" placeholder="Phone"
                                            aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>

                            {{-- TIN --}}
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Tax
                                    Identification Number</label>
                                <div class="col-lg-9 col-xl-8">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="las la-address-card"></i></span>
                                        <input type="text" class="form-control" value="91012901290" placeholder="TIN">
                                    </div>
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="form-group mb-3 row">
                                <label
                                    class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Address</label>
                                <div class="col-lg-9 col-xl-8">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="las la-map-marker"></i></span>
                                        <input type="text" class="form-control" value="91012901290" placeholder="TIN">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                    <button type="submit" class="btn btn-dark rounded-pill">Submit</button>
                                    {{-- <button type="button" class="btn btn-danger">Cancel</button> --}}
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Change Password</h4>
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Current
                                    Password</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="password" placeholder="Password">
                                    <a href="#" class="text-primary font-12">Forgot password ?</a>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">New
                                    Password</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="password" placeholder="New Password">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Confirm
                                    Password</label>
                                <div class="col-lg-9 col-xl-8">
                                    <input class="form-control" type="password" placeholder="Re-Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 col-xl-8 offset-lg-3">
                                    <button type="submit" class="btn btn-dark rounded-pill">Change Password</button>
                                    {{-- <button type="button" class="btn btn-danger">Cancel</button> --}}
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->

                </div>
                {{-- </div>  --}}
            </div> <!--end col-->
        </div><!--end row-->


    </div>

@stop
