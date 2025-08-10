@extends('base.dashboard_base')

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
                            <h4 class="card-title">Bulk Driver Upload</h4>
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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>ID Type</th>
                                    <th>ID Number</th>
                                    <th class="">Action</th>
                                    {{-- text-end  --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Karen</td>
                                    <td>Doe</td>
                                    <td>kdoe@gmail.com</td>
                                    <td>+1 234 567 890</td>
                                    <td>Passport</td>
                                    <td>G34590012</td>
                                    <td class="">
                                        {{-- <a href="#"><i class="las la-pen text-secondary fs-18"></i></a> --}}
                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Karen</td>
                                    <td>Doe</td>
                                    <td>kdoe@gmail.com</td>
                                    <td>+1 234 567 890</td>
                                    <td>Passport</td>
                                    <td>G34590012</td>
                                    <td class="">
                                        {{-- <a href="#"><i class="las la-pen text-secondary fs-18"></i></a> --}}
                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Karen</td>
                                    <td>Doe</td>
                                    <td>kdoe@gmail.com</td>
                                    <td>+1 234 567 890</td>
                                    <td>Passport</td>
                                    <td>G34590012</td>
                                    <td class="">
                                        {{-- <a href="#"><i class="las la-pen text-secondary fs-18"></i></a> --}}
                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Karen</td>
                                    <td>Doe</td>
                                    <td>kdoe@gmail.com</td>
                                    <td>+1 234 567 890</td>
                                    <td>Passport</td>
                                    <td>G34590012</td>
                                    <td class="">
                                        {{-- <a href="#"><i class="las la-pen text-secondary fs-18"></i></a> --}}
                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Karen</td>
                                    <td>Doe</td>
                                    <td>kdoe@gmail.com</td>
                                    <td>+1 234 567 890</td>
                                    <td>Passport</td>
                                    <td>G34590012</td>
                                    <td class="">
                                        {{-- <a href="#"><i class="las la-pen text-secondary fs-18"></i></a> --}}
                                        <a href="#"><i class="las la-trash-alt text-secondary fs-18"></i></a>
                                    </td>
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
