@extends('layouts.app')
@section('head')
	<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection
@section('content')
<div id="bravo_content-wrapper">
	<div class="bravo_content">
		<div class="container">
			<div class="row section">
				<div class="col-md-5">
					<div role="form" class="form_wrapper" lang="en-US" dir="ltr">
						<form method="post" action="{{url('/contact/store')}}"  class="bookcore-form">
							{{csrf_field()}}
							<div style="display: none;">
								<input type="hidden" name="g-recaptcha-response" value="">
							</div>
							<div class="contact-form">
								<div class="contact-header">
									<h3>{{ __('Chúng tôi muốn nghe từ bạnu') }} </h3>
									<p>{{ __('Gửi tin nhắn cho chúng tôi và sẽ trả lời sớm nhất có thể') }} </p>

                                </div>
								@include('admin.message')

								<div class="contact-form">
									<div class="form-group">
										<input type="text" value="" placeholder=" {{ __('Tên') }} " name="name" class="form-control">
									</div>
									<div class="form-group">
										<input type="text" value="" placeholder="{{ __('Email') }}" name="email" class="form-control">
									</div>

									<div class="form-group">
										 <textarea name="message" cols="40" rows="10" class="form-control textarea" placeholder="{{ __('Tin nhắn') }}"></textarea>
									</div>
									<div class="form-group">
										{{recaptcha_field('contact')}}
									</div>
									<p><input type="submit" value="{{ __('GỬI TIN NHẮN') }}" class="form-control submit btn btn-primary"></p></div></div>
							</form>
					</div>
				</div>
				<div class="offset-md-2 col-md-5">
					<div class="contact-info">
						<div class="info-bg">
							<img src="https://tomap.travelerwp.com/wp-content/uploads/2018/12/bg-contact-1.jpg" class="img-responsive" alt="Background Contact Info">    </div>
						<div class="info-content">
							<h3>{{ __('Du khách Ltd') }}</h3>
							<div class="sub">
								<p></p>
								<p>{{ __('Số điện thoại. + 00 222 444 33') }}</p>
								<p>{{ __('Email. hello@yoursite.com') }}</p>
								<p class="address">{{ __('65,Huỳnh Thúc Kháng,Quận 1,TP.HCM') }} </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')

@endsection
