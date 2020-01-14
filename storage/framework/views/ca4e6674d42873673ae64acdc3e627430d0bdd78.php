<?php
$menus = [
    [
        'url'   => 'admin',
        'title' => __("Bảng điều khiển"),
        'icon'  => 'icon ion-ios-desktop',
        "position"=>0
    ],
    [
        "position"=>10,
        'url'        => 'admin/module/news',
        'title'      => __("Tin tức"),
        'icon'       => 'ion-md-bookmarks',
        'permission' => 'news_view',
        'children'   => [
            [
                'url'        => 'admin/module/news',
                'title'      => __("Tất cả tin tức"),
                'permission' => 'news_view',
            ],
            [
                'url'        => 'admin/module/news/create',
                'title'      => __("Thêm tin tức"),
                'permission' => 'news_create',
            ],
            [
                'url'        => 'admin/module/news/category',
                'title'      => __("Thể loại"),
                'permission' => 'news_create',
            ],
            [
                'url'        => 'admin/module/news/tag',
                'title'      => __("Thẻ"),
                'permission' => 'news_create',
            ],
        ]
    ],
    [
        "position"=>20,
        'url'   => 'admin/module/page',
        'title' => __("Trang"),
        'icon'  => 'icon ion-ios-bookmarks',
    ],
    [
        "position"=>30,
        'url'        => 'admin/module/location',
        'title'      => __("Vị trí"),
        'icon'       => 'icon ion-md-compass',
        'permission' => 'location_view',
    ],
    [
        "position"=>40,
        'url'        => 'admin/module/tour',
        'title'      => __("Chuyến du lịch"),
        'icon'       => 'icon ion-md-umbrella',
        'permission' => 'tour_view',
        'children'   => [
            [
                'url'        => 'admin/module/tour',
                'title'      => __('Tất cả chuyến du lịch'),
                'permission' => 'tour_view',
            ],
            [
                'url'        => 'admin/module/tour/create',
                'title'      => __("Thêm chuyến du lịch"),
                'permission' => 'tour_create',
            ],
            [
                'url'        => 'admin/module/tour/category',
                'title'      => __('Thể loại'),
                'permission' => 'tour_manage_others',
            ],
            [
                'url'        => 'admin/module/tour/attribute',
                'title'      => __('Thuộc tính'),
                'permission' => 'tour_manage_attributes',
            ],
            [
                'url'        => 'admin/module/tour/booking',
                'title'      => __('Lịch đặt trước'),
                'permission' => 'tour_create',
            ],
        ]
    ],
    [
        "position"=>50,
        'url'   => 'admin/module/review',
        'title' => __("Nhận xét"),
        'icon'  => 'icon ion-ios-text',
    ],
    [
        "position"=>60,
        'url'        => 'admin/module/core/menu',
        'title'      => __("Thực đơn"),
        'icon'       => 'icon ion-ios-apps',
        'permission' => 'menu_view',
    ],
    [
        "position"=>70,
        'url'        => 'admin/module/template',
        'title'      => __('Mẫu'),
        'icon'       => 'icon ion-logo-html5',
        'permission' => 'template_create',
    ],
    [
        "position"=>80,
        'url'        => 'admin/module/core/settings/index/general',
        'title'      => __('Cài đặt'),
        'icon'       => 'icon ion-ios-cog',
        'permission' => 'setting_update',
        'children'   => \Modules\Core\Models\Settings::getSettingPages()
    ],
    [
        "position"=>90,
        'url'      => 'admin/module/core/tools',
        'title'    => __("Công cụ"),
        'icon'     => 'icon ion-ios-hammer',
        'children' => [
            [
                'url'        => 'admin/module/language',
                'title'      => __('Ngôn ngữ'),
                'icon'       => 'icon ion-ios-globe',
                'permission' => 'language_manage',
            ],
            [
                'url'        => 'admin/module/language/translations',
                'title'      => __("Quản lý dịch"),
                'icon'       => 'icon ion-ios-globe',
                'permission' => 'language_translation',
            ],
            [
                'url'        => 'admin/logs',
                'title'      => __("Nhật ký hệ thống"),
                'icon'       => 'icon ion-ios-nuclear',
                'permission' => 'system_log_view',
            ],
        ]
    ],
    [
        "position"=>100,
        'url'        => 'admin/module/user',
        'title'      => __('Người dùng'),
        'icon'       => 'icon ion-ios-contacts',
        'permission' => 'user_view',
        'children'   => [
            [
                'url'   => 'admin/module/user',
                'title' => __('Tất cả người dùng'),
                'icon'  => 'fa fa-user',
            ],
            [
                'url'        => 'admin/module/user/role',
                'title'      => __('Quản lý phần quyền'),
                'permission' => 'role_view',
                'icon'       => 'fa fa-lock',
            ],
//            [
//                'url'        => 'admin/module/user/permission',
//                'title'      => __('Permission Manager'),
//                'permission' => 'permission_view',
//                'icon'       => 'fa fa-lock',
//            ],
            [
                'url'        => 'admin/module/user/subscriber',
                'title'      => __('Người đăng ký'),
                'permission' => 'newsletter_manage',
            ],
        ]
    ],
    [
        "position"=>110,
        'url'        => 'admin/module/report/booking',
        'title'      => __('Báo cáo'),
        'icon'       => 'icon ion-ios-pie',
        'permission' => 'report_view',
        'children'   => [
            [
                'url'        => 'admin/module/report/booking',
                'title'      => __('Báo cáo đặt phòng'),
                'icon'       => 'icon ion-ios-pricetags',
                'permission' => 'report_view',
            ],
            [
                'url'        => 'admin/module/report/statistic',
                'title'      => __('Thống kê đặt phòng'),
                'icon'       => 'icon ion ion-md-podium',
                'permission' => 'report_view',
            ],
            [
                'url'        => 'admin/module/contact',
                'title'      => __('Gửi liên hệ'),
                'icon'       => 'icon ion ion-md-mail',
                'permission' => 'contact_manage',
            ],

        ]
    ]
];

