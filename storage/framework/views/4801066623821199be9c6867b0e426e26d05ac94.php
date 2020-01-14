<div class="form-group">
    <label> <?php echo e(__('Name')); ?></label>
    <input type="text" value="<?php echo e($row->name); ?>" placeholder="Category name" name="name" class="form-control">
</div>
<div class="form-group">
    <label> <?php echo e(__('Parent')); ?></label>
    <select name="parent_id" class="form-control">
        <option value=""> <?php echo e(__('-- Please Select --')); ?></option>
        <?php
        $traverse = function ($categories, $prefix = '') use (&$traverse, $row) {
            foreach ($categories as $category) {
                if ($category->id == $row->id) {
                    continue;
                }
                $selected = '';
                if ($row->parent_id == $category->id)
                    $selected = 'selected';
                printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                $traverse($category->children, $prefix . '-');
            }
        };
        $traverse($parents);
        ?>
    </select>
</div>
<div class="form-group">
    <label> <?php echo e(__('Slug')); ?></label>
    <input type="text" value="<?php echo e($row->slug); ?>" placeholder="Category slug" name="slug" class="form-control">
</div>
<div class="form-group">
    <label class="control-label"> <?php echo e(__('Description')); ?></label>
    <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e($row->content); ?></textarea>
</div><?php /**PATH C:\laragon\www\Booking Core 1.1.0\booking-core\modules/News/Views/admin/category/form.blade.php ENDPATH**/ ?>