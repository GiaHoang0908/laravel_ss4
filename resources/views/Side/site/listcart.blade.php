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
                                <span class="header__navbar-user-name">{{ Auth::guard('customer')->user()->name }}</span>
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
                    <label for="nav__mobile-cotegory-check" class="nav__mobile-cotegory-icon" style="display: block;">
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
                                    <svg class="nav__icon " aria-hidden="true " focusable="false " data-prefix="fas "
                                        data-icon="chevron-right " class="svg-inline--fa fa-chevron-right fa-w-10 "
                                        role="img " xmlns="http://www.w3.org/2000/svg
                                " viewBox="0 0 320 512 ">
                                        <path fill="currentColor " d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373
                                24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z ">
                                        </path>
                                    </svg>
                                </label>
                                <a href=" " class="nav__link nav__link-first ">Ohui</a>
                            </li>
                            <li class="nav__item nav__item-1 ">
                                <a href="./OhuiTheFirstTaiSinh.html" class="category-item__link ">Ohui Thefirst
                                    Tái
                                    Sinh </a>
                            </li>
                            <li class="nav__item nav__item-1 ">
                                <a href="./OhuiDưỡngTrắng.html" class="category-item__link ">Ohui Dưỡng
                                    Trắng</a>
                            </li>
                            <li class="nav__item nav__item-1 ">
                                <a href="./OhuiPrimeAdvancer.html" class="category-item__link ">Ohui Prime
                                    Advancer</a>
                            </li>
                            <li class="nav__item nav__item-1 ">
                                <a href="./OhuiDưỡngẨm.html" class="category-item__link ">Ohui Dưỡng Ẩm</a>
                            </li>
                            <li class="nav__item nav__item-1 ">
                                <a href="./OhuiChốngLãoHóa.html" class="category-item__link ">Ohui Chống Lão
                                    Hóa</a>
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
                            <input style="width:26px;display: flex;justify-content: center;" class="header__cart-notice"
                                id="header__cart-notice" value="{{ Session::get('Cart')->totalQuantity }}"></input>
                        @else

                            <input style="width:26px;display: flex;justify-content: center;" class="header__cart-notice"
                                id="header__cart-notice" value="0"></input>
                        @endif
                        <!-- No cart: header__cart-list--no-cart -->
                        <div id="header__cart-list" class="header__cart-list ">
                            @if (Session::get('Cart') == null)
                                <div id="no_cart">
                                    <img style="display: initial" src="{{ asset('client') }}/assets/img/no-cart.png"
                                        alt="No-cart " class="header__cart-no-cart-img ">
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
                                            <li ng-repeat="i in cart1" class="header__cart-list-item header__cart-item">

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
                                                                    type="number " value="{{ $item['quantity'] }}">
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="header__cart-item-body ">
                                                        <span class="header__cart-item-description ">Mỹ phẩm:
                                                            {{ $item['productInfo']->category->find($item['productInfo']->category->parent_id)->name }}</span>
                                                        <a onclick="delItem({{ $item['productInfo']->id }})"
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
                                                class="header__cart-view-cart btn btn--primary ">Xem giỏ
                                                hàng</a>
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
<div>
    @if (!Session::get('Cart'))

        <div id="no-cart-detail" class="container no-cart">
            <div class="cart-empty-page__content">
                <div class="cart-empty-page__content-image">
                    <img src="{{ asset('client') }}/assets/img/no-cart.png" alt="">
                </div>
                <p class="cart-empty-page__content-text">Giỏ hàng của bạn còn trống.</p>
                <a href="{{ route('all') }}" class="btn btn--primary btn--l">Mua ngay</a>
            </div>
        </div>
    @endif
    @if (Session::has('Cart'))

        <div id="cart-detail">
            <div class="container deltai-Cart">
                <div class="cart-page-product-header">
                    <div class="cart-page-product-header__product">Sản phẩm</div>
                    <div class="cart-page-product-header__unit-price">Đơn giá</div>
                    <div class="cart-page-product-header__quantity">Số lượng</div>
                    <div class="cart-page-product-header__total-price">Số tiền</div>
                    <div class="cart-page-product-header__action">Thao tác</div>
                </div>
                <div class="cart-page-shop-section">
                    @foreach (Session::get('Cart')->products as $item)
                        <div class="cart-page-shop-section__items">
                            <div class="cart-item js-product-cart">
                                <div class="cart-item__content">
                                    <div class="cart-item__cell-overview">
                                        <a class="cart-item-overview__thumbnail-wrapper" href="">
                                            <img class="cart-item-overview__thumbnail"
                                                src="{{ asset('upload/image/product') . '/' . $item['productInfo']->image }}" alt="">
                        </a>
                    </div>
                    <div class=" cart-item__flex">
                                            <div class="cart-item-overview__product-name-wrapper">
                                                <a href="{{ route('detail', ['slug' => $item['productInfo']->slug]) }}" class="cart-item-overview__name">
                                                    {{ $item['productInfo']->name }}</a>
                                            </div>
                                            <div class="cart-item-overview__price">
                                                <div class="cart-item__cell-unit-price">
                                                    <span
                                                        class="cart-item__unit-price cart-item__unit-price--after js-cart-item-unit-price">{{ number_format($item['productInfo']->price) }}đ</span>
                                                    </span>
                                                </div>
                                                <div class="cart-item__cell-quantity">
                                                    <div class="_19lAw4 tickid-input-quantity js-plus-minus">
                                                        <button id=""
                                                            onclick="DeleteItemCart( {{ $item['productInfo']->id }} )"
                                                            class="bt btn-quantity _1zT8xu js-plus btn-reduction delteItem">
                                                            <i class="tickid-svg-icon fas fa-minus"></i>
                                                        </button>
                                                        <input id="quantityValue"
                                                            class="_1zT8xu _18Y8Ul js-current js-input-update-cart quantityValue-{{ $item['productInfo']->id }}"
                                                            type="number" value="{{ $item['quantity'] }}" name=""
                                                            min="1" max="{{ $item['productInfo']->amount }}" data-id="{{ $item['productInfo']->id }}">
                                                        <button id=""
                                                            onclick="AddCart( {{ $item['productInfo']->id }} )"
                                                            class="bt btn-quantity _1zT8xu js-plus btn-add addItem">
                                                            <i class="tickid-svg-icon icon-plus-sign fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="cart-item__cell-total-price js-cart-item-total-price">
                                                    {{ number_format($item['price']) }}đ
                                                </div>
                                            </div>
                                    </div>
                                    <div class="cart-item__cell-actions">
                                        <button style="outline: none"
                                            onclick="delItem({{ $item['productInfo']->id }})"
                                            class="cart-item__action js-remove-cart">Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
            <div class="container ">
                <div class="checkout">
                    <div class="cart-info">
                        <div class="cart-title">Tổng tiền:</div>
                        <div class="cart-value">{{ number_format(Session::get('Cart')->totalPrice) }}đ
                        </div>
                    </div>
                    <button class=" btn btn--primary btn-checkout">Thanh toán</button>
                </div>
            </div>
            <input type="text" name="" hidden="true" id="total-quantity"
                value="{{ Session::get('Cart')->totalQuantity }}">
        </div>
    @endif
