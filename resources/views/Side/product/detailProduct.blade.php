@extends('layout.frontend.master')
@section('title', $product->name)


@section('style')
    <link href="{{ asset('client') }}/assets/css/sp/sp.css" rel="stylesheet" />
    <link href="{{ asset('client') }}/assets/css/sp/spresponsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <style>
        h2, h3 {
            padding: 24px 0 !important;
            font-size: 12px;
            font-weight: 500;
            text-align: left;
            text-transform: uppercase;
            height: 10px;
            padding: 10px;
            margin: 0;

        }

        h2::after {
            content: "";
            width: 0px;
            position: absolute;
            margin: 0 auto;
            height: 4px;
            background: #fff;
            left: 0;
            right: 0;
            bottom: 8px;
        }
        
        
        .img-1 {
            margin-left: 0;
            margin-top: 18px;
            position: relative;
            width: 20%;
            border: 2px solid #ed145b;
        }
        
        .btn-add {
            outline: none !important;
        }
        
        .btn-mua {
            outline: none !important;
        }
        
        .demo {
            background: linear-gradient(to right, #fcc, #d3d3d3)
        }
        
        .post-slide2 {
            margin: 0 15px;
            box-shadow: 0 1px 2px rgba(43, 59, 93, .3);
            margin-bottom: 2em
        }
        
        .post-slide2 .post-img {
            overflow: hidden
        }
        
        .post-slide2 .post-img img {
            width: 100%;
            height: auto;
            transform: scale(1);
            transition: all 1s ease-in-out 0s
        }
        
        .post-slide2:hover .post-img img {
            transform: scale(1.08)
        }
        
        .post-slide2 .post-content {
            background: #fff;
            padding: 20px
        }
        
        .post-slide2 .post-title {
            font-size: 17px;
            font-weight: 600;
            margin-top: 0;
            text-transform: capitalize
        }
        
        .post-slide2 .post-title a {
            display: inline-block;
            color: grey;
            transition: all .3s ease 0s
        }
        
        .post-slide2 .post-title a:hover {
            color: #3d3030;
            text-decoration: none
        }
        
        .post-slide2 .post-description {
            font-size: 15px;
            color: #676767;
            line-height: 24px;
            margin-bottom: 14px
        }
        
        .post-slide2 .post-bar {
            padding: 0;
            margin-bottom: 15px;
            list-style: none
        }
        
        .post-slide2 .post-bar li {
            color: #676767;
            padding: 2px 0
        }
        
        .post-slide2 .post-bar li i {
            margin-right: 5px
        }
        
        .post-slide2 .post-bar li a {
            display: inline-block;
            font-size: 12px;
            color: grey;
            transition: all .3s ease 0s
        }
        
        .post-slide2 .post-bar li a:after {
            content: ","
        }
        
        .post-slide2 .post-bar li a:last-child:after {
            content: ""
        }
        
        .post-slide2 .post-bar li a:hover {
            color: #3d3030;
            text-decoration: none
        }
        
        .post-slide2 .read-more {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            background: #e7989a;
            border-bottom-right-radius: 10px;
            text-transform: capitalize;
            transition: all .3s linear
        }
        
        .post-slide2 .read-more:hover {
            background: #333;
            text-decoration: none
        }
        
        .owl-item {
            width: 126px !important;
            margin: 0 20px;
        }
        
        .item-price {
            display: flex;
            justify-content: center;
            font-size: 13px;
            padding: 2px 0;
        }
        
        .item-price strike {
            color: #999;
            margin-right: 5px;
            margin-left: 5px;
            text-decoration-line: line-through;
        }
        
        .item-price span {
            color: orangered;
            font-size: 110%;
        }

    </style>

@stop

@section('content')
    <div>
        <div class="main" style="background-color: #f5f5f5; overflow: hidden;" data-id="{{$product->id}}">
            <!-- Product -->
            <div class="grid wide main__product" style="display: flex;background-color: #fff;">
                <div class="main__product-ft">

                    <div class="main__product-img">

                        <img class="main__product-img"
                            src="{{ asset('upload/image/product') . '/' . $product->image }}" />
                    </div>
                    <div class="main__product-img-sp" class="_3ZDC1p">
                        <div>
                            <img class="img-1" src="{{ asset('upload/image/product') . '/' . $product->image }}" />
                        </div>
                    </div>
                    <div style="display: flex;">
                        <div style="margin-top: 6px;" class="home__product-share">
                            <label style="font-size: 1.6rem;" for="">Chia sẻ:</label>
                            <i style="font-size: 1.6rem;color:
                                        #3b5999; cursor: pointer;" class="header__navbar-icon fab fa-facebook"></i>
                        </div>
                        <span style="cursor: pointer;
                                    font-size: 1.6rem;
                                    flex: 1;
                                    margin-left: 50px;
                                    top: 4px;
                                    position: relative;" class="home-product-item__like home-product-item__like--liked">
                            <input type="checkbox" hidden name="" id="home-product-item__like--liked">
                            <i class="home-product-item__like-icon-empty-1 far fa-heart "></i>
                            <i class="home-product-item__like-icon-fill-1 fas fa-heart "></i>
                            <label style="color: #333;margin-left: 6px;font-size: 1.6rem;cursor: pointer;"
                                for="home-product-item__like--liked">Yêu thích</label>
                        </span>
                    </div>
                </div>
                <div style="margin-left: 18px;" class="main__product-info">
                    <div class="main__product-info-header">
                        <div class="home-product-item__favourite-1 ">
                            <i class="fas fa-check home-product-item__favourite-like"></i>
                            <span>Yêu thích</span>
                        </div>
                        <p style="position: relative;
                                            margin-left: 10px;" class="main__product-name">
                            {{ $product->name }}
                        </p>
                    </div>
                    <h1 class="home-product-item__point">4</h1>
                    <div style="margin-bottom: 26px;" class="home-product-item__rating-1 ">
                        <i class="home-product-item__star-gold fas fa-star "></i>
                        <i class="home-product-item__star-gold fas fa-star "></i>
                        <i class="home-product-item__star-gold fas fa-star "></i>
                        <i class="home-product-item__star-gold fas fa-star "></i>
                        <i class="fas fa-star "></i>
                    </div>
                    <div class="home-product-item__price1">
                        <span class="home-product-item__price-old">{{ number_format(sale(20, $product->price)) }}đ
                        </span>
                        <span style="color: #ee4d2d;font-size: 1.8rem;"
                            class="home-product-item__price-current">{{ number_format($product->price) }}đ</span>
                        <div style="height: 17px;
                                            width: 80px;
                                            position: relative;
                                            top: -8px;
                                            margin-left: 12px;" class="home-product-item__favourite-1">
                            <span>20% Giảm</span>
                        </div>
                    </div>
                    <div class="home__product-info">
                        <div class="home__product-info-label" for="">Thông tin:</div>
                        <h3 class="home__product-info-text ">

                            <div class="">
                                {!! $product->desc !!}
                            </div>


                        </h3>
                        <a href="#info" class="home__product-info-vv">
                            <p>Xem thêm</p>
                        </a>
                    </div>

                    <div ng-controller="StoreController" class="_2O0llP">
                        <button class="btn-add" type="button" aria-disabled="false">
                            <a onclick="AddCart({{ $product->id }})" href="javascript:">
                                <i style="color: #ed145b;font-size: 1.6rem;"
                                    class="header__cart-icon fas fa-cart-plus "></i>
                                <span style="font-size:1.6rem;color: #ed145b;">Thêm vào
                                    giỏ hàng</span>
                            </a>
                        </button>
                        <button class="btn-mua" type="button" aria-disabled="false">
                            <a onclick="AddCartAndBuy({{ $product->id }})" style="font-size:1.6rem;color: #fff;">Mua
                                ngay</a>
                        </button>
                    </div>
                </div>

            </div>
            <div class="grid wide info-content">
                <div class="infor-content-header">
                    <div class="row infor-content-header-title">
                        <p class="infor-content-header-title-text">Chi tiết sản phẩm</p>
                    </div>
                    <div class="infor-content-header-infor">
                        <div class="infor-content-header-infor-item">
                            <div class="infor-content-header-infor-item-left">Danh Mục</div>
                            <div class="infor-content-header-infor-item-right">{{ $product->category->name }} </div>
                        </div>
                        <div class="infor-content-header-infor-item">
                            <div class="infor-content-header-infor-item-left">Xuất xứ</div>
                            <div class="infor-content-header-infor-item-right">Hàn Quốc</div>
                        </div>
                        <div class="infor-content-header-infor-item">
                            <div class="infor-content-header-infor-item-left">Thương hiêu</div>
                            <div class="infor-content-header-infor-item-right">
                                {{ $product->category->find($product->category->parent_id)->name }}</div>
                        </div>
                    </div>
                    <div class="row infor-content-header-title">
                        <p class="infor-content-header-title-text">MÔ TẢ SẢN PHẨM</p>
                    </div>
                    <div class="info__product-header">
                        <div class="info__product-header-info">
                            <div class="info__product-header-info-item">
                                <div class="info__product-header-info-img">
                                    <img class="img-infor"
                                        src="{{ asset('upload/image/product') . '/' . $product->image }}" alt="lỗi">
                                </div>
                                <h4 id="info" class="infor-product-describe">
                                    {!! $product->desc !!}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="renderProduct">

        </div>
    </div>
@stop

<?php function sale($percent, $price)
{
return $sale = floatval($price) / ((100 - $percent) / 100);
} ?>

@section('script')
    <script>
        var i =0;
        function AddCart(id) {
            var product = "<?php echo $product->amount; ?>";
            console.log(Number(product));
            i+=1
            console.log(i)

            var cartId = '<?php echo json_encode(Session::get("Cart")); ?>'

            var data = Number($('#quantity-' + id).val())

            if (Number(product) > 0) {
                
                if ((isNaN(data) || data < Number(product))&& i <= Number(product)) {
                        $.ajax({
                            url: 'addcart/' + id,
                            type: "GET",
                        }).done(function(response) {
                            renderCart(response)
                        })
                    
                }
                else{
                    alert("Sản phẩm đã hết hàng, Vui lòng chọn sản phẩm khác hoặc quay lại sau.")
                    
                    
                }
            }
            else {
                alert("Sản phẩm đã hết hàng, Vui lòng chọn sản phẩm khác hoặc quay lại sau.")
                return false;
            }


        }

        function AddCartAndBuy(id) {
            var product = "<?php echo $product->amount; ?>";
            console.log(Number(product));

            var cartId = '<?php echo json_encode(
            Session::get('
                Cart '),
            ); ?>
            '

            var data = Number($('#quantity-' + id).val())


            if (Number(product) != 0) {
                console.log(Number(product));
                if (isNaN(data) || data < Number(product)) {
                    $.ajax({
                        url: 'addcart/' + id,
                        type: "GET",
                    }).done(function(response) {
                        renderCart(response)
                        location.href = "cart"
                    })
                }
                else {
                    alert("Sản phẩm đã hết hàng, Vui lòng chọn sản phẩm khác")
                }
            }
            else {
                alert("Sản phẩm đã hết hàng, Vui lòng chọn sản phẩm khác")
            }


        }

        function deleteCart(id) {
            $.ajax({
                url: 'deletecart/' + id,
                type: "GET",
            }).done(function(response) {
                renderCart(response)
            })

        }

        function renderCart(response) {
            $('#header__cart-list').empty()
            $('#header__cart-list').html(response)

            if ($('#total-quantity').val() != undefined)
                $('#header__cart-notice').val($('#total-quantity').val())
            else
                $('#header__cart-notice').val(0)
        }

    </script>
    <script>
       
        var idProduct = $('.main').attr('data-id');
        let products = localStorage.getItem('products');

        if(products == null)
        {
            arrayProduct = new Array();
            arrayProduct.push(idProduct)
            localStorage.setItem('products', JSON.stringify(arrayProduct))
        }
        else{
            products = $.parseJSON(products)
            if(products.indexOf(idProduct) == -1){
                products.push(idProduct);
                localStorage.setItem('products', JSON.stringify(products))
            }
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route('product.render') }}',
            method: "POST",
            data: {id: products},
            success: function(response)
            {
                console.log(response)
               $('.renderProduct').html(response)
            }
        })
        
        
    
    </script>
    
@stop
