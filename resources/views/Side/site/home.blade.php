@extends('layout.frontend.master')

@section('title', 'Mỹ phẩm Ohui-LG Vina')



@section('content')
    @if (Session::has('error-checkout'))
        <div id="openmodal" class="modal" tabindex="-1" style="display: block; padding-right: 16px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Thống báo:</h3>

                    </div>
                    <div class="modal-body">
                        <h4>{{ Session::get('error-checkout') }}</h4>
                    </div>
                    <div class="modal-footer">
                        <button style="color: #fff; background-color: var(--primary-color)" type="button" style="color"
                            class="btn btn-primary" onclick="closemodal()">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var opmd = document.querySelector('#openmodal')

            function closemodal() {
                opmd.style.display = "none";
            }

        </script>
    @endif
    <div>
        <div class="container">
            <div class="wrapper row ">
                @include('partial.menu')
                <div class="main_content" style="display: flex">
                    <div id="demo" style="flex: 1; margin: 0" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://img.abaha.vn/photos/resized/850x500/83-1589963137-myphamohui-lgvina.png "
                                    alt="Los Angeles" width="100%" height="400px">

                            </div>
                            <div class="carousel-item">
                                <img src="https://img.abaha.vn/photos/resized/850x500/83-1595846917-myphamohui-lgvina.png"
                                    alt="Chicago" width="100%" height="400px">
                                < </div>
                                    <div class="carousel-item">
                                        <img src="https://img.abaha.vn/photos/resized/850x500/83-1589892101-myphamohui-lgvina.png"
                                            alt="New York" width="100%" height="400px">

                                    </div>
                            </div>
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                        <div style="width: 275px;height: 100%; margin-left: 10px; display: flex;
                            flex-direction: column;">
                            <img style="width: 100%; height: calc(50% - 5px); margin-bottom: 10px"
                                src="https://img.abaha.vn/photos/resized/850x500/83-1595846917-myphamohui-lgvina.png">
                            <img style="width: 100%; height: calc(50% - 5px);"
                                src="https://img.abaha.vn/photos/resized/850x500/83-1618646521-myphamohui-lgvina.png">
                        </div>
                    </div>

                </div>



                <div class="spacing container">
                    <div class="offers row">
                        <div class="offer__head row">
                            <div class="offer-title">
                                Flash Sales
                            </div>
                        </div>
                        <div class="offer__body row">
                            <div class="offer__body-left col-lg-4 col-md-3 col-sm-6">
                                <div class="product-grid" style="height: 100%;">
                                    <div class="product-image">
                                        <a href="{{ route('detail', ['slug' => $flashsales[0]->slug]) }}">
                                            <img class="pic-1 pic-2"
                                                src="{{ asset('upload/image/product') . '/' . $flashsales[0]->image }}"
                                                alt="Lỗi" />

                                        </a>
                                        <span class="product-trend-label">20%</span>
                                        <ul class="social">
                                            <li><a href="" data-tip="Thêm giỏ hàng"><i class="fa fa-shopping-cart"></i></a>
                                            </li>

                                            <li><a href="{{ route('detail', ['slug' => $flashsales[0]->slug]) }}"
                                                    data-tip="Xem chi tiết"><i class="fa fa-search"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a
                                                href="{{ route('detail', ['slug' => $flashsales[0]->slug]) }}">{{ $flashsales[0]->name }}</a>
                                        </h3>
                                        <div class="info-price">
                                            <div class="stars">
                                                <input type="radio" id="five" name="rate" value="5">
                                                <label for="five"></label>
                                                <input type="radio" id="four" name="rate" value="4">
                                                <label for="four"></label>
                                                <input type="radio" id="three" name="rate" value="3">
                                                <label for="three"></label>
                                                <input type="radio" id="two" name="rate" value="2">
                                                <label for="two"></label>
                                                <input type="radio" id="one" name="rate" value="1">
                                                <label for="one"></label>
                                                <span class="result"></span>
                                            </div>
                                            <div class="price">
                                                <div class="price-new">{{ number_format($flashsales[0]->price) }}đ</div>

                                                <div class="price-old">{{ number_format(sale(20, $flashsales[0])) }}đ
                                                </div>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <div class="info-rest">
                                                <div class="info-rest-title">Còn lại:</div>
                                                <div class="info-rest-number">{{ $flashsales[0]->amount }}</div>
                                            </div>
                                            <div class="info-sold">
                                                <div class="info-sold-title">Đã bán:</div>
                                                <div class="info-sold-number">{{ $flashsales[0]->sold }}</div>
                                            </div>
                                        </div>
                                        <div class="time-sale">
                                            <div class="time-title"></div>
                                        </div>
                                        <div class="item-time">
                                            <p class="item-time-title">Thời gian còn lại:</p>
                                            <div class="countdown">
                                                <div class="countdown-item">
                                                    <div class="countdown-item-value">00</div>
                                                    <div class="countdown-item-title">Ngày</div>
                                                </div>
                                                <div class="countdown-item">
                                                    <div class="countdown-item-value">00</div>
                                                    <div class="countdown-item-title">Giờ</div>
                                                </div>
                                                <div class="countdown-item">
                                                    <div class="countdown-item-value">00</div>
                                                    <div class="countdown-item-title">Phút</div>
                                                </div>
                                                <div class="countdown-item">
                                                    <div class="countdown-item-value">00</div>
                                                    <div class="countdown-item-title">Giây</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div style="margin-left: 6px;" class="offer__body-right row col-lg-8 col-md-9 col-sm-6">
                                @for ($i = 1; $i < count($flashsales); $i++)
                                    <div style="padding-bottom: 0px;margin-bottom: 30px;" class="product-grid row">
                                        <div style="padding: 0;margin-right: 30px;" class="product-image col-lg-5">
                                            <a href="{{ route('detail', ['slug' => $flashsales[$i]->slug]) }}">
                                                <img class="pic-1 pic-3"
                                                    src="{{ asset('upload/image/product') . '/' . $flashsales[$i]->image }}">
                                            </a>
                                            <span class="product-trend-label">20%</span>
                                            <ul class="social">
                                                <li><a href="" data-tip="Thêm giỏ hàng"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                </li>

                                                <li><a href="{{ route('detail', ['slug' => $flashsales[$i]->slug]) }}"
                                                        data-tip="Xem chi tiết"><i class="fa fa-search"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title"><a
                                                    href="{{ route('detail', ['slug' => $flashsales[$i]->slug]) }}">{{ $flashsales[$i]->name }}</a>
                                            </h3>


                                            <div class="info-price">
                                                <div class="stars">
                                                    <input type="radio" id="five" name="rate" value="5">
                                                    <label for="five"></label>
                                                    <input type="radio" id="four" name="rate" value="4">
                                                    <label for="four"></label>
                                                    <input type="radio" id="three" name="rate" value="3">
                                                    <label for="three"></label>
                                                    <input type="radio" id="two" name="rate" value="2">
                                                    <label for="two"></label>
                                                    <input type="radio" id="one" name="rate" value="1">
                                                    <label for="one"></label>
                                                    <span class="result"></span>
                                                </div>
                                                <div class="price">
                                                    <div class="price-new">{{ number_format($flashsales[$i]->price) }}đ
                                                    </div>
                                                    <div class="price-old">
                                                        {{ number_format(sale(20, $flashsales[$i])) }}đ</div>
                                                </div>
                                            </div>
                                            <div class="info">
                                                <div class="info-rest">
                                                    <div class="info-rest-title">Còn lại:</div>
                                                    <div class="info-rest-number">{{ $flashsales[$i]->amount }}</div>
                                                </div>
                                                <div class="info-sold">
                                                    <div class="info-sold-title">Đã bán:</div>
                                                    <div class="info-sold-number">{{ $flashsales[$i]->sold }}</div>
                                                </div>
                                            </div>
                                            <div class="time-sale">
                                                <div class="time-title"></div>
                                            </div>
                                            <div class="item-time">
                                                <p class="item-time-title">Thời gian còn lại:</p>
                                                <div class="countdown">
                                                    <div class="countdown-item">
                                                        <div class="countdown-item-value">00</div>
                                                        <div class="countdown-item-title">Ngày</div>
                                                    </div>
                                                    <div class="countdown-item">
                                                        <div class="countdown-item-value">00</div>
                                                        <div class="countdown-item-title">Giờ</div>
                                                    </div>
                                                    <div class="countdown-item">
                                                        <div class="countdown-item-value">00</div>
                                                        <div class="countdown-item-title">Phút</div>
                                                    </div>
                                                    <div class="countdown-item">
                                                        <div class="countdown-item-value">00</div>
                                                        <div class="countdown-item-title">Giây</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                            </div>

                        </div>
                    </div>
                </div>



            </div>
            <div class="container">
                <div class="row">
                    <div style="background-color: #fff;" class="col-md-12">
                        <h2 class="title-product-selling">Sản phẩm bán chạy</h2>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                            <!-- Carousel indicators -->
                            <ol class="carousel-indicators">
                                <li style="background-color: #333;width: 8px;height: 8px;" data-target="#myCarousel"
                                    data-slide-to="0" class="active"></li>
                                <li style="background-color: #333; width: 8px;height: 8px;" data-target="#myCarousel"
                                    data-slide-to="1">
                                </li>

                            </ol>
                            <!-- Wrapper for carousel items -->
                            <div class="carousel-inner row">
                                <div class="carousel-item active ">
                                    <div class="row">
                                        @for ($i = 0; $i < count($sallalot) / 2; $i++)
                                            <div class="col-sm-3">
                                                <a href="{{ route('detail', ['slug' => $sallalot[$i]->slug]) }}"
                                                    class="thumb-wrapper">
                                                    <div class="img-box">
                                                        <img src="{{ asset('upload/image/product') . '/' . $sallalot[$i]->image }}"
                                                            class="img-fluid" alt="lỗi" />

                                                    </div>
                                                    <div class="thumb-content">
                                                        <p class="procduct-name-selling">{{ $sallalot[$i]->name }}</p>
                                                        <p class="item-price">
                                                            <strike>{{ number_format(sale(20, $sallalot[$i])) }}đ</strike>
                                                            <span>{{ number_format($sallalot[$i]->price) }}đ</span>
                                                        </p>


                                                    </div>
                                                </a>
                                            </div>
                                        @endfor

                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        @for ($i = count($sallalot) / 2; $i < count($sallalot); $i++)
                                            <div class="col-sm-3">
                                                <a href="{{ route('detail', ['slug' => $sallalot[$i]->slug]) }}"
                                                    class="thumb-wrapper">
                                                    <div class="img-box">
                                                        <img src="{{ asset('upload/image/product') . '/' . $sallalot[$i]->image }}"
                                                            class="img-fluid" alt="lỗi" />

                                                    </div>
                                                    <div class="thumb-content">
                                                        <p class="procduct-name-selling">{{ $sallalot[$i]->name }}</p>
                                                        <p class="item-price">
                                                            <strike>{{ number_format(sale(20, $sallalot[$i])) }}đ</strike>
                                                            <span>{{ number_format($sallalot[$i]->price) }}đ</span>
                                                        </p>


                                                    </div>
                                                </a>
                                            </div>
                                        @endfor
                                    </div>
                                </div>

                            </div>
                            <!-- Carousel controls -->
                            <a style="margin: 0;top: 50%;transform: translateY(-50%); color: #a3a3a3;display: none"
                                class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a tyle="margin: 0;top: 50%;transform: translateY(-50%); color: #a3a3a3;"
                                class="carousel-control-next" href="#myCarousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($menus as $menu)
                <div class="container">
                    <div class="spacing container">
                        <div class="offers row">
                            <div class="offer__head row">
                                <div class="offer-title">
                                    {{ $menu->name }}
                                </div>
                            </div>
                            <div class="offer__body row">

                                <div class="offer__body-left col-lg-4 col-md-3 col-sm-6">
                                    <div class="product-grid" style="height: 100%;">
                                        <div class="product-image">
                                            <a
                                                href="{{ route('detail', ['slug' => $menu->productByparent($menu->id)[0]->slug]) }}">
                                                <img class="pic-1 pic-2"
                                                    src="{{ asset('upload/image/product') . '/' . $menu->productByparent($menu->id)[0]->image }}" />
                                            </a>
                                            <span class="product-trend-label">20%</span>
                                            <ul class="social">
                                                <li><a href="" data-tip="Thêm giỏ hàng"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                </li>

                                                <li><a href="{{ route('detail', ['slug' => $menu->productByparent($menu->id)[0]->slug]) }}"
                                                        data-tip="Xem chi tiết"><i class="fa fa-search"></i></a></li>
                                            </ul>
                                        </div>
                                        <div style="box-shadow: 0 0.0625rem 0.125rem 0 rgba(0,0,0,.1);"
                                            class="product-content">
                                            <h3 style="padding-left: 4px;width: 100%" class="title">
                                                <a style="font-size: 14px; font-weight: 300;padding: 2px;"
                                                    href="{{ route('detail', ['slug' => $menu->productByparent($menu->id)[0]->slug]) }}">{{ $menu->productByparent($menu->id)[0]->name }}</a>
                                            </h3>
                                            <div class="info-price">

                                                <div style="padding-left: 10px;margin-top: 16px;" class="price">
                                                    <div style="font-size: 14px;color: orangered;font-weight: 300;"
                                                        class="price-new">
                                                        {{ number_format($menu->productByparent($menu->id)[0]->price) }}đ
                                                    </div>
                                                    <div class="price-old">
                                                        {{ number_format(sale(20, $menu->productByparent($menu->id)[0])) }}đ
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="position: relative;bottom: -14px;font-size: 14px;"
                                                class="bottom-info">
                                                <div style="padding-left: 10px;" class="info">
                                                    <div class="left-hert">
                                                        <i class="far fa-heart"></i>
                                                        <p> {{ $menu->name }}</p>
                                                    </div>
                                                    <div class="right-star">
                                                        <div style="height: 20px;" class="stars">
                                                            <input type="radio" id="five" name="rate" value="5">
                                                            <label for="five"></label>
                                                            <input type="radio" id="four" name="rate" value="4">
                                                            <label for="four"></label>
                                                            <input type="radio" id="three" name="rate" value="3">
                                                            <label for="three"></label>
                                                            <input type="radio" id="two" name="rate" value="2">
                                                            <label for="two"></label>
                                                            <input type="radio" id="one" name="rate" value="1">
                                                            <label for="one"></label>
                                                            <span class="result"></span>
                                                        </div>
                                                        <p>Hàn Quốc</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div style="margin-left: 3px;padding: 0;" class="offer__body-right row col-lg-8">
                                    @for ($i = 1; $i < count($menu->productByparent($menu->id)); $i++)
                                        <div style="padding-bottom: 0px;margin-bottom: 30px; border-bottom: 1px solid #f5f5f5;display: block;padding-left: 0;padding-right:0"
                                            ; class="product-grid product-grid-ohui col-lg-3 ">
                                            <div style="padding: 0;" class="product-image">
                                                <a
                                                    href="{{ route('detail', ['slug' => $menu->productByparent($menu->id)[$i]->slug]) }}">

                                                    <img style="width: 188px;height: 188px;" class="pic-1 pic-3"
                                                        src="{{ asset('upload/image/product') . '/' . $menu->productByparent($menu->id)[$i]->image }}" />
                                                </a>
                                                <span class="product-trend-label">20%</span>
                                                <ul class="social">
                                                    <li><a href="" data-tip="Thêm giỏ hàng"><i
                                                                class="fa fa-shopping-cart"></i></a>
                                                    </li>

                                                    <li><a href="{{ route('detail', ['slug' => $menu->productByparent($menu->id)[$i]->slug]) }}"
                                                            data-tip="Xem chi tiết"><i class="fa fa-search"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div style="box-shadow: 0 0.0625rem 0.125rem 0 rgba(0,0,0,.1);"
                                                class="product-content">
                                                <h3 style="padding-left: 4px;width: 100%" class="title">
                                                    <a class="procduct-name-bdm"
                                                        style="font-size: 14px; font-weight: 300;padding: 2px;"
                                                        href="{{ route('detail', ['slug' => $menu->productByparent($menu->id)[$i]->slug]) }}">{{ $menu->productByparent($menu->id)[$i]->name }}</a>
                                                </h3>
                                                <div class="info-price">

                                                    <div style="padding-left: 10px;margin-top: 16px;" class="price">
                                                        <div style="font-size: 14px;color: orangered;font-weight: 300;"
                                                            class="price-new">
                                                            {{ number_format($menu->productByparent($menu->id)[$i]->price) }}đ
                                                        </div>
                                                        <div class="price-old">
                                                            {{ number_format(sale(20, $menu->productByparent($menu->id)[$i])) }}đ
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="position: relative;bottom: -14px;font-size: 14px;"
                                                    class="bottom-info">
                                                    <div style="padding-left: 10px;" class="info">
                                                        <div class="left-hert">
                                                            <i class="far fa-heart"></i>
                                                            <p>{{ $menu->name }}</p>
                                                        </div>
                                                        <div class="right-star">
                                                            <div style="height: 20px;" class="stars">
                                                                <input type="radio" id="five" name="rate" value="5">
                                                                <label for="five"></label>
                                                                <input type="radio" id="four" name="rate" value="4">
                                                                <label for="four"></label>
                                                                <input type="radio" id="three" name="rate" value="3">
                                                                <label for="three"></label>
                                                                <input type="radio" id="two" name="rate" value="2">
                                                                <label for="two"></label>
                                                                <input type="radio" id="one" name="rate" value="1">
                                                                <label for="one"></label>
                                                                <span class="result"></span>
                                                            </div>
                                                            <p>Hàn Quốc</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endfor
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
<?php function sale($percent, $flashsales)
{
$str_sale = explode(',', $flashsales->price);
$sale = '';
foreach ($str_sale as $s) {
$sale = $sale . $s;
}
return $sale = floatval($sale) / ((100 - $percent) / 100);
}

?>
