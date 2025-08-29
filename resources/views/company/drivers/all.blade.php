@extends('base.company_dashboard_base')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Manage Drivers</h4>

                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                {{-- <h4 class="card-title">Editable</h4> --}}
                            </div>
                            <div class="col-auto">

                            </div>
                            <div class="col-auto ms-auto">
                                <button class="btn bg-primary text-white rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#addDriver"><i class="fas fa-plus me-1"></i> Add Driver</button>
                                {{-- <div class="bg-primary-subtle p-2 border-dashed border-primary rounded">
                                    <span class="text-primary fw-semibold">Note :</span><span
                                        class="text-primary fw-normal"> if you want to data edit do double click on a table
                                        row.</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                {{ $dataTable->table() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>

    @push('scripts')
        <script>
            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn';

            $(document).ready(function() {
                setTimeout(function() {
                    $('.dt-buttons').addClass('mb-1');
                    $('.dt-paging').addClass('mt-1');
                }, 1);
            });

            function get_driver(id) {

                let xhr = new XMLHttpRequest();
                let url = "/company/drivers/" + id // Replace with your actual endpoint

                xhr.open("GET", url, true); // Use "POST" for sending data

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);

                            document.getElementById("name").value = response['driver']['name']
                            document.getElementById("email").value = response['driver']['email']
                            document.getElementById("telephone").value = response['driver']['telephone']
                            document.getElementById("id_type").value = response['driver']['national_id']
                            document.getElementById("id_number").value = response['driver']['id_number']

                        } else {
                            console.error("AJAX request failed: " + xhr.status);
                        }
                    }
                };

                xhr.send();
            };

            function delete_driver(id) {

                let xhr = new XMLHttpRequest();
                let url = "/company/driver/" + id // Replace with your actual endpoint

                xhr.open("GET", url, true); // Use "POST" for sending data

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            document.getElementById("delete_id").value = response['driver']['id'];
                        } else {
                            console.error("AJAX request failed: " + xhr.status);
                        }
                    }
                };

                xhr.send();
            };
        </script>

        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush

    {{-- Add Driver --}}
    <div class="modal fade" id="addDriver" tabindex="-1" aria-labelledby="addDriverLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="addVehicle">Add Driver</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('drivers.add') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        {{-- bulk edit --}}
                        <div class="form-group mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-file text-muted thumb-xl rounded me-2 border-dashed"></i>
                                <div class="flex-grow-1 text-truncate">
                                    <div>
                                        <span class="" id="ragisterDate">Click here to upload data in bulk
                                        </span>
                                    </div>
                                    <a href="/drivers/add" class="btn btn-sm btn-primary rounded-pill"
                                        name="bulk_insert">Bulk
                                        data upload</a>
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>

                    <div class="modal-body">
                        {{-- <div class="form-group mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user text-muted thumb-xl rounded me-2 border-dashed"></i>
                                <div class="flex-grow-1 text-truncate">
                                    <label class="btn btn-primary rounded-pill text-light">
                                        Add Image <input type="file" hidden="">
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            {{-- first name --}}
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label for="firstname"><span class="text-danger">*</span>Name</label>
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="E.g. John Doe" aria-label="firstname">
                                    </div>
                                </div>
                            </div>
                            {{-- lastname --}}
                            {{-- <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="lastname">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" name=lastname class="form-control" placeholder="E.g. Doe"
                                            aria-label="lastname">
                                    </div>
                                </div>
                            </div> --}}
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
                                    <label for="telephone"><span class="text-danger">*</span>Mobile Number</label>
                                    <div class="input-group">
                                        <input type="tel" name="telephone" class="form-control"
                                            placeholder="E.g. 098382857192" aria-label="telephone">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- ID --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="ID"><span class="text-danger">*</span>ID Type</label>
                                    <div class="input-group">
                                        <select class="form-control" name="national_id">
                                            <option value="">Select an ID type</option>
                                            <option value="ghana_card">Ghana Card</option>
                                            <option value="passport">Passport</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- ID Number --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="id_number"><span class="text-danger">*</span>ID Number</label>
                                    <div class="input-group">
                                        <input type="text" name="id_number" class="form-control"
                                            placeholder="E.g. G1234567890" aria-label="id_number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Add Driver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Update Modal --}}
    <div class="modal fade" id="editDriver" tabindex="-1" aria-labelledby="editDriverLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="addVehicle">Edit Driver</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="">
                    @csrf
                    <div class="modal-body">
                        {{-- bulk edit --}}
                        <div class="form-group mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-file text-muted thumb-xl rounded me-2 border-dashed"></i>
                                <div class="flex-grow-1 text-truncate">
                                    <div>
                                        <span class="" id="ragisterDate">Click here to upload data in bulk
                                        </span>
                                    </div>
                                    <a href="/drivers/add" class="btn btn-sm btn-primary rounded-pill"
                                        name="bulk_insert">Bulk
                                        data upload</a>
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>

                    <div class="modal-body">
                        {{-- <div class="form-group mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user text-muted thumb-xl rounded me-2 border-dashed"></i>
                                <div class="flex-grow-1 text-truncate">
                                    <label class="btn btn-primary rounded-pill text-light">
                                        Add Image <input type="file" hidden="">
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            {{-- first name --}}
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <label for="firstname"><span class="text-danger">*</span>Name</label>
                                    <div class="input-group">
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="E.g. John Doe" aria-label="firstname">
                                    </div>
                                </div>
                            </div>
                            {{-- lastname --}}
                            {{-- <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="lastname">Last Name</label>
                                    <div class="input-group">
                                        <input type="text" name=lastname class="form-control" placeholder="E.g. Doe"
                                            aria-label="lastname">
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <div class="row">
                            {{-- email --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="E.g. johndoe@gmail.com" aria-label="email">
                                    </div>
                                </div>
                            </div>
                            {{-- mobile number --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="telephone"><span class="text-danger">*</span>Mobile Number</label>
                                    <div class="input-group">
                                        <input type="tel" name="telephone" id="telephone" class="form-control"
                                            placeholder="E.g. 098382857192" aria-label="telephone">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- ID --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="ID"><span class="text-danger">*</span>ID Type</label>
                                    <div class="input-group">
                                        <select class="form-control" name="id_type" id="id_type">
                                            <option value="">Select an ID type</option>
                                            <option value="ghana_card">Ghana Card</option>
                                            <option value="passport">Passport</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- ID Number --}}
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="id_number"><span class="text-danger">*</span>ID Number</label>
                                    <div class="input-group">
                                        <input type="text" id="id_number" name="id_number" class="form-control"
                                            placeholder="E.g. G1234567890" aria-label="id_number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Add Driver</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteDriver" tabindex="-1" aria-labelledby="addDriverLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="deleteVehicle">Delete Vehicle</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('vehicles.delete') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <input name="delete_id" id="delete_id" hidden>
                                    <p class="mb-0">Are you sure you want to peform this action?</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                            </div>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
