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

        .left-side-menu {
            width: 255px;
        }

        .footer {
            left: 255px;
        }

        .qty {
            width: 100%;
            text-align: center;
            position: relative;
            margin-top: 0px;
        }

        .qty .line {
            background-color: #fff;
            width: auto;
            display: inline-block;
            z-index: 3;
            padding: 0 20px 0 20px;
            color: #464646;
            position: relative;
            font-weight: bold;
            margin: 0;
        }

        .qty::after {
            content: '';
            width: 100%;
            border-bottom: 1px solid #000;
            position: absolute;
            left: 0;
            top: 50%;
        }

        .right-arrow {
            position: absolute;
            right: 0;
            top: 3.8px;
            color: #000;
        }

        .left-arrow {
            position: absolute;
            left: 0;
            top: 3.8px;
            color: #000;
        }

        .prdQty {
            border: 1px solid #CED4DA;
            margin-bottom: 0;
            padding: 5px 0;
            text-align: center;
            width: 120px;
        }

        .prdQty:focus {
            outline: none;
        }

        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
            width: 100%;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
            position: absolute;
            right: 20px;
            top: 28px;
        }

        #return-product-submit-modal .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #fff;
        }

        .btn {
            border: transparent;
        }
        
        .btnn {
            border: transparent;
            background: #bebebea6;
            padding: 5px 10px;
        }

        .btn .btn-check:focus+.btn,
        .btn:focus {
            box-shadow: none;
        }

        .addReturnAblePrdBtn {
            display: flex;
            justify-content: end;
        }

        @media (max-width: 1795px) {
            .addReturnAblePrdBtn {
                justify-content: center;
            }
        }

        @media (max-width: 1190px) {
            .addReturnAblePrdBtn {
                justify-content: start;
            }
        }

        @media (max-width: 991px) {
            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
                top: 115px;
                right: auto;
            }

            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
                margin-top: 35px;
            }
        }

        @media (max-width: 767px) {
            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
                justify-content: center;
            }
        }

    </style>
@endsection
@section('main-content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex col-lg-10 mb-2">
                            <div class="col-lg-5">
                                <h4 class="header-title">Customer List</h4>
                            </div>
                        
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-sm-12" style="overflow-x: auto;">
                                    <table id="datatable-buttons"
                                        class="datatable-buttons table table-striped nowrap w-100 dataTable no-footer" role="grid"
                                        aria-describedby="datatable-buttons_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0"
                                                    aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                    aria-sort="descending"
                                                    aria-label="Customer ID: activate to sort column descending"
                                                    style="width: 140.75px;">Order ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Customer Name: activate to sort column ascending"
                                                    style="width: 177.516px;">Order Date</th>
                                                     <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Customer Address: activate to sort column ascending"
                                                    style="width: 177.516px;">Invoice Number</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Email: activate to sort column ascending"
                                                    style="width: 177.516px;">Total Order Quantity</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Mobile Number: activate to sort column ascending"
                                                    style="width: 176.516px;">Status</th>
                                               

                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                            @foreach ($orderdetails as $order)
                                             @php
                                             $orderitem=App\Models\OrderItem::where('order_id',$order->id)->select('qty')->sum('qty');
                                             @endphp
                                            <tr class="odd">
                                                <td class="sorting_1">{{$order->id}}</td>
                                                <td>{{$order->order_date}}</td>
                                                <td>{{$order->invoice_no}}</td>
                                                <td>{{ $orderitem }}</td>
                                                <td>{{$order->status}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div>
@endsection
