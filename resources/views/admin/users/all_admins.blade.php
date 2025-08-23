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
                                <h4 class="card-title">Admins</h4>
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
                                    <button class="btn bg-primary text-white rounded-pill" data-bs-toggle="modal"
                                        data-bs-target="#addAdmin"><i class="fas fa-plus me-1"></i> Add New Admin</button>
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
                                        <th class="">Action</th>
                                        {{-- text-end  --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->telephone }}</td>
                                            {{-- <td>{{ Str::ucfirst($admin->national_id) }}</td> --}}
                                            {{-- <td>{{ $admin->id_number }}</td> --}}
                                            <td class="">
                                                {{-- <a href="#"><i class="las la-pen text-secondary fs-18"></i></a> --}}
                                                {{-- <a href="#" class="btn btn-sm btn-primary">View Jobs</a> --}}
                                                <a href="" class="btn btn-sm btn-primary"
                                                    data-bs-toggle="tooltip"data-bs-placement="top"
                                                    data-bs-original-title="View Details"><i
                                                        class="las la-eye fs-18"></i></a>

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
    <div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="addDriverLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="addAdmin">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        {{-- bulk add --}}
                        <div class="form-group mb-2">
                            <div class="d-flex align-items-center">
                                {{-- <i class="fas fa-file text-muted thumb-xl rounded me-2 border-dashed"></i> --}}
                                {{-- <div class="flex-grow-1 text-truncate">
                                    <div>
                                        <span class="" id="ragisterDate">Click here to upload data in bulk
                                        </span>
                                    </div>
                                    <a href="/drivers/add" class="btn btn-sm btn-dark rounded-pill" name="bulk_insert">Bulk
                                        data upload</a>
                                </div> --}}
                            </div>
                        </div>

                    </div>

                    <div class="modal-body">
                        {{-- <div class="form-group mb-2"> --}}
                        {{-- <div class="d-flex align-items-center">
                                <i class="fas fa-user text-muted thumb-xl rounded me-2 border-dashed"></i>
                                <div class="flex-grow-1 text-truncate">
                                    <label class="btn btn-dark rounded-pill text-light">
                                        Add Image <input type="file" hidden="">
                                    </label>
                                </div><!--end media body-->
                            </div> --}}
                        {{-- </div> --}}

                        <div class="row">
                            {{-- first name --}}
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="E.g. John Doe" aria-label="name" required>
                                    </div>
                                </div>


                                <div class="mb-2">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input type="email" name=email class="form-control"
                                            placeholder="E.g. example@gmail.com" aria-label="email" required>
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label for="telephone">Telephone</label>
                                    <div class="input-group">
                                        <input type="tel" name=telephone class="form-control"
                                            placeholder="E.g. 1234567890" aria-label="telephone" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Add Admin</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    {{-- end modal --}}
@stop
