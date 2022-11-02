@extends('admin.admin_master')
@section('css')
<!-- Plugins css -->
<link href="{{ asset('backend') }}/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .content-page {
        margin-left: 240px;
        overflow: hidden;
        padding: 0 15px 65px 15px;
        min-height: 80vh;
        margin-top: 35px;
    }

    .card-footer {
        padding: 0;
    }

    .text-right {
        text-align: right;
    }

    .card-header {
        background-color: #fff;
        border-color: #fff;
        padding: 20px 0;
    }

    .table-responsive.scrollbar {
        overflow-y: scroll;
        margin: 5px;
        padding: 5px;
        position: relative;
        height: 420px;
    }

    .gallery {
        background-color: #85ca9a;
        margin: 6px;
        height: 200px;
        opacity: 1;
        cursor: pointer;
    }

    .gallery .card-header {
        background-color: #85ca9a;
        padding: 0px;
    }

    .gallery .card-body h5 {
        margin: 3px;
    }

    .gallery-scrollbar {
        overflow-y: scroll;
        overflow-x: hidden;
        margin: 5px;
        padding: 5px;
        position: relative;
        height: 425px;
    }

    .modalImg {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        flex-direction: column;
    }

    .modalImg:hover {
        background-color: rgb(219 234 254);
    }

    hr {
        margin: 2px 0;
    }

    .reference {
        border: 3px solid rgb(96 165 250);
    }

    .nav-tabs .nav-link {
        background-color: rgba(229, 231, 235) !important;
        border: 1px solid;
    }

    .modal-content {
        width: 120% !important;
        margin-top: 0px !important;

    }

    .GroupSearch__input {
        width: 550px !important;
        height: 100px !important;
        /* padding: 10px 10px; */
    }

    .scroller {
        width: 300px;
        height: 100px;
        overflow-y: scroll;
        scrollbar-color: rebeccapurple green;
        scrollbar-width: thin;
    }

    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 36px;

    }

    table tr {
        border: 1px solid #d1d1d1;
    }

    .table-wrap-innr table tr:last-child {
        border: 0;
    }

    table {
        font-family: arial, sans-serif;
        border: none;

        width: 100%;
        margin-bottom: 20px;

    }

    table thead tr {
        background: #d1d1d1;
    }

    .pro-name {
        width: 20%;
        padding: 8px 20px;
    }

    td {
        font-size: 14px;
    }

    td,
    th {
        /* border: 1px solid #dddddd; */
        text-align: left;
        padding: 8px;

    }

    tr:nth-child(odd) {

        background: #F3F7F9;



    }

    tr:last-child {
        background: #fff;
    }

    .table-wrap-innr table tr td,
    .table-wrap-innr table tr th {
        text-align: center;
        width: 12.5%;
    }

    .pos-products-table {
        max-height: 58vh;
        overflow-y: auto
    }

    .total-wrap {
        background: #000;
    }

    .price-btn-jfss {
        background: #282828;
        color: #fff;
        text-align: center;
        font-size: 10px;
        padding: 4px 0;
        margin-bottom: 0;
        border-radius: 5px;
    }

    .price-btn-jfss span {
        font-size: 12px;
        margin-bottom: 0;
    }


    .price-btn-jfss h6 {
        font-size: 14px;
        font-weight: 600;
        color: #fff;
        margin: 2px;
    }

    .jfss-btn2 {
        background: #1A65BC;

    }

    .jfss-btn3 {
        background: #018B70;

    }

    .jfss-btn4 {
        background: #FF3838;

    }

    .jfss-btn5 {
        background: #008BAA;
    }

    .jfss-btn6 {
        background: #05A101;
        color: #fff;

    }


    .jfss-btn-clear {
        background: #EAF1F4;
        color: #6C757D;


    }

    .jfss-btn-hold {
        background: #4FC6E1;
        color: #fff;

    }

    .jfss-btn-dis {
        background: #FF9838;
        color: #fff;

    }

    .jfss-btn-order {
        background: #1ABC9C;
        color: #fff;

    }


    .table-img {
        width: 40px;
        height: 40px;
    }

    /* .table-border-innr td{
                                                                            border: none;
                                                                        } */
    .card-footers {
        background: #fff;
    }

    .delete-btn {
        color: red;
    }

    .bgs-none {
        background: #fffff;
    }

    /* .table-striped>tbody>tr:last-child{
                                                                            background: #fff!important;
                                                                        } */

    form {
        /* width: 300px; */
        margin: 0 auto;
        text-align: center;
    }

    .value-button {
        display: inline-block;
        /* border: 1px solid #ddd; */
        margin: 0px;
        width: 26px;
        height: 30px;
        text-align: center;
        vertical-align: middle;
        padding: 5px 0;
        background: #2796E7;
        color: #fff;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .value-button:hover {
        cursor: pointer;
    }

    form #decrease {
        margin-right: -4px;
        border-radius: 3px 0 0 3px;
    }

    form #increase {
        margin-left: -4px;
        border-radius: 0 3px 3px 0;
    }

    form #input-wrap {
        margin: 0px;
        padding: 0px;
    }

    input#number {
        text-align: center;
        border: none;
        /* border-top: 1px solid #ddd;
                                                                  border-bottom: 1px solid #ddd; */
        color: #2B60DE;
        margin: 0px;
        width: 30px;
        height: 31px;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .product-price-btn-jfss {
        display: flex;
        justify-content: end;
        align-items: center;
        flex-wrap: wrap;
        margin-right: 45px;

    }

    .product-price-btn-jfss button {
        margin: 5px 10px;
    }

    .input-grp-bg {
        background: #2796E7;
        color: #fff;
        border: none;
        border-radius: 0 3px 3px 0 !important;
    }

    .input-grp-bg i {
        padding: 10px;
        background: #2796E7;
        color: #fff;
        border: none;
        border-radius: 0 5px 5px 0;
    }

    .jfss-btn,
    .jfss-btn:hover {
        background: #2796E7;
        color: #fff;
    }

    .holdModalContent {
        width: 65% !important;
        border-radius: 10%;
        padding: 35px;
    }

    .holdallproduct {
        width: 90% !important;
    }

    #abc {
        text-align: center;
        border-radius: 0%;
    }

    #select-option {
        border-radius: 0%;
        background-color: #E9ECEF;
        padding-right: 0;
    }

    .input-group-text {
        background-color: #fff !important;
    }

    .billpayment {
        background-color: #47C0B0;
        border-radius: 0 0 8px 8px;
    }

    #cash-modalLabel {
        color: #fff;
    }

    .paments-details {
        text-align: end;
    }

    .payment-body {
        font-size: 18px;
    }

    .bankCardContainer {
        border: 1px solid #CDD3D9;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px 18px;
    }

    .imageContainer {
        border: 1px solid #CDD3D9;
        display: flex;
        justify-content: center;
        width: 100%;
        padding: 5px;
    }

    .imgbody {
        padding: 0 5px;
    }

    #p-method {
        font-size: 22px;
    }

    #tableScroll {
        height: 90vh !important;
    }

    @media(max-width:768px) {
        .table-wrap-innr {
            overflow-x: auto;
        }

        .table-wrapper {
            overflow-x: auto;
        }

    }

    #add__new_customer {
        color: black;
        height: 60px;
        font-size: 30px;
        width: 765px;

    }

    /* shuvo nested modal ccsStyle start 7145 */
    .billpayment {
        background-color: #38414a;
        border-radius: 0;
    }

    .location_card {
        background: #F8F8F8;
        box-sizing: border-box;
        padding: 15px;
        font-family: 'Nunito';
        font-weight: 500;
        font-size: 15px;
        line-height: 5px;
    }

    .location_card h4 {
        color: gray
    }

    .addressChangeInput {
        width: 94%;
        margin: auto;
    }

    .deliveryInfo {
        margin: 30px 0px;
        line-height: 0.5px;
    }

    .proceedBtn {
        border: none;
        font-size: 15px;
        background: #4ed2b7;
        height: 45px;
        width: 200px;
        color: #FFFFFF;
        transition: all 0.3s;
    }

    .proceedBtn:hover {
        background: #1abc9c;
    }

    .proceedBtn:hover .proceedPrice {
        background: #4ed2b7;
    }

    .proceedPrice {
        background: #1abc9c;
        height: 45px;
        position: absolute;
        margin-top: -11px;
        width: 100px;
        padding: 0px 30px;
        padding-top: 14px;
        color: #FFFFFF;
        margin-left: 50px;
        transition: all 0.3s;
        font-size: 10px;
    }



    .proceedPrice:hover {
        background: #4ed2b7;
    }

    .modalSaveAddress {
        background: #4ed2b7;
    }

    .modalSaveAddress:hover {
        background: #1abc9c;
    }

    /* shuvo modalbody ccsStyle end*/
    /* extra needed css start */
    .main-content {
        margin-left: 0px !important;
    }

    .bottom-border {
        border-bottom: 1px solid rgb(192, 188, 188);
    }

    .checkout-form-wrap .checkout-form-inner .checkout-product-inner-cont {
        border-bottom: none;
    }

    .deliver-add-wrapper {
        background: #FFFFFF;
        border: 1px solid #DEE2E6;
        box-sizing: border-box;
        border-radius: 5px;
        width: 100%
    }

    .deliver-add-wrapper .location_card {
        background: #F8F8F8;
        border-bottom: 1px solid #DEE2E6;
        box-sizing: border-box;
        border-radius: 5px;
        padding: 15px;
        font-family: 'Nunito';
        font-weight: 700;
        font-size: 16px;
        line-height: 22px;
        color: #4B4B4B;
    }

    .deliver-add-wrapper .add_addres {
        margin: 20px 30px;
    }

    .deliver-add-wrapper .add_addres button {
        width: 100%
    }

    .label_name {
        font-weight: bold;
        font-size: 14px;
    }

    /* .btn {

        padding-right: 6rem;
        padding-left: 5rem;

    }

    .btn button {
        text-align: center;
        color: #FFFFFF
    } */

    .btn2 {
        background-color: #6ce65a;
    }




    .disabled-btn {
        color: rgb(124, 124, 124) !important;
        background-color: #cdcdcd;
        pointer-events: none;
    }

    /* new css start */

    .btn-container,
    .btn-container2 {
        margin-bottom: 20px;
        max-width: 175px;
    }

    .select-btn,
    .select-btn2 {
        position: relative;
        background: none;
        border: none;
        outline: none;
        font-size: 16px;
        border: 2px solid #DEE2E6;
        padding: 12px;
        min-width: 157px;
        text-align: left;
        outline: none;
        cursor: pointer;
        z-index: 2;
    }

    .select-btn2 {
        min-width: 215px;
    }

    .select-btn:after,
    .select-btn2::after {
        content: "\f107";
        font-family: FontAwesome;
        position: absolute;
        padding: 13px 0px;
        top: 0px;
        right: 0px;
        margin-top: 0px;
        color: #ababab;
        height: 100%;
        width: 30px;
        text-align: center;
    }

    .select-btn:hover,
    .select-btn2:hover {
        background-color: #fdd274;
    }

    .select-btn:hover:after,
    .select-btn2:hover:after {
        background-color: #e99f10;
        color: #fff;
        width: 30px;
    }

    .dropdown,
    .dropdown2 {
        position: relative;
    }

    .dropdown-options,
    .dropdown-options2 {
        list-style: none;
        margin: 0;
        padding: 0;
        background: #fff;
        box-shadow: 0 2px 4px #888888;
        display: inline-block;
        position: absolute;
        left: 0;
        bottom: -80px;
        display: none;
        transform: scale(0.8) translate3d(-20px, 0px, 0);
        transform-origin: 0 100%;
        z-index: 1;

    }

    .dropdown-options2 {
        bottom: -270px;
    }

    .dropdown-options.open {
        display: block;
        transform: scale(1) translate3d(0, 0, 0);
        z-index: 5;
        display: inline-flex;
    }

    .dropdown-options2.open2 {
        display: block;
        transform: scale(1) translate3d(0, 0, 0);
        z-index: 5;
        width: 300px;
    }

    .dropdown-options.open .option,
    .dropdown-options2.open2 .option2 {
        width: 80px;
        height: 100%;
        text-align: center;
    }

    .dropdown-options2.open2 .option2 {
        width: 132px;
    }

    .dropdown-options.open .option:hover,
    .dropdown-options2.open2 .option2:hover {
        background-color: #e99f10;
        color: #fff;
        /**/
    }

    .dropdown-options.open .option .link:active,
    .dropdown-options2.open2 .option2 .link2:active {
        color: #fff;
        background-color: ;
    }

    .dropdown-options li {
        display: inline-block;
    }

    .dropdown-options2 li {
        display: block;
    }

    .dropdown-options a,
    .dropdown-options2 a {
        text-decoration: none;
        display: inline-block;
        padding: 10px 7px;
        color: #000;
    }

    .dropdown-options2 a {
        display: flex;
        padding: 6px 7px;
    }

    .dropdown-options a:hover,
    .dropdown-options2 a:hover {
        color: #fff;
    }

    .dropdown-options a:active,
    .dropdown-options2 a:active {
        color: #4B4B4B;
        background-color: #ff686e;
    }

    .dropdown-options::after,
    .dropdown-options2::after {
        content: '';
        position: absolute;
        bottom: 100%;
        width: 0;
        height: 0;
        left: 40px;
        border-bottom: 5px solid #000;
        border-right: 5px solid transparent;
        border-left: 5px solid transparent;
    }

    .paymentoption-left {
        float: left;
    }

    .paymentoption-left h4 {
        left: 0%;
        right: -9%;
        top: 0%;
        bottom: 75%;
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 600;
        font-size: 23px;
        line-height: 34px;
        /* identical to box height */
        color: #6C757D;
        margin-top: 20px;

    }

    .paymentoption-left .form-check .form-check-label {
        left: 11%;
        right: 20%;
        top: 36%;
        bottom: 46%;
        font-family: 'Nunito';
        font-style: normal;
        font-weight: 400;
        font-size: 17px;
        line-height: 24px;
        /* identical to box height */
        color: #6C757D;
    }

    .btn-right {
        float: right;
        margin-top: 200px;
    }

    .btn-right .proceed {
        padding: 0;
        line-height: 50px;
        align-self: flex-start;
        margin-right: 5px;
        margin-bottom: 0px;
        margin-left: auto;
        width: 300px;
        background-color: #fc5f00c2;
        border: 0;
        border-radius: 0px;
    }

    .btn-right .proceed .text {
        float: left;
        height: 100%;
        width: 60%;
        text-align: center;
        padding-left: 30px;
    }

    .btn-right .proceed .price {
        background: #D66826;
        float: right;
        height: 100%;
        width: 40%;
        margin-right: -5px;
    }

    .btn-right a {
        color: #D66826;
        font-weight: 700;
    }

    .form-check-input:checked {
        background-color: #D66826;
        border-color: #D66826;
    }

    .select_address {
        cursor: pointer;
    }

    .this_btn {
        display: flex;
        justify-content: end;
    }



    .map_design {
        height: 150px;
        width: 450px;
        border: 0px;
        border-radius: 20px;
    }


    @media(max-width: 767px) {
        .dropdown-options.open {
            display: inline-block;
            width: 167px;
        }

        .dropdown-options2.open2 {
            width: 261px;
        }

        .dropdown-options {
            bottom: -196px;
        }

        .dropdown-options2 {
            bottom: -272px;
        }

        .btn-container,
        .btn-container2 {
            max-width: 232px;
        }

        .select-btn2 {
            min-width: 183px;
        }

        .custext {
            display: inline;
        }

        .btn-right {
            float: right;
            margin-top: 18px;
        }

        .this_btn {
            display: flex;
            justify-content: start;
        }



        .btn-right .proceed {
            margin-left: 0px;
            margin: auto;
        }

        #change_address {

            margin: auto;
        }


        .btn {
            padding-right: 3rem;
            padding-left: 2rem;
        }

        .map_design {

            width: 265px;

        }

    }

    .modal-content {
        margin-top: 150px;
    }


    /* extra needed css end */
    /* new */
    .payment_get {
        display: flex;

    }

    #overlay_background {
        -webkit-transform: scale(1);
        transform: scale(1);
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        opacity: 1;
        z-index: 1;
        -webkit-transition: opacity .3s linear;
        transition: opacity .3s linear;
        border-radius: 5px;
    }
    .links nav{
        float: right;
    }


