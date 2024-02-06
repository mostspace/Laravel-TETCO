

<?php $__env->startSection('bread_crumb'); ?>
<!--begin::Page Title-->
<h5 class="text-dark font-weight-bolder mt-2 mb-2 mr-5 font-white">Discount Matrix</h5>
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
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Discount Matrix</h3>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable mt-10" id="discountMatrixTable">
                        <thead>
                            <tr>
                                <th>From</th>
                                <th>To</th>
                                <th>Applied Discount (%)</th>
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
<script src="<?php echo e(asset('assets/js/discount-matrix.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\Works\Web\Tetco\resources\views/discount-matrix/index.blade.php ENDPATH**/ ?>