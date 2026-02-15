<div class="payment_right">
    <div class="payment_select">
        <h2 class="tg-checkout-form-title tg-checkout-form-title-3 mb-15">{{ __('translate.Select Payment Method') }}
        </h2>
        <div class="tg-tour-about-border-doted mb-20"></div>
        <div class="payment_select_item_main">

            @if (isset($payment_setting->payu_status) && $payment_setting->payu_status == 1)
            <div class="payment_select_item_box" id="payuPayment">
                <a href="javascript:;">
                    <div class="payment_select_item_thumb">
                        <img src="{{ asset($payment_setting->payu_image ?? 'uploads/default/payu.png') }}" class="w-100"
                            alt="PayU">
                    </div>
                </a>
            </div>
            @endif


            @if ($payment_setting->stripe_status == 1)
            <div class="payment_select_item_box">

                <a href="javascript:;" class="payment_select_item">
                    <div class="payment_select_item_thumb">
                        <img src="{{ asset($payment_setting->stripe_image) }}" class="w-100" alt="">
                    </div>
                </a>

                <div class="payment_select_modal  tg-checkout-form-input">
                    <div class="payment_select_modal_head">
                        <h2>{{ __('translate.Stripe Payment') }}</h2>
                        <button type="button" class="close_modal_btn">
                            <span>
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                        stroke-linecap="round" />
                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                        stroke-linecap="round" />
                                </svg>
                            </span>
                        </button>
                    </div>
                    <form class="payment_select_modal_form stripe-modal-form require-validation " role="form"
                        action="{{ route('payment.stripe') }}" method="POST" data-cc-on-file="false"
                        data-stripe-publishable-key="{{ $payment_setting->stripe_key }}" id="payment-form">
                        @csrf

                        @include('tourbooking::front.bookings.customer-info')

                        <div class="payment_select_modal_form_item mt-0">
                            <div class="payment_select_modal_form_inner">
                                <label for="card_number" class="form-label">
                                    {{ __('translate.Card Number') }}*</label>
                                <input type="text" class="input card-number" id="card_number"
                                    placeholder="{{ __('translate.Card Number') }}" name="card_number"
                                    autocomplete="off">
                            </div>
                        </div>


                        <div class="payment_select_modal_form_item">
                            <div class="payment_select_modal_form_inner">
                                <label for="expiry_month" class="form-label">{{ __('translate.Expired Month') }}
                                    *</label>
                                <input type="text" class="input card-expiry-month" id="expiry_month"
                                    placeholder="{{ __('translate.MM') }}" name="month" autocomplete="off">
                            </div>
                        </div>


                        <div class="payment_select_modal_form_item">
                            <div class="payment_select_modal_form_inner">
                                <label for="expired_year" class="form-label">{{ __('translate.Expired Year') }}*</label>
                                <input type="text" class="input card-expiry-year" id="expired_year"
                                    placeholder="{{ __('translate.YYYY') }}" name="year" autocomplete="off">
                            </div>
                            <div class="payment_select_modal_form_inner">
                                <label for="cvc" class="form-label">{{ __('translate.CVC') }}*</label>
                                <input type="text" class="input card-cvc" id="cvc"
                                    placeholder="{{ __('translate.CVC') }}" name="cvc" autocomplete="off">
                            </div>
                        </div>

                        <div class="payment_select_modal_form_item stripe_error d-none">
                            <div class="stripe-modal-form-inner">
                                <div class='alert-danger alert '>
                                    {{ __('translate.Please provide your valid card information') }}</div>
                            </div>
                        </div>

                        <button type="submit" class="tg-btn tg-btn-switch-animation mt-20 w-100">

                            <span>{{ __('translate.Pay Now') }}</span>
                            <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            @endif



            @if ($payment_setting->paypal_status == 1)
            <div class="payment_select_item_box">
                <form action="{{ route('payment.paypal') }}">
                    @csrf
                    @include('tourbooking::front.bookings.customer-info')
                    <button type="submit">
                        <div class="payment_select_item_thumb">
                            <img src="{{ asset($payment_setting->paypal_image) }}" class="w-100" alt="">
                        </div>
                    </button>
                </form>
            </div>
            @endif


            @if ($payment_setting->bank_status == 1)
            <div class="payment_select_item_box">

                <a href="javascript:;" class="payment_select_item">
                    <div class="payment_select_item_thumb">
                        <img src="{{ asset($payment_setting->bank_image) }}" class="w-100" alt="">
                    </div>
                </a>

                <div class="payment_select_modal">
                    <div class="payment_select_modal_head">
                        <h2>{{ __('translate.Bank Payment') }}</h2>
                        <button type="button" class="close_modal_btn">
                            <span>
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 1L1.00081 16" stroke="#FE2C55" stroke-width="1.8"
                                        stroke-linecap="round" />
                                    <path d="M16 16L1.00081 1.00001" stroke="#FE2C55" stroke-width="1.8"
                                        stroke-linecap="round" />
                                </svg>
                            </span>
                        </button>
                    </div>


                    <ul class="banck_text">
                        {!! clean(nl2br($payment_setting->bank_account_info)) !!}
                    </ul>


                    <form class="payment_select_modal_form mt-0" action="{{ route('payment.bank') }}" method="POST">
                        @csrf

                        @include('tourbooking::front.bookings.customer-info')

                        <div class="payment_select_modal_form_item  mt-0">
                            <div class="payment_select_modal_form_inner tg-checkout-form-input">
                                <label for="tnx_info" class="form-label">{{ __('translate.Transaction information')
                                    }}*</label>
                                <textarea class="input" id="tnx_info" rows="3" name="tnx_info"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="tg-btn tg-btn-switch-animation w-100">

                            <span>{{ __('translate.Submit Now') }}</span>
                            <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.1575 4.34302L3.84375 15.6567" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M15.157 11.4142C15.157 11.4142 16.0887 5.2748 15.157 4.34311C14.2253 3.41142 8.08594 4.34314 8.08594 4.34314"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            @endif


        </div>
    </div>