</style>
@endsection
@section('main-content')

<div class="content">
    <div class="container-fluid">
        {{-- 1212 --}}
        <div class="row " style="padding-top: 45px">

            <div class="col-lg-7 border border-1">
                <div class="input-group" style="display: flex!important; flex-wrap: nowrap; ">
                    <div>
                        <select class="form-control customer_id" id="add__new_customer">
                            <option value="0">Select a customer</option>
                            @foreach ($customers as $item)
                            <option value="{{ $item->id }}">{{ $item->customer_id }} - {{ $item->name }} {{ $item->mobile }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="font-size: 48px">
                        @php $vats = App\Models\Product::all(); @endphp
                        <span class="pointer" data-bs-toggle="modal" data-bs-target="#customer-modal" title="New Customer?">
                            <i class="fas fa-user-plus"></i> </span>
                    </div>
                </div>
            </div>
        </div>
        <!--row end-->

        <!--=============================== 2nd section start-->
        <div class="row mt-4">
            <div class="col-lg-7 col-md-7 col-sm-12 bg-white ">
                <div class="col-11">
                    <input type="text" name="product_search" class="form-control" id="product_search" placeholder="Search Product .." onkeyup="product_search()">

                </div>

                <!-- ============ new product cart design start===============-->

                <div class="row category_item" id="category_item">
                    @foreach ($products as $item)
                    @if ($item->product_qty <=0) <div class="col-md-6 col-lg-4 col-xl-3">

                        <div class="card product-box card23">



                            <div class="card-body">


                                @if($item->product_thambnail == NULL)


                                <div class="bg-light ">

                                    <img src="{{ url(isset($item->product_thambnail) ? $item->product_thambnail : 'null') }}" alt="product-pic" class="img-fluid card-img-top">

                                </div>
                                @else
                                <div class="bg-light ">

                                    <img src="{{ url(isset($item->product_thambnail) ? $item->product_thambnail : 'null') }}" alt="product-pic" class="img-fluid ">

                                </div>

                                @endif
                                <div class="product-info">
                                    <div class="row align-items-center">
                                        <div id="overlay_background">
                                            <button class="overlay-add-to-bag" disabled>
                                                <div class="text-danger">
                                                    Stock Out
                                                </div>
                                            </button>
                                        </div>


                                        <div class="col">
                                            <h5 class="font-16 mt-0 "><a href="ecommerce-product-detail.html" class="text-dark">{{ optional($item)->product_name }}</a> </h5>


                                            <h5 class="m-0"> <span class="text-muted"> Stocks : {{ optional($item)->product_qty?$item->product_qty:'' }}</span></h5>
                                        </div>
                                        <div class="col-auto">



                                            @if($item->unit == null ||$item->unit == 'null' )


                                            <p></p>
                                            @else
                                            <p>{{ optional($item)->unit }}</p>

                                            @endif


                                            @if($item->discount_price == 0)

                                            <div class="product-price-tag"> &#2547 {{ intval(optional($item)->selling_price) }} </div>
                                            @else

                                            <div class="product-price-tag"> &#2547 {{ intval(optional($item)->discount_price) }}
                                                <del class="text-danger">&#2547 {{ intval(optional($item)->selling_price) }}</del>
                                            </div>
                                            @endif
                                        </div>

                                        <button class="btn btn-danger" width="50%" onclick="AddProduct({{$item->id }})">Stock Out</button>


                                    </div> <!-- end row -->
                                </div> <!-- end product info-->
                            </div>
                        </div> <!-- end card-->
                </div> <!-- end col-->
                {{-- </div> --}}

                @else
                <div class="col-md-6 col-lg-4 col-xl-3">

                    <div class="card product-box card23">


                        <div class="card-body">
                            @if($item->product_thambnail == NULL)


                            <div class="bg-light ">

                                <img src="{{ url(isset($item->product_thambnail) ? $item->product_thambnail : 'null') }}" alt="product-pic" class="img-fluid card-img-top">

                            </div>
                            @else
                            <div class="bg-light ">

                                <img src="{{ url(isset($item->product_thambnail) ? $item->product_thambnail : 'null') }}" alt="product-pic" class="img-fluid ">

                            </div>

                            @endif
                            <div class="product-info">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="font-16 mt-0 "><a href="ecommerce-product-detail.html" class="text-dark">{{ optional($item)->product_name }}</a> </h5>

                                        <h5 class="m-0"> <span class="text-muted"> Stocks : {{ optional($item)->product_qty?$item->product_qty:'' }}</span></h5>

                                    </div>
                                    <div class="col-auto">
                                        @if($item->unit == null ||$item->unit == 'null' )


                                        <p></p>
                                        @else
                                        <p>{{ optional($item)->unit }}</p>
                                        @endif
                                        @if($item->discount_price == 0)

                                        <div class="product-price-tag"> &#2547 {{ intval(optional($item)->selling_price) }} </div>
                                        @else

                                        <div class="product-price-tag"> &#2547 {{ intval(optional($item)->discount_price) }}
                                            <del class="text-danger">&#2547 {{ intval(optional($item)->selling_price) }}</del>
                                        </div>
                                        @endif
                                    </div>

                                    <button class="btn btn-success" width="50%" onclick="AddProduct({{$item->id }})">add to cart</button>


                                </div> <!-- end row -->
                            </div> <!-- end product info-->
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col-->


                @endif


                @endforeach

            </div>
            <div class="links" class="style:margin-left:1000px;">
                {{ $products->links() }}

            </div>

            <!-- ==============  new product cart design end==========-->
        </div>
        <div class="col-lg-5 col-md-5 " style="margin-top: -125px">
            <div class="row">
                <div class="col-12">
                    <div class="table-wrap-innr" style="width:auto;overflow:auto; margin-top:15px;">
                        <div class="pos-products-table">
                            <table id="gettable">

                                <thead>
                                    <tr style="height: 56px;">
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Qty</th>
                                        <th> Grand Total </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody id="product_table">
                                </tbody>
                            </table>
                        </div>
                        <table class="mt-3">
                            <tr>

                                <td>
                                    <div class="total-wrap price-btn-jfss">
                                        <span> Total QTY</h6>
                                            <h6 id="tot_qty">0</h6>
                                    </div>
                                </td>

                                <td>
                                    <div class="total-wrap price-btn-jfss jfss-btn6">
                                        <span> Grand Total</h6>
                                            <h6 id="grand_total"> &#2547 0 </h6>
                                    </div>
                                </td>

                            </tr>

                        </table>

                        <div class="product-price-btn-jfss ml  flex-end">



                            <button type="button" class="btn jfss-btn-clear btn-block btn-md waves-effect width-md btn-lg waves-light mb-2 " onclick="ClearCart()">
                                Clear</button></i>

                            <button type="button" class="btn jfss-btn-order  btn-block btn-md waves-effect width-md btn-lg waves-light mb-2" data-bs-toggle="modal" data-bs-target="#cash-modal" onclick="placeOrder()">
                                Place Order</button>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="HoldModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content holdModalContent">
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <img src="{{ asset('upload/hold.png') }}" style="height: 192px;width:172px;cursor: pointer;" alt="Hold order" onclick="payDelivary()">
                    <h3 style="text-align: center;margin-top:15px;">Pick-Up</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="padding: 20px;border-radius:10px;">
            <h3>Hold Order</h3>
            <h2 class="text-center" id="total_hold"></h2>
            <p>Note :</p>
            <input type="text" class="form-control" name="note" id="reference_id">
            <div class="d-flex justify-content-end mt-3">
                <a href="" class="btn btn-secondary" style="padding:10px 20px;" onclick="cancelHold()">Cancel</a>
                <button type="button" class="btn btn-success" style="padding:10px 20px;margin-left:5px;" onclick="confirmHold()">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Customer Modal Start 8899-->
<div id="customer-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="customer-modalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="customer-modalLabel">Add Customer</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="customerdatasubmit">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="customer-name" class="form-label">Customer Name</label>
                                <input class="form-control" name="name" type="text" id="customer-name">
                                <span class="errorColor" id="er_name"></span>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input class="form-control" name="mobile" type="text" id="customer-phone" value="+88">
                                <span class="errorColor" id="er_mobile"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" name="email" type="text" id="customer-email">
                                <span class="errorColor" id="er_email"></span>

                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="customer-address" class="form-label">Address</label>
                                <textarea class="form-control" placeholder="Enter customer address....." style="height: 100px" name="address"></textarea>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" value="Submit">Submit</button>

                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Add Customer Modal End -->
<!-- Cash Modal Start -->
<div id="cash-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cash-modalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">

        <div class="modal-content">
            <div class="modal fade" id="exampleModal_customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                        <div class="modal-header alert alert-success">
                            <h5 class="modal-title" id="exampleModalLabel">New Address</h5>
                            <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="addaddress">
                            <div class="modal-body">
                                <div class="mb-1">
                                    <label for="exampleFormControlTextarea1" class="form-label">Street Address <b class="text-danger">*</b></label>
                                    <textarea class="form-control" name="street_address" id="exampleFormControlTextarea1" rows="1"></textarea>

                                    <small style="color:#BD6310">76 New Gulbadan Super Mrket, 5 Moulvi Bazar, Dhaka</small>
                                    <small id="street_address" style="color:red"></small>

                                </div>
                                <div>
                                    <label class="label_name" for="">District Select <b class="text-danger">*</b>
                                    </label>
                                    <select class="form-select form-select-lg mb-1" name="district_id" id="cdistrict_id" aria-label=".form-select-lg example">

                                        <option value selected disabled>Select</option>
                                        @foreach ($district as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <small id="new_district_id" style="color:red"></small>

                                </div>
                                <div>
                                    <label class="label_name" for="">Area/Thana <b class="text-danger">*</b>
                                    </label>
                                    <select class="form-select form-select-lg mb-1" name="thana_id" id="cstate_id" aria-label=".form-select-lg example">
                                        <option value selected disabled>Select</option>
                                    </select>
                                    <small id="thana_id" style="color:red"></small>

                                </div>
                                <div class="d-flex justify-content-between ">
                                    <div>
                                        <div class="mb-1">
                                            <label for="exampleFormControlInput1" class="form-label">Floor No</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="e.g 1,2" name="floor_no">

                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-1">
                                            <label for="exampleFormControlInput1" class="form-label">Apartment No</label>
                                            <input type="text" name="appartment_no" class="form-control" id="exampleFormControlInput1" placeholder="example#2-A,3-B">

                                        </div>
                                    </div>
                                </div>
                                <div class="my-1">
                                    <label class="label_name" for="">Name <b class="text-danger">*</b></label>
                                    <input type="text" class="form-control " name="name" id="user_name" value="">

                                    <small id="name_error" style="color:red"></small>

                                </div>
                                <div>
                                    <label class="label_name" for="">Phone Number <b class="text-danger">*</b></label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">+88</span>
                                        <input type="text" class="form-control" id="user_phone" value="" type="text" name="phone_no" placeholder="e.g +8801611815656">
                                        <div class="invalid-feedback">
                                            Please Enter Your Phone Number.
                                        </div>

                                    </div>
                                    <small id="phone_no" style="color:red"></small>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="saveBtn btn2 btn add_btn" style="background-color:#fc5f00c2"> SAVE ADDRESS </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <div class="modal-header billpayment">
                <h1 class="modal-title w-100 text-center" id="cash-modalLabel">Customer Address & Order Date Time Set
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="final_order_confirm">

                <!-- nested popup modal end 7145-->


                <div class="location_card">
                    <h4><i class="fa-solid fa-location-dot pe-2"></i> Select a Delivery Address <span class="text-danger">**</span></h4>
                </div>

                <!-- nested popup modal start 7145-->
                <button type="button" style="width:100%" class="btn btn-outline-secondary mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal_customer" data-bs-dismiss="modal">+ Add Address</button>
                {{-- <form id="final_order_confirm"> --}}
                <div class="row" id="customeraddress">


                </div>
                <input type="hidden" id="deliveryDate" name="deliveryDate">
                <input type="hidden" id="deliveryTime" name="deliveryTime">
                <div class="deliver-add-wrapper mt-3">
                    <div class="location_card">
                        <h4><i class="fa-solid fa-clock pe-2"></i> Preferred Delivery Time</h4>
                    </div>
                    <div class="row d-flex justify-content-center m-3">
                        <p style="display: flex; justify-content: center;"><i class="fas fa-shipping-fast" style="margin: 2px 5px;"></i>When would you like your Express Delivery</p>
                        <!-- first custom selector -->
                        <div class="btn-container dropdown">
                            <button class="select-btn">Select</button>
                            <ul name="preferred_date" class="dropdown-options">
                                @foreach ($dates as $date)

                                @if($loop->first)
                                <li class="option">
                                    <a class="link DateField" href="#" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}">Today <br> {{ \Carbon\Carbon::createFromFormat('m/d/Y', $date)->format('F d') }}</a>
                                </li>
                                @elseif($loop->iteration == 2)
                                <li class="option">
                                    <a class="link DateField" href="#" value="{{ \Carbon\Carbon::tomorrow()->format('d-m-Y') }}">Tomorrow <br> {{ \Carbon\Carbon::createFromFormat('m/d/Y', $date)->format('F d') }} </a>
                                </li>
                                @else
                                <li class="option">
                                    <a class="link DateField" href="#" value="{{ \Carbon\Carbon::createFromFormat('m/d/Y', $date)->format('d-m-Y') }}">{{ \Carbon\Carbon::createFromFormat('m/d/Y', $date)->format('l') }} <br> {{ \Carbon\Carbon::createFromFormat('m/d/Y', $date)->format('F d') }}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>

                        </div>
                        <!-- second custom selector -->
                        <div class="btn-container2 dropdown2">
                            <button class="select-btn2">Select</button>
                            <ul name="preferred_time" class="dropdown-options2" id="dropdownTimeSlot">
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="location_card text-center">
                    <p>Grocery Product Delivery within 3 Hours</p>
                    <p>Others Items Delivery within 2-4 Days</p>
                </div>


                {{-- shuvo end body design 7145 --}}


                <div class="container modal-body">
                    <div class="container payment_get" id="pament-method">
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="m-1" id="p-method">Payment Method</p>
                            <div class="form-check m-1">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Cash On Delivery" checked>
                                <label class="form-check-label" for="inlineRadio1">Cash On Delivery</label>
                            </div>

                            <div class="form-check m-1">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Bank/Card">
                                <label class="form-check-label" for="inlineRadio2">Bank/Card</label>
                            </div>
                            <div class="form-check m-1">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Mobile Banking">
                                <label class="form-check-label" for="inlineRadio3">Mobile Banking</label>
                            </div>

                        </div>
                    </div>
                    <!--Pament Method Single BankCard Input Start-->
                    <div class="container pt-1 mastercard d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/mastercard.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 visacard d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/visa.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 americanexpress d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/americanexpress.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 unionpay d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/unionpay.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 easternbank d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/easternbank.png    ') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 ucbbank d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/ucbbank.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 islamibank d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/islamibank.jpg') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 bracbank d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/bracbank.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <!--Pament Method Single BankCard Input End-->

                    <!--Pament Method Single MobileBankingCard Input Start-->
                    <div class="container pt-1 bkash d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/bkash-logo.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 rocket d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/rocket-logo.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 upai d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/upai-logo.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 nagad d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/nagad-logo.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 surecash d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/surecash-logo.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 t-cash d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/t-cash-logo.jpg') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 my-cash d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/mycash-logo.png') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 mtb d-none">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text"><img src="{{ asset('backend/images/mtb-logo.jpg') }}" alt=""></span>
                                <input type="text" aria-label="First name" class="form-control" placeholder="Last 4 Digit">
                                <input type="text" aria-label="Last name" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                    </div>
                    <!--Pament Method Single MobileBankingCard Input End-->

                    <div class="container pt-1 bankCard-op detaile d-none" for="inlineRadio2" id="bankCardOption">
                        <div class="bankCardContainer col-md-7">
                            <div class="row">
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer mb-2">
                                        <img class="img-fluid" src="{{ asset('backend/images/mastercard.png') }}" alt="bankcardimg1">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer mb-2">
                                        <img class="img-fluid" src="{{ asset('backend/images/visa.png') }}" alt="bankcardimg2">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer mb-2">
                                        <img class="img-fluid" src="{{ asset('backend/images/americanexpress.png') }}" alt="bankcardimg3">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer mb-2">
                                        <img class="img-fluid" src="{{ asset('backend/images/unionpay.png') }}" alt="bankcardimg4">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer">
                                        <img class="img-fluid" src="{{ asset('backend/images/easternbank.png') }}" alt="bankcardimg5">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer">
                                        <img class="img-fluid" src="{{ asset('backend/images/ucbbank.png') }}" alt="bankcardimg6">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer">
                                        <img class="img-fluid" src="{{ asset('backend/images/islamibank.jpg') }}" alt="bankcardimg7">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer">
                                        <img class="img-fluid" src="{{ asset('backend/images/bracbank.png') }}" alt="bankcardimg8">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container pt-1 mobilebank-op detaile d-none" for="inlineRadio3" id="mobilebankingOption">
                        <div class="bankCardContainer col-md-7">
                            <div class="row">
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer mb-2">
                                        <img class="img-fluid" src="{{ asset('backend/images/bkash-logo.png') }}" alt="mobilebankimg1">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer mb-2">
                                        <img class="img-fluid" src="{{ asset('backend/images/rocket-logo.png') }}" alt="mobilebankimg2">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer mb-2">
                                        <img class="img-fluid" src="{{ asset('backend/images/upai-logo.png') }}" alt="mobilebankimg3">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer mb-2">
                                        <img class="img-fluid" src="{{ asset('backend/images/nagad-logo.png') }}" alt="mobilebankimg4">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer">
                                        <img class="img-fluid" src="{{ asset('backend/images/surecash-logo.png') }}" alt="mobilebankimg5">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer">
                                        <img class="img-fluid" src="{{ asset('backend/images/t-cash-logo.jpg') }}" alt="mobilebankimg6">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer">
                                        <img class="img-fluid" src="{{ asset('backend/images/mycash-logo.png') }}" alt="mobilebankimg7">
                                    </div>
                                </div>
                                <div class="col-md-3 imgbody">
                                    <div class="imageContainer">
                                        <img class="img-fluid" src="{{ asset('backend/images/mtb-logo.jpg') }}" alt="mobilebankimg8">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--Pament Method Input End-->
                    <div>
                        <div class="deliveryInfo">
                            <p> Delivery charge <span class="fw-bold">৳ 50.00</span> included for Dhaka City Corporation
                            </p>
                            <p> Delivery charge <span class="fw-bold">৳ 120.00</span> included for Outside Dhaka</p>
                        </div>
                        {{-- 7145 --}}
                        <div class="text-center">
                            <button type="submit" class="proceedBtn">Proceed<span class="proceedPrice" style="font-size:12px;" name="delivery_charge">Charge</span></button>
                            <p class="mt-1">By clicking/tapping proceed, I agree to BPP SHOPS Ecommerce <a href="https://bppshops.com/terms&amp;condition">Terms of Services</a></p>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
        {{-- </form> --}}
    </div>
    <!-- Cash Modal End -->

    {{-- shuvo nested modal end 7145 --}}

    <!-- Cash Modal Start -->
    <div id="discount-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="discount-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="cash-modalLabel">Discount Model</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <h5>Discount Type</h5>
                                    <div class="col-lg-3" style="padding: 0;">
                                        <select class="form-select" aria-label="Default select example" id="select-option">
                                            <option selected disabled>Discount Type</option>
                                            <option value="taka">Taka (&#2547;)</option>
                                            <option value="percentage">Percentage (%)</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-9" id="input-details" style="padding: 0;">
                                        <div class="input-group taka details">
                                            <input id="taka" type="text" class="form-control" placeholder="Taka">
                                        </div>
                                        <div class="input-group mb-3 percentage details datachange d-none">
                                            <input id="Percentage" type="text" onkeyup="discounts_show()" class="form-control" placeholder="%">
                                            <div class="input-group-text">
                                                Discount Amount
                                            </div>
                                            <input id="discount_show" type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-light modal-close" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="SaveDiscount()">Save</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Cash Modal End -->

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content" style="width:130%!important;height:90%!important;top:5%;">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalScrollableTitle">Orders</h3>
                </div>
                <div class="modal-body">
                    <p>
                        <ul class="nav nav-tabs" style="border-bottom: 0px;" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true" style="background-color:#1ABC9C!important;color:white;border-radius: 5px;padding: 10px 25px;">On
                                    Hold</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            </div>
                        </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light modal-close" style="padding: 12px 25px;" data-bs-dismiss="modal"><b>Close</b></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="productItem" tabindex="-1" role="dialog" aria-labelledby="productItemLabel" aria-hidden="true">
        <div class="modal-dialog" style="top: 10%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productItemLabel">Hold Items</h5>
                </div>
                <div class="modal-body" id="ProductInfo">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light holdModalOrder modal-close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


{{-- for toaster --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<!-- Toastr cdn  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{{-- alada --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- alada --}}



{{-- for submitting xcustomer data start --}}
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //Add Submit
        $(document).on('submit', '#customerdatasubmit', function(e) {

            e.preventDefault();
            console.log("good");
            let formData = new FormData($('#customerdatasubmit')[0]);

            $.ajax({
                type: "POST"
                , url: `/{{ config('fortify.guard') }}/agent/customer/data/add`

                , data: formData
                , contentType: false
                , processData: false
                , success: function(response) {
                    if (response.status == 400) {
                        console.log(response);
                        $('#er_name').text(response.errors.name);
                        $('#er_mobile').text(response.errors.mobile);
                        $('#er_email').text(response.errors.email);

                    } else {
                        toastr.success(response.message);
                        location.reload();
                        $('#customer-modal').modal('hide');

                    }
                }
            });
        });
    });

</script>


{{-- for submitting customer data end --}}

{{-- for getting delivery charge data 1232start--}}
<script>
    $(document).on('click', '#cdistrict_id', function() {

        var selected_district = $('#cdistrict_id').find(":selected").val();
        if (selected_district == 1 || selected_district == 2) {
            $('.proceedPrice').text('50');

        } else {
            $('.proceedPrice').text('120');

        }






    });

</script>
{{-- for getting delivery charge data end--}}





{{-------------------------- for showing user data in customer address---------------------------------- --}}

<script>
    // for editing data using ajax
    $(document).on('click', '.customer_id', function() {

        var user_id = $('#add__new_customer').find(":selected").val();
        console.log(user_id);
        console.log("okk");
        $.ajax({
            type: "GET"
            , url: `/{{ config('fortify.guard') }}/agent/user/data/get/${user_id}`

            , success: function(response) {
                console.log(response);
                let slicedata = response.user.mobile.slice(3, 14);
                $('#user_name').val(response.user.name);
                $('#user_phone').val(slicedata);

            }
            // }
        })
    });

</script>
{{-------------------------- for showing user data in customer address end ------------------------------------}}



{{-- for delivery time and date start --}}
<script>
    function checkoutDate(date) {
        $("#deliveryDate").val(date);
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        const todayStr = dd + '-' + mm + '-' + yyyy;
        var hours = today.getHours();




        console.log(hours);

        if (date == todayStr) {
            const timeHTML = `
     <div class="col-6 left" id="timeConatainer" style="float: left; border-right: 1px solid #DEE2E6;">
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 8)?'disabled-btn':''}" href="#">8:00 AM - 9:00 AM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 9)?'disabled-btn':''}" href="#">9:00 AM - 10:00 AM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 10)?'disabled-btn':''}" href="#">10:00 AM - 11:00 AM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 11)?'disabled-btn':''}" href="#">11:00 AM - 12:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 12)?'disabled-btn':''}" href="#">12:00 PM - 1:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 13)?'disabled-btn':''}" href="#">1:00 PM - 2:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 14)?'disabled-btn':''}" href="#">2:00 PM - 3:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 15)?'disabled-btn':''}" href="#">3:00 PM - 4:00 PM</a>
         </li>
     </div>
     <div class="col-6 right" style="float: right;">
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 16)?'disabled-btn':''}" href="#">4:00 PM - 5:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 17)?'disabled-btn':''}" href="#">5:00 PM - 6:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 18)?'disabled-btn':''}" href="#">6:00 PM - 7:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 19)?'disabled-btn':''}" href="#">7:00 PM - 8:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 20)?'disabled-btn':''}" href="#">8:00 PM - 9:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 21)?'disabled-btn':''}" href="#">9:00 PM - 10:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2 ${(hours > 22)?'disabled-btn':''}" href="#">10:00 PM - 11:00 PM</a>
         </li>
     </div>
     `;
            $('#dropdownTimeSlot').html(timeHTML);
        } else {
            const timeHTML = `
     <div class="col-6 left" id="timeConatainer" style="float: left; border-right: 1px solid #DEE2E6;">
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">8:00 AM - 9:00 AM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">9:00 AM - 10:00 AM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">10:00 AM - 11:00 AM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">11:00 AM - 12:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">12:00 PM - 1:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">1:00 PM - 2:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">2:00 PM - 3:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">3:00 PM - 4:00 PM</a>
         </li>
     </div>
     <div class="col-6 right" style="float: right;">
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">4:00 PM - 5:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">5:00 PM - 6:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">6:00 PM - 7:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">7:00 PM - 8:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">8:00 PM - 9:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">9:00 PM - 10:00 PM</a>
         </li>
         <li class="option2">
             <a onclick="timeOnClick(this)" class="link2" href="#">10:00 PM - 11:00 PM</a>
         </li>
     </div>
     `;

            $('#dropdownTimeSlot').html(timeHTML);
        }
    }

    function checkoutTime(time) {


        $("#deliveryTime").val(time);
    }



    $(document).ready(function() {
        $('#change').click(function() {
            $(".deliveryForm").removeClass("d-none");
            $(".addForm").addClass("d-none");
        });
    });

</script>
<script>
    var dropdownTwo = document.querySelector(".dropdown-options2");
    var selectTwoBtn = document.querySelector(".select-btn2");
    // day button js
    (function() {
        var btn = document.querySelector(".select-btn");
        var dropdown = document.querySelector(".dropdown-options");
        var optionLinks = document.querySelectorAll(".link");
        console.log(optionLinks);

        btn.addEventListener("click", function(e) {
            e.preventDefault();
            dropdown.classList.toggle("open");
        });

        var clickFn = function(e) {
            e.preventDefault();
            dropdown.classList.remove("open");
            btn.innerHTML = this.text;
            //   checkoutDate(btn.innerText); new add
            checkoutDate(this.getAttribute('value'));
            var activeLink = document.querySelector(".option .active")
            if (activeLink) {
                activeLink.classList.remove("active");
            }
            this.classList.add("active");
        }
        for (var i = 0; i < optionLinks.length; i++) {
            optionLinks[i].addEventListener("mousedown", clickFn, false);
        }
    })();

    //  time button js
    (function() {
        var btn = document.querySelector(".select-btn2");
        var dropdown = document.querySelector(".dropdown-options2");
        var optionLinks = document.querySelectorAll(".link2");
        console.log(optionLinks);
        btn.addEventListener("click", function(e) {
            e.preventDefault();
            // console.log("btn2");
            dropdown.classList.toggle("open2");
        });

        var clickFn = function(e) {
            e.preventDefault();
            dropdown.classList.remove("open2");
            btn.innerHTML = this.text;
            checkoutTime(btn.innerText);

            var activeLink = document.querySelector(".option2 .active")
            if (activeLink) {
                activeLink.classList.remove("active");
            }
            this.classList.add("active");
        }
        for (var i = 0; i < optionLinks.length; i++) {
            optionLinks[i].addEventListener("mousedown", clickFn, false);
        }
    })();

    function timeOnClick(element) {
        dropdownTwo.classList.remove("open2");
        selectTwoBtn.innerHTML = element.text;
        checkoutTime(element.text);
    };

</script>

{{-- for delivery time and date end --}}
<script>
    let addAddress = document.getElementById('addaddress');
    addAddress.addEventListener('submit', function(e) {

        e.preventDefault();
        var user_id = $('#add__new_customer').find(":selected").val();
        let formData = new FormData($('#addaddress')[0]);
        formData.append("user_id", user_id);

        $.ajax({
            type: 'post'
            , url: `/{{ config('fortify.guard') }}/agent/checkout/store/get`
            , data: formData
            , contentType: false
            , processData: false
            , success: function(response) {
                console.log(response);
                if (response.status == 400) {
                    $('#street_address').text(response.errors.street_address);
                    $('#new_district_id').text(response.errors.district_id);
                    $('#thana_id').text(response.errors.thana_id);
                    $('#error_name').text(response.errors.name);
                    $('#phone_no').text(response.errors.phone_no);

                } else if (response.status == 200) {

                    toastr.success(response.message);
                    console.log(response.message);
                    $('#customeraddress').append(`
                    <div class="add_addres">

                       <input type="hidden" style="width:100%" name="district_id" value="${response.address.district_id}" />
                         <input type="hidden" style="width:100%" name="thana_id" value="${response.address.thana_id}" />
                        <input type="hidden" style="width:100%" name="floor_no " value="${response.address.floor_no }" />
                        <input type="hidden" style="width:100%" name="appartment_no" value="${response.address.appartment_no }" />


                         <div class="row">

                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input style="width:100%" name="street_address" value="${response.address.street_address}" />
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2" style="margin:0px;padding:0px;">
                            <a href="#" style="width:100%" class="btn btn-outline-danger btn-sm delete_address" id="delete_address" data-id="${response.address.id}"> Delete </a>

                        </div>
                        </div>
                        </div>

                    `);
                    $('#exampleModal_customer').modal("hide");
                    // AddressInfo();

                }
            }

        });

    });


    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });

