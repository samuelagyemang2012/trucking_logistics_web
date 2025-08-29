<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.3.3/css/dataTables.dataTables.min.css" />
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.x/css/buttons.dataTables.min.css" /> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/3.2.4/css/buttons.dataTables.min.css" rel="stylesheet">

    <!-- App css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Top Bar Start -->
    <div class="topbar d-print-none">
        <div class="container-fluid">
            <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">

                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li>
                        <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                            <i class="iconoir-menu"></i>
                        </button>
                    </li>

                </ul>
                {{-- Account Settings --}}
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false" data-bs-offset="0,19">
                            <i class="far fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0">
                            <div class="dropdown-divider mt-0"></div>
                            <small class="text-muted px-2 pb-1 d-block">Account</small>
                            <a class="dropdown-item" href=""><i
                                    class="las la-user fs-18 me-1 align-text-bottom"></i> Profile</a>
                            <div class="dropdown-divider mb-0"></div>
                            <div>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit"><i
                                            class="las la-power-off fs-18 me-1 align-text-bottom"></i> Logout</button>
                                </form>

                            </div>

                        </div>
                    </li>
                </ul>
                {{-- end --}}
            </nav>
            <!-- end navbar-->
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- leftbar-tab-menu -->
    <div class="startbar d-print-none">
        <!--start brand-->
        <div class="brand">
            <a href="/" class="logo">
                <span><img src="{{ asset('images/logo-sm.png') }}" alt="logo-small" class="logo-sm"></span>
                <span class="">
                    <img src="{{ asset('images/logo-sm.png') }}" alt="logo-large" class="logo-lg logo-light">
                    <img src="{{ asset('images/logo-sm.png') }}" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end brand-->
        <!--start startbar-menu-->
        <div class="startbar-menu">
            <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
                <div class="d-flex align-items-start flex-column w-100">
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-auto w-100">
                        {{-- <li class="menu-label mt-2">
                            <span>Main</span>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('admin.dashboard') }}">
                                <i class="iconoir-report-columns menu-icon"></i>
                                <span>Dashboard</span>
                                {{-- <span class="badge text-bg-info ms-auto">New</span> --}}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary collapsed" href="#posts" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="posts">
                                <i class="iconoir-task-list menu-icon"></i>
                                <span>Jobs</span>
                            </a>
                            <div class="collapse " id="posts">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/">All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/">Pending</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/">In Transit</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/">Completed</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary collapsed" href="#users" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="users">
                                <i class="iconoir-community menu-icon"></i>
                                <span>User Management</span>
                            </a>
                            <div class="collapse " id="users" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.users.companies') }}">Companies</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('admin.users.customers') }}">Customers</a>
                                    </li>
                                    {{-- <li class="nav-item"> --}}
                                    {{-- <a class="nav-link" href="">Admins</a> --}}
                                    {{-- </li> --}}
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('admin.dashboard') }}">
                                <i class="iconoir-hand-cash menu-icon"></i>
                                <span>Payments</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('admin.dashboard') }}">
                                <i class="iconoir-user menu-icon"></i>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="{{ route('admin.dashboard') }}">
                                <i class="iconoir-settings menu-icon"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
                </li>

                </ul>
            </div>
            </li>
            </ul>

        </div>
    </div>
    </div>
    </div>
    <div class="startbar-overlay d-print-none"></div>

    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content">
            @yield('content')
            <!-- end page-wrapper -->
        </div>
        <footer class="footer text-center text-sm-start d-print-none" style="position: fixed;z-index:200;">
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

        {{-- Delete Modal --}}
        <div class="modal fade" id="deactivate" tabindex="-1" aria-labelledby="deactivate" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="deactivate">Deactivate Your Account?</h5>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.deactivate.account') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div> 
                                        <input name="deactivate_id" value="{{auth()->user()->id}}" hidden>
                                        <p class="mb-0">
                                            Are you sure you want to delete your account?
                                        </p>
                                        <p></p>
                                        <p class="mb-0">
                                            This action is permanent and cannot be undone. You will lose
                                            access to all your data, including your profile, vehicles, and company
                                            information.
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
    </div>

    <!-- Javascript  -->
    <!-- vendor js -->

    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/DynamicSelect.js') }}"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.12/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.12/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.4/js/buttons.html5.min.js"></script>

    @stack('scripts')
    <script src="{{ asset('js/app.js') }}"></script>


</body>
<!--end body-->

</html>
