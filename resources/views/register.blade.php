@extends('base')

@section('content')
    <!-- Page Content-->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-1">

                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h1 class="">Register</h1>
                                        <h5 class="text-secondary">Create an account here</h5>
                                    </div><!--end col-->
                                </div> <!--end row-->

                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div>
                                    <form action="/dashboard" method="get">
                                        {{ csrf_field() }}

                                        <div class="row">
                                            {{-- company name --}}
                                            <div class="col-lg-12">

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Enter your comany name">
                                                </div>
                                            </div>
                                            {{-- end company end --}}

                                            {{-- left --}}
                                            <div class="col-lg-6">

                                                {{-- email --}}
                                                <div class="mb-3 ">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="E.g. example@gmail.com">
                                                </div>
                                                {{-- end email --}}


                                                {{-- TIN --}}
                                                <div class="mb-3 ">
                                                    <label for="tin" class="form-label">Taxpayer Identification Number
                                                        (TIN)</label>
                                                    <input type="tin" class="form-control" id="tel"
                                                        placeholder="E.g. 000 – 123 – 456 – 001">
                                                </div>
                                                {{-- end TIN --}}
                                            </div>
                                            {{-- end left --}}

                                            {{-- right --}}
                                            <div class="col-lg-6">

                                                {{-- telephone --}}
                                                <div class="mb-3 ">
                                                    <label for="tel" class="form-label">Telephone</label>
                                                    <input type="tel" class="form-control" id="tel"
                                                        placeholder="E.g. 1502681453">
                                                </div>

                                                {{-- Address --}}
                                                <div class="mb-3 ">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="address" class="form-control" id="tel"
                                                        placeholder="E.g. 12 Example Street, Accra">
                                                </div>
                                            </div>
                                            {{-- end right --}}

                                            {{-- certificate --}}
                                            <div class="col-lg-12">

                                                <div class="mb-3 d-grid">
                                                    <p class="text-muted">Upload your Certificate of Registration here</p>
                                                    <div
                                                        class="preview-box d-block justify-content-center rounded  border-dashed border-theme-color overflow-hidden p-3">
                                                    </div>
                                                    <input type="file" id="input-file" name="certificate" accept="image/*,.pdf"
                                                        onchange={handleChange()} hidden />
                                                    <label class="btn-upload btn btn-dark mt-3" for="input-file">Upload
                                                        File</label>
                                                </div>
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
                                                <a class="btn btn-dark btn-lg rounded-pill" href="/login">Login Here</a>

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
