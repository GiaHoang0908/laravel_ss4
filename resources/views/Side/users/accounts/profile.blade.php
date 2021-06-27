@extends('layout.frontend.master')

@section('title', 'Mỹ phẩm Ohui-LG Vina')
@section('style')
    <style>
        .header-profile {
            display: flex;
        }

        a {
            color: #333
        }

        a:hover {
            color: orangered
        }

        .user-page-container {
            display: flex;
            padding: 20px 0;
        }

        .userpage-sidebar {
            display: block;
            width: 180px;
            -webkit-flex-shrink: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
        }

        .user-page-brief {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #efefef;
        }

        .user-page-brief__avatar>img {
            border-radius: 50%;
            width: 66px;
            height: 66px;
        }

        .user-page-brief__right {
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            -webkit-box-pack: center;
            justify-content: center;
            overflow: hidden;
            padding-left: 10px;
        }

        .user-page-brief__username {
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
            font-size: 14px;
        }

        .userpage-sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 27px 0 0;
            cursor: pointer;
        }

        .userpage-sidebar-menu-entry__icon {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background-color: rgb(68, 181, 255);
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 8px;
        }

        .userpage-sidebar-menu-entry__text {
            font-size: 14px;
        }

        .userpage-sidebar-menu-entry {
            text-decoration: none;
            color: rgba(0, 0, 0, 0.8);
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            text-transform: capitalize;
            margin-bottom: 18px;
            -webkit-transition: color 0.1s cubic-bezier(0.4, 0, 0.2, 1);
            transition: color 0.1s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .user-page__content {
            margin-bottom: 15px;
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -moz-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 980px;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding-left: 1.6875rem;
            min-width: 0;
        }

        .h25IfI {
            position: relative;
            min-height: 100%;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
            border-radius: .125rem;
            overflow: hidden;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.13);
            background: #fff;
        }

        .my-account-section {
            padding: 30px;
        }

        .my-account-section__header {
            height: auto;
            padding-top: 0;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -moz-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border-bottom: 1px solid #efefef;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding-bottom: 22px;
        }

        .my-account-section__header-title {
            font-size: 16px;
            font-weight: 600;
        }

        .my-account-section__header-subtitle {
            font-size: 14px;
        }

        .my-account-profile {
            display: flex;
            align-items: flex-start;
            padding-top: 30px;
        }

        .my-account-profile__left {
            flex: 1;
            padding-right: 50px;
        }

        .my-account-profile .input-with-label {
            margin-bottom: 30px;
        }

        .input-with-label__wrapper {
            display: flex;
            justify-content: flex-end;
            -webkit-box-align: center;
            align-items: center;
        }

        .input-with-label__label {
            width: 20%;
            text-align: right;
            color: rgba(85, 85, 85, 0.8);
            text-transform: capitalize;
            overflow: hidden;
            font-size: 14px;
        }

        .input-with-label__content {
            width: 80%;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding-left: 20px;
        }

        .input-with-validator {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            background-color: #fff;
            border-radius: .125rem;
            border: 1px solid rgba(0, 0, 0, .14);
            box-sizing: border-box;
            box-shadow: inset 0 2px 0 0 rgba(0, 0, 0, .02);
            color: #222;
            height: 40px;
            padding: .625rem;
            -webkit-transition: border-color .1s ease;
            transition: border-color .1s ease;
        }

        .input-with-validator input {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -moz-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            font-size: 14px;
            background: transparent;
            outline: none;
            box-shadow: none;
            border: none;
        }

        .my-account__inline-container {
            display: flex;
            align-items: center;
        }

        .my-account__input-text {
            font-size: 14px;
            color: #333;
        }

        .stardust-radio-group {
            display: flex;
            justify-content: flex-start;
        }

        .stardust-radio {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .stardust-radio+.stardust-radio {
            margin-left: 12px;
        }

        .stardust-radio>input {
            cursor: pointer;
        }

        .stardust-radio-button {
            margin-right: 8px;
            flex-shrink: 0;
            position: relative;
            width: 7x;
            height: 7px;
        }

        .stardust-radio__content {
            font-size: 14px;
        }

        SELECT {
            padding: 5px;
            font-size: 14px;
            margin-right: 2px;
            width: 120px;
            cursor: pointer;
            height: 40px;
            outline: orangered;
            border: 1px solid #e5e5e5;
        }

        select:hover {
            border: 1px solid orangered;
        }

        SELECT+SELECT {
            margin-right: 2px;
        }

        input.date {
            width: 50px;
            padding: 5px;
        }

        .my-account-page__submit {
            margin-bottom: 60px;
            padding-left: calc(20% + 20px);
        }

        .my-account-profile__right {
            width: 300px;
            display: flex;
            justify-content: center;
            overflow: hidden;
            border-left: 1px solid #efefef;
        }

        .avatar-uploader {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .avatar-uploader__avatar {
            height: 100px;
            width: 100px;
            margin: 20px 0;
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 50%;
        }

        .avatar-uploader__avatar-image {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background-position: 50%;
            background-size: cover;
            background-repeat: no-repeat;
            cursor: pointer;
            
        }

        .btn-light {
            background-color: #fff;
            color: #555;
            overflow: hidden;
            display: -webkit-box;
            text-overflow: ellipsis;
            flex-direction: column;
            font-size: 14px;
            box-sizing: border-box;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .09);
            border-radius: 2px;
            border: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-transform: capitalize;
            outline: 0;
            cursor: pointer;
        }

    </style>
@stop
@section('content')
    <div class="user-page-container container">
        <div class="userpage-sidebar">
            <div class="user-page-brief">
                <div class="user-page-brief__avatar">
                    @if (Auth::guard('customer')->check())
                        @if (Auth::guard('customer')->user()->avatar)
                            <img src="{{ asset('upload/image/user') . '/' . Auth::guard('customer')->user()->avatar }}"
                                alt="">
                        @else
                            <img src="{{ asset('upload/image/user/avatar-default.png') }}" alt="">
                        @endif
                    @endif
                </div>
                <div class="user-page-brief__right">
                    <div class="user-page-brief__username">
                        @if (Auth::guard('customer')->check())
                            {{ Auth::guard('customer')->user()->name }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="userpage-sidebar-menu">
                <div class="userpage-sidebar-menu-entry">
                    <div style="background-color: rgb(255, 193, 7);" class="userpage-sidebar-menu-entry__icon">
                        <svg style="stroke: #fff;width:13px;height:13px;"
                            class="tickid-svg-icon user-page-sidebar-icon icon-headshot" enable-background="new 0 0 15 15"
                            viewBox="0 0 15 15" x="0" y="0">
                            <g>
                                <circle cx="7.5" cy="4.5" fill="none" r="3.8" stroke-miterlimit="10"></circle>
                                <path d="m1.5 14.2c0-3.3 2.7-6 6-6s6 2.7 6 6" fill="none" stroke-linecap="round"
                                    stroke-miterlimit="10"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="userpage-sidebar-menu-entry__text">
                        <a href="{{ route('account.profile') }}">
                            Hồ sơ
                        </a>
                    </div>
                </div>
                <div class="userpage-sidebar-menu-entry">
                    <div class="userpage-sidebar-menu-entry__icon">
                        <svg style="stroke: #fff;width:13px;height:13px;" enable-background="new 0 0 15 15"
                            viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon "
                            style="fill: rgb(255, 255, 255);">
                            <g>
                                <rect fill="none" height="10" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-miterlimit="10" width="8" x="4.5" y="1.5"></rect>
                                <polyline fill="none" points="2.5 1.5 2.5 13.5 12.5 13.5" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    x1="6.5" x2="10.5" y1="4" y2="4"></line>
                                <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    x1="6.5" x2="10.5" y1="6.5" y2="6.5"></line>
                                <line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                    x1="6.5" x2="10.5" y1="9" y2="9"></line>
                            </g>
                        </svg>

                    </div>
                    <div class="userpage-sidebar-menu-entry__text">
                        <a href="{{ route('purchase') }}">
                            Đơn mua
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('account.post_profile') }}" enctype="multipart/form-data">
            @csrf
            <div class="user-page__content">
                <div class="h25IfI">
                    <div class="my-account-section">
                        <div class="my-account-section__header">
                            <div class="my-account-section__header-title">Hồ sơ của tôi </div>
                            <div class="my-account-section__header-subtitle">
                                Quản lý thông tin hồ sơ để bảo mật tài khoản
                            </div>
                        </div>
                        <div class="my-account-profile-form">
                            <div class="my-account-profile">
                                <div class="my-account-profile__left">
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label">Tên </div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator">
                                                        <input value="@if (Auth::guard('customer')->check()) {{ Auth::guard('customer')->user()->name }} @endif" type="text" name="name" id="udHoTen">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label">Email</div>
                                            <div class="input-with-label__content">
                                                <div class="">
                                                    <div id="email_name" style="font-size: 14px;">
                                                        @if (Auth::guard('customer')->check())
                                                            {{ Auth::guard('customer')->user()->email }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label">Số điện thoại</div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator">
                                                        <input type="text" value="@if (Auth::guard('customer')->check()) {{ Auth::guard('customer')->user()->phone_number }} @endif"
                                                        type="number" name="phone_number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-with-label">
                                        <div class="input-with-label__wrapper">
                                            <div class="input-with-label__label">Địa chỉ</div>
                                            <div class="input-with-label__content">
                                                <div class="input-with-validator-wrapper">
                                                    <div class="input-with-validator">
                                                        <input value="@if (Auth::guard('customer')->check()) {{ Auth::guard('customer')->user()->address }} @endif" name="address" id="udDiaChi" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input hidden id="value_imgavatar" />
                                    <div class="my-account-page__submit">
                                        <button class="btn btn--primary " type="submit">Lưu</button>
                                    </div>
                                </div>
                                <div class="my-account-profile__right">
                                    <div class="avatar-uploader">
                                        <div class="avatar-uploader__avatar">
                                            <div class="avatar-uploader__avatar-image">
                                                @if (Auth::guard('customer')->check())
                                                    @if (Auth::guard('customer')->user()->avatar)
                                                        <img class="avatar-uploader__avatar-image js-avatar" id="img_avatar"
                                                            src="{{ asset('upload/image/user') . '/' . Auth::guard('customer')->user()->avatar }}"
                                                            alt=""> -->

                                                    @else <img id="none-avatar"
                                                            class="avatar-uploader__avatar-image js-avatar"
                                                            src="{{ asset('upload/image/user/avatar-default.png') }}"
                                                            alt="">

                                                    @endif
                                                    <img style="display: none;"
                                                        class="avatar-uploader__avatar-image js-avatar" id="img_avatar"
                                                        src="" alt="">
                                                @endif
                                            </div>
                                        </div>

                                        <input id="choseimg" name="avatar" hidden type="file"
                                            class="avatar-uploader__file-input">


                                        <button id="selectimg" class="btn btn-light" type="button">Chọn ảnh</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@stop
@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img_avatar').attr('src', e.target.result);
                    $('#value_imgavatar').attr('value', e.target.result)
                    $('#none-avatar').css('display', 'none');
                    $('#img_avatar').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#choseimg").change(function() {
            readURL(this);
        });
        $('#selectimg').on('click', function() {
            $('#choseimg').click();

        })
        var email = $('#email_name').text()
        var str = ''
        for (var i = 0; i < email.length; i++) {
            if (email[i].length === 1 && email[i].match(/[a-z,@.]/i)) {
                str += email[i]
            }
        }
        var index
        for (var i = 0; i < str.length; i++) {
            if (str[i] == '@') {
                index = i
            }
        }
        var newstr = ''
        for (var i = 0; i < str.length; i++) {
            if (i >= 2 && i < index) {
                newstr += '*'
            } else {
                newstr += str[i]
            }
        }
        var dem = 0
        for (var i = 0; i < newstr.length; i++) {
            if (newstr[i] == '*') {
                dem += 1
            }

        }

        if (dem > 4) {
            $('#email_name').text(newstr.substr(0, 6) + newstr.substr(index))
        } else {
            $('#email_name').text(newstr)
        }

    </script>
@stop
