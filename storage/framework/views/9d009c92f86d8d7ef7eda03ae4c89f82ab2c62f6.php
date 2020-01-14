<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(url('admin/module/user/changepass/'.$row->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="container">
            <div class="d-flex justify-content-between mb20">
                <div class="">
                    <h1 class="title-bar"><?php echo e($row->id ? 'Thay đổi mật khẩu: '.$row->getDisplayName() : 'Thêm mới thành viên'); ?></h1>
                </div>
            </div>
            <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-title">
                            <?php if($row->id): ?>
                                <strong class=""><?php echo e(__('Thay đổi mật khẩu')); ?></strong>
                            <?php else: ?>
                                <strong class=""><?php echo e(__('Mật khẩu')); ?></strong>
                            <?php endif; ?>
                        </div>
                        <div class="panel-body">

                            <?php if($row->id and $row->id != $currentUser->id and !$currentUser->hasPermissionTo('user_update') ): ?>
                                <div class="form-group">
                                    <label><?php echo e(__('Mật khẩu cũ')); ?></label>
                                    <input type="password" value="" placeholder="<?php echo e(__('Mật khẩu cũ')); ?>" name="old_password" class="form-control" >
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label><?php echo e(__('Mật khẩu mới')); ?></label>
                                <input type="password" value="" placeholder="<?php echo e(__('Mật khẩu')); ?>" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('Nhập lại mật khẩu')); ?></label>
                                <input type="password" value="" placeholder="<?php echo e(__('Nhập lại mật khẩu')); ?>" name="password_confirmation" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary"> <?php echo e(__('Thay đổi mật khẩu')); ?> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Booking Core 1.1.0\booking-core\modules/User/Views/admin/password.blade.php ENDPATH**/ ?>