</script>
{{-- --------------------------------------------for order confirm ------------------------------------------ --}}
<script>
    $(document).ready(function() {
        // $('#add__new_customer').reset();
        $('#add__new_customer').prop('selectedIndex', 0);

        document.getElementById("addaddress").reset();

    });

    let final_order_confirm = document.getElementById('final_order_confirm');


    final_order_confirm.addEventListener('submit', function(e) {


        e.preventDefault();
        var total_qty = $('#tot_qty').text();
        var grand_total = $('#grand_total').text();
        var delivery_charge = $('.proceedPrice').text();


        var user_id = $('#add__new_customer').find(":selected").val();
        let formData = new FormData($('#final_order_confirm')[0]);

        formData.append("user_id", user_id);
        formData.append("totalitem", total_qty);
        formData.append("amount", grand_total);
        formData.append("delivery_charge", delivery_charge);



        $.ajax({
            type: 'post'
            , url: `/{{ config('fortify.guard') }}/agent/add/order/product/confirm`

            , data: formData
            , contentType: false
            , processData: false
            , success: function(response) {

                toastr.success(response.message);
                $('#cash-modal').modal("hide");


            }

        });

    });
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });

</script>
<script>
    //delete address function
    $(document).on('click', '#delete_address', function(e) {

        e.stopPropagation();
        if (confirm("Are you sure want to delete address?") == true) {

            var button = $(this);
            var id = $(this).data(id);
            console.log(id, 'delete');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post'
                , url: `/{{ config('fortify.guard') }}/agent/checkout/info/delete`
                , data: {
                    'id': id
                , }
                , success: function(response) {
                    $('.add_addres').remove();
                }
            , });
        };
    });

