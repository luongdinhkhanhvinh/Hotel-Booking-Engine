<div class="form-group">
    <label><?php echo e(__("Địa phương")); ?></label>
    <div>
        <select name="locale" class="form-control dungdt-select2-field dungdt_input_locale" data-options='{"allowClear":true}' data-id="<?php echo e($row->id); ?>">
            <option value=""><?php echo e(__("-- Vui lòng chọn --")); ?></option>
            <?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option data-name="<?php echo e($name); ?>" <?php if($row->locale == $locale): ?> selected <?php endif; ?> value="<?php echo e($locale); ?>"><?php echo e($name); ?> - (<?php echo e($locale); ?>)</option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label><?php echo e(__("Biểu tượng cờ")); ?></label>
    <div class="input-group mb-3">
        <input type="text" value="<?php echo e($row->flag); ?>" placeholder="<?php echo e(__("Eg: vn")); ?>" name="flag" class="form-control dungdt-input-flag-icon" required>
        <div class="input-group-append">
            <span class="input-group-text"><span class="flag-icon  flag-icon-<?php echo e($row->flag); ?>"></span></span>
        </div>

        <div class="invalid-feedback">
            <?php echo e(__('Vui lòng nhập mã cờ')); ?>

        </div>
    </div>
</div>
<div class="form-group">
    <label><?php echo e(__("Tên")); ?></label>
    <input type="text" value="<?php echo e($row->name); ?>" placeholder="<?php echo e(__("Tên hiển thị")); ?>" name="name" class="form-control" required>
    <div class="invalid-feedback">
        <?php echo e(__('Vui lòng nhập tên ngôn ngữ')); ?>

    </div>
</div>
<div class="form-group">
    <label><?php echo e(__("Trạng thái")); ?></label>
    <div class="">
        <label>
            <input type="radio" <?php if(!$row->status or $row->status == 'publish'): ?> checked <?php endif; ?> name="status" value="publish"> <?php echo e(__('Công bố')); ?>

        </label>
    </div>
    <div>
        <label>
            <input type="radio" <?php if($row->status == 'draft'): ?> checked <?php endif; ?> name="status" value="draft"> <?php echo e(__('Nháp')); ?>

        </label>
    </div>
</div>
<?php /**PATH C:\laragon\www\Booking Core 1.1.0\booking-core\modules/Language/Views/admin/language/form.blade.php ENDPATH**/ ?>