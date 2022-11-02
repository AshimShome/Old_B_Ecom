@extends('admin.admin_master')
@section('css')
    <style></style>
@endsection
@section('main-content')
   <!-- Start Content-->
   <div class="container-fluid p-4">
    <div class="row">
        <div class="mb-3 main-head">Dashboard</div>
        <div class=" col-xxl-3 col-xl-3  col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-inner d-flex justify-content-between align-items-center p-2">

                    <span class="dash-card-icon">
                    </span>
                    <!-- end span  -->
                    <div class="dashbord-card-info">
                        <h2>{{$totalagent}}</h2>
                        <p>Total Agent</p>
                    </div>
                    <!-- end dashbord-card-info  -->


                </div>
                <!-- end card-inner  -->
            </div>
            <!-- end card  -->
        </div>
        <!-- end col  -->
        <div class=" col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-inner d-flex justify-content-between align-items-center  p-2">

                    <span class="dash-card-icon dash-card-icon2">
                    </span>
                    <!-- end span  -->
                    <div class="dashbord-card-info">
                        <h2>{{ $totalagent_customer}}</h2>
                        <p>Total Customer</p>
                    </div>
                    <!-- end dashbord-card-info  -->


                </div>
                <!-- end card-inner  -->
            </div>
            <!-- end card  -->
        </div>
        <!-- end col  -->

        <div class=" col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-inner d-flex justify-content-between align-items-center p-2">

                    <span class="dash-card-icon">
                       

                    </span>
                    <div class="dashbord-card-info">
                        <h2> {{ $totalagent_sale_amount }} TK.</h2>
                        <p>Agent Total Sale Amount</p>
                    </div>
                    <!-- end dashbord-card-info  -->


                </div>
                <!-- end card-inner  -->
            </div>
            <!-- end card  -->
        </div>
        <!-- end col  -->
        <div class=" col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-inner d-flex justify-content-between align-items-center p-2">

                    <span class="dash-card-icon dash-card-icon4">

                    </span>
                    <!-- end span  -->
                    <div class="dashbord-card-info">
                        <h2>{{ $totalagent_comisssion }} TK.</h2>
                        <p>Agent Total Comisssion</p>
                    </div>
                    <!-- end dashbord-card-info  -->


                </div>
                <!-- end card-inner  -->
            </div>
            <!-- end card  -->
        </div>
        <!-- end col  -->
        <!-- end col  -->
    </div>
    <!-- end row  -->

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">

            <div class="card p-3">
                <div class="card-body">
                    <div
                        class="line-chart mb-2 d-flex justify-content-between align-items-center flex-wrap">
                        <h3>Sales Analytics</h3>

                    </div>
                    <!-- end line-chart  -->
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                    <!-- end line chart js  -->
                </div>
                <!-- end card-body  -->
            </div>
            <!-- end card  -->
        </div>
        <!-- end col  -->


        <div class="col-lg-6 col-md-6 col-sm-12">

            <div class="card p-3">
                <div class="card-body">
                    <div
                        class="line-chart mb-2 d-flex justify-content-between align-items-center flex-wrap">
                        <h3>Sales Analytics</h3>


                    </div>
                    <!-- end line-chart  -->
                    <div>
                        <canvas id="myChart2"></canvas>
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

</div> <!-- container -->
@endsection
@section('script')
@endsection
