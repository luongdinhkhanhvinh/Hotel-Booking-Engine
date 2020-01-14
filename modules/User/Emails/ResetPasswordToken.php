<?php

    namespace Modules\User\Emails;

    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;

    class ResetPasswordToken extends Mailable
    {
        use Queueable, SerializesModels;

        public $token;
        const CODE = [
            'buttonReset' => '[button_reset_password]',
        ];

        public function __construct($token)
        {
            $this->token = $token;
        }

        public function build()
        {
            $subject = __('Đặt lại mật khẩu');
            if (!empty(setting_item('user_content_email_forget_password'))) {
                $body = $this->replaceContentEmail(setting_item('user_content_email_forget_password'));
            } else {
                $body = $this->defaultBody();
            }
            return $this->subject($subject)->view('User::emails.forgotPassword')->with(['content' => $body]);
        }
        public function replaceContentEmail($content)
        {
            if (!empty($content)) {
                foreach (self::CODE as $item => $value) {
                    if (method_exists($this, $item)) {
                        $replace = $this->$item();
                    } else {
                        $replace = '';
                    }
                    $content = str_replace($value, $replace, $content);
                }
            }
            return $content;
        }


        public function defaultBody()
        {
            $body = '
            <h1>Chào!</h1>
            <p>Bạn đang nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
            <p style="text-align: center">' . $this->buttonReset() . '</p>
            <p>Liên kết đặt lại mật khẩu này hết hạn sau 60 phút.</p>
            <p>Nếu bạn không yêu cầu đặt lại mật khẩu, không cần thực hiện thêm hành động nào.
            </p>
            <p>Trân trọng,<br>'.setting_item('site_title').'</p>';
            return $body;
        }

        public function buttonReset()
        {
            $link = route('password.reset',['token'=>$this->token]);
            $button = '<a style="border-radius: 3px;
                color: #fff;
                display: inline-block;
                text-decoration: none;
                background-color: #3490dc;
                border-top: 10px solid #3490dc;
                border-right: 18px solid #3490dc;
                border-bottom: 10px solid #3490dc;
                border-left: 18px solid #3490dc;" href="' . $link . '">Đặt lại mật khẩu</a>';
            return $button;
        }
    }
