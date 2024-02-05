@extends('layouts.app')

@section('bread_crumb')
<!--begin::Page Title-->
<h5 class="text-dark font-weight-bolder mt-2 mb-2 mr-5 font-white">Schools Actual Price</h5>
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
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">List of Schools</h3>
                        <!-- <p class="">Here you will find the final schools price after the discount.</p> -->
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable mt-10" id="schoolTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
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
@endsection

@section('add_js')
<script src="{{ asset('assets/js/schools.js') }}"></script>

@endsection
