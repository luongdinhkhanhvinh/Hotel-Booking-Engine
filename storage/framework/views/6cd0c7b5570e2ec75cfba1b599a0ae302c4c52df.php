<?php $__env->startSection('head'); ?>
    <style type="text/css">
        .bravo_topbar, .bravo_header, .bravo_footer {
            display: none;
        }
        html, body, .bravo_wrap, .bravo_user_profile, .row-eq-height > .col-md-3 {
            min-height: 100vh !important;
        }
    </style>
    <link href="<?php echo e(asset('module/user/css/user.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="bravo_user_profile">
        <div class="container-fluid">
            <div class="row row-eq-height">
                <div class="col-md-3">
                    <?php echo $__env->make('User::frontend.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('User::frontend.layouts.dashboard.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="<?php echo e(asset("libs/chart_js/Chart.min.js")); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset("module/user/js/user.js")); ?>"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            $(".bravo-user-render-chart").each(function () {
                let ctx = $(this)[0].getContext('2d');
                window.myMixedChartForVendor = new Chart(ctx, {
                    type: 'bar',//line - bar
                    data: earning_chart_data,
                    options: {
                        responsive: true,
                        legend: {
                            display: true
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: '<?php echo e(__("Timeline")); ?>'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: '<?php echo e(__("Currency: :currency_main",['currency_main'=>setting_item('currency_main')])); ?>'
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    var label = data.datasets[tooltipItem.datasetIndex].label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += tooltipItem.yLabel + " (<?php echo e(setting_item('currency_format')); ?>)";
                                    return label;
                                }
                            }
                        }
                    }
                });
            });

            $(".bravo-user-chart form select").change(function () {
                $(this).closest("form").submit();
            });


            var start = moment().startOf('week');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                "alwaysShowCalendars": true,
                "opens": "left",
                "showDropdowns": true,
                ranges: {
                    '<?php echo e(__("Hôm nay")); ?>': [moment(), moment()],
                    '<?php echo e(__("Hôm qua")); ?>': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '<?php echo e(__("7 ngày qua")); ?>': [moment().subtract(6, 'days'), moment()],
                    '<?php echo e(__("30 ngày qua")); ?>': [moment().subtract(29, 'days'), moment()],
                    '<?php echo e(__("Tháng này")); ?>': [moment().startOf('month'), moment().endOf('month')],
                    '<?php echo e(__("Tháng trước")); ?>': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    '<?php echo e(__("Năm này")); ?>': [moment().startOf('year'), moment().endOf('year')],
                    '<?php echo e(__('Tuần này')); ?>': [moment().startOf('week'), end]
                }
            }, cb).on('apply.daterangepicker', function (ev, picker) {

                // Reload Earning JS

                $.ajax({
                    url: '<?php echo e(url('user/reloadChart')); ?>',
                    data: {
                        chart: 'earning',
                        from: picker.startDate.format('YYYY-MM-DD'),
                        to: picker.endDate.format('YYYY-MM-DD'),
                    },
                    dataType: 'json',
                    type: 'post',
                    success: function (res) {
                        console.log(res.data);
                        if (res.status) {

                            window.myMixedChartForVendor.data = res.data;

                            window.myMixedChartForVendor.update();


                        }
                    }
                })

            });

            cb(start, end);


        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Booking Core 1.1.0\booking-core\modules/User/Views/frontend/dashboard.blade.php ENDPATH**/ ?>