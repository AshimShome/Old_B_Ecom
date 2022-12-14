@extends('frontend.main_master')
@section('islamic')


<style type="text/css">

	body {
     background-color: #eeeeee;
     font-family: 'Open Sans', serif
 }
 .container {

 }
 .card {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0, 0, 0, 0.1);
     border-radius: 0.10rem
 }
 .card-header:first-child {
     border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
 }
 .card-header {
     padding: 0.75rem 1.25rem;
     margin-bottom: 0;
     background-color: #fff;
     border-bottom: 1px solid rgba(0, 0, 0, 0.1)
 }
 .track {
     position: relative;
     background-color: #ddd;
     height: 7px;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 60px;
     margin-top: 50px
 }
 .track .step {
     -webkit-box-flex: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
     width: 25%;
     margin-top: -18px;
     text-align: center;
     position: relative
 }
 .track .step.active:before {
     background: #F9B92E
 }
 .track .step::before {
     height: 7px;
     position: absolute;
     content: "";
     width: 100%;
     left: 0;
     top: 18px
 }
 .track .step.active .icon {
     background: #F9B92E;
     color: #fff
 }
 .track .icon {
     display: inline-block;
     width: 40px;
     height: 40px;
     line-height: 40px;
     position: relative;
     border-radius: 100%;
     background: #ddd
 }
 .track .step.active .text {
     font-weight: 400;
     color: #000
 }
 @media only screen and (max-width: 600px) {
   .track .step.active .text {
     font-size: 12px;
    }
    }
 .track .text {
     display: block;
     margin-top: 7px
 }
 .itemside {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     width: 100%
 }
 .itemside .aside {
     position: relative;
     -ms-flex-negative: 0;
     flex-shrink: 0
 }
 .img-sm {
     width: 80px;
     height: 80px;
     padding: 7px
 }
 ul.row,
 ul.row-sm {
     list-style: none;
     padding: 0
 }
 .itemside .info {
     padding-left: 15px;
     padding-right: 7px
 }
 .itemside .title {
     display: block;
     margin-bottom: 5px;
     color: #157ed2
 }
 p {
     margin-top: 0;
     margin-bottom: 1rem
 }
 .btn-warning {
     color: #ffffff;
     background-color: #157ed2;
     border-color: #157ed2;
     border-radius: 1px
 }
 .btn-warning:hover {
     color: #ffffff;
     background-color: #157ed2;
     border-color: #157ed2;
     border-radius: 1px
 }
 
 .main-content{
     margin-left: 0px!important;
 }
</style>

<section class="profile main-content">
    <div class="container">
        <div class="row profile-wrapper">
            <div class="col-lg-12">
                <article class="card"  style="margin-top: 100px; margin-bottom: 30px " >
                    <header class="card-header"> <b> My Orders / Tracking </b> </header>
                    <div class="card-body">
                        <div class="row" style="margin-left: 30px; margin-top: 20px;">
                            <div class="col-md-2">
                                <b> Invoice Number </b><br>
                                {{ $track->invoice_no }}
                            </div> <!-- // end col md 2 -->

                            <div class="col-md-2">
                            <b> Order Date </b><br>
                               {{ \Carbon\Carbon::parse($track->order_date)->format('d-m-Y h:i A' ) }}
                            </div> <!-- // end col md 2 -->

                            {{--  <div class="col-md-2">
                                <b> Ordered By - {{ Auth::user()->name  }} </b><br>
                                {{ $track->street_address }}, {{ $track->state->name }},{{ $track->district->name }}
                            </div> <!-- // end col md 2 -->

                            <div class="col-md-2">
                                <b> User Mobile Number </b><br>
                                {{ Auth::user()->mobile }}
                            </div> <!-- // end col md 2 -->

                            <div class="col-md-2">
                            <b> Payment Method  </b><br>
                                {{ $track->payment_method  }}
                            </div> <!-- // end col md 2 -->

                            <div class="col-md-2">
                                <b> Total Amount  </b><br>
                                $ {{ $track->amount  }}
                            </div> <!-- // end col md 2 -->  --}}

                        </div> <!-- // end row   -->

                        @php
                            $trackStatus = 0;
                            if($track->status == 'Pending')
                            {
                                $trackStatus = 1;
                            }
                            if($track->status == 'confirm')
                            {
                                $trackStatus = 2;
                            }
                            if($track->status == 'processing')
                            {
                                $trackStatus = 3;
                            }
                            if($track->status == 'picked')
                            {
                                $trackStatus = 4;
                            }
                            if($track->status == 'shipped')
                            {
                                $trackStatus = 5;
                            }
                            if($track->status == 'delivered')
                            {
                                $trackStatus = 6;
                            }
                        @endphp

                        
                        
                            <div class="track">


                            <div  class="step {{ $trackStatus >=1 ?'active':'' }} "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending <br>{{ \Carbon\Carbon::parse($track->order_date)->format('d-m-Y h:i A' ) }}</span> </div>

                            <div class="step {{ $trackStatus >=2 ?'active':'' }}"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed <br>{{ $track->confirmed_date }} </span> </div>

                            <div class="step {{ $trackStatus >=3 ?'active':'' }}"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing <br>{{ $track->processing_date }}  </span> </div>

                            <div class="step {{ $trackStatus >=4 ?'active':'' }}"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked <br>{{ $track->picked_date }} </span> </div>

                            <div class="step {{ $trackStatus >=5  ?'active':'' }}"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped <br>{{ $track->shipped_date }} </span> </div>

                            <div class="step {{ $trackStatus >=6 ?'active':'' }}"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered <br>{{ $track->delivered_date }} </span> </div>

                        </div>
                        
                        <br>
                        <hr style="margin-left: -1rem ; margin-right: -1rem">
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection
