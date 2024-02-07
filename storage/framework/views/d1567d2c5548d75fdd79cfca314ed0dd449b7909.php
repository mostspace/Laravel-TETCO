

<?php $__env->startSection('bread_crumb'); ?>
<!--begin::Page Title-->
<h5 class="text-dark font-weight-bolder mt-2 mb-2 mr-5 font-white">Schools Actual Price</h5>
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
                        <h3 class="card-label">List of Schools</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button class="btn btn-primary bg-main font-weight-bolder" id="newSchool" data-toggle="modal" data-target="#dataModal">
                            <i class="fa-solid fa-school fs-9 mr-2"></i>New School
                        </button>
                        <!--end::Button-->
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

<!--begin::Modal-->
<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New School</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="newSchoolFrom">
                    <div class="form-group">
                        <label>School Name</label>
                        <input type="text" id="schoolName" class="form-control" placeholder="" name="school" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="addSchool" class="btn btn-primary bg-main font-weight-bold">Save changes</button>
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('add_js'); ?>
<script src="<?php echo e(asset('assets/js/schools.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\Works\Web\Tetco\resources\views/schools-actual-price/index.blade.php ENDPATH**/ ?>