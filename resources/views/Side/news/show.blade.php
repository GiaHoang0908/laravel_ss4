@extends('layout.frontend.master')

@section('title', $data[0]->title)

@section('style')
    <style>
        img {
            width: 100%;
        }
        p{
            font-size: 14px;
        }
        h2 {
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

         ul.breadcrumb {
            padding: 18px 0px;
            list-style: none;
            background-color: #f5f5f5;
        }

        ul.breadcrumb li {
            display: inline;
            font-size: 14px;
            font-weight: 300;
        }

        ul.breadcrumb li+li:before {
            padding: 8px;
            content: "\203A";
        }

        ul.breadcrumb li a {
            color: rgba(0, 0, 0, .8);
            font-size: .8125rem;
            white-space: nowrap;
        }

        ul.breadcrumb li a:hover {
            text-decoration: underline;
        }

        .product-item {
            margin-bottom: 30px;
        }

        .home-product-item__name {
            margin: 0;
            font-weight: 600;
        }

        ul {
            padding: 0;
        }

        .wrapper .sidebar ul li {
            width: 100%;
            border: none
        }

        .wrapper .sidebar ul li a {
            font-weight: 500;
            font-size: 13px;
        }

        .form-search-cat {
            flex-direction: row-reverse;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #e5e5e5;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            padding: 10px 10px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        .form-search-cat>svg {
            font-size: 16px;
            margin-right: 8px;
        }

        .form-search-cat>input {
            flex: 1;
            border: none;
            outline: none;
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
            background-color: orangered;
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

    </style>
@stop
@section('content')
    <ul class="grid wide breadcrumb ">
        <li><a href="{{ route('tintuc') }}" style="font-size:12px; color: #333">Trang chủ</a></li>
        <li><a href="{{ route('tintuc.danhmuc', ['slug' => $data[0]->category_news->slug]) }}"
                style="font-size:12px; color: #333">{{ $data[0]->category_news->name }}</a></li>

        <li style="text-transform: uppercase;">{{ $data[0]->title }}</li>
    </ul>
    <div>
        <div>

            <div class="app__container " style="background-color: #fff;">
                <div class="grid wide ">
                    <div class="wrapper row  " style="margin-top: 0; flex-direction: row-reverse;">
                        @include('partial.menu_news')

                        <div class="col l-9 m-12 c-12 ">


                            <div class="home-product" id="home-product">
                                <div class="" id="product">
                                    <p style="font-weight: 600; font-size: 28px">{{ $data[0]->title }}</p>
                                    {!! $data[0]->content !!}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
