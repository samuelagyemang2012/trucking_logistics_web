@extends('base.admin_dashboard_base')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h1 class="page-title text-primary">Welcome, {{$name}}</h1>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-md-4">
                <div class="card bg-globe-img">
                    <div class="card-body">
                        <div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fs-16 fw-semibold text-secondary">Revenue</span>
                            </div>

                            <h4 class="my-2 fs-24 fw-semibold"> GHS <small class="font-18">5000</small></h4>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fs-16 fw-semibold text-secondary">Expected Revenue</span>
                            </div>

                            <h4 class="my-2 fs-24 fw-semibold"> GHS <small class="font-18">15000</small></h4>

                            {{-- <button type="submit" class="btn btn-soft-primary">Transfer</button> --}}
                            {{-- <button type="button" class="btn btn-soft-danger">Request</button> --}}
                        </div>
                        {{-- <div class="row mt-3">
                            <div class="col-4">
                                <div class="p-2 border-dashed border-theme-color rounded">
                                    <h5 class="mt-1 mb-0 fw-medium">$82365.00</h5>
                                    <small class="text-muted">BTC/USD</small>
                                </div>
                            </div><!--end col-->
                            <div class="col-4">
                                <div class="p-2 border-dashed border-theme-color rounded">
                                    <h5 class="mt-1 mb-0 fw-medium">$15482.00</h5>
                                    <small class="text-muted">EUR/USD</small>
                                </div>
                            </div><!--end col-->
                            <div class="col-4">
                                <div class="p-2 border-dashed border-theme-color rounded">
                                    <h5 class="mt-1 mb-0 fw-medium">$95628.00</h5>
                                    <small class="text-muted">GBP/USD</small>
                                </div>
                            </div><!--end col-->
                        </div><!--end row--> --}}
                        {{-- <p class="mb-0  mt-2 text-success fst-italic">The last transaction $2560.00 is Successful!</p> --}}
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
            <div class="col-md-6 col-lg-4">
                <div class="card bg-corner-img">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Customers</p>
                                <h4 class="mt-1 mb-0 fw-medium">{{ $customers }}</h4>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-md border-dashed border-dark rounded mx-auto">
                                    <i class="iconoir-community fs-22 align-self-center mb-0 text-dark"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
                <div class="card bg-corner-img">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Companies</p>
                                <h4 class="mt-1 mb-0 fw-medium">{{ $companies }}</h4>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-md border-dashed border-dark rounded mx-auto">
                                    <i class="iconoir-building fs-22 align-self-center mb-0 text-dark"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
                <div class="card bg-corner-img">
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                            <div class="col-9">
                                <p class="text-muted text-uppercase mb-0 fw-normal fs-13">Jobs</p>
                                <h4 class="mt-1 mb-0 fw-medium">0</h4>
                            </div>
                            <!--end col-->
                            <div class="col-3 align-self-center">
                                <div
                                    class="d-flex justify-content-center align-items-center thumb-md border-dashed border-dark rounded mx-auto">
                                    <i class="iconoir-box-iso fs-22 align-self-center mb-0 text-dark"></i>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div><!--end col-->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title text-secondary">Job Details</h4>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div>
                    <div class="card-body pt-0">
                        <div id="admin_jobs" class="apex-charts"></div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->


    </div>


    <!--Start Footer-->
    <footer class="footer text-center text-sm-start d-print-none">
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
    </footer>

    @push('scripts')
        <script src="{{ asset('js/pages/admin/admin_dashboard.init.js') }}"></script>
    @endpush
@stop
