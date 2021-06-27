@extends('layout.frontend.master')

@section('title', 'Mỹ phẩm Ohui-LG Vina')
@section('style')
    <style>
        .status {
            font-size: 14px;
        }

        .no-salesinvoice {
            background-color: #fff;
            min-height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        a{
            color: #333
        }
        a:hover{
            color: orangered
        }

        .no-salesinvoice>div {
            text-align: center;
            margin-top: 12px;
        }

        .header-profile {
            display: flex;
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
            padding-left: 15px;
            overflow: hidden;
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
            height: 100%;
        }

        .h25IfI {
            position: relative;
            min-height: 50px;
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

        /* .my-account-profile-form {} */

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
        }

        a:hover {
            color: orangered;
        }

        .avatar-uploader__avatar-image {
            width: 100%;
            height: 100%;
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

        #exTab1 .tab-content {
            background-color: #428bca;
            padding: 5px 15px;
        }

        #exTab2 h3 {
            color: white;
            background-color: #428bca;
            padding: 5px 15px;
        }

        /* remove border radius for the tab */

        #exTab1 .nav-pills>li>a {
            border-radius: 0;
        }

        /* change border radius for the tab , apply corners on top*/

        #exTab3 .nav-pills>li>a {
            border-radius: 4px 4px 0 0;
        }

        #exTab3 .tab-content {
            color: white;
            background-color: #428bca;
            padding: 5px 15px;
        }

        .tab_header>li {
            display: flex;
            justify-content: center;
            width: calc(100% / 6);
            height: 50px;
            align-items: center;
            text-align: center;
            font-size: 14px;
        }

        .tab_header>li>a {
            color: #333;
        }

        .tab-content {
            margin: 20px 0;
            min-height: 300px;
        }

        .tab-pane {
            padding: 0;
            font-size: 14px;
        }

        .tab-pane-title {
            margin-bottom: 20px;
            font-size: 16px;
            font-weight: 500;
        }

        .input-search {}

        .tab_list.active {
            border-bottom: 1px solid orangered !important;
        }

        .tab_list.active>a {
            color: orangered;
        }

        .checkout-form {
            margin-bottom: 10px;
        }

        .cart-empty-page__content {
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 50px 0;
        }

        .cart-empty-page__content-image {
            margin: 0;
            width: 300px;
        }

        .cart-empty-page__content-image>img {
            display: block;
            width: 100%;
            height: auto;
        }

        .cart-empty-page__content-text {
            margin: 20px 0 20px;
            font-size: 16px;
            font-weight: 500;
        }

        .btn--l {
            height: 48px;
            padding: 0 20px;
            min-width: 80px;
            max-width: 250px;
        }

        /* cart */

        .deltai-Cart {
            padding: 10px;
        }

        .cart-page-product-header {
            -webkit-box-align: center;
            align-items: center;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
            border-radius: 2px;
            overflow: hidden;
            border-radius: 3px;
            height: 52px;
            font-size: 14px;
            background: #fff;
            text-transform: capitalize;
            margin-bottom: 12px;
            color: #888;
            padding: 0 20px;
            display: -webkit-box;
            display: flex;
        }

        .cart-page-product-header__product {
            width: 46.27949%;
        }

        .cart-page-product-header__unit-price {
            width: 15.88022%;
            text-align: center;
        }

        .cart-page-product-header__quantity {
            width: 15.4265%;
            text-align: center;
        }

        .cart-page-product-header__total-price {
            width: 10.43557%;
            text-align: center;
        }

        .cart-page-product-header__action {
            width: 12.70417%;
            text-align: center;
        }

        .cart-page-shop-section {
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .05);
            border-radius: .125rem;
            overflow: hidden;
            background: #fff;
            margin-bottom: .9375rem;
            overflow: visible;
        }

        .cart-page-shop-section__items {
            position: relative;
            padding-bottom: 1px;
        }

        .cart-page-shop-section__items>.cart-item:first-child {
            margin-top: 0;
        }

        .cart-page-shop-section__items>.cart-item:last-child {
            border-bottom: 0;
        }

        .cart-page-shop-section__items>.cart-item {
            border-bottom: 1px solid rgba(0, 0, 0, .09);
            padding-left: 20px;
            padding-right: 20px;
        }

        .cart-page-shop-section__items>.cart-item {
            border: none;
        }

        .cart-item__content {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
        }

        .cart-item__cell-overview {
            box-sizing: border-box;
            display: -webkit-box;
            display: flex;
        }

        .cart-item:last-child {
            padding-bottom: 10px;
        }

        .cart-item:first-child {
            padding-top: 10px;
        }

        .cart-item__cell-overview .cart-item-overview__thumbnail {
            max-width: 80px;
        }

        .cart-item-overview__thumbnail {
            background-position: 50%;
            background-size: contain;
            background-repeat: no-repeat;
            width: 80px;
            height: 80px;
        }

        .cart-item__flex {
            -webkit-box-flex: 1;
            flex: 1 1 auto;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            overflow: hidden;
        }

        .cart-item__flex .cart-item-overview__product-name-wrapper {
            padding: 0 10px;
        }

        .cart-item-overview__product-name-wrapper {
            -webkit-box-flex: 1;
            flex: 1 1 0;
        }

        .cart-item-overview__product-name-wrapper {
            display: -webkit-box;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            padding: .3125rem 1.25rem 0 .625rem;
            font-size: 14px;
            line-height: 1rem;
            width: 502px;
        }

        .cart-item-overview__name {
            text-decoration: none;
            color: rgba(0, 0, 0, .8);
            line-height: 20px;
            max-height: 40px;
            text-overflow: ellipsis;
            overflow: hidden;
            word-break: break-word;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .cart-item-overview__price {
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .cart-item__flex .cart-item__cell-unit-price {
            text-align: right;
            width: 110px;
        }

        .cart-item__cell-quantity,
        .cart-item__cell-unit-price {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }

        .cart-item__cell-unit-price,
        .cart-item__cell-variation {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
        }

        .cart-item__unit-price:last-child {
            margin: 0;
        }

        .cart-item__flex .cart-item__cell-unit-price {
            text-align: right;
            width: 110px;
        }

        .cart-item__cell-quantity,
        .cart-item__cell-unit-price {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }

        .cart-item__flex .cart-item__cell-quantity {
            width: 150px;
            margin: 0 14px;
        }

        .cart-item__cell-quantity {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 15.4265%;
        }

        .cart-item__cell-quantity,
        .cart-item__cell-unit-price {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
        }

        .cart-item__flex .cart-item__cell-total-price {
            text-align: center;
        }

        .cart-item__flex .cart-item__cell-total-price {
            text-align: center;
            width: 110px;
        }

        .cart-item__cell-total-price {
            width: 10.43557%;
            text-align: right;
            color: #ee4d2d;
        }

        .cart-item__cell-actions {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 12.70417%;
            text-transform: capitalize;
            font-size: 14px;
        }

        .cart-item__action {
            cursor: pointer;
            background: none;
            border: none;
        }

        .cart-item__cell-actions {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            width: 12.70417%;
            text-transform: capitalize;
        }

        ._19lAw4 {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
        }

        ._1zT8xu:first-child {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .btn-quantity {
            box-shadow: none;
        }

        ._1zT8xu {
            outline: none;
            cursor: pointer;
            border: none;
            font-size: .875rem;
            font-weight: 300;
            line-height: 1;
            letter-spacing: 0;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            border: 1px solid rgba(0, 0, 0, .09);
            border-radius: 2px;
            background: transparent;
            color: rgba(0, 0, 0, .8);
            width: 50px;
            height: 32px;
        }

        .bt {
            overflow: hidden;
            display: -webkit-box;
            text-overflow: ellipsis;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            flex-direction: column;
            font-size: 4px;
            box-sizing: border-box;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .09);
            border-radius: 2px;
            border: 0;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            text-transform: capitalize;
            outline: 0;
            cursor: pointer;
            outline: none !important;
        }

        ._1zT8xu .tickid-svg-icon {
            font-size: 12px;
        }

        .tickid-svg-icon {
            display: inline-block;
            width: 10px;
            height: 10px;
            fill: currentColor;
            position: relative;
        }

        ._18Y8Ul {
            width: 50px;
            height: 32px;
            border-left: none;
            border-right: none;
            font-size: 1rem;
            font-weight: 400;
            box-sizing: border-box;
            text-align: center;
            cursor: text;
            border-radius: 0;
        }

        ._1zT8xu:last-child {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .btn-quantity {
            box-shadow: none;
        }

        ._1zT8xu {
            outline: none;
            cursor: pointer;
            border: none;
            font-size: 14px;
            font-weight: 300;
            line-height: 1;
            letter-spacing: 0;
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            -webkit-transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
            border: 1px solid rgba(0, 0, 0, .09);
            border-radius: 2px;
            background: transparent;
            color: rgba(0, 0, 0, .8);
            width: 50px;
            height: 32px;
        }

        .checkout {
            padding: 10px;
            background-color: #fff;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 8px 8px;
            /* border-top: 1px dashed #e5e5e5; */
            width: 480px;
            margin-left: calc(100% - 480px);
            padding-top: 20px;
        }

        .cart-info {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            flex: 1;
            height: 100%;
            padding: 20px;
            font-size: 14px;
        }

        .cart-value {
            color: var(--primary-color);
        }

        .cart-title {
            margin-right: 12px;
        }

        .check-out-adress {
            width: 100%;
        }

        .checkout-form {
            background-color: #fff;
        }

        .checkout-address-selection__section-header-text {
            font-size: 16px;
            color: var(--primary-color);
            display: flex;
            align-items: center;
        }

        .tickid-svg-icon {
            margin-right: 8px;
            font-size: 22px;
        }

        .auth-form__input {
            font-size: 14px;
            width: 45%;
            height: 40px;
            border-radius: 2px;
            outline: none;
        }

        .js-input-update-cart {
            border: none;
        }

        .btn-back {
            border: 1px solid #e5e5e5;
            margin-left: 12px;
            outline: none;
        }

        .infor-content-header-infor {
            margin: auto;
            margin-top: 14px;
            font-size: 1.4rem;
            line-height: 20px;
        }

        .infor-content-header-infor-item {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-bottom: 20px;
        }

        .infor-content-header-infor-item-left {
            display: flex;
            justify-content: flex-start;
            color: #999;
            width: 14%;
        }

        .infor-content-header-infor-item-right {
            display: flex;
            min-width: 12%;
            justify-content: flex-end;
        }

        .infor-content-header-infor-item-right--strong {
            font-size: 22px;
            color: var(--primary-color);
        }

        .btn {
            width: 200px;
            height: 42px;
        }

        .checkout-payment-method-view__current {
            min-height: auto;
            padding-top: 25px;
            padding-bottom: 25px;
        }

        .checkout-payment-method-view__current {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            min-height: 5.625rem;
            box-sizing: border-box;
            padding-left: 1.875rem;
        }

        .checkout-payment-method-view__current-title {
            font-size: 16px;
            width: 200px;
            color: #222;
        }

        .checkout-payment-method-view__current-title {
            margin-right: auto;
        }

        .checkout-payment-setting__payment-methods-tab>span:last-child .product-variation {
            margin-right: 0;
        }

        .product-variation {
            position: relative;
            padding: 0 10px;
            min-width: 60px;
        }

        .product-variation--selected,
        .product-variation:hover {
            color: #ee4d2d;
            border-color: #ee4d2d;
        }

        .product-variation {
            cursor: pointer;
            display: inline-block;
            min-width: 5rem;
            box-sizing: border-box;
            padding: 0 .75rem;
            height: 2.125rem;
            line-height: 1;
            margin: 0 8px 0 0;
            color: rgba(0, 0, 0, .8);
            text-align: center;
            white-space: nowrap;
            border-radius: 2px;
            border: 1px solid rgba(0, 0, 0, .09);
            position: relative;
            background: #fff;
            outline: 0;
        }

        .btn-methood {
            margin: 0;
            min-height: 32px;
            border: 1px solid var(--primary-color);
            color: orangered;
        }

        .checkout-payment-method-view__current-title-s {
            font-size: 13px;
        }

        .checkout-payment-method-view__current-s {
            border-bottom: 1px solid #e5e5e5;
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

        .tickid-svg-icon {
            margin-right: 0 !important;
        }

        .btn-d:hover {
            color: orangered !important;
            border: 1px solid orangered !important;
        }

        .ttdh {
            padding: 10px 0px;
            background: #fff
        }

        .filter_seach {
            display: flex;
            align-items: center;
            margin: 10px 0 -10px 0;
            height: 40px;
            width: 100%;
            background-color: #eaeaea;
        }

        .input-search {
            flex: 1;
            outline: none;
            border: none;
            font-size: 14px;
            padding-left: 8px;
            background-color: #eaeaea;
            height: 100%;
        }

        .filter_seach>svg {
            font-size: 16px;
            margin: 0 12px;
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
        <div class="user-page__content">
            <div class="h25IfI">
                <div id="exTab1">
                    <ul class="nav nav-pills tab_header container">
                        <li class="tab_list active">
                            <a href="#1a" data-toggle="tab">Tất cả</a>
                        </li>
                        <li class="tab_list">
                            <a href="#2a" data-toggle="tab">Chờ xác nhận</a>
                        </li>
                        <li class="tab_list">
                            <a href="#3a" data-toggle="tab">Chờ lấy hàng</a>
                        </li>
                        <li class="tab_list">
                            <a href="#4a" data-toggle="tab">Đang giao</a>
                        </li>
                        <li class="tab_list">
                            <a href="#5a" data-toggle="tab">Đã giao</a>
                        </li>
                        <li class="tab_list">
                            <a href="#6a" data-toggle="tab">Đã hủy</a>
                        </li>
                    </ul>


                </div>
            </div>
            {{-- <div class="filter_seach">
                <i class="fas fa-search"></i>
                <input ng-model="txtSearch" placeholder="Tìm kiếm..." type="text" name="" class="input-search" id="">
            </div> --}}
            <div class="tab-content">
                <div class="tab-pane  active" id="1a">

                    @if (count($all) < 1)
                        <div style="" class="no-salesinvoice">
                            <div class="no-salesinvoice-content">
                                <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/5fafbb923393b712b96488590b8f781f.png"
                                    alt="">
                                <div class="">Chưa có đơn hàng</div>
                            </div>
                        </div>
                    @else
                        @foreach ($all as $i)
                            <div class="container-fluid mb-4 ttdh">
                                <nav class="navbar ">
                                    <div class="container-fluid">
                                        <div class=" navbar-brand">ID ĐƠN HÀNG. {{ $i->id }}</div>
                                        @if ($i->deleted_at)
                                            <div class="d-flex">
                                                <div class="status text-uppercase text-danger">Đã hủy</div>
                                            </div>
                                        @else

                                            <div class="d-flex">
                                                <div class="status text-uppercase ">{{ $i->status }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </nav>

                                <hr>
                                <div class="tab-pane-title">
                                    <div class=" checkout-form">
                                        <div class="form-product">
                                            @foreach ($i->detailSalesInvoice as $j)
                                                <div class="cart-page-shop-section">
                                                    <div class="cart-page-shop-section__items">
                                                        <div class="cart-item js-product-cart">
                                                            <div class="cart-item__content">
                                                                <div class="cart-item__cell-overview">
                                                                    <a class="cart-item-overview__thumbnail-wrapper"
                                                                        href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}">
                                                                        <img class="cart-item-overview__thumbnail"
                                                                            src="{{ asset('upload/image/product') . '/' . $j->product[0]->image }}"
                                                                            alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="cart-item__flex">
                                                                    <div style="height: 80px"
                                                                        class="cart-item-overview__product-name-wrapper">
                                                                        <a href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}"
                                                                            class="cart-item-overview__name"> Set kem mắt
                                                                            tái
                                                                            sinh Ohui The First Geniture Eye Cream Edition
                                                                            Grand
                                                                            Blue</a>
                                                                        <div class="m-2">x {{ $j->quantity }}</div>
                                                                    </div>

                                                                </div>
                                                                <div class="cart-item__cell-actions">
                                                                    <span
                                                                        class="cart-item__unit-price cart-item__unit-price--after js-cart-item-unit-price text-danger">
                                                                        ₫{{ number_format($j->price, 0, ',', '.') }}
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="container ">
                                                <div style="border: none" class="checkout">
                                                    <div style="display: flex; align-items: flex-end" class="cart-info">
                                                        <img style="height:28px" class="mr-3"
                                                            src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/67454c89080444c5997b53109072c9e0.png"
                                                            alt="">
                                                        <div class="cart-title">Tổng số tiền:</div>
                                                        <div style="font-size: 30px; line-height: 100%" class="cart-value">
                                                            ₫{{ number_format($i->total_price, 0, ',', '.') }}</div>
                                                    </div>

                                                </div>
                                                <nav class="navbar">

                                                    <div class="container-fluid justify-content-end">
                                                        @if (!$i->deleted_at)
                                                            @if ($i->status == 'Chưa xử lý' || $i->status == 'Chờ lấy hàng')
                                                                <a href="{{ route('salesinvoice_user.softDelete', ['id' => $i->id]) }}" 
                                                                    class="d-flex btn mr-3"
                                                                    style="background-color: orangered; color: #fff">Hủy đơn
                                                                    hàng</a>
                                                            @endif
                                                        @endif
                                                        <a href="{{ route('purchase.order', ['id'=>$i->id]) }}" class="d-flex btn btn-d" style="border: 1px solid #e5e5e5">Chi
                                                            tiết
                                                            đơn hàng</a>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane  " id="2a">
                    @if (count($cxn) < 1)
                        <div style="" class="no-salesinvoice">
                            <div class="no-salesinvoice-content">
                                <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/5fafbb923393b712b96488590b8f781f.png"
                                    alt="">
                                <div class="">Chưa có đơn hàng</div>
                            </div>
                        </div>
                    @else
                        @foreach ($cxn as $i)
                            <div class="container-fluid mb-4 ttdh">
                                <nav class="navbar ">
                                    <div class="container-fluid">
                                        <div class=" navbar-brand">ID ĐƠN HÀNG. {{ $i->id }}</div>
                                        @if ($i->status == 'Chưa xử lý')
                                            <div class="d-flex">
                                                <div class="status text-uppercase text-danger">{{ $i->status }}</div>
                                            </div>
                                        @else
                                            <div class="d-flex">
                                                <div class="status text-uppercase ">{{ $i->status }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </nav>

                                <hr>
                                <div class="tab-pane-title">
                                    <div class=" checkout-form">
                                        <div class="form-product">
                                            @foreach ($i->detailSalesInvoice as $j)
                                                <div class="cart-page-shop-section">
                                                    <div class="cart-page-shop-section__items">
                                                        <div class="cart-item js-product-cart">
                                                            <div class="cart-item__content">
                                                                <div class="cart-item__cell-overview">
                                                                    <a class="cart-item-overview__thumbnail-wrapper"
                                                                        href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}">
                                                                        <img class="cart-item-overview__thumbnail"
                                                                            src="{{ asset('upload/image/product') . '/' . $j->product[0]->image }}"
                                                                            alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="cart-item__flex">
                                                                    <div style="height: 80px"
                                                                        class="cart-item-overview__product-name-wrapper">
                                                                        <a href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}"
                                                                            class="cart-item-overview__name"> Set kem mắt
                                                                            tái
                                                                            sinh Ohui The First Geniture Eye Cream Edition
                                                                            Grand
                                                                            Blue</a>
                                                                        <div class="m-2">x {{ $j->quantity }}</div>
                                                                    </div>

                                                                </div>
                                                                <div class="cart-item__cell-actions">
                                                                    <span
                                                                        class="cart-item__unit-price cart-item__unit-price--after js-cart-item-unit-price text-danger">
                                                                        ₫{{ number_format($j->price, 0, ',', '.') }}
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="container ">
                                                <div style="border: none" class="checkout">
                                                    <div style="display: flex; align-items: flex-end" class="cart-info">
                                                        <img style="height:28px" class="mr-3"
                                                            src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/67454c89080444c5997b53109072c9e0.png"
                                                            alt="">
                                                        <div class="cart-title">Tổng số tiền:</div>
                                                        <div style="font-size: 30px; line-height: 100%" class="cart-value">
                                                            ₫{{ number_format($i->total_price, 0, ',', '.') }}</div>
                                                    </div>

                                                </div>
                                                <nav class="navbar">

                                                    <div class="container-fluid justify-content-end">
                                                        <a class="d-flex btn mr-3"
                                                            style="background-color: orangered; color: #fff">Hủy đơn
                                                            hàng</a>
                                                        <a href="{{ route('purchase.order', ['id'=>$i->id]) }}" class="d-flex btn btn-d" style="border: 1px solid #e5e5e5">Chi
                                                            tiết
                                                            đơn hàng</a>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane  " id="3a">
                    @if (count($clh) < 1)
                        <div style="" class="no-salesinvoice">
                            <div class="no-salesinvoice-content">
                                <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/5fafbb923393b712b96488590b8f781f.png"
                                    alt="">
                                <div class="">Chưa có đơn hàng</div>
                            </div>
                        </div>
                    @else
                        @foreach ($clh as $i)
                            <div class="container-fluid mb-4 ttdh">
                                <nav class="navbar ">
                                    <div class="container-fluid">
                                        <div class=" navbar-brand">ID ĐƠN HÀNG. {{ $i->id }}</div>
                                        @if ($i->status == 'Chưa xử lý')
                                            <div class="d-flex">
                                                <div class="status text-uppercase text-danger">{{ $i->status }}</div>
                                            </div>
                                        @else
                                            <div class="d-flex">
                                                <div class="status text-uppercase ">{{ $i->status }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </nav>

                                <hr>
                                <div class="tab-pane-title">
                                    <div class=" checkout-form">
                                        <div class="form-product">
                                            @foreach ($i->detailSalesInvoice as $j)
                                                <div class="cart-page-shop-section">
                                                    <div class="cart-page-shop-section__items">
                                                        <div class="cart-item js-product-cart">
                                                            <div class="cart-item__content">
                                                                <div class="cart-item__cell-overview">
                                                                    <a class="cart-item-overview__thumbnail-wrapper"
                                                                        href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}">
                                                                        <img class="cart-item-overview__thumbnail"
                                                                            src="{{ asset('upload/image/product') . '/' . $j->product[0]->image }}"
                                                                            alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="cart-item__flex">
                                                                    <div style="height: 80px"
                                                                        class="cart-item-overview__product-name-wrapper">
                                                                        <a href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}"
                                                                            class="cart-item-overview__name"> Set kem mắt
                                                                            tái
                                                                            sinh Ohui The First Geniture Eye Cream Edition
                                                                            Grand
                                                                            Blue</a>
                                                                        <div class="m-2">x {{ $j->quantity }}</div>
                                                                    </div>

                                                                </div>
                                                                <div class="cart-item__cell-actions">
                                                                    <span
                                                                        class="cart-item__unit-price cart-item__unit-price--after js-cart-item-unit-price text-danger">
                                                                        ₫{{ number_format($j->price, 0, ',', '.') }}
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="container ">
                                                <div style="border: none" class="checkout">
                                                    <div style="display: flex; align-items: flex-end" class="cart-info">
                                                        <img style="height:28px" class="mr-3"
                                                            src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/67454c89080444c5997b53109072c9e0.png"
                                                            alt="">
                                                        <div class="cart-title">Tổng số tiền:</div>
                                                        <div style="font-size: 30px; line-height: 100%" class="cart-value">
                                                            ₫{{ number_format($i->total_price, 0, ',', '.') }}</div>
                                                    </div>

                                                </div>
                                                <nav class="navbar">

                                                    <div class="container-fluid justify-content-end">
                                                        <a class="d-flex btn mr-3"
                                                            style="background-color: orangered; color: #fff">Hủy đơn
                                                            hàng</a>
                                                        <a href="{{ route('purchase.order', ['id'=>$i->id]) }}" class="d-flex btn btn-d" style="border: 1px solid #e5e5e5">Chi
                                                            tiết
                                                            đơn hàng</a>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane  " id="4a">
                    @if (count($dg) < 1)
                        <div style="" class="no-salesinvoice">
                            <div class="no-salesinvoice-content">
                                <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/5fafbb923393b712b96488590b8f781f.png"
                                    alt="">
                                <div class="">Chưa có đơn hàng</div>
                            </div>
                        </div>
                    @else
                        @foreach ($dg as $i)
                            <div class="container-fluid mb-4 ttdh">
                                <nav class="navbar ">
                                    <div class="container-fluid">
                                        <div class=" navbar-brand">ID ĐƠN HÀNG. {{ $i->id }}</div>
                                        @if ($i->status == 'Chưa xử lý')
                                            <div class="d-flex">
                                                <div class="status text-uppercase text-danger">{{ $i->status }}</div>
                                            </div>
                                        @else
                                            <div class="d-flex">
                                                <div class="status text-uppercase ">{{ $i->status }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </nav>

                                <hr>
                                <div class="tab-pane-title">
                                    <div class=" checkout-form">
                                        <div class="form-product">
                                            @foreach ($i->detailSalesInvoice as $j)
                                                <div class="cart-page-shop-section">
                                                    <div class="cart-page-shop-section__items">
                                                        <div class="cart-item js-product-cart">
                                                            <div class="cart-item__content">
                                                                <div class="cart-item__cell-overview">
                                                                    <a class="cart-item-overview__thumbnail-wrapper"
                                                                        href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}">
                                                                        <img class="cart-item-overview__thumbnail"
                                                                            src="{{ asset('upload/image/product') . '/' . $j->product[0]->image }}"
                                                                            alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="cart-item__flex">
                                                                    <div style="height: 80px"
                                                                        class="cart-item-overview__product-name-wrapper">
                                                                        <a href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}"
                                                                            class="cart-item-overview__name"> Set kem mắt
                                                                            tái
                                                                            sinh Ohui The First Geniture Eye Cream Edition
                                                                            Grand
                                                                            Blue</a>
                                                                        <div class="m-2">x {{ $j->quantity }}</div>
                                                                    </div>

                                                                </div>
                                                                <div class="cart-item__cell-actions">
                                                                    <span
                                                                        class="cart-item__unit-price cart-item__unit-price--after js-cart-item-unit-price text-danger">
                                                                        ₫{{ number_format($j->price, 0, ',', '.') }}
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="container ">
                                                <div style="border: none" class="checkout">
                                                    <div style="display: flex; align-items: flex-end" class="cart-info">
                                                        <img style="height:28px" class="mr-3"
                                                            src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/67454c89080444c5997b53109072c9e0.png"
                                                            alt="">
                                                        <div class="cart-title">Tổng số tiền:</div>
                                                        <div style="font-size: 30px; line-height: 100%" class="cart-value">
                                                            ₫{{ number_format($i->total_price, 0, ',', '.') }}</div>
                                                    </div>

                                                </div>
                                                <nav class="navbar">

                                                    <div class="container-fluid justify-content-end">

                                                        <a href="{{ route('purchase.order', ['id'=>$i->id]) }}" class="d-flex btn btn-d" style="border: 1px solid #e5e5e5">Chi
                                                            tiết
                                                            đơn hàng</a>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane  " id="5a">
                    @if (count($dag) < 1)
                        <div style="" class="no-salesinvoice">
                            <div class="no-salesinvoice-content">
                                <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/5fafbb923393b712b96488590b8f781f.png"
                                    alt="">
                                <div class="">Chưa có đơn hàng</div>
                            </div>
                        </div>
                    @else
                        @foreach ($dag as $i)
                            <div class="container-fluid mb-4 ttdh">
                                <nav class="navbar ">
                                    <div class="container-fluid">
                                        <div class=" navbar-brand">ID ĐƠN HÀNG. {{ $i->id }}</div>
                                        @if ($i->status == 'Chưa xử lý')
                                            <div class="d-flex">
                                                <div class="status text-uppercase text-danger">{{ $i->status }}</div>
                                            </div>
                                        @else
                                            <div class="d-flex">
                                                <div class="status text-uppercase ">{{ $i->status }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </nav>

                                <hr>
                                <div class="tab-pane-title">
                                    <div class=" checkout-form">
                                        <div class="form-product">
                                            @foreach ($i->detailSalesInvoice as $j)
                                                <div class="cart-page-shop-section">
                                                    <div class="cart-page-shop-section__items">
                                                        <div class="cart-item js-product-cart">
                                                            <div class="cart-item__content">
                                                                <div class="cart-item__cell-overview">
                                                                    <a class="cart-item-overview__thumbnail-wrapper"
                                                                        href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}">
                                                                        <img class="cart-item-overview__thumbnail"
                                                                            src="{{ asset('upload/image/product') . '/' . $j->product[0]->image }}"
                                                                            alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="cart-item__flex">
                                                                    <div style="height: 80px"
                                                                        class="cart-item-overview__product-name-wrapper">
                                                                        <a href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}"
                                                                            class="cart-item-overview__name"> Set kem mắt
                                                                            tái
                                                                            sinh Ohui The First Geniture Eye Cream Edition
                                                                            Grand
                                                                            Blue</a>
                                                                        <div class="m-2">x {{ $j->quantity }}</div>
                                                                    </div>

                                                                </div>
                                                                <div class="cart-item__cell-actions">
                                                                    <span
                                                                        class="cart-item__unit-price cart-item__unit-price--after js-cart-item-unit-price text-danger">
                                                                        ₫{{ number_format($j->price, 0, ',', '.') }}
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="container ">
                                                <div style="border: none" class="checkout">
                                                    <div style="display: flex; align-items: flex-end" class="cart-info">
                                                        <img style="height:28px" class="mr-3"
                                                            src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/67454c89080444c5997b53109072c9e0.png"
                                                            alt="">
                                                        <div class="cart-title">Tổng số tiền:</div>
                                                        <div style="font-size: 30px; line-height: 100%" class="cart-value">
                                                            ₫{{ number_format($i->total_price, 0, ',', '.') }}</div>
                                                    </div>

                                                </div>
                                                <nav class="navbar">

                                                    <div class="container-fluid justify-content-end">

                                                        <a href="{{ route('purchase.order', ['id'=>$i->id]) }}" class="d-flex btn btn-d" style="border: 1px solid #e5e5e5">Chi
                                                            tiết
                                                            đơn hàng</a>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane  " id="6a">
                    @if (count($dh) < 1)
                        <div style="" class="no-salesinvoice">
                            <div class="no-salesinvoice-content">
                                <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/5fafbb923393b712b96488590b8f781f.png"
                                    alt="">
                                <div class="">Chưa có đơn hàng</div>
                            </div>
                        </div>
                    @else
                        @foreach ($dh as $i)
                            <div class="container-fluid mb-4 ttdh">
                                <nav class="navbar ">
                                    <div class="container-fluid">
                                        <div class=" navbar-brand">ID ĐƠN HÀNG. {{ $i->id }}</div>
                                        @if ($i->deleted_at)
                                            <div class="d-flex">
                                                <div class="status text-uppercase text-danger">Đã hủy</div>
                                            </div>
                                        @endif
                                    </div>
                                </nav>

                                <hr>
                                <div class="tab-pane-title">
                                    <div class=" checkout-form">
                                        <div class="form-product">
                                            @foreach ($i->detailSalesInvoice as $j)
                                                <div class="cart-page-shop-section">
                                                    <div class="cart-page-shop-section__items">
                                                        <div class="cart-item js-product-cart">
                                                            <div class="cart-item__content">
                                                                <div class="cart-item__cell-overview">
                                                                    <a class="cart-item-overview__thumbnail-wrapper"
                                                                        href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}">
                                                                        <img class="cart-item-overview__thumbnail"
                                                                            src="{{ asset('upload/image/product') . '/' . $j->product[0]->image }}"
                                                                            alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="cart-item__flex">
                                                                    <div style="height: 80px"
                                                                        class="cart-item-overview__product-name-wrapper">
                                                                        <a href="{{ route('detail', ['slug' => $j->product[0]->slug]) }}"
                                                                            class="cart-item-overview__name"> Set kem mắt
                                                                            tái
                                                                            sinh Ohui The First Geniture Eye Cream Edition
                                                                            Grand
                                                                            Blue</a>
                                                                        <div class="m-2">x {{ $j->quantity }}</div>
                                                                    </div>

                                                                </div>
                                                                <div class="cart-item__cell-actions">
                                                                    <span
                                                                        class="cart-item__unit-price cart-item__unit-price--after js-cart-item-unit-price text-danger">
                                                                        ₫{{ number_format($j->price, 0, ',', '.') }}
                                                                    </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="container ">
                                                <div style="border: none" class="checkout">
                                                    <div style="display: flex; align-items: flex-end" class="cart-info">
                                                        <img style="height:28px" class="mr-3"
                                                            src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/67454c89080444c5997b53109072c9e0.png"
                                                            alt="">
                                                        <div class="cart-title">Tổng số tiền:</div>
                                                        <div style="font-size: 30px; line-height: 100%" class="cart-value">
                                                            ₫{{ number_format($i->total_price, 0, ',', '.') }}</div>
                                                    </div>

                                                </div>
                                                <nav class="navbar">

                                                    <div class="container-fluid justify-content-end">

                                                        <a href="{{ route('purchase.order', ['id'=>$i->id]) }}" class="d-flex btn btn-d" style="border: 1px solid #e5e5e5">Chi
                                                            tiết
                                                            đơn hàng</a>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>





            </div>
        </div>
    </div>


@stop


@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js "></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js "></script>
    
@stop
