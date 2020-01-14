<?php $__env->startSection('content'); ?>
    <form action="" method="post">
        <?php echo csrf_field(); ?>
        <div class="container">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar"><?php echo e($row->id ? 'Sửa: '.$row->name : 'Thêm vai trò mới'); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-body">
                            <h3 class="panel-body-title"><?php echo e(__('Nội dung vai trò')); ?> </h3>
                            <div class="form-group">
                                <label><?php echo e(__('Tên')); ?></label>
                                <input type="text" value="<?php echo e($row->name); ?>" placeholder="<?php echo e(__('Tên vai trò')); ?>" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>&nbsp;</span>
                        <button class="btn btn-primary" type="submit"><?php echo e(__('Lưu thay đổi')); ?></button>
                    </div>
                </div>
            </div>

        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script.body'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Booking Core 1.1.0\booking-core\modules/User/Views/admin/role/detail.blade.php ENDPATH**/ ?>