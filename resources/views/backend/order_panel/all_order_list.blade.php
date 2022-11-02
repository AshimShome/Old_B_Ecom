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


        .header-title2 {
            font-family: 'Inter';
            font-weight: 400;
            font-size: 22px;
            color: #343A40;
        }

        table {
            font-family: 'Tahoma', sans-serif;
        }

        table th,
        table td {
            font-size: 14px;
        }

        table tbody tr td {
            vertical-align: middle;
        }

        .dt-buttons {
            margin-top: 50px;
        }

        .bg-soft-success {
            background: rgba(53, 148, 119, 0.2);
            border-radius: 10px;
            padding: 4px 9px;
            font-size: 14px;
        }

        .bg-success {
            background: #16A085 !important;
            border-radius: 20px;
            padding: 5px 9px;
            font-size: 16px;
            width: 100px;
        }

        .bg-soft-warning {
            background: rgba(247, 184, 75, 0.2);
            border-radius: 10px;
            padding: 4px 9px;
            font-size: 14px;
        }

        .bg-warning {
            background: #F7B84B;
            border-radius: 20px;
            padding: 5px 9px;
            font-size: 16px;
            width: 100px;
        }

        .bg-soft-info {
            background: rgba(79, 198, 225, 0.15);
            border-radius: 10px;
            padding: 4px 9px;
            font-size: 14px;
        }

        .bg-info {
            background: #4FC6E1;
            border-radius: 20px;
            padding: 5px 9px;
            font-size: 16px;
            width: 100px;
        }

        .bg-soft-danger {
            background: rgba(242, 100, 121, 0.2);
            border-radius: 10px;
            padding: 4px 9px;
            font-size: 14px;
        }

        .bg-danger {
            background: #D25600;
            border-radius: 20px;
            padding: 5px 9px;
            font-size: 16px;
            width: 100px;
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
            top: 33px;
        }

        @media (max-width: 1720px) {
            .select-btn-row {
                display: block;
                justify-content: start;
            }

            .select-btn {
                justify-content: start;
            }
        }

        @media (max-width: 767px) {
            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
                justify-content: center;
            }

            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
                right: 0;
                left: 0;
                top: 75px;
            }

            div.dataTables_wrapper div.dataTables_length {
                margin-top: 40px;
            }

            .select-btn {
                justify-content: center;
            }
        }

        @media (max-width: 636px) {
            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
                right: 0;
                left: 0;
                top: 84px;
            }

            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
                margin-top: 20px;
            }
        }
    </style>
@endsection


@section('main-content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                             <!--  Header Top bar search and Title Design Start-->
                         <div class="d-flex justify-content-center align-items-center mb-2 ">
                             <div>
                                <h4 class="header-title" style="font-weight:bold;">All Order List</h4>
                             </div>
                            <div class="mx-5" style="width:26%">
                               <input id="myinput" class="form-control me-2 p-2 w-100" type="text" onkeyup="myFunction()" placeholder="Search............ ">
                           </div>
                         </div>
                    <!--  Header Top bar search and Title Design Start-->
                             <div class="table-responsive">
                                <table id="mytable" class="table table-sm ">
                                <thead>
                                    <tr>
                                        <th>Order Date & Time</th>
                                        <th>Invoice no. / Order no.</th>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Mobile Number</th>
                                        <th>Mobile Number 2</th>
                                        <th>Address</th>
                                        <th>Order Amount</th>
                                        <th>Payment Type</th>
                                        <th>Delivery date & time</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="searchData">
                                            <td>{{ \carbon\carbon::parse($order->order_date)->format('d-m-Y h:i a')}}</td>
                                            <td>{{ $order->invoice_no }}</td>
                                            <td>{{ optional($order->user)->customer_id }}</td>
                                            <td>{{ optional($order->user)->name }}</td>
                                            
                                             <td>{{ optional($order->user)->mobile }}</td>
                                            <td> {{ $order->phone }}</td>
                                            
                                            <td><u>Floor No</u>: {{ $order->floor_no }} <u>Appartment No</u>:
                                                {{ $order->appartment_no }}
                                                <u>Street Address</u>: {{ $order->street_address }}, {{optional($order->postCodes)->postOffice}}, {{ optional($order->postCodes)->upazila}}
                                            </td>
                                            <td>{{ $order->amount }} TK.</td>
                                            <td>
                                                <h5><span
                                                        class="badge bg-soft-info text-info">{{ $order->payment_method }}</span>
                                                </h5>
                                            </td>
                                            <td>{{\carbon\carbon::parse( $order->delivery_date)->format('d-m-Y') }} {{ $order->delivery_time }}</td>
                                            <td>
                                                @if ($order->status == 'Pending')
                                                    <h5><span class="badge bg-danger">Pending</span></h5>
                                                @elseif($order->status == 'confirm')
                                                    <h5><span class="badge bg-primary">Confirm</span></h5>
                                                @elseif($order->status == 'processing')
                                                    <h5><span class="badge bg-warning">Processing</span></h5>
                                                @elseif($order->status == 'picked')
                                                    <h5><span class="badge bg-secondary">Picked</span></h5>
                                                @elseif($order->status == 'shipped')
                                                    <h5><span class="badge bg-info">Shipped</span></h5>
                                                @elseif($order->status == 'delivered')
                                                    <h5><span class="badge bg-success">Delivered</span></h5>
                                                @elseif($order->status == 'cancel')
                                                    <h5><span class="badge bg-danger">Cancel</span></h5>
                                                @endif
                                            </td>
                                            <td><a href="{{route('role.order.allOrdersDetails',['admin',$order->id])}}"><i class="fas fa-eye"
                                                        style="background: #B8E6F0; border-radius: 10px; color: #000; padding: 10px 12px; font-size: 20px;"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
