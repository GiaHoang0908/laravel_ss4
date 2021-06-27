@extends('layout.frontend.master')

@section('title', 'Mỹ phẩm Ohui-LG Vina')

@section('style')
    <style>
        .product-grid:hover .product-image:before {
            opacity: 0;
        }

        .product-image .product-trend-label,
        .product-image .product-discount-label {
            content: "";
            color: #fff;
            background-color: #ff9600;
            border-radius: 50%;
            font-size: 12px;
            line-height: 28px;
            font-weight: 700;
            text-align: center;
            text-transform: uppercase;
            padding: 0 7px;
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 3;
            width: 40px;
            height: 40px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-trend-cart {
            padding: 0 7px;
            position: absolute;
            top: -14px;
            right: -21px;
            z-index: 3;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer
        }

        .info-price {
            position: relative;
            top: 24px;
            margin: 30px 0px;
        }

        .product-grid .product-image img {
            width: 100%;
            height: 280px;
        }

        .img-cart {
            width: 34px !important;
            height: 34px !important;
        }

        .pagination {
            display: flex !important;
            text-align: center;
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }

        .pagination>li {
            display: inline;
        }

        .pagination>li>a,
        .pagination>li>span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: 12px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .pagination>li:first-child>a,
        .pagination>li:first-child>span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .pagination>li:last-child>a,
        .pagination>li:last-child>span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        .pagination>li>a:hover,
        .pagination>li>span:hover,
        .pagination>li>a:focus,
        .pagination>li>span:focus {
            z-index: 2;
            color: #23527c;
            background-color: #eee;
            border-color: #ddd;
        }

        .pagination>.active>a,
        .pagination>.active>span,
        .pagination>.active>a:hover,
        .pagination>.active>span:hover,
        .pagination>.active>a:focus,
        .pagination>.active>span:focus {
            z-index: 3;
            color: #fff;
            cursor: default;

            border-color: #fff;
        }

        .pagination>.disabled>span,
        .pagination>.disabled>span:hover,
        .pagination>.disabled>span:focus,
        .pagination>.disabled>a,
        .pagination>.disabled>a:hover,
        .pagination>.disabled>a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }

        .pagination-lg>li>a,
        .pagination-lg>li>span {
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
        }

        .pagination-lg>li:first-child>a,
        .pagination-lg>li:first-child>span {
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
        }

        .pagination-lg>li:last-child>a,
        .pagination-lg>li:last-child>span {
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        .pagination-sm>li>a,
        .pagination-sm>li>span {
            padding: 5px 10px;
            font-size: 12px;
            line-height: 1.5;
        }

        .pagination-sm>li:first-child>a,
        .pagination-sm>li:first-child>span {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
        }

        .pagination-sm>li:last-child>a,
        .pagination-sm>li:last-child>span {
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }

        .pager {
            padding-left: 0;
            margin: 20px 0;
            text-align: center;
            list-style: none;
        }

        .pager li {
            display: inline;
        }

        .pager li>a,
        .pager li>span {
            display: inline-block;
            padding: 5px 14px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 15px;
        }

        .pager li>a:hover,
        .pager li>a:focus {
            text-decoration: none;
            background-color: #eee;
        }

        .pager .next>a,
        .pager .next>span {
            float: right;
        }

        .pager .previous>a,
        .pager .previous>span {
            float: left;
        }

        .pager .disabled>a,
        .pager .disabled>a:hover,
        .pager .disabled>a:focus,
        .pager .disabled>span {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
        }

        .arrow-up {
            position: absolute;
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid orangered;
            display: inline-block;
            margin-left: 78px;
            margin-top: -2px;
        }

        /*This class displays the DOWN arrow*/

        .arrow-down {
            position: absolute;
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid orangered;
            display: inline-block;
            margin-left: 80px;
            margin-top: -2px;
        }

        .home-filter>.home-filter__btn.btn {
            min-width: 106px;
        }

        .mobile-sort {
            text-align: center;
            margin: auto;
            border-right: 1px solid #e5e5e5;
        }

        .wrapper .sidebar {
            height: auto;
        }

        .sidebar {
            margin-right: 85%;
        }

        .product-grid:hover {
            box-shadow: 0 0.0625rem 20px 0 rgb(0 0 0 / 5%);
            -webkit-transform: translateY(-.0625rem);
            transform: translateY(-.0625rem);
            z-index: 1;
        }

        .product-image:hover {

            cursor: pointer;
        }

        .product-grid .product-image img {
            height: 220px;
        }

        .home-product-item__name:hover {
            color: var(--primary-color);
        }

    </style>
@stop

@section('content')
    <div>
        <div>
            <ul class="header__sort-bar ">
                <li class="mobile-sort header__sort-item ">
                    <div class=" home-filter__btn btn " type="button">Phổ biến
                        <div></div>
                    </div>
                </li>
                <li class="mobile-sort header__sort-item ">
                    <div class="home-filter__btn btn " type="button">Mới nhất
                        <div></div>
                    </div>

                </li>
                <li class="mobile-sort header__sort-item ">
                    <div class="home-filter__btn btn " type="button">Bán chạy
                        <div></div>
                    </div>

                </li>


                <li class="mobile-sort header__sort-item ">
                    <div class="home-filter__btn btn " type="button">Giá
                        <div></div>
                    </div>

                </li>
            </ul>
            <div class="app__container ">
                <div class="grid wide ">
                    <div class="wrapper row  " style="flex-direction:row-reverse;">
                        @include('partial.menu')
                        <div class="col l-10 m-12 c-12 ">
                            <div class="home-filter hide-on-mobile-tablet ">
                                <span class="home-filter__label ">
                                    Sắp xếp theo
                                </span>
                                @if (Request::get('slug'))
                                    <a href="{{ route('danhmuc', ['slug' => request('slug'), 'orderBy' => 'ordering']) }}"
                                        class="home-filter__btn btn @if (Request::get('orderBy')=='ordering' ) {! home-filter__btn-first !} @endif" type="button">
                                        Phổ biến
                                        <button type="submit" hidden value=""></button>
                                    </a>
                                @else
                                    <a href="{{ route('danhmuc',  ['slug' => request('slug'), 'orderBy' => 'ordering'])}}"
                                        class="home-filter__btn btn  @if (Request::get('orderBy')=='ordering' ) {! home-filter__btn-first !} @endif" type="button">
                                        Phổ biến
                                        <button type="submit" hidden value=""></button>
                                    </a>
                                @endif

                                @if (Request::get('slug'))
                                    <a href="{{ route('danhmuc', ['slug' => request('slug'), 'orderBy' => 'created']) }}"
                                        class="home-filter__btn btn  @if (Request::get('orderBy')=='created' ) {! home-filter__btn-first !} @endif" type="button">
                                        Mới nhất
                                        <button type="submit" hidden value=""></button>
                                    </a>
                                @else
                                    <a href="{{ route('danhmuc',  ['slug' => request('slug'), 'orderBy' => 'created']) }}"
                                        class="home-filter__btn btn @if (Request::get('orderBy')=='created' ) {! home-filter__btn-first !} @endif" type="button">
                                        Mới nhất
                                        <button type="submit" hidden value=""></button>
                                    </a>
                                @endif
                                @if (Request::get('slug'))
                                    <a href="{{ route('danhmuc', ['slug' => request('slug'), 'orderBy' => 'sales']) }}"
                                        class="home-filter__btn btn  @if (Request::get('orderBy')=='sales' ) {! home-filter__btn-first !} @endif" type="button">
                                        Bán chạy
                                        <button type="submit" hidden value=""></button>
                                    </a>
                                @else
                                    <a href="{{ route('danhmuc',  ['slug' => request('slug'), 'orderBy' => 'sales']) }}"
                                        class="home-filter__btn btn @if (Request::get('orderBy')=='sales' ) {! home-filter__btn-first !} @endif" type="button">
                                        Bán chạy
                                        <button type="submit" hidden value=""></button>
                                    </a>
                                @endif
                                @if (Request::get('slug'))
                                    <div class="select-input ">
                                        <span class="select-input__label ">
                                            @if (Request::get('orderBy') == 'price_asc')
                                                <a class="select-input__link home-filter__btn-first">Giá: Thấp đến cao</a>
                                            @elseif(Request::get('orderBy') == 'price_desc')
                                                <a class="select-input__link ">Giá: Cao đến thấp</a>
                                            @else
                                                <span class="select-input__label ">
                                                    Giá
                                                </span>
                                            @endif
                                        </span>
                                        <i class="select-input__icon fas fa-angle-down "></i>
                                        <!-- List option -->
                                        <ul class="select-input__list ">
                                            @if (Request::get('orderBy') == 'price_asc')
                                                <li id="get_ASC" class="select-input__item ">
                                                    <a href="" class="select-input__link ">Giá: Thấp đến cao</a>
                                                </li>
                                                <li id="get_DESC" class="select-input__item ">
                                                    <a href="{{ route('danhmuc', ['slug' => request('slug'), 'orderBy' => 'price_desc']) }}"
                                                        class="select-input__link ">Giá: Cao đến thấp</a>
                                                </li>
                                            @elseif(Request::get('orderBy') == 'price_desc')
                                                <li id="get_ASC" class="select-input__item ">
                                                    <a href="{{ route('danhmuc', ['slug' => request('slug'), 'orderBy' => 'price_asc']) }}"
                                                        class="select-input__link ">Giá: Thấp đến cao</a>
                                                </li>
                                                <li id="get_DESC" class="select-input__item ">
                                                    <a href="" class="select-input__link ">Giá: Cao đến thấp</a>
                                                </li>
                                            @else
                                                <li id="get_ASC" class="select-input__item ">
                                                    <a href="{{ route('danhmuc', ['slug' => request('slug'), 'orderBy' => 'price_asc']) }}"
                                                        class="select-input__link ">Giá: Thấp đến cao</a>
                                                </li>
                                                <li id="get_DESC" class="select-input__item ">
                                                    <a href="{{ route('danhmuc', ['slug' => request('slug'), 'orderBy' => 'price_desc']) }}" class="select-input__link ">Giá: Cao đến thấp</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                @else
                                    <div class="select-input ">
                                        <span class="select-input__label ">
                                            @if (Request::get('orderBy') == 'price_asc')
                                                <a class="select-input__link home-filter__btn-first">Giá: Thấp đến cao</a>
                                            @elseif(Request::get('orderBy') == 'price_desc')
                                                <a class="select-input__link home-filter__btn-first">Giá: Cao đến thấp</a>
                                            @else
                                                <span class="select-input__label ">
                                                    Giá
                                                </span>
                                            @endif
                                        </span>
                                        <i class="select-input__icon fas fa-angle-down "></i>
                                        <!-- List option -->
                                        <ul class="select-input__list ">
                                            @if (Request::get('orderBy') == 'price_asc')
                                                <li id="get_ASC" class="select-input__item ">
                                                    <a class="select-input__link ">Giá: Thấp đến cao</a>
                                                </li>
                                                <li id="get_DESC" class="select-input__item ">
                                                    <a href="{{ route('danhmuc', ['slug' => request('slug'), 'orderBy' => 'price_desc']) }}"
                                                        class="select-input__link ">Giá: Cao đến thấp</a>
                                                </li>
                                            @elseif(Request::get('orderBy') == 'price_desc')
                                                <li id="get_ASC" class="select-input__item ">
                                                    <a href="{{ route('danhmuc', ['slug' => request('slug'), 'orderBy' => 'price_asc']) }}"
                                                        class="select-input__link ">Giá: Thấp đến cao</a>
                                                </li>
                                                <li id="get_DESC" class="select-input__item ">
                                                    <a class="select-input__link ">Giá: Cao đến thấp</a>
                                                </li>
                                            @else
                                                <li id="get_ASC" class="select-input__item ">
                                                    <a href="{{ route('danhmuc', ['slug' => request('slug'), 'orderBy' => 'price_asc']) }}"
                                                        class="select-input__link ">Giá: Thấp đến cao</a>
                                                </li>
                                                <li id="get_DESC" class="select-input__item ">
                                                    <a href="{{ route('danhmuc', ['slug' => request('slug'), 'orderBy' => 'price_desc']) }}"
                                                        class="select-input__link ">Giá: Cao đến thấp</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                                {{-- <div class="select-input ">
                                    <span class="select-input__label ">
                                        Giá
                                    </span>
                                    <i class="select-input__icon fas fa-angle-down "></i>
                                    <!-- List option -->
                                    <ul class="select-input__list ">
                                        <li id="get_ASC" class="select-input__item ">
                                            <a href="giaASC.html" class="select-input__link ">Giá: Thấp đến cao</a>
                                        </li>
                                        <li id="get_DESC" class="select-input__item ">
                                            <a href="giaDESC.html" class="select-input__link ">Giá: Cao đến thấp</a>
                                        </li>
                                    </ul>
                                </div> --}}

                                <!-- <div class="home-filter__paginate "> -->
                                <!-- <span class="home-filter__page ">
                                                                                                                                <span class="home-filter__page-num ">
                                                                                                                                    <span class="home-filter__page-current ">
                                                                                                                                        1
                                                                                                                                    </span>/14
                                                                                                                                </span>
                                                                                                                            </span>
                                                                                                                            <div class="home-filter__page-control ">
                                                                                                                                <a href=" " class="home-filter__page-btn home-filter__page-btn--disabled ">
                                                                                                                                    <i class="home-filter__page-icon fas fa-angle-left "></i>
                                                                                                                                </a>
                                                                                                                                <a href=" " class="home-filter__page-btn ">
                                                                                                                                    <i class="home-filter__page-icon fas fa-angle-right "></i>
                                                                                                                                </a>
                                                                                                                            </div> -->
                                <!-- </div> -->
                            </div>
                            <nav class="mobile-category ">
                                <ul class="mobile-category__list ">
                                    <li class="mobile-category__item  ">
                                        <a href="./OhuiTheFirstTaiSinh.html" class="mobile-category__link ">Ohui
                                            Thefirst Tái Sinh </a>
                                    </li>
                                    <li class="mobile-category__item  ">
                                        <a href="./OhuiDưỡngTrắng.html" class="mobile-category__link ">Ohui Dưỡng Trắng
                                        </a>
                                    </li>
                                    <li class="mobile-category__item  ">
                                        <a href="OhuiPrimeAdvancer.html" class="mobile-category__link ">Ohui Prime
                                            Advancer</a>
                                    </li>
                                    <li class="mobile-category__item  ">
                                        <a href="./OhuiDưỡngẨm.html" class="mobile-category__link ">Ohui Dưỡng Ẩm</a>
                                    </li>
                                    <li class="mobile-category__item  ">
                                        <a href="./OhuiChốngLãoHóa.html" class="mobile-category__link ">Ohui Chống Lão
                                            Hóa</a>
                                    </li>
                                    <li class="mobile-category__item  ">
                                        <a href="OhuiMakeUp.html" class="mobile-category__link ">Ohui Make Up</a>
                                    </li>
                                    <li class="mobile-category__item  ">
                                        <a href="OhuiChốngNắng.html" class="mobile-category__link ">Ohui Chống Nắng</a>
                                    </li>

                                </ul>

                            </nav>
                           
                            <div class="home-product" id="home-product">
                                <div class="row sm-gutter" id="product">
                                    <!-- product item -->

                                    @if (count($danhmuc) > 0)
                                        @foreach ($danhmuc as $i)
                                            <div class="product-item col-lg-3 col-md-4 col-sm-6">
                                                <div class="product-grid" style="height: 100%;">
                                                    <div class="product-image">
                                                        <a href="{{ route('detail', ['slug' => $i->slug]) }}">
                                                            <img class="pic-1 pic-2"
                                                                src="{{ asset('upload/image/product') . '/' . $i->image }}" />
                                                        </a>
                                                        <div class="home-product-item__sale-off ">
                                                            <span class="home-product-item__sale-off-percent ">20%</span>
                                                            <span class="home-product-item__sale-off-label ">GIẢM </span>
                                                        </div>

                                                    </div>
                                                    <div style="box-shadow: 0 0.0625rem 0.125rem 0 rgba(0,0,0,.1);"
                                                        class="product-content">
                                                        <div>
                                                            <a href="{{ route('detail', ['slug' => $i->slug]) }}">
                                                                <p class="home-product-item__name">{{ $i->name }}</p>
                                                            </a>
                                                        </div>
                                                        <div class="info-price">
                                                            <div style="padding-left: 10px;margin-top: 16px;" class="price">
                                                                <div style="font-size: 14px;color: orangered;font-weight: 300;"
                                                                    class="price-new">{{ number_format($i->price) }}đ</div>
                                                                <div class="price-old">{{ number_format(sale(20, $i)) }}đ
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div style="position: relative;bottom: -14px;font-size: 14px;"
                                                            class="bottom-info">
                                                            <div style="padding-left: 10px;" class="info">
                                                                <div class="left-hert">
                                                                    <i class="far fa-heart"></i>
                                                                    <p>{{ $i->category->find($i->category->parent_id)->name }}
                                                                    </p>
                                                                </div>
                                                                <div class="right-star">
                                                                    <div style="height: 20px;" class="stars">
                                                                        <input type="radio" id="five" name="rate" value="5">
                                                                        <label for="five"></label>
                                                                        <input type="radio" id="four" name="rate" value="4">
                                                                        <label for="four"></label>
                                                                        <input type="radio" id="three" name="rate"
                                                                            value="3">
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
                                        @endforeach
                                    @else
                                    <div class="mt-4 alert alert-danger" style="font-size: 14px;" role="alert">
                                        0 kết quả trả về cho danh mục '<b style="color: var(--primary-color); font-size: 16px" class=font-weight-bold">{{$categoryName->name}}</b>'.
                                    </div>
                                    @endif


                                </div>

                            </div>
                            <nav aria-label="Page navigation example">
                                {{ $danhmuc->links() }}
                                {{-- <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul> --}}
                                <div class="d-flex justify-content-center">
                                    
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
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