</div>

@push('js_section')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    "use strict";
    $(function () {

        var $form = $(".require-validation");
        $('form.require-validation').on('submit', function (e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.stripe_error'),
                valid = true;
            $errorMessage.addClass('d-none');

            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('d-none');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.stripe_error')
                    .removeClass('d-none')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }


    });
</script>

@if (isset($payment_setting->payu_status) && $payment_setting->payu_status == 1)
<script>
    "use strict";
    $(function () {
        $("#payuPayment").on("click", function () {

            var isDemo = "{{ config('app.mode') }}"
            if (isDemo === 'DEMO') {
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }

            // Disable button to prevent double-click
            var $btn = $(this);
            $btn.css('pointer-events', 'none').css('opacity', '0.5');

            let _token = "{{ csrf_token() }}";
            let customer_name = $('.form_customer_name').val();
            let customer_email = $('.form_customer_email').val();
            let customer_phone = $('.form_customer_phone').val();
            let customer_address = $('.form_customer_address').val();

            $.ajax({
                type: "POST",
                url: "{{ route('payment.payu') }}",
                data: {
                    _token,
                    customer_name,
                    customer_email,
                    customer_phone,
                    customer_address,
                },
                success: function (response) {
                    if (response && response.redirect_url) {
                        window.location.href = response.redirect_url;
                    } else {
                        toastr.error(response.error || 'Unexpected response from PayU');
                        $btn.css('pointer-events', '').css('opacity', '');
                    }
                },
                error: function (xhr) {
                    var msg = 'Something went wrong, please try again.';
                    try {
                        var resp = JSON.parse(xhr.responseText);
                        if (resp.error) msg = resp.error;
                    } catch (e) { }
                    toastr.error(msg);
                    $btn.css('pointer-events', '').css('opacity', '');
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endif









@endpush