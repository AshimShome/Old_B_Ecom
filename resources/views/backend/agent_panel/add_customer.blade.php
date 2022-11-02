@extends('admin.admin_master')
@section('css')
    <style>
        .content-page-box {
            height: 100%;
        }

        .add-customer-input label {
            font-weight: 400;
            font-size: 16px;
            line-height: 25px;
            color: #6C757D;

        }

        .agent-jfss-btn-holder {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: end;
            margin-bottom: 50px;
            margin-top: 50px;
        }

        .agent-jfss-btn-holder .jfss-btn {
            background: #1ABC9C;
            border-radius: 5.25025px;
            font-weight: 600;
            font-size: 18.9009px;
            line-height: 26px;
            text-align: center;
            color: #FFFFFF;
            padding: 10px 30px;
        }

        .agent-card-footer {
            background: #fff;

        }

    </style>
@endsection
@section('main-content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('role.agent_panel.store_customer', config('fortify.guard')) }}">
                    @csrf
                    <div class="card content-page-box">
                        <div class="card-body">
                            <h2 class="mb-3">Add Customer </h2>
                            <div class="row">
                                <div class=" col-lg-3 col-md-6 col-sm-12  mb-3 add-customer-input">
                                    <label for="exampleInputPassword1" class="form-label">Customer
                                        Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputPassword1"
                                        placeholder="Full Name">
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-3 add-customer-input">
                                    <label for="exampleInputEmail1" class="form-label">Email <b style="color:red; font-weight:bold"> (Unique)</b></label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="example@excelitai.com">

                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class=" col-lg-3 col-md-6 col-sm-12  mb-3 add-customer-input">
                                    <label for="exampleInputPassword1" class="form-label">Mobile Number
                                         <b style="color:red; font-weight:bold"> (Unique)</b></label>
                                    <input type="text" onclick="showText()" name="mobile" class="form-control" id="exampleInputPassword1"
                                        placeholder="01700000000"  value="+88">


                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class=" col-lg-3 col-md-6 col-sm-12  mb-3 add-customer-input">
                                    <label for="exampleInputPassword1" class="form-label">Customer
                                        Address</label>
                                    <div class="">
                                        <textarea class="form-control" placeholder="Enter customer address....." style="height: 100px"
                                            name="address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card body-->
                        <div class="card-footer agent-card-footer">
                            <div class="agent-jfss-btn-holder">

                                
                            </div>
                            <!-- end agent-jfss-btn-holder  -->
                        </div>
                        <!-- end card-footer  -->
                    </div> <!-- end card -->
                </form>
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div>
@endsection