</script>

{{-- -----------------------------------------------order confirm end ------------------------------------------}}

<script>
    $(document).ready(function() {

        $('select[name="cdivision_id"]').on('change', function() {
            var division_id = $(this).val();
            $c = $('select[id="cstate_id"]').empty();
            $d = $('select[name="cdistrict_id"]').empty();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district/ajax') }}" + '/' + division_id
                    , type: "GET"
                    , success: function(data) {
                        console.log('hrere');
                        $c = $('select[name="cstate_id"]').empty();
                        $d = $('select[name="cdistrict_id"]').empty();
                        console.log(data);
                        //
                        $.each(data, function(key, value) {
                            let liItem = document.createElement('li');
                            liItem.setAttribute('data-value', value.id);
                            liItem.classList.add('option');
                            liItem.innerHTML = value.district_name;
                            // list.append(liItem);
                            $('select[name="cdistrict_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });
                    }
                    , error: function(e) {
                        console.log(e);
                    }
                });
            } else {
                alert('danger');
            }
        });
        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            $c = $('select[name="thana_id"]').empty();
            if (district_id) {
                $.ajax({
                    url: `/{{ config('fortify.guard') }}/agent/state/ajax/${district_id}`
                    , type: "GET"
                    , success: function(data) {

                        var d = $('select[name="thana_id"]').empty();

                        $.each(data, function(key, value) {
                            let liItem = document.createElement('li');
                            liItem.setAttribute('data-value', value.id);
                            liItem.classList.add('option');
                            liItem.innerHTML = value.name;
                            // list.append(liItem);
                            $('select[name="thana_id"]').append('<option value="' +

                                value.id + '">' + value.postOffice + '</option>'
                            );
                        });
                    }
                    , error: function(e) {

                    }
                });
            } else {
                alert('danger');
            }
        });
    });

