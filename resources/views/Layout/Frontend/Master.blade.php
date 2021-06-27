<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', '@Master Layout'))</title>
    <!-- CSS only -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="{{ asset('client') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ asset('client') }}/assets/css/base.css">
    <link rel="stylesheet" href="{{ asset('client') }}/assets/css/grid.css">
    <link rel="stylesheet" href="{{ asset('client') }}/assets/css/responsive.css">
    <!-- CSS only -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese"
        rel="stylesheet">
    <link rel="icon" href="https://img.abaha.vn/photos/resized/320x/83-1574737287-myphamohui-lgvina.png"
        type="image/x-icon">
    @yield('link')
    <style>
        .cart-check-info {
            display: flex;
            justify-content: space-between;
            margin: 8px 12px 8px 12px;
            padding: 0 10px 0 0;
        }

        .cart-check-title {
            font-size: 14px;
        }

        .cart-check-value {
            font-size: 14px;
        }

        .header__cart-notice {
            width: 34px !important;
            left: 23px;
            text-align: center;
        }

        .auth-form__input {
            font-size: 14px;
            width: 100%;
            height: 40px;
            border-radius: 2px;
            outline: none;
        }

    </style>
    @yield('style')
</head>

<body ng-app="Homeapp">
    <header class="header">
        <div class="container-fluid">
            <div class="container">
                <nav class="header__navbar hide-on-mobile-tablet">
                    <ul class="header__navbar-list">
                        <li class="hearder__navbar-item header__navbar-item--has-qr hearder__navbar-item--separate">
                            Vào cửa hàng trên ứng dụng MyOhui
                            <!-- Header-QR-Code -->
                            <div class="header__qr">
                                <img src="{{ asset('client') }}/assets/img/QR-Code.png" alt="QR_Code"
                                    class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a href="" class="header__qr-link">
                                        <img src="{{ asset('client') }}/assets/img/Google Play.png" alt="Google Play"
                                            class="header__qr-dowload-img">
                                    </a>
                                    <a href="" class="header__qr-link"><img
                                            src="{{ asset('client') }}/assets/img/App Store.png" alt="App Store"
                                            class="header__qr-dowload-img"></a>
                                </div>
                            </div>
                        </li>
                        <li class="hearder__navbar-item">
                            <span class="hearder__navbar-title--no-pointer">Kết nối</span>
                            <a href="https://www.facebook.com/MyphamOhuiLGvina/" class="header__navbar-icon-link">
                                <i class="header__navbar-icon fab fa-facebook"></i>

                            </a>
                            <a href="https://zalo.me/0965866851" class="header__navbar-icon-link">
                                <button class="header__navbar-icon header__navbar-icon-zalo"></button>
                            </a>
                        </li>
                    </ul>
                    <ul ng-controller="LoginController" class="header__navbar-list">
                        <li class="hearder__navbar-item hearder__navbar-item--has-notify">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon far fa-bell"></i> Thông báo
                            </a>
                            <div class="header__notify">
                                <header class="header__notify-header">
                                    <h3>Thông báo mới nhận</h3>
                                </header>
                                <ul class="header__notify-list">
                                    @if (count($news) < 1)
                                        <li>
                                            <div class="header__notify-header">
                                                <h3>Không có thông báo mới.</h3>
                                            </div>
                                        </li>
                                    @else
                                        @foreach ($news as $n)
                                            <li class="header__notify-item header__notify-item--viewed">
                                                <a href="{{ route('tintuc.detail', ['slug' => $n->slug]) }}" class="header__notify-link">
                                                    <img src="{{ asset('upload/image/news').'/'.$n->image }}"
                                                        alt="Mỹ phẩm Ohui" class="header__notify-img">
                                                    <div class="header__notify-info">
                                                        <span class="header__notify-name">{{ $n->title }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif()
                                </ul>
                                <footer class="header__notify-footer">
                                    <a href="{{ route('tintuc') }}" class="header__notify-footer-btn">Xem tất cả</a>
                                </footer>
                            </div>
                        </li>
                        <li class="hearder__navbar-item">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon far fa-question-circle"></i> Trợ giúp
                            </a>
                        </li>
                        @if (!Auth::guard('customer')->check())
                            <div id="hearder__navbar-account">
                                <a style="text-decoration: none;">
                                    <li
                                        class="hearder__navbar-item hearder__navbar-item--strong hearder__navbar-item--separate register">
                                        Đăng ký</li>
                                </a>
                                <a style="text-decoration: none;">
                                    <li class="hearder__navbar-item hearder__navbar-item--strong login">Đăng nhập
                                    </li>
                                </a>
                            </div>
                        @else
                            <li id="hearder__navbar-user" class="hearder__navbar-item hearder__navbar-user">
                                @if (Auth::guard('customer')->user()->avatar)
                                    <img id="ViewAvatar"
                                        src="{{ asset('upload/image/user') . '/' . Auth::guard('customer')->user()->avatar }}"
                                        alt="user-img" class="header__navbar-user-img">
                                @else
                                    <img id="ViewAvatar_none"
                                        src="https://1.bp.blogspot.com/-m3UYn4_PEms/Xnch6mOTHJI/AAAAAAAAZkE/GuepXW9p7MA6l81zSCnmNaFFhfQASQhowCLcBGAsYHQ/s1600/Cach-Lam-Avatar-Dang-Hot%2B%25281%2529.jpg"
                                        alt="user-img" class="header__navbar-user-img">
                                @endif
                                <span
                                    class="header__navbar-user-name">{{ Auth::guard('customer')->user()->name }}</span>
                                <ul class="hearder__navbar-user-menu">
                                    <li class="hearder__navbar-user-item">
                                        <a href="{{ route('account.profile') }}">Tài khoản của tôi </a>
                                    </li>
                                    <li class="hearder__navbar-user-item">
                                        <a href="{{ route('purchase') }}">Đơn mua </a>
                                    </li>
                                    <li class="hearder__navbar-user-item hearder__navbar-user-item--separate">
                                        <a class='logout' href="">Đăng xuất </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <!-- header-with-search -->

            <div class="container">
                <div class="header-with-search  ">
                    <!-- nav__mobile-cotegory -->
                    <div class="nav__mobile-cotegory ">
                        <label for="nav__mobile-cotegory-check" class="nav__mobile-cotegory-icon"
                            style="display: block;">
                            <svg class="nav__mobile-bar-icon" aria-hidden="true" focusable="false" data-prefix="fas"
                                data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" color="#fff">
                                <path fill="currentColor"
                                    d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z ">
                                </path>
                            </svg>
                        </label>
                        <input type="checkbox" id="nav__mobile-cotegory-check" style="display: none;">
                        <label for="nav__mobile-cotegory-check" class="nav__overlay-category"></label>
                        <div class="nav__mobile">
                            <ul class="nav__list">
                                <li class="nav__item">
                                    <a style="color: orangered;" href="./index.html" class="nav__link">Tất Cả Sản
                                        Phẩm</a>
                                </li>
                                <input type="checkbox" hidden id="nav__category-input">
                                <li class="nav__item nav__item-first">
                                    <label for="nav__category-input">
                                        <svg class="nav__icon " aria-hidden="true " focusable="false "
                                            data-prefix="fas " data-icon="chevron-right "
                                            class="svg-inline--fa fa-chevron-right fa-w-10 " role="img " xmlns="http://www.w3.org/2000/svg
                                    " viewBox="0 0 320 512 ">
                                            <path fill="currentColor " d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373
                                    24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z "></path>
                                        </svg>
                                    </label>
                                    <a href=" " class="nav__link nav__link-first ">Ohui</a>
                                </li>
                                <li class="nav__item nav__item-1 ">
                                    <a href="./OhuiTheFirstTaiSinh.html" class="category-item__link ">Ohui Thefirst Tái
                                        Sinh </a>
                                </li>
                                <li class="nav__item nav__item-1 ">
                                    <a href="./OhuiDưỡngTrắng.html" class="category-item__link ">Ohui Dưỡng Trắng</a>
                                </li>
                                <li class="nav__item nav__item-1 ">
                                    <a href="./OhuiPrimeAdvancer.html" class="category-item__link ">Ohui Prime
                                        Advancer</a>
                                </li>
                                <li class="nav__item nav__item-1 ">
                                    <a href="./OhuiDưỡngẨm.html" class="category-item__link ">Ohui Dưỡng Ẩm</a>
                                </li>
                                <li class="nav__item nav__item-1 ">
                                    <a href="./OhuiChốngLãoHóa.html" class="category-item__link ">Ohui Chống Lão Hóa</a>
                                </li>
                                <li class="nav__item nav__item-1 ">
                                    <a href="./OhuiMakeUp.html" class="category-item__link ">Ohui Make Up</a>
                                </li>
                                <li class="nav__item nav__item-1 ">
                                    <a href="./OhuiChốngNắng.html" class="category-item__link ">Ohui Chống Nắng</a>
                                </li>
                                <li class="nav__item ">
                                    <a href=" " class="nav__link ">Thực phẩm chức năng</a>
                                </li>
                                <li class="nav__item ">
                                    <a href=" " class="nav__link ">Dịch vụ</a>
                                </li>
                                <li class="nav__item ">
                                    <a href=" " class="nav__link ">Tin tức</a>
                                </li>
                                <li class="nav__item ">
                                    <a href=" " class="nav__link ">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <label for="mobile-search-checkbox " class="header__mobile-search ">
                        <i class="header__mobile-search-icon fas fa-search "></i>
                    </label>
                    <div class="header__logo ">
                        <a href="/" class="header__logo-link header__logo-link "
                            style="-webkit-tap-highlight-color: transparent; ">
                            <img class="header__logo-img"
                                src="https://img.abaha.vn/photos/resized/320x/83-1574737287-myphamohui-lgvina.png"
                                alt="Logo_img">
                        </a>
                    </div>
                    <input type="checkbox" hidden id="mobile-search-checkbox " class="header__search-checkbox ">
                    <form class="header__search" action="{{ route('all') }}" method="get">
                        <div class="header__search-input-wrap">
                            <input id="name" type="text" class="header__search-input"
                                placeholder="Tìm kiếm sản phẩm... " value="{{ Request::get('name') }}" name="name">
                            <!-- Search history -->
                            <!-- <div class="header__search-history ">
                                <h3 class="header__search-history-heading ">Gợi ý tìm kiếm:</h3>
                                <ul class="header__search-history-list ">
                                    <li class="header__search-history-item ">
                                        <a href=" "><i>Kem dưỡng da</i> </a>
                                    </li>
                                    <li class="header__search-history-item ">
                                        <a href=" "><i>Kem trị mụn</i> </a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="header__search-select ">
                            <span class="header__search-select-label ">Trong shop</span>
                            <i class="header__search-select-icon fas fa-angle-down "></i>
                            <ul class="header__search-option ">
                                <li class="header__search-option-item header__search-option-item--active ">
                                    <span>Trong Shop</span>
                                    <i class="fas fa-check "></i>
                                </li>
                            </ul>
                        </div>
                        <button href="" class="header__search-btn " id="search-btn">
                            <i style="font-size: 1.8rem;
                            color: #fff;" class="fas fa-search"></i>
                        </button>
                    </form>
                    <!-- Cart layout -->
                    <div ng-controller="StoreController" class="header__cart ">
                        <div class="header__cart-wrap ">
                            <a href="./Giohang.html"><i class="header__cart-icon fas fa-cart-plus "></i></a>
                            @if (Session::get('Cart'))
                                <input style="width:26px;display: flex;justify-content: center;"
                                    class="header__cart-notice" id="header__cart-notice"
                                    value="{{ Session::get('Cart')->totalQuantity }}"></input>
                            @else

                                <input style="width:26px;display: flex;justify-content: center;"
                                    class="header__cart-notice" id="header__cart-notice" value="0"></input>
                            @endif
                            <!-- No cart: header__cart-list--no-cart -->
                            <div id="header__cart-list" class="header__cart-list ">
                                @if (Session::get('Cart') == null)
                                    <div id="no_cart">
                                        <img style="display: initial"
                                            src="{{ asset('client') }}/assets/img/no-cart.png" alt="No-cart "
                                            class="header__cart-no-cart-img ">
                                        <span style="display: block" class="header__cart-list-no-cart-msg ">
                                            Chưa có sản phẩm
                                        </span>
                                    </div>
                                @endif
                                <div id="carts">
                                    @if (Session::has('Cart'))
                                        <h4 class="header__cart-heading ">Sản phẩm đã thêm</h4>
                                        <ul class="header__cart-list-item ">
                                            @foreach (Session::get('Cart')->products as $item)
                                                <li ng-repeat="i in cart1"
                                                    class="header__cart-list-item header__cart-item">

                                                    <div class="header__cart-item-info ">
                                                        <div class="header__cart-item-head ">

                                                            <img src="{{ asset('upload/image/product') . '/' . $item['productInfo']->image }}"
                                                                alt="myphamohui " class="header__cart-img ">
                                                            <span class="header__cart-item-name ">
                                                                {{ $item['productInfo']->name }}
                                                            </span>
                                                            <div class="header__cart-item-price-wrap ">
                                                                <span class="header__cart-item-price ">
                                                                    {{ number_format($item['productInfo']->price) }}đ</span>
                                                                <span class="header__cart-item-multiply ">x</span>
                                                                <span class="cart-quantity cart-column ">
                                                                    <input disabled class="cart-quantity-input "
                                                                        type="number "
                                                                        id="quantity-{{ $item['productInfo']->id }}"
                                                                        value="{{ $item['quantity'] }}">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="header__cart-item-body ">
                                                            <span class="header__cart-item-description ">Mỹ phẩm:
                                                                {{ $item['productInfo']->category->find($item['productInfo']->category->parent_id)->name }}</span>
                                                            <a onclick="deleteCart({{ $item['productInfo']->id }})"
                                                                href="javascript:"><span
                                                                    class="header__cart-item-description">Xóa</span></a>
                                                        </div>
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ul>

                                        <div class="cart-check">
                                            <div class="cart-check-info">
                                                <div class="cart-check-title">Tổng tiền:</div>
                                                <div class="cart-check-value">
                                                    {{ number_format(Session::get('Cart')->totalPrice) }}đ</div>
                                            </div>
                                            <div>
                                                <a href="{{ route('cart') }}"
                                                    class="header__cart-view-cart btn btn--primary ">Xem giỏ hàng</a>
                                            </div>
                                        </div>

                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="header__user ">
                        <label for="nav-mobile-input" class="header__user-link ">
                            <img src="https://1.bp.blogspot.com/-m3UYn4_PEms/Xnch6mOTHJI/AAAAAAAAZkE/GuepXW9p7MA6l81zSCnmNaFFhfQASQhowCLcBGAsYHQ/s1600/Cach-Lam-Avatar-Dang-Hot%2B%25281%2529.jpg "
                                alt=" " class="header__user-img ">
                        </label>
                        <input type="checkbox" hidden id="nav-mobile-input">
                        <label for="nav-mobile-input" class="nav__overlay "></label>
                        <nav class="nav__mobile-user ">
                            <div class="nav__mobile-user-img ">
                                <img src="https://1.bp.blogspot.com/-m3UYn4_PEms/Xnch6mOTHJI/AAAAAAAAZkE/GuepXW9p7MA6l81zSCnmNaFFhfQASQhowCLcBGAsYHQ/s1600/Cach-Lam-Avatar-Dang-Hot%2B%25281%2529.jpg "
                                    alt=" " class="header__user-img1 ">
                            </div>
                            <div class="nav__mobile-user-list ">
                                <div class="nav__mobile-user-item ">
                                    <a href="/Account/Registar" class="nav__mobile-user-link ">Đăng ký</a>
                                </div>
                                <div class="nav__mobile-user-item nav__mobile-user-item--active ">
                                    <a href="/Account/Login" class="nav__mobile-user-link ">Đăng nhập</a>
                                </div>
                            </div>
                            <div class="nav__mobile-user-list-news ">
                                <div class="nav__mobile-news-item ">
                                    <a href=" " class="nav__mobile-news-link ">Tin tức</a>
                                </div>
                                <div class="nav__mobile-news-item ">
                                    <a href="" class="nav__mobile-news-link ">Giỏ hàng</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>
    @yield('content')

    <footer class="footer ">
        <div class="grid wide footer__contain ">
            <div class="row ">
                <div class="col l-2-4 m-4 c-6 ">
                    <h3 class="footer__heading ">Chắm sóc khách hàng</h3>
                    <ul class="footer-list ">
                        <li class="footer-item ">
                            <a href=" " class="footer-item__link "><span>Trung tâm trợ giúp</span></a>
                        </li>
                        <li class="footer-item ">
                            <a href=" " class="footer-item__link "><span>Hướng dẫn mua hàng</span></a>
                        </li>
                        <li class="footer-item ">
                            <a href=" " class="footer-item__link "><span>Chính sách vận chuyển</span></a>
                        </li>
                    </ul>
                </div>
                <div class="col l-2-4 m-4 c-6 ">
                    <h3 class="footer__heading ">Về chúng tôi</h3>
                    <ul class="footer-list ">
                        <li class="footer-item ">
                            <a href=" " class="footer-item__link "><span>Giới thiệu về Shop</span></a>
                        </li>
                        <li class="footer-item ">
                            <a href=" " class="footer-item__link "><span>Điều khoản về Shop</span></a>
                        </li>
                        <li class="footer-item ">
                            <a href=" " class="footer-item__link "><span>Chính sách bảo mật</span></a>
                        </li>
                    </ul>
                </div>
                <div class="col l-2-4 m-4 c-6 footer__contain ">
                    <h3 class="footer__heading ">Thanh toán</h3>
                    <ul class="footer__contain-pay ">
                        <li class="footer__contain-pay-img ">
                            <div class="footer-vn-background footer-vn-visa-png " style="width: 55px; height: 29px; ">
                            </div>
                        </li>
                        <li class="footer__contain-pay-img ">
                            <div class="footer-vn-background footer-vn-mastercard-png "
                                style="width: 55px; height: 29px; "></div>
                        </li>
                        <li class="footer__contain-pay-img ">
                            <div class="footer-vn-background footer-vn-jcb-png " style="width: 55px; height: 23px; ">
                            </div>
                        </li>
                        <li class="footer__contain-pay-img ">
                            <div class="footer-vn-background footer-vn-amex-png "
                                style="width: 55px; height: 24px; margin-left: 0 14px; "></div>
                        </li>
                        <li class="footer__contain-pay-img ">
                            <div class="footer-vn-background footer-vn-vn_cod_footer-png "
                                style="width: 50px; height: 29px; "></div>
                        </li>
                        <li class="footer__contain-pay-img ">
                            <div class="footer-vn-background footer-vn-vn_installment_footer-png "
                                style="width: 55px; height: 29px; "></div>
                        </li>
                        <li class="footer__contain-pay-img ">
                            <div class="footer-vn-background footer-vn-air-pay-png "
                                style="width: 23px; height: 29px; margin-left: 16px; "></div>
                        </li>
                    </ul>
                </div>
                <div class="col l-2-4 m-4 c-6 ">
                    <h3 class="footer__heading ">Theo dõi chúng tôi trên</h3>
                    <ul class="footer-list ">
                        <li class="footer-item ">
                            <a href="https://www.facebook.com/MyphamOhuiLGvina/ " class="footer-item__link ">
                                <i class="footer-item__icon fab fa-facebook "></i>
                                <span>Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a href=" " class="footer-item__link ">
                                <i class="footer-item__icon fab fa-instagram "></i>
                                <span>Instagram</span>
                            </a>
                        </li>
                        <li class="footer-item ">
                            <a href=" " class="footer-item__link ">
                                <i class="footer-item__icon fab fa-linkedin "></i>
                                <span>LinkedIn</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col l-2-4 m-8 c-6 ">
                    <h3 class="footer__heading ">Vào cửa hàng trên ứng dụng</h3>
                    <div class="footer__download ">
                        <a href=" " class="footer__download-qr-link ">
                            <img src="{{ asset('client') }}/assets/img/QR-Code.png " alt="Download QR "
                                class="footer__download-qr ">
                        </a>
                        <div class="footer__download-apps ">
                            <a href=" " class="footer__download-app-link ">

                                <img src="{{ asset('client') }}/assets/img/Google Play.png " alt="Google Play "
                                    class="footer__download-app-img ">
                            </a>
                            <a href=" " class="footer__download-app-link ">
                                <img src="{{ asset('client') }}/assets/img/App Store.png " alt="App Store "
                                    class="footer__download-app-img ">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <div id="loginform" style="display: none" class="modal ">
        <div class="modal__overlay ">
        </div>
        <div class="modal__body ">
            <!-- Login form -->
            <form action="" class="login_form" method="POST">
                <div class="auth-form">
                    <div class="auth-form__container ">
                        <div class="auth-form__header ">
                            <h3 class="auth-form__heading ">Đăng nhập</h3>
                            <a style="text-decoration: none;"><span class="auth-form__switch-btn register">Đăng
                                    ký</span></a>
                        </div>
                        <div class="auth-form__form ">
                            <div class="auth-form__group ">
                                <input style="width: 100%" type="email" name="email" class="auth-form__input "
                                    placeholder="Eamil của bạn" required>
                                <div id="email_error" style="height: 100%" class="alert alert-danger" role="alert">
                                    <h4>Email không chính xác vui lòng kiểm tra lại.</h4>
                                </div>
                            </div>

                            <div class="auth-form__group ">
                                <input style="width: 100%" type="password" name="password" class="auth-form__input "
                                    placeholder="Mật khẩu của bạn " required>
                                <div id="pass_error" style="height: 100%" class="alert alert-danger" role="alert">
                                    <h4>Mật khẩu không chính xác vui lòng kiểm tra lại.</h4>
                                </div>
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
                            <a id="rollback" style="text-decoration: none;"><button type="button"
                                    class="btn btn-normal auth-form__controls-back backpage">TRỞ LẠI</button></a>
                            <button type="submit" class="btn btn--primary "></p>ĐĂNG
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
            <form class="auth-form register_form">
                <div class="auth-form__container">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading ">Đăng ký</h3>
                        <a class="" style="text-decoration: none;"><span class="auth-form__switch-btn login">Đăng
                                nhập</span></a>
                    </div>
                    <div class="auth-form__form ">
                        <div class="auth-form__group ">
                            <input style="width: 100%" type="text" name="re_email" class="auth-form__input "
                                placeholder="Email của bạn " required>
                            <div id="remail_error" style="height: 100%; display: none" class="alert alert-danger"
                                role="alert">
                                <h4>Email đã tồn tại vui lòng thử lại.</h4>
                            </div>
                        </div>
                        <div class="auth-form__group auth-form__input"
                            style="display: flex; justify-content: space-between; align-items: center; ">
                            <input style="width: 100%; border: none; outline: none" id="pass" type="password"
                                name="re_password" required min="5" class="" placeholder="Mật khẩu của bạn ">
                            <div class="" style="cursor: pointer;" id="showpass"><i class="fas fa-eye"></i></div>

                        </div>
                        <div class="auth-form__group auth-form__input"
                            style="display: flex; justify-content: space-between; align-items: center; ">
                            <input style="width: 100%; border: none; outline: none" id="repass" type="password" class=""
                                required placeholder="Nhập lại mật khẩu của bạn ">
                            <div class="" style="cursor: pointer;" id="showrepass"><i class="fas fa-eye"></i></div>
                        </div>
                        <div id="repass_error" style="height: 100%; display: none" class="alert alert-danger"
                            role="alert">
                            <h4>Mật khẩu nhập lại không chính xác.</h4>
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
                        <a style="text-decoration: none;"><button type="button"
                                class="btn btn-normal auth-form__controls-back backpage">TRỞ LẠI</button></a>
                        <button type="submit" class="btn btn--primary ">ĐĂNG KÝ</button>
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
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    @yield('script')

    <script>
        $(document).ready(function() {
            $('#showpass').click(function() {
                var x = document.getElementById("pass");
                if (x.type === "password") {
                    x.type = "text";
                    this.style.color = '#999'
                } else {
                    x.type = "password";
                    this.style.color = '#333'
                }
            })
            $('#showrepass').click(function() {
                var x = document.getElementById("repass");
                if (x.type === "password") {
                    x.type = "text";
                    this.style.color = '#999'
                } else {
                    x.type = "password";
                    this.style.color = '#333'
                }
            })
            $('#repass').blur(function() {
                if (this.value != $('#pass').val()) {
                    $('#repass_error').css('display', 'block')
                } else {
                    $('#repass_error').css('display', 'none')
                }
            })
            $('.btn-checkout').click(function() {
                var auth = '<?= Auth::guard('customer')->user() ?>'
                if (auth) {
                    window.location = 'cart/checkout';
                } else {
                    $('#loginform').css('display', 'flex');
                }
            });
            $('.login').click(function() {

                $('#loginform').css('display', 'flex');
                $('#registerform').css('display', 'none')
            })
            $('.register').click(function() {

                $('#loginform').css('display', 'none');
                $('#registerform').css('display', 'flex')

                $('#email_error').css('display', 'none');
                $('#pass_error').css('display', 'none');
            })
            $('.backpage').click(function() {
                $('#loginform').css('display', 'none')
                $('#registerform').css('display', 'none')

                $('#email_error').css('display', 'none');
                $('#pass_error').css('display', 'none');

                $('#remail_error').css('display', 'none');
                $('#repass_error').css('display', 'none');

                $('#remail_error').text('');
                $('#repass_error').text('');
                $('#email_error').text('');
                $('#pass_error').text('');
            })
            $("input[name=email]").blur(function() {
                var data = '<?php echo json_encode($users); ?>';
                let email = $("input[name=email]").val();
                var users = JSON.parse(data);
                var arr = [];
                $.each(users, function(i, val) {
                    arr.push(val)
                })
                var file = arr.find(function(obj) {
                    return obj == email;
                });
                if (file) {
                    $('#email_error').css('display', 'none');
                } else {
                    $('#email_error').css('display', 'block');
                }
            })
            $("input[name=re_email]").blur(function() {
                var data = '<?php echo json_encode($users); ?>';
                let email = $("input[name=re_email]").val();
                var users = JSON.parse(data);
                var arr = [];
                $.each(users, function(i, val) {
                    arr.push(val)
                })
                var file = arr.find(function(obj) {
                    return obj == email;
                });
                if (file) {
                    $('#remail_error').css('display', 'block');
                } else {
                    $('#remail_error').css('display', 'none');
                }
            })
            $('.login_form').submit(function(event) {
                event.preventDefault();

                let email = $("input[name=email]").val();
                let password = $("input[name=password]").val();
                let _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route('home.login') }}',
                    type: "POST",
                    data: {
                        email: email,
                        password: password,
                        _token: _token
                    },
                }).done(function(response) {
                    if (response) {
                        location.reload();
                    } else {
                        $('#pass_error').css('display', 'block');
                    }
                })
            })
            $('.register_form').submit(function(event) {
                event.preventDefault();

                let email = $("input[name=re_email]").val();
                let password = $("input[name=re_password]").val();
                let _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route('home.register') }}',
                    type: "POST",
                    data: {
                        email: email,
                        password: password,
                        _token: _token
                    },
                }).done(function(response) {
                    if (response) {
                        $.ajax({
                            url: '{{ route('home.login') }}',
                            type: "POST",
                            data: {
                                email: email,
                                password: password,
                                _token: _token
                            },
                        }).done(function(response) {
                            if (response) {
                                location.reload();
                            }
                        })
                    }
                    console.log(response);

                })

            })
            $('.logout').click(function(event) {
                event.preventDefault();
                let _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route('home.logout') }}',
                    type: "POST",
                    data: {
                        _token: _token
                    },
                }).done(function(response) {
                    location.reload();
                })
            })

        })

    </script>
</body>

</html>
