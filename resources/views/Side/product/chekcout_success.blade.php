@extends('layout.frontend.master')

@section('title', 'Hóa đơn thanh toán')

@section('style')
    <style>
        .cart-success__content {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 50px 0;
        }

        .cart-success__header {
            margin-bottom: 25px;
            text-align: center;
        }

        .cart-success__title>h4 {
            margin: 0 0 25px;
            font-size: 28px;
            font-weight: 400;
            color: #f55334;
        }

        .cart-success__title>p,
        .cart-success__subtitle {
            margin: 0 0 10px;
            font-size: 12px;
        }

        .cart-success__body>p {
            font-size: 18px;
            margin-bottom: 12px;
        }

        .cart-success__body>table {
            font-size: 14px;
        }

        .cart-success__body>table>thead>tr>th {
            font-size: 14px;
            font-weight: 100;
        }

        .cart-success__body>table>thead,
        .cart-success__body>table>tbody>tr>td {
            text-align: center;
        }

        .cart-success__item-title {
            text-align: left !important;
        }

        .cart-success__addresss {
            font-size: 14px;
        }

        .cart-success__address-group {
            display: flex;
        }

        .cart-success__address-label {
            font-weight: 600;
            margin-right: 6px;
        }

    </style>
@stop

@section('content')
    @if (Session::has('Cart'))
        <div class="container">
            <div class="cart-success__content">
                <div class="cart-success__header">
                    <div class="cart-success__title">
                        <h4>Đặt hàng thành công!</h4>
                        <p>Cảm ơn bạn đã đặt mua hàng tại Mỹ Phẩm Ohui - LG Vina</p>
                        <p>Đơn hàng của bạn hiện đang được xử lý. Chúng tôi sẽ sớm liên hệ để giao hàng.</p>
                    </div>
                    <div style="display: flex;justify-content:center" class="cart-success__subtitle">
                        Mã đơn hàng của bạn:
                        <b id="mddh">&nbsp;</b>
                        <p id="tgdh">{{ $hoadon->id }}</p>
                    </div>
                </div>
                <div class="cart-success__body">
                    <p>Thông tin đơn hàng:</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thuộc tính</th>
                                <th>Đơn giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Session::get('Cart')->products as $item)
                                <tr>

                                    <td><img style="width: 60px;height:60px"
                                            src="{{ asset('upload/image/product') . '/' . $item['productInfo']->image }}" />
                                    </td>
                                    <td>
                                        <p>{{ $item['productInfo']->name }}</p>
                                    </td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td></td>
                                    <td>{{ number_format($item['productInfo']->price) }}đ</td>
                                </tr>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="cart-success__item-title" colspan="4">Tổng giá trị sản phẩm</td>
                                <td> {{ number_format(Session::get('Cart')->totalPrice) }}đ</td>
                            </tr>
                            <tr>
                                <td class="cart-success__item-title" colspan="4">Phí Ship</td>
                                <td>Chưa tính</td>
                            </tr>
                            <tr>
                                <td class="cart-success__item-title" colspan="4">Tổng thanh toán</td>
                                <td style="color: orangered"> {{ number_format(Session::get('Cart')->totalPrice) }}đ</td>

                        </tbody>
                    </table>
                    <p>Thông tin nhận hàng:</p>
                    <div class="cart-success__addresss">
                        <div class="cart-success__address-group">
                            <label for="" class="cart-success__address-label">Người nhận :</label>
                            <p id="tennguoinhan" class="cart-success__address-content">{{ $hoadon->name }}</p>
                        </div>
                        <div class="cart-success__address-group">
                            <label for="" class="cart-success__address-label">
                                Số điện thoại :
                            </label>
                            <p id="sdt" class="cart-success__address-content">{{ $hoadon->phone_number }}</p>
                        </div>
                        <div class="cart-success__address-group">
                            <label for="" class="cart-success__address-label">Địa chỉ:</label>
                            <p id="diachi" class="cart-success__address-content">{{ $hoadon->address }}</p>
                        </div>
                    </div>

                </div>
                <div class="cart-success__footer"></div>
            </div>
        </div>
    @endif
    @if(Session::has('Cart'))
        {{Session::forget('Cart')}}
    @endif
@stop

@section('script')
    <script>
        var session = "<?php  ?>"

        function padLeadingZeros(num) {
            var size = 8
            var s = num + "";
            while (s.length < size) s = "0" + s;
            return s;
        }
        function renderMHD() {
            var mahd = document.getElementById('tgdh')
            mahd.textContent = padLeadingZeros(mahd.textContent)
        }
        renderMHD()
    </script>
@stop