</script>



<script>
    function loadProduct(pageID) {
        $.ajax({
                url: '?page=' + pageID
                , type: 'get',


            })
            .done(function(response) {
                var productInformation = '';
                if (response.data < 1) {
                    return;
                }
                $.each(response.data, function(index, value) {
                    productInformation += `




                <div class="row" onclick="AddProduct( ${value.id} )">

        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card product-box">
                <div class="card-body">
                    <div class="bg-light">
                        <img src="/${value.product_thambnail ? value.product_thambnail : ''}" alt="product-pic" class="img-fluid">
                    </div>
                    <div class="product-info">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="font-16 mt-0 "><a href="ecommerce-product-detail.html" class="text-dark">${value.product_name }</a> </h5>

                                <h5 class="m-0"> <span class="text-muted"> Stocks : ${value.product_qty }</span></h5>
                            </div>
                            <div class="col-auto">



                                 <p>${value.unit }</p>




                                <div class="product-price-tag"> &#2547 ${value.selling_price } </div>






                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end product info-->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->



    </div>




                `;
                });
                $('#category_item').append(productInformation);
                // $('#loader_section').hide();
            })
            .fail(function() {
                alert('Something went wrong...');
            })
    }







    const scrollDemo = document.querySelector("#tableScroll");
    // var count = 0, ltr=0;
    let value = 250;
    let srcoltop = null;
    let pageID = 1;
    scrollDemo.addEventListener("scroll", event => {
        let scrollPosition = false;

        if (scrollDemo.scrollTop > (value + srcoltop)) {

            srcoltop = scrollDemo.scrollTop;
            // alert(pageID);
            loadProduct(pageID);
            pageID++;

        }
    });

</script>