</div>
<script>
    $(document).ready(function() {
        $('#showpass').click(function(){
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
                this.style.color = '#999'
            } else {
                x.type = "password";
                this.style.color = '#333'
            }
        })
        $('#showrepass').click(function(){
            var x = document.getElementById("repass");
            if (x.type === "password") {
                x.type = "text";
                this.style.color = '#999'
            } else {
                x.type = "password";
                this.style.color = '#333'
            }
        })
        $('#repass').blur(function(){
            if(this.value != $('#pass').val())
            {
                $('#repass_error').css('display', 'block')
            }
            else{
                $('#repass_error').css('display', 'none')
            }
        })
        $('.btn-checkout').click(function() {
            var auth = '<?= Auth::guard('customer')->user()?>'
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
        }) 
        $("input[name=email]").blur(function() {
            var data = '<?php echo json_encode($users) ?>';
            let email = $("input[name=email]").val();
            var users = JSON.parse(data);
            var arr = [];
            $.each(users, function(i, val){
                arr.push(val)
            })
            var file = arr.find(function(obj) {
                return obj == email;
            });
            if(file)
            {
                $('#email_error').css('display', 'none');
            }
            else{
                $('#email_error').css('display', 'block');
            }
        })
        $("input[name=re_email]").blur(function() {
            var data = '<?php echo json_encode($users) ?>';
            let email = $("input[name=re_email]").val();
            var users = JSON.parse(data);
            var arr = [];
            $.each(users, function(i, val){
                arr.push(val)
            })
            var file = arr.find(function(obj) {
                return obj == email;
            });
            if(file)
            {
                $('#remail_error').css('display', 'block');
            }
            else{
                $('#remail_error').css('display', 'none');
            }
        })
        $('.login_form').submit(function(event) {
            event.preventDefault();
            
            let email = $("input[name=email]").val();
            let password = $("input[name=password]").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'login',
                type: "POST",
                data:{                        
                    email:email,
                    password:password,
                    _token: _token
                },
            }).done(function(response) {
                if(response)
                {
                    location.reload();
                }
                else {
                    $('#pass_error').css('display', 'block');
                }
            })
        })
        $('.register_form').submit(function(event) {
            event.preventDefault();
            
            let email = $("input[name=re_email]").val();
            let password = $("input[name=re_password]").val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'register',
                type: "POST",
                data:{                        
                    email:email,
                    password:password,
                    _token: _token
                },
            }).done(function(response) {
                if(response)
                {
                    $.ajax({
                        url: 'login',
                        type: "POST",
                        data:{                        
                            email:email,
                            password:password,
                            _token: _token
                        },
                    }).done(function(response) {
                        if(response)
                            {
                                location.reload();
                            }
                    })
                }
                console.log(response);
                
            })
            
        })
        $('.logout').click(function(event) {
            event.preventDefault();
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'logout',
                type: "POST",
                data:{
                    _token: _token
                },
            }).done(function(response) {
                location.reload();
            })
        })

    })

