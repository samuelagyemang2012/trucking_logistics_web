@extends('base')

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
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h1 class="">Welcome Back</h1>
                                        <h5 class="text-secondary">Sign in to your logistics dashboard</h5>
                                    </div><!--end col-->
                                </div> <!--end row-->

                            </div><!--end card-header-->
                            <div class="card-body pt-0">
                                <div>
                                    <form action="" method="get">
                                        {{ csrf_field() }}

                                        {{-- email --}}
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="email"
                                                aria-describedby="emailHelp" placeholder="E.g. example@gmail.com">
                                        </div>

                                        {{-- password --}}
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password">
                                        </div>

                                        {{-- <div class="container"> --}}
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-warning rounded-pill">Sign in</button>
                                            </div>
                                            <div class="col-sm-6">
                                                <p><a href="">Forgot password?</a></p>
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
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <p class="text-secondary">Don't have an account?</p>
                                            </div>
                                            <div class="col-sm-4">
                                                <a class="btn btn-dark rounded-pill" href="/register">Register Here</a>

                                            </div>
                                        </div>

                                    </div><!--end card-body-->
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