<script>
    let grandvat = Number($("#vat").val());
    console.log(grandvat, "this is grand total");
    // let grandvat = Number(grandvat);


    on_scanner() // init function
    function on_scanner() {
        let is_event = false; // for check just one event declaration
        let input = document.getElementById("scanner");
        input.addEventListener("focus", function() {
            if (!is_event) {
                is_event = true;
                input.addEventListener("keypress", function(e) {
                    setTimeout(function() {
                        if (e.keyCode == 13) {
                            scanner(input); // use value as you need
                            //  input.select();
                        }
                    }, 500)
                })
            }
        });
        document.addEventListener("keypress", function(e) {
            if (e.target.tagName !== "INPUT") {
                input.focus();
            }
        });
    }

    function scanner(input) {
        if (input.value == '') return;
        AddProduct(input.value);
        input.value = " ";
    }

    //scanner end
    $("#add_customer").click(() => {
        let name = $("#customer-name").val();
        let email = $("#customer-email").val();
        let phone = $("#customer-phone").val();
        let address = $("#customer-address").val();


        if (name != "" & email != "") {
            $exType = {
                'name': name
                , 'email': email
                , 'phone': phone
                , 'address': address,

            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST'
                , url: "{{ route('add.new.customer') }}"
                , data: $exType
                , success: function(data) {
                    console.log(data);
                    $("#customer-name").val("");
                    $("#customer-email").val("");
                    $("#customer-phone").val("");
                    $("#customer-address").val("");
                    $("#add__new_customer").append(new Option(data.customer_id + `-` + data.name + `-` + data.mobile));
                    toastr.success("customer added successfully");
                    $('.btn-close').trigger('click');
                },

                error: function(error) {

                }
            });

        } else {
            toastr.error("customer name and email needed");
        }
    });

    Cartproduct();

    // for fetching product7
    function Cartproduct() {
        $.ajax({
            type: 'GET'
            , url: `/get/carts/product`
            , success: function(data) {

                // console.log(data);
                $("#product_table").empty();
                var total_quantity = 0;
                var total_amount = 0;
                var total_vat = 0;
                var vat_total = 0;
                let selling_amount_total = 0;
                let selling_discount_total = 0;
                var all_grand_total = 0;
                $.each(data, function(key, value) {
                    var button = ``;
                    /////////////////////////////////////////////////////////////////////////////////////////////////////
                    total_quantity += parseFloat(value.pro_quantity);
                    total_amount += parseFloat(value.sub_total);
                    total_vat += parseFloat(value.sub_total) * (parseFloat(value.vat) / 100);
                    vat_total += parseFloat(value.vat);


                    selling_amount_total += parseFloat(value.totalSellingPrice);
                    selling_discount_total += parseFloat(value.totalDiscountPrice);



                    all_grand_total += (parseFloat(value.vat) + parseFloat(value.sub_total));

                    var grand_total = parseFloat(value.vat) + parseFloat(value.sub_total);



                    if (value.pro_quantity > 1) {
                        button =
                            `<button class="btn btn-primary bootstrap-touchspin-down" type="button" onclick="DecrementProduct(${ value.id })">-</button>`;
                    } else {
                        button =
                            `<button class="btn btn-primary bootstrap-touchspin-down" disabled="" type="button" onclick="DecrementProduct(${ value.id })">-</button>`;
                    }
                    let s = `<tr>




                                <td>
                                    <a>${value.pro_name ? value.pro_name : "Null"}</a>
                                </td>


                                <td>
                                <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected" style="width: 120px">

                                    <span class="input-group-btn input-group-prepend">${button}</span>
                                    <input data-toggle="touchspin" type="text" value="${value.pro_quantity?value.pro_quantity:0}" class="form-control" readonly>
                                    <span class="input-group-btn input-group-append"><button class="btn btn-primary bootstrap-touchspin-up" type="button"
                                    onclick="IncrementProduct(${ value.id })">+</button></span>

                                </div>
                                </td>



                                <td><input type="text" class="form-control" value="&#2547 ${grand_total}" readonly></td>

                                <td><i class="fas fa-trash mt-2 text-danger" style="cursor:pointer; font-size: 20px" onclick="RemoveProduct(${ value.id })"></i></td>



                            </tr>`;
                    $('#product_table').append(s);
                });



                const totalQuantity = document.getElementById("tot_qty");
                const totalAmount = document.getElementById("tot_amt");
                const totalDiscount = document.getElementById("tot_disc");
                const grandTotal = document.getElementById("tot_grand");
                const vat_total_field = document.getElementById("vat_possss");
                const selling_amount_id = document.getElementById("selling_amount_id");
                const grand_total = document.getElementById("grand_total");
                grand_total.innerText = all_grand_total;
                const discount_amount_id = document.getElementById("discount_amount_id");
                totalQuantity.innerText = total_quantity;

                totalAmount.innerText = total_amount;
                let dis_amount = total_amount - total_amount * totalDiscount.innerText / 100;

                grandTotal.innerText = total_amount;
                grandTotal.innerText = dis_amount + total_vat;


            }
            , error: function(e) {
                console.log(e);
            }
        });
    }

    function placeOrder() {

        const vat_possss = document.getElementById("vat_possss").innerHTML;
        const tot_qty = document.getElementById("tot_qty").innerHTML;

        const selling_amount_id = document.getElementById("selling_amount_id").innerHTML;
        const tot_amt = document.getElementById("tot_amt").innerHTML;
        const grand_total = document.getElementById("grand_total").innerHTML;
        //  const special_discount =(tot_amt+vat_possss)-grand_total;
        const special_discount = (parseInt(tot_amt) + parseInt(vat_possss)) - parseInt(grand_total);
        document.getElementById("cash_vat").innerHTML = vat_possss;
        document.getElementById("cash_quenty").innerHTML = tot_qty;
        document.getElementById("cash_quenty_tot_amt").innerHTML = selling_amount_id;

        const billTotalDiscount = selling_amount_id - tot_amt;
        // selling_amount_total- tot_amt


        document.getElementById("cash_quenty_tot_dis").innerHTML = billTotalDiscount;

        // totalDiscountModal.innerHTML ="ashim";


        document.getElementById("cash_grand_tot").innerHTML = grand_total;
        document.getElementById("spesial_discount").innerHTML = special_discount;
        document.getElementById("netPayableAmount").innerHTML = grand_total;
    }

    function cashPaid() {
        const cashPaid = document.getElementById("cashPaid").value;
        document.getElementById("cashPaid_show").innerHTML = cashPaid;
        const grand_total = document.getElementById("grand_total").innerHTML;
        const changeAmount = cashPaid - grand_total;
        document.getElementById("changeAmount").innerHTML = changeAmount;

    }

    // for adding product in cart
    function AddProduct(product_id) {
        const id = product_id;
        console.log(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST'
            , url: `/add/carts/product/${id}`
            , success: function(data) {
                Cartproduct();
                toastr.success(data.message);
            }
            , error: function(e) {
                console.log(e);
            }
        });
    }

    // for deleting product from cart
    function RemoveProduct(product_id) {
        $.ajax({
            type: 'GET'
            , url: `/remove/carts/product/${product_id}`
            , success: function(data) {
                Cartproduct();
                toastr.success(data.message);
            }
            , error: function(e) {
                console.log(e);
            }
        });
    }

    // add increment product of cart
    function IncrementProduct(product_id) {
        $.ajax({
            type: 'GET'
            , url: `/increment/carts/product/${product_id}`
            , success: function(data) {
                Cartproduct();
                console.log(data.message);
                toastr.success(data.message);
            }
            , error: function(e) {
                console.log(e);
            }
        });
    }

    // add decrement product of cart
    function DecrementProduct(product_id) {
        $.ajax({
            type: 'GET'
            , url: `/decrement/carts/product/${product_id}`
            , success: function(data) {
                Cartproduct();
                toastr.success(data.message);
            }
            , error: function(e) {
                console.log(e);
            }
        });
    }

    // clear product from cart  discount_show
    function ClearCart() {
        $.ajax({
            type: 'GET'
            , url: `/clear/carts/product`
            , success: function(data) {
                Cartproduct();
                toastr.success(data.message);
            }
            , error: function(e) {
                console.log(e);
            }
        });
    }



    function discounts_show() {

        var discount_show = document.getElementById('discount_show');
        var Percentage = document.getElementById('Percentage').value;
        var total_grand = document.getElementById('grand_total').innerText;
        var test1 = (total_grand * Percentage) / 100;
        // var test=total_grand-test1;
        discount_show.value = test1;

    }

    // save discount function
    function SaveDiscount() {
        var discountText = document.getElementById('tot_disc');
        var discount_taka = document.getElementById('taka').value;
        var total_grand_discount = document.getElementById('grand_total');
        if (discount_taka > 0) {
            var total_grand = document.getElementById('grand_total').innerText;
            var discount_taka_count = total_grand - discount_taka;
            total_grand_discount.innerHTML = discount_taka_count;

        } else {
            var total_grand = document.getElementById('grand_total').innerText;
            var Percentage = document.getElementById('Percentage').value;
            var test1 = (total_grand * Percentage) / 100;
            var test = total_grand - test1;
            total_grand_discount.innerHTML = test;
        }
        //################################################################################################################################## grand_total

        $('.modal-close').click();
    }

    // one key amount
    function amountPay() {
        const amountPay = document.getElementById('total_paying_modal');
        const ChangePay = document.getElementById('total_change_modal');
        const totalPayableModal = document.getElementById("total_payable_modal");
        ChangePay.innerText = 0;
        amountPay.innerText = amount_pay.value;
        if (amountPay.innerText - totalPayableModal.innerText > 0) {
            ChangePay.innerText = amountPay.innerText - totalPayableModal.innerText;
        }
        Cartproduct();
    }

    // confirm order  cashPaid  netPayableAmount  cashPaid_show
    function AddConfirm() {

        const totalitem = document.getElementById("tot_qty").innerText;
        const totalAmountModal = document.getElementById("cash_quenty_tot_amt").innerText;
        const totalDiscountModal = document.getElementById("cash_quenty_tot_dis").innerText;
        const spesial_discount = document.getElementById("spesial_discount").innerText;
        const totalVATModal = document.getElementById("cash_vat").innerText;
        const cash_grand_tot = document.getElementById("cash_grand_tot").innerText;
        const cashPaid_show = document.getElementById("cashPaid_show").innerText;
        const changeAmount = document.getElementById("changeAmount").innerText;
        const customerId = document.querySelector(".customer_id").selectedOptions[0].value;


        if (changeAmount < 0) {

            toastr.error("please increment cash paid amount");

        } else {
            if (customerId == 0) {
                toastr.error("please select a customer name");
            } else {
                if (totalitem == 0) {
                    toastr.error("please select a product first");
                } else {
                    if (cashPaid_show == 0) {
                        toastr.error("please pay first");
                    } else {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'POST'
                            , url: `/add/order/product/confirm`
                            , data: {
                                totalitem: totalitem
                                , totalAmount: totalAmountModal
                                , totalDiscount: totalDiscountModal
                                , spesial_discount: spesial_discount
                                , vat: totalVATModal
                                , cash_grand_tot: cash_grand_tot
                                , cashPaid_show: cashPaid_show
                                , changeAmount: changeAmount
                                , customerId: customerId,

                            }
                            , success: function(data) {
                                Cartproduct();
                                url = `/add/order/posview`;
                                window.open(url, "_blank", "width=500,height=500");
                                toastr.success(data.message);
                                $('.modal_close').click();

                            }
                            , error: function(e) {
                                console.log(e);
                            }
                        });
                    }
                }
            }

        }
    }

    function holdOrder() {
        const totalitem = document.getElementById("tot_qty").innerText;
        console.log(totalitem);
        if (totalitem != 0) {
            const customerId = document.querySelector(".customer_id").selectedOptions[0].value;
            if (customerId == 0) {
                toastr.error("please select a customer name");
            } else {
                $('#HoldModel').modal('show');
            }
        } else {
            toastr.error("you need to provide some product first..");
        }
    }

    function payDelivary() {
        $('#HoldModel').modal('hide');
        $('#exampleModalCenter').modal('show');
        const totalPayableModal = document.getElementById("grand_total").innerText;
        console.log(totalPayableModal);
        document.getElementById("total_hold").innerText = `Tk ${totalPayableModal}`;
    }

    function cancelHold() {
        event.preventDefault();
        $('#exampleModalCenter').modal('hide');
    }

    function confirmHold() {
        event.preventDefault();
        const reference = document.getElementById('reference_id').value;
        const totalPayableModal = document.getElementById("grand_total").innerText;
        const customerId = document.querySelector(".customer_id").selectedOptions[0].value;
        console.log(customerId);
        if (reference != "reference") {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST'
                , url: '/hold/order/product'
                , data: {
                    reference: reference
                    , totalPay: totalPayableModal
                    , customerId: customerId
                }
                , success: function(data) {
                    Cartproduct();
                    toastr.success(data.message);
                    $('#exampleModalCenter').modal('hide');
                }
                , error: function(e) {
                    console.log(e);
                }
            });
        } else {
            toastr.error("please provide a reference");
        }
    }

    function allOrders() {
        $('#exampleModalScrollable').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET'
            , url: '/get/hold/order/product'
            , success: function(data) {
                console.log(data);
                NewData = " "
                $('#home').empty();
                $.each(data, function(index, value) {
                    NewData += `<div class="row" style="margin-top:1rem;">
                            <div class="col-md-6">
                                <p>${value.return_reason}</p>
                                <p><b>Code</b>: ${value.invoice_no}</p>
                                <p><b>Cashier</b>: Admin</p>
                                <p><b>Total</b>:&#2547 ${value.amount}</p>
                            </div>
                            <div class="col-md-6" style="padding-top: 37px;">
                                <p><b>Customer</b>: ${value.name}</p>
                                <p><b>Date</b>: ${value.order_date}</p>
                                <p><b>Type</b>: ${value.payment_type}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mb-2">
                            <button onclick="getholdProduct(${value.id})" class="text-white" style="background-color: rgb(34 197 94);border: none;border-radius: 6%;margin-right: 5px;padding:10px 20px;">
                                 Open
                            </button>
                            <button onclick="getholdProductItem(${value.id})" class="text-white" style="background-color: rgb(59 130 246);border: none;border-radius: 6%;margin-right: 5px;padding:10px 20px;">
                                 Products
                            </button>
                        </div>
                        <hr>`
                });
                $('#home').append(NewData);
            }
            , error: function(e) {
                console.log(e);
            }
        });
    }

    function getholdProduct(id) {
        const cart_id = id;
        console.log(cart_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET'
            , url: '/get/hold/order/product/item/' + id
            , success: function(data) {
                Cartproduct();
                const totalitem = document.getElementById("tot_qty").innerText;
                const totalAmountModal = document.getElementById("tot_amt").innerText;
                const totalDiscountModal = document.getElementById("discount_amount_id").innerText;
                const totalPayableModal = document.getElementById("grand_total").innerText;
                toastr.success(data.message);
                // $(".holdModalOrder").trigger( "click" );
                $('#exampleModalScrollable').modal('hide');
            }
            , error: function(e) {
                console.log(e);
            }
        });
    }

    function getholdProductItem(id) {
        $('#exampleModalScrollable').modal('hide');
        $('#productItem').modal('show');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET'
            , url: '/show/hold/order/product/' + id
            , success: function(data) {
                console.log(data);
                NewData = `<table>
                                    <thead>
                                        <tr style="border:none;">
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Grand Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                $('#ProductInfo').empty();
                $.each(data, function(index, value) {
                    NewData += `
                                    <tr style="border:none;">
                                        <td><img src="{{ asset('') }}${value.products[0].product_thambnail}" style="width:50px;height:50px;"></td>
                                        <td>${value.products[0].product_name}</td>
                                        <td>${value.qty}</td>
                                        <td>${value.price * value.qty}</td>
                                    </tr>`;
                });
                NewData += `</tbody>
                                    </table>
                                <hr>`;
                $('#ProductInfo').append(NewData);
            }
            , error: function(e) {
                console.log(e);
            }
        });
    }

    //getting catgegory wise product
    $('#all-category').on('change', function() {

        var id = $(this).find(":selected").val();

        console.log(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST'
            , url: '/add/carts/product/filter/' + id
            , success: function(data) {
                console.log(data);
                $('#category_item').empty();
                console.log($('#category_item'));
                $.each(data, function(index, item) {
                    let s = '';

                    console.log(item);



                    s += `
                            <tr onclick="AddProduct(${ item.id })">

                                    <td> <img src="{{ asset('${item.product_thambnail}') }}" alt="" class="img-fluid table-img">


                                        <td style="width: 150px;"> ${item.product_name}</td>
                                        <td>${item.product_qty} </td>
                                        <td>${item.unit} </td>
                                        <td>&#2547 ${item.selling_price}</td>
                                    </tr>
                            `;

                    $('#category_item').append(s);

                });
            }
            , error: function(e) {
                console.log(e);
            }


        });
    });


    // ================================= category select search category ===============================
    function refreshCategory() {
        var id = 'all';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST'
            , url: '/add/carts/product/filter/' + id
            , success: function(data) {
                // console.log(data);
                $('#category_item').empty();
                console.log($('#category_item'));
                $.each(data, function(index, item) {
                    let cat_search = '';
                    console.log(item);

                    let s = '';

                    console.log(item);



                    s += `
     <div class="col-md-6 col-lg-4 col-xl-3" onclick="AddProduct(${ item.id })">
                            <div class="card product-box">
                                <div class="card-body">
                                    <div class="bg-light">
                                        <img src="{{ asset('${item.product_thambnail}')}}" alt="product-pic" class="img-fluid">
                                    </div>
                                    <div class="product-info">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5 class="font-16 mt-0 "><a href="ecommerce-product-detail.html" class="text-dark">${item.product_name }</a> </h5>

                                                <h5 class="m-0"> <span class="text-muted"> Stocks : ${item.product_qty }</span></h5>
                                            </div>
                                            <div class="col-auto">
                                                 <p>${item.unit }</p>
                                                <div class="product-price-tag"> &#2547 ${item.selling_price } </div>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end product info-->
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col-->
    `;

                    $('#category_item').append(s);

                });
            }
            , error: function(e) {
                console.log(e);
            }


        });
    }

    // ================================= catgory select search category end===============================


    // =================================  Brand select search category start ===============================

    function refreshBrand() {
        var id = 'all';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST'
            , url: '/add/carts/product/filter/' + id
            , success: function(data) {
                console.log(data);
                $('#category_item').empty();
                console.log($('#category_item'));
                $.each(data, function(index, item) {
                    let s = '';

                    console.log(item);



                    s += `
     <div class="col-md-6 col-lg-4 col-xl-3" onclick="AddProduct(${ item.id })">
                            <div class="card product-box">
                                <div class="card-body">
                                    <div class="bg-light">
                                        <img src="{{ asset('${item.product_thambnail}')}}" alt="product-pic" class="img-fluid">
                                    </div>
                                    <div class="product-info">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5 class="font-16 mt-0 "><a href="ecommerce-product-detail.html" class="text-dark">${item.product_name }</a> </h5>

                                                <h5 class="m-0"> <span class="text-muted"> Stocks : ${item.product_qty }</span></h5>
                                            </div>
                                            <div class="col-auto">
                                                 <p>${item.unit }</p>
                                                <div class="product-price-tag"> &#2547 ${item.selling_price } </div>
                                            </div>
                                        </div> <!-- end row -->
                                    </div> <!-- end product info-->
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col-->
    `;

                    $('#category_item').append(s);

                });
            }
            , error: function(e) {
                console.log(e);
            }


        });
    }

    // =================================  Brand select search category end ===============================






    //getting product
    function product_search() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let search = $('#product_search').val();

        $.ajax({
            type: "POST"
            , url: '/search/product/filter'
            , data: {
                search: search
            }
            , success: function(data) {
                console.log(data);
                $('#category_item').empty();
                let s = '';

                $.each(data, function(index, item) {

                    let discount_price_get = ` <div class="product-price-tag"> &#2547  ${item.discount_price}
                        <del class="text-danger">&#2547 ${item.selling_price}</del>

                    </div>`;
                    let selling_price_get = `<div class="product-price-tag"> &#2547 ${item.selling_price}`;
                    console.log('discountpriceeeeeeeeeeee' + discount_price_get);
                    console.log('discountpriceeeeeeeeeeee' + selling_price_get);





                    s = `
                                    <div class="col-md-6 col-lg-4 col-xl-3" >
                                        <div class="card product-box">
                                            <div class="card-body">
                                                <div class="bg-light">
                                                    <img src="{{ asset('${item.product_thambnail}')}}" alt="product-pic" class="img-fluid">
                                                </div>
                    `;

                    if (item.product_qty <= 0) {

                        s += `
                                    <div id="overlay_background">
                                        <button class="overlay-add-to-bag" disabled>
                                            <div class="text-danger">
                                                Stock Out
                                            </div>
                                        </button>
                                    </div>
                                    <div class="product-info">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h5 class="font-16 mt-0 "><a href="ecommerce-product-detail.html" class="text-dark">${item.product_name }</a> </h5>

                                                <h5 class="m-0"> <span class="text-muted"> Stocks : ${item.product_qty?item.product_qty:'' }</span></h5>

                                            </div>
                                            <div class="col-auto">
                                                 <p>${item.unit? item.unit:''}</p>

                                             ${discount_price_get?discount_price_get:selling_price_get }





                                            </div>
                                        <button class="btn btn-success" width="50%" onclick="AddProduct(${ item.id })">Stock Out</button>

                                        </div> <!-- end row -->
                                    </div> <!-- end product info-->
                                    </div>
                                    </div> <!-- end card-->
                                    </div> <!-- end col-->
                                   `;
                    } else {
                        s += `
                                              <div class="product-info">
                                                  <div class="row align-items-center">
                                                      <div class="col">
                                                          <h5 class="font-16 mt-0 "><a href="ecommerce-product-detail.html" class="text-dark">${item.product_name }</a> </h5>

                                                          <h5 class="m-0"> <span class="text-muted"> Stocks : ${item.product_qty?item.product_qty:'' }</span></h5>

                                                      </div>
                                                      <div class="col-auto">
                                                          <p>${item.unit? item.unit:''}</p>

                                                         ${discount_price_get?discount_price_get:selling_price_get }



                                                      </div>
                                                      <button class="btn btn-success" width="50%" onclick="AddProduct(${ item.id })">add to cart</button>

                                                  </div> <!-- end row -->
                                              </div> <!-- end product info-->
                                              </div>
                                              </div> <!-- end card-->
                                              </div> <!-- end col-->
                        `;
                    }

                });

                $('#category_item').append(s);
            }
            , error: function(e) {
                console.log(e);
            }
        });
    }


    //getting brand wise product
    $('#all-brand').on('change', function() {
        var id = $(this).find(":selected").val();
        console.log(id);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: 'POST'
            , url: '/add/carts/brand/filter/' + id
            , success: function(data) {
                console.log(data);
                $('#category_item').empty();
                let s = '';
                $.each(data, function(index, item) {
                    //    console.log(item);

                    s += `
                            <tr onclick="AddProduct(${ item.id })">

                                    <td> <img src="{{ asset('${item.product_thambnail}') }}" alt="" class="img-fluid table-img">


                                        <td style="width: 150px;"> ${item.product_name}</td>
                                        <td>${item.product_qty} </td>
                                        <td>${item.unit} </td>
                                        <td>&#2547 ${item.selling_price}</td>
                                    </tr>
                            `;

                    $('#category_item').append(s);
                });

            }
            , error: function(e) {
                console.log(e);
            }
        });


    });

