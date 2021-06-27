<?php
$menus = config('menu'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', '@Master Layout'))</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/app.css">
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @yield('style')
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="https://colorlib.com/polygon/adminator/assets/static/images/logo.png" alt="" srcset="">
                    <h3>Adminator</h3>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">

                        @foreach ($menus as $m)

                            <li class="sidebar-item @if (isset($m['hassub'])) {{ $m['hassub'] }} @endif">
                                <a href="{{ route($m['route']) }}" class='sidebar-link'>
                                    <i data-feather="{{ $m['icon'] }}" width="20"></i>
                                    <span>{{ $m['label'] }}</span>
                                </a>
                                @if (isset($m['item']))

                                    <ul class="submenu">
                                        @foreach ($m['item'] as $i)
                                            <li>
                                                <a href="{{ route($i['route']) }}">{{ $i['label'] }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                @endif

                            </li>

                        @endforeach
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                                <h6 class='py-2 px-4'>Thông báo</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success mr-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon mr-2">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">

                            </div>
                        </li>
                        <li class="dropdown">
                            @if (Auth::check())
                                <a href="#" data-toggle="dropdown"
                                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    <div class="avatar mr-1">
                                        <img src="{{ asset('admin') }}/assets/images/avatar/avatar-s-1.png" alt=""
                                            srcset="">
                                    </div>
                                    <div class="d-none d-md-block d-lg-inline-block">{{ Auth::user()->name }}</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"><i data-feather="user"></i> Tài khoản</a>
                                    <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Tin nhắn</a>
                                    <a class="dropdown-item" href="#"><i data-feather="settings"></i> Cài đặt</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('auth.logout') }}"><i
                                            data-feather="log-out"></i> Đăng xuất</a>
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div style="display: flex; justify-content: center;" class="">
                        <p>2020 &copy;Designed by me. All rights reserved.</p>
                    </div>

                </div>
            </footer>
        </div>
    </div>
    <div id="loginform" style="display: none" class="modal ">
        <div class="modal__overlay ">
        </div>
        <div class="modal__body ">
            <!-- Login form -->
            <form action="/Product/Index" class="login_form" method="GET" name="form" onsubmit="return validated()">
                <div class="auth-form">
                    <div class="auth-form__container ">
                        <div class="auth-form__header ">
                            <h3 class="auth-form__heading ">Đăng nhập</h3>
                            <a style="text-decoration: none;" onclick="register()"><span
                                    class="auth-form__switch-btn ">Đăng ký</span></a>
                        </div>
                        <div class="auth-form__form ">
                            <div class="auth-form__group ">
                                <input style="width: 100%" ng-model="user.TaiKhoan" type="text" name="email"
                                    class="auth-form__input " placeholder="Tài khoản của bạn ">
                                <div id="email_error" class="">Thông tin tài khoản không đúng</div>
                            </div>
                            <div class="auth-form__group ">
                                <input style="width: 100%" ng-model="user.MatKhau" type="password" name="password"
                                    class="auth-form__input " placeholder="Mật khẩu của bạn ">
                                <div class="" id="pass_error">Thông tin mật khẩu không đúng</div>
                            </div>
                        </div>
                        <div class="auth-form__aside ">
                            <div class="auth-form__help ">
                                <a href=" " class="auth-form__help-link auth-form__help-link--forgot ">Quên mật khẩu</a>
                                <span class="auth-form__help-separate "></span>
                                <a href=" " class="auth-form__help-link ">Cần trợ giúp?</a>
                            </div>
                        </div>
                        <div class="auth-form__controls ">
                            <a id="rollback" onclick="backpage()" style="text-decoration: none;"><button type="button"
                                    class="btn btn-normal auth-form__controls-back ">TRỞ LẠI</button></a>
                            <button ng-click="login_user()" type="button" class="btn btn--primary "></p>ĐĂNG
                                NHẬP</button>
                        </div>
                    </div>
                    <div class="ath-form__socials ">
                        <a href=" " class="ath-form__socials-Fb btn btn--size-s btn--width-icon ">
                            <i class="ath-form__socials-icon fab fa-facebook-f "></i>
                            <span class="auth-form__socials-title ">Kết nối với FaceBook</span>
                        </a>
                        <a style="background-color: #fff;" href=" "
                            class="ath-form__socials-Gg btn btn--size-s btn--width-icon ">
                            <i class="ath-form__socials-icon fab fa-google" style="color: var(--primary-color);"></i>
                            <span class="auth-form__socials-title " style="color: #333;">Kết nối với Google</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="registerform" style="display: none" class="modal ">
        <div class="modal__overlay ">
        </div>
        <div class="modal__body ">

            <!-- Register form -->
            <form class="auth-form" onsubmit="return check()">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading ">Đăng ký</h3>
                        <a onclick="login()" style="text-decoration: none;"><span class="auth-form__switch-btn ">Đăng
                                nhập</span></a>
                    </div>
                    <div class="auth-form__form ">
                        <div class="auth-form__group ">
                            <input style="width: 100%" ng-model="register.TaiKhoan" type="text"
                                class="auth-form__input " placeholder="Tài khoản của bạn ">
                        </div>
                        <div class="auth-form__group ">
                            <input style="width: 100%" id="pass" ng-model="register.MatKhau" type="password"
                                class="auth-form__input " placeholder="Mật khẩu của bạn ">
                        </div>
                        <div class="auth-form__group ">
                            <input style="width: 100%" id="repass" type="password" class="auth-form__input "
                                placeholder="Nhập lại mật khẩu của bạn ">
                        </div>
                    </div>
                    <div class="auth-form__aside ">
                        <p class="auth-form__policy-text ">
                            Bằng việc đăng kí, bạn đã đồng ý với Shopee về
                            <a href=" " class="auth-form__text-link ">Điều khoản dịch vụ </a> &
                            <a href=" " class="auth-form__text-link ">Chính sách bảo mật</a>
                        </p>
                    </div>
                    <div class="auth-form__controls ">
                        <a style="text-decoration: none;" onclick="backpage()"><button type="button"
                                class="btn btn-normal auth-form__controls-back ">TRỞ LẠI</button></a>
                        <button ng-click="savedata()" type="submit" class="btn btn--primary ">ĐĂNG KÝ</button>
                    </div>
                </div>
                <div class="ath-form__socials ">
                    <a href=" " class="ath-form__socials-Fb btn btn--size-s btn--width-icon ">
                        <i class="ath-form__socials-icon fab fa-facebook-f "></i>
                        <span class="auth-form__socials-title ">Kết nối với FaceBook</span>
                    </a>
                    <a style="background-color: #fff;" href=" "
                        class="ath-form__socials-Gg btn btn--size-s btn--width-icon ">
                        <i class="ath-form__socials-icon fab fa-google" style="color: var(--primary-color);"></i>
                        <span class="auth-form__socials-title " style="color: #333;">Kết nối với Google</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous"></script>
    <script src="{{ asset('admin') }}/assets/js/feather-icons/feather.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/app.js"></script>

    <script src="{{ asset('admin') }}/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/apexcharts/apexcharts.min.js"></script>

    <script src="{{ asset('admin') }}/assets/js/main.js"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="{{ asset('admin/assets/js/slug.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.2/angular.min.js"
        integrity="sha512-7oYXeK0OxTFxndh0erL8FsjGvrl2VMDor6fVqzlLGfwOQQqTbYsGPv4ZZ15QHfSk80doyaM0ZJdvkyDcVO7KFA=="
        crossorigin="anonymous"></script>
    <script>
        function validate(name, min, max, emails) {
            var inputElement = document.querySelector(name)
            var messageElement = inputElement.parentElement.parentElement.querySelector('.text-message')

            if (inputElement.value == "") {
                messageElement.textContent = "Vui lòng nhập trường này.";
                return false;
            } else {
                if (inputElement.type == 'email') {
                    var regexEmail = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/gm
                    if (!inputElement.value.match(regexEmail)) {
                        messageElement.textContent = "Email chưa đúng định dạng.";
                        return false;
                    }

                    if (emails) {
                        var bool = emails.find(function(obj) {
                            return obj == inputElement.value;
                        })

                        if (bool) {
                            messageElement.textContent = "Email đã tồn tại.";
                            return false;
                        }
                    }
                }
                if (inputElement.type == "password") {
                    if (inputElement.value.length < min) {
                        messageElement.textContent = "Mật khẩu tối thiểu " + min + " ký tự";
                        return false;
                    }
                    if (inputElement.classList.contains('password')) {
                        if (inputElement.value.length > max) {
                            messageElement.textContent = "Mật khẩu tối đa " + max + " ký tự";
                            return false;
                        }
                    }
                }
                if (inputElement.classList.contains('confirmpassword')) {
                    if (inputElement.value != document.getElementById('re_password').value) {
                        messageElement.textContent = "Mật khẩu nhập lại chưa chính xác.";
                        return false;
                    }
                }
                if (inputElement.classList.contains('phone_number')) {
                    var regexEmail = /(84|0[3|5|7|8|9])+([0-9]{8})\b/g
                    if (!inputElement.value.match(regexEmail)) {
                        messageElement.textContent = "Số điện thoại chưa đúng định dạng.";
                        return false;
                    }
                }
                messageElement.textContent = "";
                return true;
            }
        }

    </script>
    @yield('script')
</body>

</html>
