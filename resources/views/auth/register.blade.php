@extends('base.auth_base')

@section('content')
    <!-- Page Content-->
    <div class="page-wrapper">
        <div class="page-content">



            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-1">

                        <div class="card">
                            {{-- errors --}}
                            <div>
                                @if ($errors->any())
                                    <div class="alert">
                                        <ul class="list-group">
                                            @foreach ($errors->all() as $error)
                                                <li class="list-group-item list-group-item-danger">{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            {{-- end errors --}}

                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="">Register Your Company Here</h3>
                                        {{-- <h5 class="text-secondary">Create an account here</h5> --}}
                                    </div><!--end col-->
                                </div> <!--end row-->

                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div>
                                    <form action="{{ route('company.register') }}" method="post">
                                        {{ csrf_field() }}

                                        <div class="row">
                                            {{-- company name --}}
                                            <div class="col-lg-12">

                                                <div class="mb-3">
                                                    <label for="name" class="form-label"><span
                                                            class="text-danger">*</span> Company Name</label>
                                                    <input name='name' type="text" class="form-control" id="name"
                                                        placeholder="Enter your comany name" value="{{ old('name') }}">
                                                </div>
                                            </div>
                                            {{-- end company end --}}

                                            {{-- left --}}
                                            <div class="col-lg-6">

                                                {{-- email --}}
                                                <div class="mb-3 ">
                                                    <label for="email" class="form-label"> <span
                                                            class="text-danger">*</span> Email</label>
                                                    <input name="email" type="email" class="form-control" id="email"
                                                        placeholder="E.g. example@gmail.com" value="{{ old('email') }}">
                                                </div>
                                                {{-- end email --}}


                                                {{-- TIN --}}
                                                <div class="mb-3 ">
                                                    <label for="tin_number" class="form-label"><span
                                                            class="text-danger">*</span> Taxpayer Identification
                                                        Number (TIN)</label>
                                                    <input name="tin_number" type="text" class="form-control"
                                                        id="tin_number" value="{{ old('tin_number') }}"
                                                        placeholder="E.g. 000 – 123 – 456 – 001">
                                                    {{-- <input type="text" name=""> --}}
                                                </div>
                                                {{-- end TIN --}}

                                                {{-- Password --}}
                                                <div class="mb-3 ">
                                                    <label for="password" class="form-label"><span
                                                            class="text-danger">*</span> Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="password">
                                                </div>
                                            </div>
                                            {{-- end left --}}

                                            {{-- right --}}
                                            <div class="col-lg-6">

                                                {{-- telephone --}}
                                                <div class="mb-3 ">
                                                    <label for="tel" class="form-label"><span
                                                            class="text-danger">*</span> Telephone</label>
                                                    <input type="tel" class="form-control" name="telephone"
                                                        id="tel" placeholder="E.g. 1502681453"
                                                        value="{{ old('telephone') }}">
                                                </div>

                                                {{-- Address --}}
                                                <div class="mb-3 ">
                                                    <label for="address" class="form-label"><span
                                                            class="text-danger">*</span> Address</label>
                                                    <input type="text" name="address" class="form-control" id="address"
                                                        placeholder="E.g. 1 ABC Street" value="{{ old('address') }}">

                                                </div>

                                                {{-- Password Confirmation --}}
                                                <div class="mb-3 ">
                                                    <label for="password_confirmation" class="form-label"><span
                                                            class="text-danger">*</span> Confirm
                                                        Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control"
                                                        id="password_confirmation">

                                                </div>
                                            </div>
                                            {{-- end right --}}

                                            {{-- certificate --}}
                                            <div class="col-lg-12">

                                                <div class="mb-3 d-grid">
                                                    <label class="form-label">Upload your Certificate of Registration
                                                        here</label>
                                                    <div
                                                        class="preview-box d-block justify-content-center rounded  border-dashed border-theme-color overflow-hidden p-3">
                                                    </div>
                                                    <input type="file" id="input-file" name="company_certificate"
                                                        accept="image/*,.pdf" onchange={handleChange()} hidden />
                                                    <label class="btn-upload btn btn-dark mt-3" for="input-file">Upload
                                                        File</label>
                                                </div>
                                                <hr>
                                                {{-- end certificate --}}

                                                {{-- register btn --}}
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-sm-4 d-grid">
                                                            <button type="submit"
                                                                class="btn btn-lg btn-warning rounded-pill">Register</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- end register btn --}}
                                            </div>

                                    </form>
                                </div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <hr>
                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <p class="text-secondary">Have an account already?</p>
                                            </div>
                                            <div class="col-sm-4">
                                                <a class="btn btn-dark  rounded-pill"
                                                    href="{{ route('show.login') }}">Login
                                                    Here</a>

                                            </div>
                                        </div>

                                    </div><!--end card-body-->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@stop
