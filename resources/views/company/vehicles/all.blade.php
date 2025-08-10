@extends('base.dashboard_base')

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
                                {{-- <h4 class="card-title">Editable</h4> --}}
                            </div><!--end col-->
                            <div class="col-auto">
                                <button class="btn bg-dark text-white rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#addVehicle"><i class="fas fa-plus me-1"></i> Add Vehicle</button>
                            </div><!--end col-->
                            <div class="col-auto ms-auto">

                                <div class="bg-primary-subtle p-2 border-dashed border-primary rounded">
                                    <span class="text-primary fw-semibold">Note :</span><span
                                        class="text-primary fw-normal"> if you want to data edit do double click on a table
                                        row.</span>
                                </div>
                            </div><!--end col-->
                        </div> <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Type</th>
                                        <th>Model</th>
                                        <th>Registration Number</th>
                                        <th>Number Plate</th>
                                        <th>Mileage</th>
                                        <th>Payload Capacity</th>
                                        <th>Year of Manufacture</th>
                                        <th>Insurance Provider</th>
                                        <th>Status</th>
                                        {{-- <th data-type="date" data-format="YYYY/MM/DD">Start Date</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Truck</td>
                                        <td>Volvo FH16</td>
                                        <td>REG123456</td>
                                        <td>ABC-123</td>
                                        <td>150,000</td>
                                        <td>20,000 kg</td>
                                        <td>2019</td>
                                        <td>Allianz</td>
                                        <td>In Use</td>
                                    </tr>
                                    <tr>
                                        <td>Van</td>
                                        <td>Mercedes Sprinter</td>
                                        <td>REG789012</td>
                                        <td>123-ZXDC</td>
                                        <td>80,000</td>
                                        <td>4,000 kg</td>
                                        <td>2021</td>
                                        <td>None</td>
                                        <td>Available</td>
                                    </tr>
                                    <tr>
                                        <td>Flatbed Truck</td>
                                        <td>Mack Anthem</td>
                                        <td>REG678901</td>
                                        <td>PQR-890</td>
                                        <td>175,000</td>
                                        <td>22,000 kg</td>
                                        <td>2017</td>
                                        <td>Travelers</td>
                                        <td>Out of Service</td>
                                    </tr>
                                    <tr>
                                        <td>Trailer</td>
                                        <td>Great Dane Dry Van</td>
                                        <td>REG901234</td>
                                        <td>TRL-901</td>
                                        <td>200,000</td>
                                        <td>25,000 kg</td>
                                        <td>2018</td>
                                        <td>Liberty Mutual</td>
                                        <td>Available</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </div>

    @push('scripts')
        <script src="{{ asset('libs/vanilla-datatables/vanilla-dataTables.min.js') }}"></script>
        <script src="{{ asset('libs/vanilla-datatables-editable/datatable.editable.min.js') }}"></script>
        <script src="{{ asset('js/pages/editable.init.js') }}"></script>
    @endpush

    {{-- Modal --}}
    <div class="modal fade" id="addVehicle" tabindex="-1" aria-labelledby="addVehicleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVehicle">Add Vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-file text-muted thumb-xl rounded me-2 border-dashed"></i>
                                <div class="flex-grow-1 text-truncate">
                                    <div>
                                        <span class="" id="ragisterDate">Click here to upload data in bulk
                                        </span>
                                    </div>
                                    {{-- select --}}
                                    {{-- <label class="btn btn-sm btn-outline-dark rounded-pill">
                                        Select file
                                        <input name="bulk_insert" type="file" hidden="">
                                    </label> --}}

                                    {{-- donwnload template --}}
                                    {{-- <a class="btn btn-sm btn-outline-dark rounded-pill" name="bulk_insert">Download template</a> --}}
                                    {{-- donwnload template --}}

                                    <a href="/vehicles/add" class="btn btn-sm btn-dark rounded-pill" name="bulk_insert">Bulk data upload</a>


                                </div><!--end media body-->
                            </div>
                        </div>
                        <hr>
                        {{--  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="vehicle_type">Vehicle Type</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="ragisterDate"><i class="fas fa-truck"></i></span> --}}
                                        <select name="vehicle_type" class="form-control" aria-label="vehicle_type">
                                            <option value="0">Select Vehicle Type</option>
                                            <option value="1">Van</option>
                                            <option value="2">Trailer</option>
                                            <option value="3">Truck</option>
                                            <option value="4">Flatbed</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="model">Model</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="model"><i class="fas fa-car"></i></span> --}}
                                        <input name="model" type="text" class="form-control"
                                            placeholder="Enter vehicle model" aria-label="model">
                                    </div>
                                </div>
                            </div><!--end col-->
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
                                        <input name="number_plate" type="text" class="form-control"
                                            placeholder="Enter number plate" aria-label="number_plate">
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
                                        <input name="mileage" type="number" class="form-control" aria-label="mileage"
                                            placeholder="Enter vehicle mileage">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="payload">Payload Capacity (kgs)</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="model"><i class="fas fa-car"></i></span> --}}
                                        <input name="payload" type="number" class="form-control"
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
                                        <input type="number" class="form-control" placeholder="Eg. 1978"
                                            aria-label="manufacture_year">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="mobilleNo">Insurance Provider</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="mobilleNo"><i class="fas fa-phone"></i></span> --}}
                                        <input type="text" class="form-control" placeholder="Eg. Vanguard"
                                            aria-label="mobilleNo">
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                        {{--  --}}

                        {{--  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="vehicle_status">Vehicle Status</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="ragisterDate"><i class="fas fa-truck"></i></span> --}}
                                        <select name="vehicle_status" class="form-control" aria-label="vehicle_status">
                                            <option value="0">Select Vehicle Status</option>
                                            <option value="1">In Use</option>
                                            <option value="2">Available</option>
                                            <option value="3">Under Maintenance</option>
                                        </select>
                                    </div>
                                </div>
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

    {{-- end modal --}}

@stop
