@extends('layouts.app')

@section('bread_crumb')
<!--begin::Page Title-->
<h5 class="text-dark font-weight-bolder mt-2 mb-2 mr-5 font-white">Actual Price</h5>
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
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable mt-10" id="actualPriceTable">
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
                        <label>Grade</label>
                        <input type="number" class="form-control" placeholder="Enter Grade..." name="grade" />
                    </div>

                    <div class="form-group">
                        <label>Actual Price</label>
                        <input type="text" class="form-control" placeholder="Enter available seats" name="actual_price" />
                    </div>

                    <div class="form-group">
                        <label>Available Seats</label>
                        <input type="number" class="form-control" placeholder="Enter available seats" name="seats" />
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


Sorry but, just 10 min
