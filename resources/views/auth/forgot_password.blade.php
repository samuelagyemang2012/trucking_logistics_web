@extends('base.auth_base')

@section('content')
    <div class="page-wrapper">
        <!-- Page Content-->
        {{-- <div class="page-content"> --}}
        <div class="container page-content">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-6">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        {{-- <h4 class="page-title">Elements</h4> --}}
                    </div>
                    <div>
                        <div class="card">
                            {{-- login errors --}}
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

                            {{-- successul registration --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show shadow-sm border-theme-white-2"
                                    role="alert">
                                    <div
                                        class="d-inline-flex justify-content-center align-items-center thumb-xs bg-success rounded-circle mx-auto me-1">
                                        <i class="fas fa-check align-self-center mb-0 text-white "></i>
                                    </div>
                                    <span>{{ session('success') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            {{--  --}}

                            {{-- Info --}}
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
                            {{--  --}}

                            {{-- danger --}}
                            @if (session('danger'))
                                <div class="alert alert-danger alert-dismissible fade show shadow-sm border-theme-white-2"
                                    role="alert">
                                    <div
                                        class="d-inline-flex justify-content-center align-items-center thumb-xs bg-danger rounded-circle mx-auto me-1">
                                        <i class="fas fa-xmark align-self-center mb-0 text-white "></i>
                                    </div>
                                    <span>{{ session('danger') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            {{--  --}}

                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="">Forgot Password</h3>
                                        <h5 class="text-secondary">Provide the email address associated with your account to
                                            recover your password.</h5>
                                    </div><!--end col-->
                                </div> <!--end row-->

                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div>
                                    <form action="{{ route('password.email') }}" method="post">
                                        {{ csrf_field() }}

                                        {{-- email --}}
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="E.g. example@gmail.com" required>
                                        </div>

                                        {{-- <div class="container"> --}}
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary rounded-pill">Send Reset Link
                                                </button>
                                            </div>
                                        </div>
                                        {{-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultdemo">
                                <label class="form-check-label" for="flexCheckDefaultdemo">
                                    Check me out
                                </label> --}}
                                        {{-- </div> --}}

                                        {{-- <button type="button" class="btn btn-danger">Cancel</button> --}}
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>


                {{-- <div class="col-sm-12"> --}}




                {{-- footer --}}
                {{-- <footer class="footer text-center text-sm-start d-print-none">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0 rounded-bottom-0">
                                <div class="card-body">
                                    <p class="text-muted mb-0">
                                        ©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script>
                                        Approx
                                        <span class="text-muted d-none d-sm-inline-block float-end">
                                            Design with
                                            <i class="iconoir-heart-solid text-danger align-middle"></i>
                                            by Mannatthemes</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer> --}}
                {{-- footer end --}}
                {{-- </div> --}}
            </div>
            {{-- </div> --}}
        </div>
    @stop
