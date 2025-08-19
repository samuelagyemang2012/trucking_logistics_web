@extends('base.company_dashboard_base')

@section('content')
    <!-- Page Content-->

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                {{-- <h4 class="page-title">Buttons</h4> --}}

            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Bulk Vehicle Upload</h4>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div class="form-group mb-2">

                        <div class="d-flex align-items-center">
                            <i class="fas fa-file text-muted thumb-xl rounded me-2 border-dashed"></i>
                            <div class="flex-grow-1 text-truncate">

                                <form action="" method="get">
                                    <div>
                                        <span class="" id="ragisterDate">Please upload a <span
                                                class="badge bg-primary-subtle text-primary">.csv</span> or <span
                                                class="badge bg-primary-subtle text-primary">.xlsx</span> file for bulk
                                            addition
                                        </span>
                                    </div>
                                    {{-- select --}}
                                    <label class="btn btn-outline-dark rounded-pill">
                                        Select file
                                        <input type="file" name="bulk_insert" hidden="">
                                    </label>

                                    <span>OR</span>

                                    {{-- donwnload --}}
                                    <a href="" class="btn btn-outline-dark rounded-pill" name="bulk_insert">Download
                                        template</a>
                                    {{-- donwnload template --}}
                                    {{-- end form --}}

                            </div><!--end media body-->

                        </div>
                    </div>
                    <hr>
                    <div>
                        <button type="submit" class="btn btn-dark rounded-pill" name="bulk_insert">Upload data</button>
                    </div>
                    </form>

                </div><!--end card-body-->



            </div><!--end card-->
        </div> <!--end col-->

    </div>

    {{-- Preview --}}
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            {{-- <h4 class="card-title">Editable</h4> --}}
                        </div><!--end col-->
                        {{-- <div class=""> --}}
                        <div class="row">
                            <div class="col-sm-2">
                                <h4>Preview</h4>
                            </div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-1"></div>

                            <div class="col-sm-1">
                                <button class="btn btn-lg bg-dark text-white rounded-pill"> Save</button>
                            </div>



                            {{-- <div class="col-auto ms-auto"> --}}
                            <div class="col-sm-6">
                                <div class="bg-primary-subtle p-2 border-dashed border-primary rounded">
                                    <span class="text-primary fw-semibold">Note :</span><span
                                        class="text-primary fw-normal"> if
                                        you want to data edit do double click on a table
                                        row.</span>
                                </div>
                            </div>

                        </div>
                        {{-- </div><!--end col--> --}}

                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table" id="preview">
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
                                    {{-- <th>Status</th> --}}
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
                                    {{-- <td>In Use</td> --}}
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
                                    {{-- <td>Available</td> --}}
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
                                    {{-- <td>Out of Service</td> --}}
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
                                    {{-- <td>Available</td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->
    </div>

    @push('scripts')
        <script src="{{ asset('libs/vanilla-datatables/vanilla-dataTables.min.js') }}"></script>
        <script src="{{ asset('libs/vanilla-datatables-editable/datatable.editable.min.js') }}"></script>
        <script src="{{ asset('js/pages/editable.init.js') }}"></script>
    @endpush


@stop
