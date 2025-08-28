@extends('base.admin_dashboard_base')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    {{-- <h4 class="page-title">Customers</h4> --}}

                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <h4 class="card-title">Companies</h4>
                            </div>
                            {{-- <div class="col-auto">
                                <button class="btn bg-dark text-white rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#addDriver"><i class="fas fa-plus me-1"></i> Add Driver</button>
                            </div> --}}
                            <div class="col-auto ms-auto">

                                <div class="">
                                    {{-- <span class="text-primary fw-semibold">Note :</span><span
                                        class="text-primary fw-normal"> if you want to data edit do double click on a table
                                        row.</span> --}}
                                    {{-- <button class="btn bg-primary text-white rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#addDriver"><i class="fas fa-plus me-1"></i> Add New Admin</button> --}}
                                </div>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0" id="datatable_1">
                                <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>TIN</th>
                                        <th class="">Action</th>
                                        {{-- text-end  --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $comp)
                                        <tr>
                                            <td>{{ $comp->name }}</td>
                                            <td>{{ $comp->email }}</td>
                                            <td>{{ $comp->telephone }}</td>
                                            <td>{{ $comp->tin_number }}</td>
                                            {{-- <td>{{ Str::ucfirst($admin->national_id) }}</td> --}}
                                            {{-- <td>{{ $admin->id_number }}</td> --}}
                                            <td class="">
                                                <a href="" class="btn btn-sm btn-success"
                                                    data-bs-toggle="tooltip"data-bs-placement="top"
                                                    data-bs-original-title="View Details"><i
                                                        class="las la-eye fs-18"></i></a>

                                                <a href="" class="btn btn-sm btn-primary"
                                                    data-bs-toggle="tooltip"data-bs-placement="top"
                                                    data-bs-original-title="View Fleet"><i
                                                        class="las la-truck fs-18"></i></a>

                                                <a href="" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="tooltip"data-bs-placement="top"
                                                    data-bs-original-title="Deactivate Account"><i
                                                        class="las la-trash fs-18"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>

    @push('scripts')
        <script src="{{ asset('libs/vanilla-datatables/vanilla-dataTables.min.js') }}"></script>
        {{-- <script src="{{ asset('libs/vanilla-datatables-editable/datatable.editable.min.js') }}"></script> --}}
        <script src="{{ asset('js/pages/editable.init.js') }}"></script>
    @endpush

    {{-- Modal --}}
    <div class="modal fade" id="addDriver" tabindex="-1" aria-labelledby="addDriverLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVehicle">Add Driver</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        {{-- bulk add --}}
                        <div class="form-group mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-file text-muted thumb-xl rounded me-2 border-dashed"></i>
                                <div class="flex-grow-1 text-truncate">
                                    <div>
                                        <span class="" id="ragisterDate">Click here to upload data in bulk
                                        </span>
                                    </div>
                                    <a href="/drivers/add" class="btn btn-sm btn-dark rounded-pill" name="bulk_insert">Bulk
                                        data upload</a>
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>

                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user text-muted thumb-xl rounded me-2 border-dashed"></i>
                                <div class="flex-grow-1 text-truncate">
                                    <label class="btn btn-dark rounded-pill text-light">
                                        Add Image <input type="file" hidden="">
                                    </label>
                                </div><!--end media body-->
                            </div>
                        </div>

                        <div class="row">
                            {{-- first name --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="firstname">First Name</label>
                                    <div class="input-group">
                                        <input type="text" name="firstname" class="form-control" placeholder="E.g. John"
                                            aria-label="firstname">
                                    </div>
                                </div>
                            </div>
                            {{-- lastname --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="lastname">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" name=lastname class="form-control" placeholder="E.g. Doe"
                                            aria-label="lastname">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- email --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="E.g. johndoe@gmail.com" aria-label="email">
                                    </div>
                                </div>
                            </div>
                            {{-- mobile number --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="mobile_number">Mobile Number</label>
                                    <div class="input-group">
                                        <input type="tel" name="mobile_number" class="form-control"
                                            placeholder="E.g. 098382857192" aria-label="mobile_number">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- ID --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="ID">ID Type</label>
                                    <div class="input-group">
                                        <select class="form-control" name="id_type" id="">
                                            <option value="0">Select an ID type</option>
                                            <option value="1">Ghana Card</option>
                                            <option value="2">Passport</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- ID Number --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="id_number">ID Number</label>
                                    <div class="input-group">
                                        <input type="text" name="id_number" class="form-control"
                                            placeholder="E.g. G1234567890" aria-label="id_number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark w-100 rounded-pill">Add Driver</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    {{-- end modal --}}
@stop
