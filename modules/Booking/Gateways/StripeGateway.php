<?php
namespace Modules\Booking\Gateways;

use Illuminate\Http\Request;
use Mockery\Exception;
use Modules\Booking\Models\Booking;
use Modules\Booking\Models\Payment;
use Omnipay\Omnipay;
use Omnipay\Stripe\Gateway;
use PHPUnit\Framework\Error\Warning;
use Validator;
use Omnipay\Common\Exception\InvalidCreditCardException;
use Illuminate\Support\Facades\Log;

class StripeGateway extends BaseGateway
{
    protected $id = 'stripe';

    public $name = 'Stripe Checkout';

    protected $gateway;

    public function getOptionsConfigs()
    {
        return [
            [
                'type'  => 'checkbox',
                'id'    => 'enable',
                'label' => __('Kích hoạt tiêu chuẩn sọc?')
            ],
            [
                'type'  => 'input',
                'id'    => 'name',
                'label' => __('Tùy chỉnh tên'),
                'std'   => __("Vạch sọc")
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
            [
                'type'       => 'input',
                'id'        => 'stripe_secret_key',
                'label'     => __('Khóa bí mật'),
            ],
            [
                'type'       => 'checkbox',
                'id'        => 'stripe_enable_sandbox',
                'label'     => __('Kích hoạt chế độ hộp cát'),
            ],
            [
                'type'       => 'input',
                'id'        => 'stripe_test_secret_key',
                'label'     => __('Kiểm tra khóa bí mật'),
            ]
        ];
    }

    public function process(Request $request, $booking, $service)
    {
        if (in_array($booking->status, [
            $booking::PAID,
            $booking::COMPLETED,
            $booking::CANCELLED
        ])) {

            throw new Exception(__("Tình trạng đặt phòng cần phải được thanh toán"));
        }
        if (!$booking->total) {
            throw new Exception(__("Tổng số đặt phòng bằng không. Không thể xử lý cổng thanh toán!"));
        }
        $rules = [
            'card_name'    => ['required'],
            'card_number'  => ['required'],
            'cvv'          => ['required'],
            'expiry_month' => ['required'],
            'expiry_year'  => ['required'],
        ];
        $messages = [
            'card_name.required'    => __('Tên thẻ là trường bắt buộc'),
            'card_number.required'  => __('Số thẻ là trường bắt buộc'),
            'cvv.required'          => __('Mã CVV là trường bắt buộc'),
            'expiry_month.required' => __('Tháng hết hạn là trường bắt buộc'),
            'expiry_year.required'  => __('Năm hết hạn là trường bắt buộc'),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['errors'   => $validator->errors() ], 200)->send();
        }
        $this->getGateway();
        $payment = new Payment();
        $payment->booking_id = $booking->id;
        $payment->payment_gateway = $this->id;
        $data = $this->handlePurchaseData([
            'amount'        => (float)$booking->total,
            'transactionId' => $booking->code . '.' . time()
        ], $booking, $request);
        try{
            $response = $this->gateway->purchase($data)->send();
            if ($response->isSuccessful()) {
                $payment->status = 'completed';
                $payment->logs = \GuzzleHttp\json_encode($response->getData());
                $payment->save();
                $booking->payment_id = $payment->id;
                $booking->status = $booking::PAID;
                $booking->save();
                try{
                    $booking->sendNewBookingEmails();
                } catch(\Swift_TransportException $e){
                    Log::warning($e->getMessage());
                }
                response()->json([
                    'url' => $booking->getDetailUrl()
                ])->send();
            } else {
                $payment->status = 'fail';
                $payment->logs = \GuzzleHttp\json_encode($response->getData());
                $payment->save();
                throw new Exception('Stripe Gateway: ' . $response->getMessage());
            }
        }
        catch(Exception | InvalidCreditCardException $e){
            $payment->status = 'fail';
            $payment->save();
            throw new Exception('Stripe Gateway: ' . $e->getMessage());
        }
    }

    public function getGateway()
    {
        $this->gateway = Omnipay::create('Stripe');
        $this->gateway->setApiKey($this->getOption('stripe_secret_key'));
        if ($this->getOption('stripe_enable_sandbox')) {
            $this->gateway->setApiKey($this->getOption('stripe_test_secret_key'));
        }
    }

    public function handlePurchaseData($data, $booking, $request)
    {
        $data['currency'] = setting_item('currency_main');
        $cardData = array(
            'lastName'     => $request->input("card_name"),
            'number'       => $request->input("card_number"),
            'expiryMonth'  => $request->input("expiry_month"),
            'expiryYear'   => $request->input("expiry_year"),
            'cvv'          => $request->input("cvv"),
        );
        $data["card"] = $cardData;
        return $data;
    }

    public function getDisplayHtml()
    {
        $html = $this->getOption('html', '');
        $html .= '<div class="card_stripe">
                    <i class="icofont-ui-v-card bg"></i>
                    <label>
                        <span>'.__("Tên trên thẻ").'</span>
                        <input name="card_name" placeholder="'.__("Card Name").'">
                    </label>
                    <label>
                        <span>'.__("Số thẻ").'</span>
                        <input name="card_number" placeholder="0000 0000 0000 0000">
                        <i class="icofont-credit-card"></i>
                    </label>
                    <label class="item">
                        <span>'.__("Tháng hết hạn").'</span>
                        <input name="expiry_month" placeholder="MM">
                    </label>
                    <label class="item">
                        <span>'.__("Năm hết hạn").'</span>
                        <input name="expiry_year" placeholder="YYYY">
                    </label>
                    <label class="item">
                        <span>'.__("CVV").'</span>
                        <input name="cvv" placeholder="CVV">
                    </label>
                </div>
                ';
        return $html;
    }
}