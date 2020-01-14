<div class="user-form-settings">
    <div class="breadcrumb-page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="<?php echo e(url("/user/dashboard")); ?>">
                    <?php echo e(__("Trang chủ")); ?>

                </a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>&nbsp; <?php echo e(__("Cài đặt")); ?> </li>
        </ul>
        <div class="bravo-more-menu-user">
            <i class="icofont-settings"></i>
        </div>
    </div>
    <h2 class="title-bar">
        <?php echo e(__("Cài đặt")); ?>

        <a href="<?php echo e(url("/user/profile/change-password")); ?>" class="btn-change-password"><?php echo e(__("Thay đổi mật khẩu")); ?></a>
    </h2>
    <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e(url("/user/profile")); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-title">
                    <strong><?php echo e(__("Thông tin cá nhân")); ?></strong>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("E-mail")); ?></label>
                    <input type="text" value="<?php echo e($dataUser->email); ?>" placeholder="<?php echo e(__("E-mail")); ?>" readonly class="form-control">
                    <i class="fa fa-envelope input-icon"></i>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Họ")); ?></label>
                    <input type="text" value="<?php echo e($dataUser->first_name); ?>" name="first_name" placeholder="<?php echo e(__("Họ")); ?>" class="form-control">
                    <i class="fa fa-user input-icon"></i>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Tên")); ?></label>
                    <input type="text" value="<?php echo e($dataUser->last_name); ?>" name="last_name" placeholder="<?php echo e(__("Tên")); ?>" class="form-control">
                    <i class="fa fa-user input-icon"></i>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Số điện thoại")); ?></label>
                    <input type="text" value="<?php echo e($dataUser->phone); ?>" name="phone" placeholder="<?php echo e(__("Số điện thoại")); ?>" class="form-control">
                    <i class="fa fa-phone input-icon"></i>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Ngày sinh")); ?></label>
                    <input type="text" value="<?php echo e($dataUser->birthday? display_date($dataUser->birthday) :''); ?>" name="birthday" placeholder="<?php echo e(__("Ngày sinh")); ?>" class="form-control date-picker">
                    <i class="fa fa-birthday-cake input-icon"></i>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Về bản thân")); ?></label>
                    <textarea name="bio" rows="5" class="form-control"><?php echo e($dataUser->bio); ?></textarea>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Hình đại diện")); ?></label>
                    <div class="upload-btn-wrapper">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    <?php echo e(__("Duyệt")); ?>… <input type="file">
                                </span>
                            </span>
                            <input type="text" data-error="<?php echo e(__("Lỗi đăng lên...")); ?>" data-loading="<?php echo e(__("Đăng tải...")); ?>" class="form-control text-view" readonly value="<?php echo e($dataUser->getAvatarUrl()?? __("Không có ảnh")); ?>">
                        </div>
                        <input type="hidden" class="form-control" name="avatar_id" value="<?php echo e($dataUser->avatar_id?? ""); ?>">
                        <img class="image-demo" src="<?php echo e($dataUser->getAvatarUrl()?? ""); ?>"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-title">
                    <strong><?php echo e(__("Thông tin địa điểm")); ?></strong>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Địa chỉ 1")); ?></label>
                    <input type="text" value="<?php echo e($dataUser->address); ?>" name="address" placeholder="<?php echo e(__("Địa chỉ")); ?>" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Địa chỉ 2")); ?></label>
                    <input type="text" value="<?php echo e($dataUser->address2); ?>" name="address2" placeholder="<?php echo e(__("Địa chỉ 2")); ?>" class="form-control">
                    <i class="fa fa-location-arrow input-icon"></i>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Quận,Huyện")); ?></label>
                    <input type="text" value="<?php echo e($dataUser->state); ?>" name="state" placeholder="<?php echo e(__("Quận,Huyện")); ?>" class="form-control">
                    <i class="fa fa-map-signs input-icon"></i>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Thành phố")); ?></label>
                    <input type="text" value="<?php echo e($dataUser->city); ?>" name="city" placeholder="<?php echo e(__("Thành phố")); ?>" class="form-control">
                    <i class="fa fa-street-view input-icon"></i>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Quốc gia")); ?></label>
                    <select name="country" class="form-control">
                        <option value=""><?php echo e(__('-- Chọn --')); ?></option>
                        <?php $__currentLoopData = get_country_lists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(($dataUser->country ?? '') == $id): ?> selected <?php endif; ?> value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label><?php echo e(__("Mã bưu chính")); ?></label>
                    <input type="text" value="<?php echo e($dataUser->zip_code); ?>" name="zip_code" placeholder="<?php echo e(__("Mã bưu chính")); ?>" class="form-control">
                    <i class="fa fa-map-pin input-icon"></i>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <input type="submit" class="btn btn-primary" value="Lưu thay đổi">
            </div>
        </div>
    </form>
</div><?php /**PATH C:\laragon\www\Booking Core 1.1.0\booking-core\modules/User/Views/frontend/layouts/profile/index.blade.php ENDPATH**/ ?>