</script>
<script>
    $('.js-current').on('blur', function(event) {
        
        var id = $(this).data("id")
        var quantity = $(this).val()
        var boolean = false
        if (Number($(event.target).val()) > Number($(event.target).attr('max'))) {
            $(event.target).val(function(i, val) {
                boolean = true
                return val = Number($(event.target).attr('max'))
            })
        } else if (Number($(event.target).val()) < Number($(event.target).attr('min'))) {
            $(event.target).val(function(i, val) {
                boolean = true
                return val = Number($(event.target).attr('min'))
            })
        }
        if (boolean) {
            quantity = $(this).val()
        }
        $.ajax({
            url: 'updatecart/' + id + '/' + quantity,
            type: "GET",
        }).done(function(response) {
            renderCart(response)
           
        })
    })

    function AddCart(id) {

        var a = document.querySelector('.quantityValue-' + id)

        $(a).val(function(i, value) {
            if (Number(value) < Number($(this).attr('max'))) {
                    $.ajax({
                        url: 'addcartlist/' + id,
                        type: "GET",
                    }).done(function(response) {
                        renderCart(response)
                    })
                    
                } else {
                    
                    alert('Số lượng sản phẩm đã tối đa.')
                    return value;
                }
        })

    }

    function DeleteItemCart(id) {
        
        var a = document.querySelector('.quantityValue-' + id)
        $(a).val(function(i, value) {
            if (value <= $(this).attr('min')) {
                return value
            } else {
                $.ajax({
                    url: 'deletecartlist/' + id,
                    type: "GET",
                }).done(function(response) {
                    renderCart(response)
                })
                
            }
        })

    }

    function delItem(id) {
        $.ajax({
            url: 'deleteItemCartList/' + id,
            type: "GET",
        }).done(function(response) {
            renderCart(response)
        })
       
    }

    function renderCart(response) {
        $('#list_cart').empty()
        $('#list_cart').html(response)

        if ($('#total-quantity').val() != undefined)
            $('#header__cart-notice').val($('#total-quantity').val())
        else
            $('#header__cart-notice').val(0)

    }

</script>