// Get All Plugins Menu
$plugins = \Nwidart\Modules\Facades\Module::allEnabled();
foreach ($plugins as $plugin){
    $adminMenu = config($plugin->getLowerName().'.admin_menu');
    if(!empty($adminMenu)){
        $menus = array_merge($menus,$adminMenu);
    }
}

$currentUrl = url(\Modules\Core\Walkers\MenuWalker::getActiveMenu());
$user = \Illuminate\Support\Facades\Auth::user();
if (!empty($menus)){
    foreach ($menus as $k => $menuItem) {

        if (!empty($menuItem['permission']) and !$user->hasPermissionTo($menuItem['permission'])) {
            unset($menus[$k]);
            continue;
        }
        $menus[$k]['class'] = $currentUrl == url($menuItem['url']) ? 'active' : '';
        if (!empty($menuItem['children'])) {
            $menus[$k]['class'] .= ' has-children';
            foreach ($menuItem['children'] as $k2 => $menuItem2) {
                if (!empty($menuItem2['permission']) and !$user->hasPermissionTo($menuItem2['permission'])) {
                    unset($menus[$k]['children'][$k2]);
                    continue;
                }
                $menus[$k]['children'][$k2]['class'] = $currentUrl == url($menuItem2['url']) ? 'active' : '';
            }
        }
    }

    //@todo Sort Menu by Position
    $menus = array_values(\Illuminate\Support\Arr::sort($menus, function ($value) {
        return $value['position'] ?? 0;
    }));
}

?>
<ul class="main-menu">
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <li class="<?php echo e($menuItem['class']); ?>"><a href="<?php echo e(url($menuItem['url'])); ?>">

                <?php if(!empty($menuItem['icon'])): ?>
                    <span class="icon text-center"><i class="<?php echo e($menuItem['icon']); ?>"></i></span>
                <?php endif; ?>
                <?php echo e($menuItem['title']); ?>

            </a>

            <?php if(!empty($menuItem['children'])): ?>
                <span class="btn-toggle"><i class="fa fa-angle-left pull-right"></i></span>
                <ul class="children">
                    <?php $__currentLoopData = $menuItem['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php echo e($menuItem['class']); ?>"><a href="<?php echo e(url($menuItem2['url'])); ?>">
                                <?php if(!empty($menuItem2['icon'])): ?>
                                    <i class="<?php echo e($menuItem2['icon']); ?>"></i>
                                <?php endif; ?>
                                <?php echo e($menuItem2['title']); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>

        </li>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH C:\laragon\www\Booking Core 1.1.0\booking-core\resources\views/admin/layouts/parts/sidebar.blade.php ENDPATH**/ ?>