</script>
<!-- Select2 js-->
<script src="{{ asset('backend') }}/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/selectize/js/standalone/selectize.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>

<!-- Quill js -->
<script src="{{ asset('backend') }}/assets/libs/quill/quill.min.js"></script>

<!-- Init js -->
<script src="{{ asset('backend') }}/assets/js/pages/add-product.init.js"></script>
<script src="{{ asset('backend') }}/assets/js/pages/form-advanced.init.js"></script>

<!-- Tippy js-->
<script src="{{ asset('backend') }}/assets/libs/tippy.js/tippy.all.min.js"></script>

<script>
    function increaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
    }

    function decreaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById('number').value = value;
    }

</script>



<script>
    $(document).ready(function() {
        $('#select-option').change(function() {
            $(".datachange").removeClass("d-none");
            var optionName = $('#select-option').val();
            $(".details").hide();
            $("." + optionName).show();
        })
        // alert(optionName);

    });

    //========= Payment Mathod Script Start =============//
    $(document).ready(function() {
        $('#pament-method').click(function() {
            $(".bankCard-op").removeClass("d-none");
            $(".mobilebank-op").removeClass("d-none");
            $(".mastercard").removeClass("d-none");
            $(".visacard").removeClass("d-none");
            $(".americanexpress").removeClass("d-none");
            $(".unionpay").removeClass("d-none");
            $(".easternbank").removeClass("d-none");
            $(".ucbbank").removeClass("d-none");
            $(".islamibank").removeClass("d-none");
            $(".bracbank").removeClass("d-none");
            $(".bkash").removeClass("d-none");
            $(".rocket").removeClass("d-none");
            $(".upai").removeClass("d-none");
            $(".nagad").removeClass("d-none");
            $(".surecash").removeClass("d-none");
            $(".t-cash").removeClass("d-none");
            $(".my-cash").removeClass("d-none");
            $(".mtb").removeClass("d-none");
            var methodName = $("input[name='inlineRadioOptions']:checked").val();

            if (methodName == "Cash On Delivery") {

                $(".cashpaid-option").show();
                $(".bankCard-op").hide();
                $(".mobilebank-op").hide();
                $(".mastercard").hide();
                $(".visacard").hide();
                $(".americanexpress").hide();
                $(".unionpay").hide();
                $(".easternbank").hide();
                $(".ucbbank").hide();
                $(".islamibank").hide();
                $(".bracbank").hide();
                $(".bkash").hide();
                $(".rocket").hide();
                $(".upai").hide();
                $(".nagad").hide();
                $(".surecash").hide();
                $(".t-cash").hide();
                $(".my-cash").hide();
                $(".mtb").hide();
            } else if (methodName == "Bank/Card") {

                $(".cashpaid-option").hide();
                $(".bankCard-op").show();
                $(".mobilebank-op").hide();
                $(".mastercard").hide();
                $(".visacard").hide();
                $(".americanexpress").hide();
                $(".unionpay").hide();
                $(".easternbank").hide();
                $(".ucbbank").hide();
                $(".islamibank").hide();
                $(".bracbank").hide();
                $(".bkash").hide();
                $(".rocket").hide();
                $(".upai").hide();
                $(".nagad").hide();
                $(".surecash").hide();
                $(".t-cash").hide();
                $(".my-cash").hide();
                $(".mtb").hide();
            } else {
                $(".cashpaid-option").hide();
                $(".bankCard-op").hide();
                $(".mobilebank-op").show();
                $(".mastercard").hide();
                $(".visacard").hide();
                $(".americanexpress").hide();
                $(".unionpay").hide();
                $(".easternbank").hide();
                $(".ucbbank").hide();
                $(".islamibank").hide();
                $(".bracbank").hide();
                $(".bkash").hide();
                $(".rocket").hide();
                $(".upai").hide();
                $(".nagad").hide();
                $(".surecash").hide();
                $(".t-cash").hide();
                $(".my-cash").hide();
                $(".mtb").hide();
            }
        })
    });
    //========= Payment Mathod Script End =============//

    //========= Payment Mathod BankCard Script Start =============//\
    $(document).ready(function() {
        $('#bankCardOption img').click(function() {
            var bankCardimg = $(this).attr("alt");

            if (bankCardimg == "bankcardimg1") {
                $(".mastercard").show();
                $(".visacard").hide();
                $(".americanexpress").hide();
                $(".unionpay").hide();
                $(".easternbank").hide();
                $(".ucbbank").hide();
                $(".islamibank").hide();
                $(".bracbank").hide();
                $(".bankCard-op").hide();
            } else if (bankCardimg == "bankcardimg2") {
                $(".mastercard").hide();
                $(".visacard").show();
                $(".americanexpress").hide();
                $(".unionpay").hide();
                $(".easternbank").hide();
                $(".ucbbank").hide();
                $(".islamibank").hide();
                $(".bracbank").hide();
                $(".bankCard-op").hide();
            } else if (bankCardimg == "bankcardimg3") {
                $(".mastercard").hide();
                $(".visacard").hide();
                $(".americanexpress").show();
                $(".unionpay").hide();
                $(".easternbank").hide();
                $(".ucbbank").hide();
                $(".islamibank").hide();
                $(".bracbank").hide();
                $(".bankCard-op").hide();
            } else if (bankCardimg == "bankcardimg4") {
                $(".mastercard").hide();
                $(".visacard").hide();
                $(".americanexpress").hide();
                $(".unionpay").show();
                $(".easternbank").hide();
                $(".ucbbank").hide();
                $(".islamibank").hide();
                $(".bracbank").hide();
                $(".bankCard-op").hide();
            } else if (bankCardimg == "bankcardimg5") {
                $(".mastercard").hide();
                $(".visacard").hide();
                $(".americanexpress").hide();
                $(".unionpay").hide();
                $(".easternbank").show();
                $(".ucbbank").hide();
                $(".islamibank").hide();
                $(".bracbank").hide();
                $(".bankCard-op").hide();
            } else if (bankCardimg == "bankcardimg6") {
                $(".mastercard").hide();
                $(".visacard").hide();
                $(".americanexpress").hide();
                $(".unionpay").hide();
                $(".easternbank").hide();
                $(".ucbbank").show();
                $(".islamibank").hide();
                $(".bracbank").hide();
                $(".bankCard-op").hide();
            } else if (bankCardimg == "bankcardimg7") {
                $(".mastercard").hide();
                $(".visacard").hide();
                $(".americanexpress").hide();
                $(".unionpay").hide();
                $(".easternbank").hide();
                $(".ucbbank").hide();
                $(".islamibank").show();
                $(".bracbank").hide();
                $(".bankCard-op").hide();
            } else {
                $(".mastercard").hide();
                $(".visacard").hide();
                $(".americanexpress").hide();
                $(".unionpay").hide();
                $(".easternbank").hide();
                $(".ucbbank").hide();
                $(".islamibank").hide();
                $(".bracbank").show();
                $(".bankCard-op").hide();
            }

        });
    });
    //========= Payment Mathod BankCard Script End =============//

    //========= Payment Mathod Mobilebanking Card Script Start =============//
    $(document).ready(function() {
        $('#mobilebankingOption img').click(function() {
            var mobilebankCardimg = $(this).attr("alt");
            console.log(mobilebankCardimg);

            if (mobilebankCardimg == "mobilebankimg1") {
                $(".bkash").show();
                $(".rocket").hide();
                $(".upai").hide();
                $(".nagad").hide();
                $(".surecash").hide();
                $(".t-cash").hide();
                $(".my-cash").hide();
                $(".mtb").hide();
                $(".mobilebank-op").hide();
            } else if (mobilebankCardimg == "mobilebankimg2") {
                $(".bkash").hide();
                $(".rocket").show();
                $(".upai").hide();
                $(".nagad").hide();
                $(".surecash").hide();
                $(".t-cash").hide();
                $(".my-cash").hide();
                $(".mtb").hide();
                $(".mobilebank-op").hide();
            } else if (mobilebankCardimg == "mobilebankimg3") {
                $(".bkash").hide();
                $(".rocket").hide();
                $(".upai").show();
                $(".nagad").hide();
                $(".surecash").hide();
                $(".t-cash").hide();
                $(".my-cash").hide();
                $(".mtb").hide();
                $(".mobilebank-op").hide();
            } else if (mobilebankCardimg == "mobilebankimg4") {
                $(".bkash").hide();
                $(".rocket").hide();
                $(".upai").hide();
                $(".nagad").show();
                $(".surecash").hide();
                $(".t-cash").hide();
                $(".my-cash").hide();
                $(".mtb").hide();
                $(".mobilebank-op").hide();
            } else if (mobilebankCardimg == "mobilebankimg5") {
                $(".bkash").hide();
                $(".rocket").hide();
                $(".upai").hide();
                $(".nagad").hide();
                $(".surecash").show();
                $(".t-cash").hide();
                $(".my-cash").hide();
                $(".mtb").hide();
                $(".mobilebank-op").hide();
            } else if (mobilebankCardimg == "mobilebankimg6") {
                $(".bkash").hide();
                $(".rocket").hide();
                $(".upai").hide();
                $(".nagad").hide();
                $(".surecash").hide();
                $(".t-cash").show();
                $(".my-cash").hide();
                $(".mtb").hide();
                $(".mobilebank-op").hide();
            } else if (mobilebankCardimg == "mobilebankimg7") {
                $(".bkash").hide();
                $(".rocket").hide();
                $(".upai").hide();
                $(".nagad").hide();
                $(".surecash").hide();
                $(".t-cash").hide();
                $(".my-cash").show();
                $(".mtb").hide();
                $(".mobilebank-op").hide();
            } else {
                $(".bkash").hide();
                $(".rocket").hide();
                $(".upai").hide();
                $(".nagad").hide();
                $(".surecash").hide();
                $(".t-cash").hide();
                $(".my-cash").hide();
                $(".mtb").show();
                $(".mobilebank-op").hide();
            }

        });
    });

</script>

@endsection
