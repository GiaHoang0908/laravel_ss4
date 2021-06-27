@extends('layout.frontend.master')

@section('title', 'Trang thanh toán')

@section('style')
    <style>
        .cart-empty-page__content {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 50px 0;
        }

        .cart-empty-page__content-image {
            margin: 0;
            width: 300px;
        }

        .cart-empty-page__content-image>img {
            display: block;
            width: 100%;
            height: auto;
        }

        .cart-empty-page__content-text {
            margin: 20px 0 20px;
            font-size: 16px;
            font-weight: 500;
        }

        .btn--l {
            height: 48px;
            padding: 0 20px;
            min-width: 80px;
            max-width: 250px;
        }

        /* cart */
        .deltai-Cart {
            padding: 10px;
        }

        .cart-page-product-header {
            -webkit-box-align: center;
            align-items: center;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
            border-radius: 2px;
            overflow: hidden;
            border-radius: 3px;
            height: 52px;
            font-size: 14px;
            background: #fff;
            text-transform: capitalize;
            margin-bottom: 12px;
            color: #888;
            padding: 0 20px;
            display: -webkit-box;
            display: flex;
        }

        .cart-page-product-header__product {
            width: 61.27949%;
        }

        .cart-page-product-header__unit-price {
            width: 15.88022%;
            text-align: center;
        }

        .cart-page-product-header__quantity {
            width: 15.4265%;
            text-align: center;
        }

        .cart-page-product-header__total-price {
            width: 10.43557%;
            text-align: center;
        }

        .cart-page-product-header__action {
            width: 12.70417%;
            text-align: center;
        }

        .cart-page-shop-section {
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
            border-radius: .125rem;
            overflow: hidden;
            background: #fff;
            margin-bottom: .9375rem;
            overflow: visible;
        }

        .cart-page-shop-section__items {
            position: relative;
            padding-bottom: 1px;
        }

        .cart-page-shop-section__items>.cart-item:first-child {
            margin-top: 0;
        }

        .cart-page-shop-section__items>.cart-item:last-child {
            border-bottom: 0;
        }

        .cart-page-shop-section__items>.cart-item {
            border-bottom: 1px solid rgba(0, 0, 0, .09);
            padding-left: 20px;
            padding-right: 20px;
        }

        .cart-page-shop-section__items>.cart-item {
            border: none;
        }

        .cart-item__content {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
        }

        .cart-item__cell-overview {
            box-sizing: border-box;
            display: -webkit-box;
            display: flex;
        }

        .cart-item:last-child {
            padding-bottom: 10px;
        }

        .cart-item:first-child {
            padding-top: 10px;
        }

        .cart-item__cell-overview .cart-item-overview__thumbnail {
            max-width: 80px;
        }

        .cart-item-overview__thumbnail {
            background-position: 50%;
            background-size: contain;
            background-repeat: no-repeat;
            width: 80px;
            height: 80px;
        }

        .cart-item__flex {
            -webkit-box-flex: 1;
            flex: 1 1 auto;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            overflow: hidden;
        }

        .cart-item__flex .cart-item-overview__product-name-wrapper {
            padding: 0 10px;
        }

        .cart-item-overview__product-name-wrapper {
            -webkit-box-flex: 1;
            flex: 1 1 0;
        }

        .cart-item-overview__product-name-wrapper {
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            padding: .3125rem 1.25rem 0 .625rem;
            font-size: 14px;
            line-height: 1rem;
            width: 502px;
        }

        .cart-item-overview__name {
            text-decoration: none;
            color: rgba(0, 0, 0, .8);
            line-height: 20px;
            max-height: 40px;
            text-overflow: ellipsis;
            overflow: hidden;
            word-break: break-word;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .cart-item-overview__price {
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .cart-item__flex .cart-item__cell-unit-price {
            text-align: right;
            width: 110px;
        }

        .cart-item__cell-quantity,
        .cart-item__cell-unit-price {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }

        .cart-item__cell-unit-price,
        .cart-item__cell-variation {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
        }

        .cart-item__unit-price:last-child {
            margin: 0;
        }

        .cart-item__flex .cart-item__cell-unit-price {
            text-align: right;
            width: 110px;
        }

        .cart-item__cell-quantity,
        .cart-item__cell-unit-price {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }

        .cart-item__flex .cart-item__cell-quantity {
            width: 150px;
            margin: 0 14px;
        }

        .cart-item__cell-quantity {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 15.4265%;
        }

        .cart-item__cell-quantity,
        .cart-item__cell-unit-price {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }

        .cart-item__flex .cart-item__cell-total-price {
            text-align: center;
        }

        .cart-item__flex .cart-item__cell-total-price {
            text-align: center;
            width: 110px;
        }

        .cart-item__cell-total-price {
            width: 10.43557%;
            text-align: right;
            color: #ee4d2d;
        }

        .cart-item__cell-actions {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 12.70417%;
            text-transform: capitalize;
            font-size: 14px;
        }

        .cart-item__action {
            cursor: pointer;
            background: none;
            border: none;
        }




        .cart-item__cell-actions {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 12.70417%;
            text-transform: capitalize;
        }

        ._19lAw4 {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
        }

        ._1zT8xu:first-child {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .btn-quantity {
            box-shadow: none;
        }

        ._1zT8xu {
            outline: none;
            cursor: pointer;
            border: none;
            font-size: .875rem;
            font-weight: 300;
            line-height: 1;
            letter-spacing: 0;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            border: 1px solid rgba(0, 0, 0, .09);
            border-radius: 2px;
            background: transparent;
            color: rgba(0, 0, 0, .8);
            width: 50px;
            height: 32px;
        }

        .bt {
            overflow: hidden;
            display: -webkit-box;
            text-overflow: ellipsis;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            flex-direction: column;
            font-size: 4px;
            box-sizing: border-box;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .09);
            border-radius: 2px;
            border: 0;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            text-transform: capitalize;
            outline: 0;
            cursor: pointer;
            outline: none !important;
        }

        ._1zT8xu .tickid-svg-icon {
            font-size: 12px;
        }

        .tickid-svg-icon {
            display: inline-block;
            width: 10px;
            height: 10px;
            fill: currentColor;
            position: relative;
        }

        ._18Y8Ul {
            width: 50px;
            height: 32px;
            border-left: none;
            border-right: none;
            font-size: 1rem;
            font-weight: 400;
            box-sizing: border-box;
            text-align: center;
            cursor: text;
            border-radius: 0;
        }

        ._1zT8xu:last-child {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .btn-quantity {
            box-shadow: none;
        }

        ._1zT8xu {
            outline: none;
            cursor: pointer;
            border: none;
            font-size: 14px;
            font-weight: 300;
            line-height: 1;
            letter-spacing: 0;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            border: 1px solid rgba(0, 0, 0, .09);
            border-radius: 2px;
            background: transparent;
            color: rgba(0, 0, 0, .8);
            width: 50px;
            height: 32px;
        }

        .checkout {
            padding: 10px;
            background-color: #fff;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 8px 8px;
            border-top: 1px dashed #e5e5e5;
            width: 480px;
            margin-left: calc(100% - 480px);
            padding-top: 20px;
        }

        .cart-info {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            flex: 1;
            height: 100%;
            padding: 20px;
            font-size: 14px;
        }

        .cart-value {
            color: var(--primary-color);
        }

        .cart-title {
            margin-right: 12px;
        }

        .check-out-adress {
            width: 100%;
        }

        .checkout-form {
            background-color: #fff;
            margin: 20px auto;
            padding: 20px;
        }

        .checkout-address-selection__section-header-text {
            font-size: 16px;
            color: var(--primary-color);
            display: flex;
            align-items: center;
        }

        .tickid-svg-icon {
            margin-right: 8px;
            font-size: 22px;
        }

        .auth-form__input {
            font-size: 14px;
            width: 45%;
            height: 40px;
            border-radius: 2px;
            outline: none;
        }

        .js-input-update-cart {
            border: none;
        }

        .btn-back {
            border: 1px solid #e5e5e5;
            margin-right: 12px;
            outline: none;
        }

        .infor-content-header-infor {
            margin: auto;
            margin-top: 14px;
            font-size: 1.4rem;
            line-height: 20px;
        }

        .infor-content-header-infor-item {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 20px;
        }

        .infor-content-header-infor-item-left {
            display: flex;
            justify-content: flex-start;
            color: #999;
            width: 14%;
        }

        .infor-content-header-infor-item-right {
            display: flex;
            min-width: 12%;
            justify-content: flex-end;
        }

        .infor-content-header-infor-item-right--strong {
            font-size: 22px;
            color: var(--primary-color);
        }

        .btn {
            width: 200px;
            height: 42px;
        }

        .checkout-payment-method-view__current {
            min-height: auto;
            padding-top: 25px;
            padding-bottom: 25px;
        }

        .checkout-payment-method-view__current {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            min-height: 5.625rem;
            box-sizing: border-box;
            padding-left: 1.875rem;
        }

        .checkout-payment-method-view__current-title {
            font-size: 16px;
            width: 200px;
            color: #222;
        }

        .checkout-payment-method-view__current-title {
            margin-right: auto;
        }

        .checkout-payment-setting__payment-methods-tab>span:last-child .product-variation {
            margin-right: 0;
        }

        .product-variation {
            position: relative;
            padding: 0 10px;
            min-width: 60px;
        }

        .product-variation--selected,
        .product-variation:hover {
            color: #ee4d2d;
            border-color: #ee4d2d;
        }

        .product-variation {
            cursor: pointer;
            display: inline-block;
            min-width: 5rem;
            box-sizing: border-box;
            padding: 0 .75rem;
            height: 2.125rem;
            line-height: 1;
            margin: 0 8px 0 0;
            color: rgba(0, 0, 0, .8);
            text-align: center;
            white-space: nowrap;
            border-radius: 2px;
            border: 1px solid rgba(0, 0, 0, .09);
            position: relative;
            background: #fff;
            outline: 0;
        }

        .btn-methood {
            margin: 0;
            min-height: 32px;
            border: 1px solid var(--primary-color);
            color: orangered;
        }

        .checkout-payment-method-view__current-title-s {
            font-size: 13px;
        }

        .checkout-payment-method-view__current-s {
            border-bottom: 1px solid #e5e5e5;
        }

    </style>
@stop

@section('content')
    @if (Session::has('Cart'))
        <div>
            <div class="container checkout-form">
                <div row class="check-out-adress">
                    <div class="checkout-address-selection__section-header-text">
                        <svg class="tickid-svg-icon icon-location-marker" height="16" viewBox="0 0 12 16" width="12">
                            <path
                                d="M6 3.2c1.506 0 2.727 1.195 2.727 2.667 0 1.473-1.22 2.666-2.727 2.666S3.273 7.34 3.273 5.867C3.273 4.395 4.493 3.2 6 3.2zM0 6c0-3.315 2.686-6 6-6s6 2.685 6 6c0 2.498-1.964 5.742-6 9.933C1.613 11.743 0 8.498 0 6z"
                                fill-rule="evenodd"></path>
                        </svg>
                        Địa chỉ nhận hàng
                    </div>
                    <form action="" class="form-adress checkout_form" method="POST">
                        @csrf
                        <div class="auth-form__form ">
                            <div class="auth-form__group ">
                                <input name="name" type="text"
                                 @if(Auth::guard('customer')->user()->name) 
                                    value="@if(old('name')) {{old('name')}} @else {{ Auth::guard('customer')->user()->name }} @endif"
                                 @endif
                                   id="yourname" class="auth-form__input " 
                                    placeholder="Tên người nhận...">
                            </div>
                            @error('name')
                                <div class="alert alert-danger" style="width: 45%" role="alert">
                                    <h4>{{ $message }}</h4>
                                </div>
                            @enderror

                            <div style="width: 45%; display: none" id="name-error" class="alert alert-danger" role="alert">

                            </div>
                            <div class="auth-form__group ">
                                <input type="text" id="telenumber" @if(Auth::guard('customer')->user()->phone_number) value="@if(old('phone_number')) {{old('phone_number')}} @else {{Auth::guard('customer')->user()->phone_number}} @endif" @endif  name="phone_number" class="auth-form__input " 
                                    placeholder="Số điện thoại...">
                                
                                @error('phone_number')
                                    <div class="alert alert-danger" style="width: 45%" role="alert">
                                        <h4>{{ $message }}</h4>
                                    </div>
                                @enderror
                                @if (Session::has('error-phone'))
                                    <div class="alert alert-danger" style="width: 45%" role="alert">
                                        <h4>{{ Session::get('error-phone') }}</h4>
                                    </div>
                                @endif

                            </div>
                            <div class="auth-form__group ">
                                <input type="text"
                                @if(Auth::guard('customer')->user()->address)
                                value="@if(old('address')) {{old('address')}} @else {{ Auth::guard('customer')->user()->address }} @endif"
                                @endif
                                name="address" class="auth-form__input " 
                                    placeholder="Địa chỉ giao hàng... ">
                               
                                @error('address')
                                    <div class="alert alert-danger" style="width: 45%" role="alert">
                                        <h4>{{ $message }}</h4>
                                    </div>
                                @enderror
                            </div>
                            <div class="auth-form__group ">
                                <textarea name="note" style="height: 100px" type="tel" id="comment"
                                    class="auth-form__input " placeholder="Ghi chú... "></textarea>

                            </div>
                        </div>
                    </form>
                </div>



            </div>

            <div class="container checkout-form">
                <div class="form-product">
                    <div class="cart-page-product-header">
                        <div class="cart-page-product-header__product">Sản phẩm</div>
                        <div class="cart-page-product-header__unit-price">Đơn giá</div>
                        <div class="cart-page-product-header__quantity">Số lượng</div>
                        <div class="cart-page-product-header__total-price">Số tiền</div>

                    </div>

                    @foreach (Session::get('Cart')->products as $item)
                        <div class="cart-page-shop-section">
                            <div class="cart-page-shop-section__items">
                                <div class="cart-item js-product-cart">
                                    <div class="cart-item__content">
                                        <div class="cart-item__cell-overview">
                                            <a class="cart-item-overview__thumbnail-wrapper" href="">
                                                <img class="cart-item-overview__thumbnail"
                                                    src="{{ asset('upload/image/product') . '/' . $item['productInfo']->image }}"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="cart-item__flex">
                                            <div class="cart-item-overview__product-name-wrapper">
                                                <a href="" class="cart-item-overview__name"> 
                                                    {{ $item['productInfo']->name }}</a>
                                            </div>
                                            <div class="cart-item-overview__price">
                                                <div class="cart-item__cell-unit-price">
                                                    <span
                                                        class="cart-item__unit-price cart-item__unit-price--after js-cart-item-unit-price">{{ number_format($item['productInfo']->price) }}đ</span>
                                                </div>
                                                <div class="cart-item__cell-quantity">
                                                    <div class="_19lAw4 tickid-input-quantity js-plus-minus">

                                                        <input disabled
                                                            class="_1zT8xu _18Y8Ul js-current js-input-update-cart"
                                                            type="number" value="{{ $item['quantity'] }}" name="" />

                                                    </div>
                                                </div>
                                                <div class="cart-item__cell-total-price js-cart-item-total-price">
                                                    {{ number_format($item['price']) }}đ
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="container ">
                        <div style="border: none" class="checkout">
                            <div class="cart-info">
                                <div class="cart-title">Tổng tiền:</div>
                                <div class="cart-value">{{ number_format(Session::get('Cart')->totalPrice) }}đ</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container checkout-form">
                <div class="checkout-payment-method-view__current">
                    <div class="checkout-payment-method-view__current-title">Phương thức thanh toán</div>
                    <div class="checkout-payment-setting__payment-methods-tad">
                        <span>
                            <button disabled
                                class="btn btn-methood product-variation js-product-variation product-variation--selected"
                                type="submit">
                                Thanh toán khi nhận hàng
                            </button>
                        </span>
                    </div>

                </div>
                <div class="checkout-payment-method-view__current checkout-payment-method-view__current-s">
                    <div class="checkout-payment-method-view__current-title checkout-payment-method-view__current-title-s">
                        Thanh
                        toán khi nhận hàng</div>


                </div>
                <div class="infor-content-header-infor">
                    <div class="infor-content-header-infor-item">
                        <div class="infor-content-header-infor-item-left">Tổng tiền hàng:</div>
                        <div class="infor-content-header-infor-item-right">
                            {{ number_format(Session::get('Cart')->totalPrice) }}đ</div>
                    </div>
                    <div class="infor-content-header-infor-item">
                        <div class="infor-content-header-infor-item-left">Phí Ship:</div>
                        <div class="infor-content-header-infor-item-right">Chưa tính</div>
                    </div>
                    <div class="infor-content-header-infor-item">
                        <div class="infor-content-header-infor-item-left">Tổng thanh toán</div>
                        <div class="infor-content-header-infor-item-right infor-content-header-infor-item-right--strong">
                            {{ number_format(Session::get('Cart')->totalPrice) }}đ</div>
                    </div>
                </div>

                <div class="checkout">
                    <a href="{{ route('cart') }}" class=" btn btn-back">Trở lại</a>
                    <a id="post_checkout" href="{{ route('cart.post_checkout') }} " style="color: #fff"
                        class=" btn btn--primary ">Thanh toán</a>
                </div>
            </div>
        </div>
    @endif

@stop
@section('script')
    <script>
        $(document).ready(function() {
            var checkout_form = $('.checkout_form')
            var phone_number = $('input[name=phone_number]')
            var name = $('input[name=name]')
            var address = $('input[name=address]')

            // var valname = name.blur(function() {
            //     if ($(this).val() == '') {
            //         $('#name-error').css('display', 'block')
            //         $('#name-error').html(
            //             '<h4>Bạn chưa nhập tên.</h4>')

            //     } else {
            //         $('#name-error').css('display', 'none')

            //     }

            // })

            // var valphone_number = phone_number.blur(function() {
            //     var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            //     if ($(this).val() !== '') {
            //         if (vnf_regex.test($(this).val()) == false) {
            //             $('#phone_number-error').css('display', 'block')
            //             $('#phone_number-error').html(
            //                 '<h4>Số điện thoại của bạn không đúng định dạng.</h4>')

            //         } else {
            //             $('#phone_number-error').css('display', 'none')

            //         }
            //     } else {
            //         $('#phone_number-error').css('display', 'block')
            //         $('#phone_number-error').html('<h4>Bạn chưa điền số điện thoại.</h4>')

            //     }

            // })
            // var valaddress = address.blur(function() {
            //     if ($(this).val() == '') {
            //         $('#address-error').css('display', 'block')
            //         $('#address-error').html(
            //             '<h4>Bạn chưa nhập địa chỉ.</h4>')

            //     } else {
            //         $('#address-error').css('display', 'none')

            //     }

            // })


            $('#post_checkout').click(function(e) {
                e.preventDefault();
                checkout_form.attr('action', 'checkout_success')

                checkout_form.submit()

            })
        })

    </script>
@stop
