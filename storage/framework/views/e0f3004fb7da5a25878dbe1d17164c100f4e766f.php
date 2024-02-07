

<?php $__env->startSection('bread_crumb'); ?>
<!--begin::Page Title-->
<h5 class="text-dark font-weight-bolder mt-2 mb-2 mr-5 font-white">Actual Price</h5>
<!--end::Page Title-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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
                        <h3 class="card-label"><?php echo e($school->name); ?>

                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="#" class="btn btn-primary bg-main font-weight-bolder" data-toggle="modal" data-target="#dataModal">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>New Grade</a>
                        <!--end::Button-->
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
                        <input type="text" class="form-control" placeholder="Enter actual price..." name="actual_price" />
                    </div>
                    <div class="form-group">
                        <label>Available Seats</label>
                        <input type="number" class="form-control" placeholder="Enter available seats..." name="seats" />
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('add_js'); ?>
<script type="text/javascript">
    var school_id = <?php echo json_encode($school_id, 15, 512) ?>;
</script>
<script src="<?php echo e(asset('assets/js/schools-actual-price.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\Works\Web\Tetco\resources\views/schools-actual-price/actual-price.blade.php ENDPATH**/ ?>