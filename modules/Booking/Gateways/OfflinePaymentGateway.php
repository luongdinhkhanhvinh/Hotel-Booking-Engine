<?php
namespace Modules\Booking\Gateways;

use Illuminate\Http\Request;
use Modules\Booking\Models\Booking;

class OfflinePaymentGateway extends BaseGateway
{
    public $name = 'Offline Payment';

    public function process(Request $request, $booking, $service)
    {
        $service->beforePaymentProcess($booking, $this);
        // Simple change status to processing
        $booking->markAsProcessing($this, $service);
        $booking->sendNewBookingEmails();
        $service->afterPaymentProcess($booking, $this);
        return response()->json([
            'url' => $booking->getDetailUrl()
        ])->send();
    }

    public function getOptionsConfigs()
    {
        return [
            [
                'type'  => 'checkbox',
                'id'    => 'enable',
                'label' => __('Kích hoạt thanh toán ngoại tuyến?')
            ],
            [
                'type'  => 'input',
                'id'    => 'name',
                'label' => __('Custom Name'),
                'std'   => __("Thanh toán ngoại tuyến")
            ],
            [
                'type'  => 'upload',
                'id'    => 'logo_id',
                'label' => __('Tùy chỉnh Logo'),
            ],
            [
                'type'  => 'editor',
                'id'    => 'html',
                'label' => __('Tùy chỉnh HTML mô tả')
            ],
        ];
    }
}