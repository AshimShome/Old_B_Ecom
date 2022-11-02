@extends('admin.admin_master')
@section('css')
<style>
    .avatar-title {
        align-items: center;
        color: #fff;
        display: flex;
        height: 100%;
        justify-content: center;
        width: 100%;
    }

    .main-head {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 400;
        font-size: 28px;
        line-height: 34px;
        color: #343A40;
    }

    .dash-card-icon {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 68px;
        height: 68px;
        background: #D3F1F7;
        border: 2px solid #27BAD8;
        box-sizing: border-box;
        border-radius: 50%;
    }

    .dash-card-icon2 {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #D9D5F6;
        border: 2px solid #A088E5;
        box-sizing: border-box;
        border-radius: 50%;
    }

    .dash-card-icon3 {

        background: #E6EEFF;
        border: 2px solid #276FFC;
    }

    .dash-card-icon4 {

        background: #E6EEFF;
        border: 2px solid #276FFC;
    }

    .dashbord-card-info p {
        font-weight: 400;
        font-size: 14px;
        line-height: 19px;
        text-align: right;
        color: #6E768E;
    }

    .dashbord-card-info h2 {
        text-align: right;
    }

    .line-chart {
        flex-wrap: wrap;
    }

    .line-chart h3 {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 24px;
        line-height: 29px;
        color: #343A40;
    }



    /* Chart Js  */

</style>
@endsection
@section('main-content')
<div class="container-fluid p-4">
    <div class="row">

        @php


        $customer_opt = App\Models\User::where('agent_id', Auth::guard('admin')->user()->agent_id)->orderBy('updated_at','DESC')->first();

        @endphp

        {{-- <h5 class="text-center text-danger">Customer Name:  <b> {{ $customer_opt->name }} </b> </h5>
        <h5 class="text-center text-danger"> Mobile: <b> {{ $customer_opt->mobile }} </b> </h5>
        <h5 class="text-center text-danger">OTP Code: <b> {{ $customer_opt->otp}} </b> </h5>
        --}}

        <div class="mb-3 main-head">Dashboard</div>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-inner d-flex justify-content-between align-items-center p-2">

                    <span class="dash-card-icon">

                    </span>
                    <!-- end span  -->
                    <div class="dashbord-card-info">
                        <h2>{{ $customers }}</h2>
                        <p>Total Customer </p>
                    </div>
                    <!-- end dashbord-card-info  -->


                </div>
                <!-- end card-inner  -->
            </div>
            <!-- end card  -->
        </div>


        <!-- end col  -->
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-inner d-flex justify-content-between align-items-center p-2">

                    <span class="dash-card-icon dash-card-icon2">




                    </span>
                    <!-- end span  -->
                    <div class="dashbord-card-info">
                        <h2>{{$totalsellamount}} TK</h2>
                        <p>Total Sale Amount</p>
                    </div>
                    <!-- end dashbord-card-info  -->


                </div>
                <!-- end card-inner  -->
            </div>
            <!-- end card  -->
        </div>
        <!-- end col  -->
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-inner d-flex justify-content-between align-items-center p-2">

                    <span class="dash-card-icon dash-card-icon3">




                    </span>
                    <!-- end span  -->
                    <div class="dashbord-card-info">
                        <h2>{{$totalcommission}} TK</h2>
                        <p>Total Comisssion</p>
                    </div>
                    <!-- end dashbord-card-info  -->


                </div>
                <!-- end card-inner  -->
            </div>
            <!-- end card  -->
        </div>
        <!-- end col  -->
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-inner d-flex justify-content-between align-items-center p-2">

                    <span class="dash-card-icon dash-card-icon4">

                    </span>
                    <!-- end span  -->


                    <div class="dashbord-card-info">
                        <h2>{{ optional($withdrawalamount)->total_withdrawal_amount }}</h2>
                        <p>Total Withdrawal Comission Amount</p>
                    </div>
                    <!-- end dashbord-card-info  -->


                </div>
                <!-- end card-inner  -->
            </div>
            <!-- end card  -->
        </div>
        <!-- end col  -->
    </div>
    <!-- end row  -->

    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">

            <div class="card p-3">
                <div class="card-body">
                    <div class="line-chart mb-2 d-flex justify-content-between align-items-center flex-wrap">
                        <h3>Sales Analysis</h3>
                    </div>
                    <!-- end line-chart  -->
                    <div>
                        <canvas id="myChart" width="415" height="207" style="display: block; box-sizing: border-box; height: 207px; width: 415px;"></canvas>
                    </div>
                    <!-- end line chart js  -->
                </div>
                <!-- end card-body  -->
            </div>
            <!-- end card  -->
        </div>
        <!-- end col  -->


        <div class="col-lg-6 col-md-8 col-sm-12">

            <div class="card p-3">
                <div class="card-body">
                    <div class="line-chart mb-2 d-flex justify-content-between align-items-center flex-wrap">
                        <h3>Comission Analysis</h3>

                    </div>
                    <!-- end line-chart  -->
                    <div>
                        <canvas id="myChart2" width="415" height="207" style="display: block; box-sizing: border-box; height: 207px; width: 415px;"></canvas>
                    </div>
                    <!-- end line chart js  -->
                </div>
                <!-- end card-body  -->
            </div>
            <!-- end card  -->
        </div>
        <!-- end col  -->
    </div>
    <!-- end row  -->

</div>
@endsection
