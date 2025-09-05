@extends('base.company_dashboard_base')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                    <h4 class="page-title">Manage Vehicles</h4>

                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->


        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-auto">

                                {{-- success --}}
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                                        <span>{{ session('success') }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                {{-- error --}}
                                @if ($errors->any())
                                    <div class="alert">
                                        <ul class="list-group">
                                            @foreach ($errors->all() as $error)
                                                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>


                            <div class="col-auto ms-auto">
                                <button class="btn bg-dark text-white" data-bs-toggle="modal"
                                    data-bs-target="#addVehicle"><i class="fas fa-plus me-1"></i> Add Vehicle</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">

                            <table class="table mb-0" id="">
                                {{ $dataTable->table() }}
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
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

            function get_vehicle(id) {

                let xhr = new XMLHttpRequest();
                let url = "/company/vehicles/" + id // Replace with your actual endpoint

                xhr.open("GET", url, true); // Use "POST" for sending data

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            document.getElementById("vehicle_id").value = response['vehicle']['id'];
                            document.getElementById("vehicle_type").value = response['vehicle']['type'];
                            document.getElementById("model").value = response['vehicle']['model'];
                            document.getElementById("registration_number").value = response['vehicle'][
                                'registration_number'
                            ]
                            document.getElementById("number_plate").value = response['vehicle']['number_plate']
                            document.getElementById("mileage").value = response['vehicle']['mileage']
                            document.getElementById("payload").value = response['vehicle']['payload']
                            document.getElementById("manufacture_year").value = response['vehicle']['manufacture_year']
                            document.getElementById("vehicle_status").value = response['vehicle']['status_id']

                        } else {
                            console.error("AJAX request failed: " + xhr.status);
                        }
                    }
                };

                xhr.send();
            };

            function delete_vehicle(id) {

                let xhr = new XMLHttpRequest();
                let url = "/company/vehicles/" + id // Replace with your actual endpoint

                xhr.open("GET", url, true); // Use "POST" for sending data

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            document.getElementById("delete_id").value = response['vehicle']['id'];
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

    {{-- Add Modal --}}
    <div class="modal fade" id="addVehicle" tabindex="-1" aria-labelledby="addVehicleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title" id="addVehicle">Add Vehicle</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('vehicles.add') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-file text-muted thumb-xl rounded me-2 border-dashed"></i>
                                <div class="flex-grow-1 text-truncate">
                                    <div>
                                        <span class="" id="ragisterDate">Click here to upload data in bulk
                                        </span>
                                    </div>

                                    <a href="{{ route('vehicles.add.bulk') }}" class="btn btn-sm btn-dark"
                                        name="bulk_insert">Bulk
                                        data upload</a>


                                </div>
                            </div>
                        </div>
                        <hr>
                        {{--  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="vehicle_type">Vehicle Type</label>
                                    <div class="input-group">
                                        <select name="vehicle_type" class="form-control" aria-label="vehicle_type">
                                            <option>Select Vehicle Type</option>
                                            @foreach ($types as $type)
                                                <option value={{ $type->id }}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="model">Model</label>
                                    <div class="input-group">
                                        <input name="model" type="text" class="form-control"
                                            placeholder="Enter vehicle model" aria-label="model">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  --}}

                        {{--  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="registration_number">Registration Number</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="model"><i class="fas fa-car"></i></span> --}}
                                        <input name="registration_number" type="text" class="form-control"
                                            aria-label="registration_number" placeholder="Enter registration number">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="number_plate">Number Plate</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="model"><i class="fas fa-car"></i></span> --}}
                                        <input name="number_plate" value="{{ old('number_plate') }}" type="text"
                                            class="form-control" placeholder="Enter number plate" aria-label="number_plate">
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                        {{--  --}}

                        {{--  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="mileage">Mileage</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="model"><i class="fas fa-car"></i></span> --}}
                                        <input name="mileage" value="{{ old('mileage') }}" class="form-control"
                                            aria-label="mileage" placeholder="Enter vehicle mileage">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="payload">Payload Capacity (kgs)</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="model"><i class="fas fa-car"></i></span> --}}
                                        <input name="payload" value="{{ old('payload') }}" class="form-control"
                                            placeholder="Enter payload in kgs" aria-label="payload">
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                        {{--  --}}

                        {{--  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="manufacture_year">Year of Manufacture</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="manufacture_year"><i
                                                class="far fa-calendar"></i></span> --}}
                                        <input name="manufacture_year" value="{{ old('manufacture_year') }}"
                                            type="number" class="form-control" placeholder="Eg. 1978"
                                            aria-label="manufacture_year">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="vehicle_status">Vehicle Status</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="ragisterDate"><i class="fas fa-truck"></i></span> --}}

                                        <select name="status" class="form-control" aria-label="vehicle_status">
                                            <option>Select Vehicle Status</option>
                                            @foreach ($status as $st)
                                                <option value={{ $st->id }}>{{ $st->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                        {{--  --}}

                        {{--  --}}
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                        </div>
                        {{--  --}}
                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark w-100 rounded-pill">Add Vehicle</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    {{-- Update Modal --}}
    <div class="modal fade" id="editVehicle" tabindex="-1" aria-labelledby="addVehicleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title" id="addVehicle">Edit Vehicle</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('vehicles.update') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-file text-muted thumb-xl rounded me-2 border-dashed"></i>
                                <div class="flex-grow-1 text-truncate">
                                    <div>
                                        <span class="" id="ragisterDate">Click here to upload data in bulk
                                        </span>
                                    </div>

                                    <a href="/vehicles/add" class="btn btn-sm btn-dark"
                                        name="bulk_insert">Bulk
                                        data upload</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{--  --}}
                        <div class="row">
                            <div class="col-md-6">

                                <input name="vehicle_id" id="vehicle_id" hidden>

                                <div class="mb-2">
                                    <label for="vehicle_type">Vehicle Type</label>
                                    <div class="input-group">
                                        <select id="vehicle_type" name="vehicle_type" class="form-control"
                                            aria-label="vehicle_type">
                                            <option>Select Vehicle Type</option>
                                            @foreach ($types as $type)
                                                <option value={{ $type->id }}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="model">Model</label>
                                    <div class="input-group">
                                        <input id="model" name="model" type="text"
                                            class="form-control"placeholder="Enter vehicle model" aria-label="model">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  --}}

                        {{--  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="registration_number">Registration Number</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="model"><i class="fas fa-car"></i></span> --}}
                                        <input id="registration_number" name="registration_number" type="text"
                                            class="form-control" aria-label="registration_number"
                                            placeholder="Enter registration number">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="number_plate">Number Plate</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="model"><i class="fas fa-car"></i></span> --}}
                                        <input id="number_plate" name="number_plate" value="{{ old('number_plate') }}"
                                            type="text" class="form-control" placeholder="Enter number plate"
                                            aria-label="number_plate">
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                        {{--  --}}

                        {{--  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="mileage">Mileage</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="model"><i class="fas fa-car"></i></span> --}}
                                        <input id="mileage" name="mileage" value="{{ old('mileage') }}"
                                            class="form-control" aria-label="mileage"
                                            placeholder="Enter vehicle mileage">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="payload">Payload Capacity (kgs)</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="model"><i class="fas fa-car"></i></span> --}}
                                        <input id="payload" name="payload" value="{{ old('payload') }}"
                                            class="form-control" placeholder="Enter payload in kgs" aria-label="payload">
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                        {{--  --}}

                        {{--  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="manufacture_year">Year of Manufacture</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="manufacture_year"><i
                                                class="far fa-calendar"></i></span> --}}
                                        <input id="manufacture_year" name="manufacture_year"
                                            value="{{ old('manufacture_year') }}" type="number" class="form-control"
                                            placeholder="Eg. 1978" aria-label="manufacture_year">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="vehicle_status">Vehicle Status</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="ragisterDate"><i class="fas fa-truck"></i></span> --}}

                                        <select id="vehicle_status" name="status" class="form-control"
                                            aria-label="vehicle_status">
                                            <option>Select Vehicle Status</option>
                                            @foreach ($status as $st)
                                                <option value={{ $st->id }}>{{ $st->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark w-100 rounded-pill">Update Vehicle</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteVehicle" tabindex="-1" aria-labelledby="addVehicleLabel" aria-hidden="true">
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
