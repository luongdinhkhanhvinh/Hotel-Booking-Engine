<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar"><?php echo e(__('News Tags')); ?> </h1>
        </div>
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-title"><?php echo e(__('Add Tag')); ?></div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('News::admin/tag/form',['parents'=>$rows], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="">
                                <button class="btn btn-primary" type="submit"> <?php echo e(__('Add new')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        <?php if(!empty($rows)): ?>
                            <form method="post" action="<?php echo e(url('admin/module/news/tag/bulkEdit')); ?>" class="filter-form filter-form-left d-flex justify-content-start">
                                <?php echo e(csrf_field()); ?>

                                <select name="action" class="form-control">
                                    <option value=""><?php echo e(__(" Bulk Action ")); ?></option>
                                    <option value="delete"><?php echo e(__(" Delete ")); ?></option>
                                </select>
                                <button data-confirm="<?php echo e(__("Do you want to delete?")); ?>" class="btn-info btn btn-icon dungdt-apply-form-btn" type="submit"><?php echo e(__('Apply')); ?></button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <div class="col-left">
                        <form method="get" action="<?php echo e(url('/admin/module/news/tag/')); ?> " class="filter-form filter-form-right d-flex justify-content-end" role="search">
                            <?php echo csrf_field(); ?>
                            <input placeholder="<?php echo e(__("Search keyword ...")); ?>" type="text" name="s" value="<?php echo e(Request()->s); ?>" class="form-control">
                            <button class="btn-info btn btn-icon btn_search" id="search-submit" type="submit"><?php echo e(__('Search Tag')); ?></button>
                        </form>
                    </div>
                </div>
                <div class="text-right">
                    <p><i><?php echo e(__('Found :total items',['total'=>$rows->total()])); ?></i></p>
                </div>
                <div class="panel">
                    <form action="" class="bravo-form-item">
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="60px"><input type="checkbox" class="check-all"></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Slug')); ?></th>
                                    <th><?php echo e(__('Date')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($rows->total() > 0): ?>
                                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check-item" name="ids[]" value="<?php echo e($row->id); ?>">
                                            </td>
                                            <td class="title">
                                                <a href="<?php echo e(url('admin/module/news/tag/edit/'.$row->id)); ?>"><?php echo e($row->name); ?></a>
                                            </td>
                                            <td><?php echo e($row->slug); ?></td>
                                            <td><?php echo e(display_date($row->updated_at)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6"><?php echo e(__("No data")); ?></td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <?php echo e($rows->appends(request()->query())->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Booking Core 1.1.0\booking-core\modules/News/Views/admin/tag/index.blade.php ENDPATH**/ ?>