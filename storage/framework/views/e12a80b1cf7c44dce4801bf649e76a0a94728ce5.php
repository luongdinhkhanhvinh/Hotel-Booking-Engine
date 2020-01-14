<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__("Tùy chọn reCapcha của Google")); ?></h3>
        <p class="form-group-desc"><?php echo e(__('Cấu hình reCapcha google cho hệ thống')); ?></p>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label class="" ><?php echo e(__("Kích hoạt biểu mẫu đăng nhập reCaptcha")); ?></label>
                    <div class="form-controls">
                        <label><input type="checkbox" name="user_enable_login_recaptcha" value="1" <?php if(!empty($settings['user_enable_login_recaptcha'])): ?> checked <?php endif; ?> /> <?php echo e(__("Bật")); ?> </label>
                        <br>
                        <small class="form-text text-muted"><?php echo e(__("Bật chế độ cho hình thức đăng nhập")); ?></small>
                    </div>
                </div>
                <div class="form-group">
                    <label class="" ><?php echo e(__("Kích hoạt biểu mẫu đăng nhập reCaptcha")); ?></label>
                    <div class="form-controls">
                        <label><input type="checkbox" name="user_enable_register_recaptcha" value="1"  <?php if(!empty($settings['user_enable_register_recaptcha'])): ?> checked <?php endif; ?> /> <?php echo e(__("Bật")); ?> </label>
                        <br>
                        <small class="form-text text-muted"><?php echo e(__("Bật chế độ cho hình thức đăng nhập")); ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Nội dụng Email người dùng đã được đăng ký')); ?></h3>
        <div class="form-group-desc"><?php echo e(__('Nội dung email gửi cho Khách hàng hoặc Quản trị viên khi người dùng đăng ký.')); ?>

            <?php $__currentLoopData = \Modules\User\Listeners\SendMailUserRegisteredListen::CODE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><code><?php echo e($value); ?></code></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">
                <div class="form-group">
                    <label> <input type="checkbox" <?php if($settings['enable_mail_user_registered'] ?? '' == 1): ?> checked <?php endif; ?> name="enable_mail_user_registered" value="1"> <?php echo e(__("Cho phép gửi email cho khách hàng khi khách hàng đăng ký?")); ?></label>
                </div>
                <div class="form-group" data-condition="enable_mail_user_registered:is(1)">
                    <label ><?php echo e(__("Nội dung")); ?></label>
                    <div class="form-controls">
                        <textarea name="user_content_email_registered" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e($settings['user_content_email_registered'] ?? ''); ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label> <input type="checkbox" <?php if($settings['admin_enable_mail_user_registered'] ?? '' == 1): ?> checked <?php endif; ?> name="admin_enable_mail_user_registered" value="1"> <?php echo e(__("Cho phép gửi email đến quản trị viên khi khách hàng đăng ký ?")); ?></label>
                </div>
                <div class="form-group" data-condition="admin_enable_mail_user_registered:is(1)">
                    <label ><?php echo e(__("Nội dung")); ?></label>
                    <div class="form-controls">
                        <textarea name="admin_content_email_user_registered" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e($settings['admin_content_email_user_registered'] ?? ''); ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <h3 class="form-group-title"><?php echo e(__('Nội dung Email Người dùng Quên mật khẩu')); ?></h3>
        <div class="form-group-desc">
            <?php $__currentLoopData = \Modules\User\Emails\ResetPasswordToken::CODE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><code><?php echo e($value); ?></code></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel">
            <div class="panel-body">

                <div class="form-group" >
                    <label ><?php echo e(__("Nội dung")); ?></label>
                    <div class="form-controls">
                        <textarea name="user_content_email_forget_password" class="d-none has-ckeditor" cols="30" rows="10"><?php echo e($settings['user_content_email_forget_password'] ?? ''); ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\Booking Core 1.1.0\booking-core\modules/User/Views/admin/settings/user.blade.php ENDPATH**/ ?>