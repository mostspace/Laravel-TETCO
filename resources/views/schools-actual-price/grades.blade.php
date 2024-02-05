@extends('layouts.app')

@section('bread_crumb')
<!--begin::Page Title-->
<h5 class="text-dark font-weight-bolder mt-2 mb-2 mr-5 font-white">Grades</h5>
<!--end::Page Title-->
@endsection

@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">  
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom mb-15">
                <!--begin::Card header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">{{ $school->name }}
                        <!-- <span class="d-block text-muted pt-2 font-size-sm">Load subdatatable in modal</span></h3> -->
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="#" class="btn btn-primary font-weight-bolder" id="newGrade" data-toggle="modal" data-target="#dataModal">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>New Grade
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable mt-10" id="gradeTable">
                        <thead>
                            <tr>
                                <th>Educational Level</th>
                                <th>Grade</th>
                                <th>Available Seats</th>
                                <th>Actual Price</th>
                            </tr>
                        </thead>
                    </table>
                    <!--end: Datatable-->
                </div>
                <!--begin::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

<!--begin::Modal-->
<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Grade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="newGradeForm">
                    <div class="form-group">
                        <label for="educationalLevel">Educational Level</label>
                        <select class="form-control" id="educationalLevel" name="edu_level">
                            <option>KG</option>
                            <option>Elementary</option>
                            <option>Intermediate</option>
                            <option>High School</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="citizenshipStatus">Citizenship Status</label>
                        <select class="form-control" id="citizenshipStatus" name="citizen_status">
                            <option>Citizen</option>
                            <option>Non-citizen</option>
                        </select>
                    </div>

                    <!-- <div class="form-group">
                        <label>Citizenship Status</label>
                        <div class="radio-inline">
                            <label class="radio">
                            <input type="radio" name="citizen_status" />
                            <span></span>Citizen</label>
                            <label class="radio">
                            <input type="radio" name="citizen_status" />
                            <span></span>Non-citizen</label>
                        </div>
                        <span class="form-text text-muted">Some help text goes here</span>
                    </div> -->

                    <div class="form-group">
                        <label>Available Seats</label>
                        <input type="number" class="form-control" placeholder="Enter available seats" name="seats" />
                        <!-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> -->
                    </div>
                </form>
                
            </div>
            <div class="modal-footer">
                <button type="button" id="addGrade" class="btn btn-primary font-weight-bold">Save changes</button>
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

@endsection

@section('add_js')
<script type="text/javascript">
    var school_id = @json($school_id);
</script>

<script src="{{ asset('assets/js/schools-actual-price.js') }}"></script>

@endsection
