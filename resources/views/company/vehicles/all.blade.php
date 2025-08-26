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
                                <button class="btn bg-primary text-white rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#addVehicle"><i class="fas fa-plus me-1"></i> Add Vehicle</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">

                            <table class="table" id="vehicle_table">
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
        </script>
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush

    {{-- Modal --}}
    <div class="modal fade" id="addVehicle" tabindex="-1" aria-labelledby="addVehicleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="addVehicle">Add Vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    {{-- select --}}
                                    {{-- <label class="btn btn-sm btn-outline-dark rounded-pill">
                                        Select file
                                        <input name="bulk_insert" type="file" hidden="">
                                    </label> --}}

                                    {{-- donwnload template --}}
                                    {{-- <a class="btn btn-sm btn-outline-dark rounded-pill" name="bulk_insert">Download template</a> --}}
                                    {{-- donwnload template --}}

                                    <a href="/vehicles/add" class="btn btn-sm btn-primary rounded-pill"
                                        name="bulk_insert">Bulk
                                        data upload</a>


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
                                            <option>Select Vehicle Type</option>
                                            @foreach ($types as $type)
                                                <option value={{ $type->id }}>{{ $type->name }}</option>
                                            @endforeach
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
                                        <input name="number_plate" value="{{old('number_plate')}}" type="text" class="form-control"
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
                                        <input name="mileage" value="{{old('mileage')}}" class="form-control" aria-label="mileage"
                                            placeholder="Enter vehicle mileage">
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="payload">Payload Capacity (kgs)</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text" id="model"><i class="fas fa-car"></i></span> --}}
                                        <input name="payload" value="{{old('payload')}}" class="form-control"
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
                                        <input name="manufacture_year" value="{{old('manufacture_year')}}" type="number" class="form-control"
                                            placeholder="Eg. 1978" aria-label="manufacture_year">
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
                                            @foreach ($status as $status)
                                                <option value={{ $status->id }}>{{ $status->name }}</option>
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
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Add Vehicle</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

    {{-- end modal --}}



@stop
