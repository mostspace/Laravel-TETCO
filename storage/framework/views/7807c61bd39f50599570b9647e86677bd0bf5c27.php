

<?php $__env->startSection('bread_crumb'); ?>
<!--begin::Page Title-->
<h5 class="text-dark font-weight-bolder mt-2 mb-2 mr-5 font-white">School Final Price</h5>
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
                        <h3 class="card-label"><?php echo e($school->school_name); ?>

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
                                <th>Final Price for Citizen</th>
                                <th>Final Price for Non Citizen</th>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('add_js'); ?>
<script type="text/javascript">
    var school_id = <?php echo json_encode($school_id, 15, 512) ?>;
</script>

<script src="<?php echo e(asset('assets/js/school-final-price.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\Works\Web\Tetco\resources\views/school-final-price.blade.php ENDPATH**/ ?>