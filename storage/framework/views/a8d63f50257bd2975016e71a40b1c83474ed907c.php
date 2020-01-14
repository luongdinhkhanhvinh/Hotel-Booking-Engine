<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__('Vai trò')); ?></h1>
            <div class="title-actions">
                <a href="<?php echo e(url('admin/module/user/role/permission_matrix/')); ?>" class="btn btn-info"><?php echo e(__('Ma trận cho phép')); ?></a>
                <a href="<?php echo e(url('admin/module/user/role/create')); ?>" class="btn btn-primary"><?php echo e(__('Thêm mới vai trò')); ?></a>
            </div>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="panel">
            <div class="panel-title"><?php echo e(__('Tất cả vai trò')); ?></div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="60px"><input type="checkbox" class="check-all"></th>
                        <th><?php echo e(__('Tên')); ?></th>
                        <th><?php echo e(__('Ngày')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="<?php echo e($row->id); ?>"></td>
                            <td class="title">
                                <a href="<?php echo e(url('admin/module/user/role/edit/'.$row->id)); ?>"><?php echo e(ucfirst($row->name)); ?></a>
                            </td>
                            <td><?php echo e(display_date($row->updated_at)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($rows->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Booking Core 1.1.0\booking-core\modules/User/Views/admin/role/index.blade.php ENDPATH**/ ?>