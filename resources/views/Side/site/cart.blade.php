@if (Session::get('Cart') == null)
    <div id="no_cart">
        <img style="display: initial" src="{{ asset('client') }}/assets/img/no-cart.png" alt="No-cart "
            class="header__cart-no-cart-img ">
        <span style="display: block" class="header__cart-list-no-cart-msg ">
            Chưa có sản phẩm
        </span>
    </div>
@endif
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
                                <input id="quantity-{{$item['productInfo']->id}}" disabled class="cart-quantity-input "  type="number "
                                    value="{{ $item['quantity'] }}">
                               
                            </span>
                        </div>
                    </div>
                    <div class="header__cart-item-body ">
                        <span class="header__cart-item-description ">Mỹ phẩm:
                            {{ $item['productInfo']->category->find($item['productInfo']->category->parent_id)->name }}</span>
                        <a onclick="deleteCart({{ $item['productInfo']->id }})" href="javascript:"><span
                                class="header__cart-item-description">Xóa</span></a>
                    </div>
                </div>

            </li>
        @endforeach
    </ul>

    <div class="cart-check">
        <div class="cart-check-info">
            <div class="cart-check-title">Tổng tiền:</div>
            <div class="cart-check-value">{{ number_format(Session::get('Cart')->totalPrice) }}đ</div>
        </div>
        <div>
            <a href="{{ route('cart') }}" class="header__cart-view-cart btn btn--primary ">Xem giỏ hàng</a>
        </div>
        <input type="text" name="" hidden="true" id="total-quantity"
            value="{{ Session::get('Cart')->totalQuantity }}">
    </div>

@endif


