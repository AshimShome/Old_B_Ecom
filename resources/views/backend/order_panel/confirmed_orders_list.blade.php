@extends('admin.admin_master')
@section('css')
    <style>
        table tr {
            vertical-align: middle;
            font-family: 'Tahoma';
        }

        table tr td .pending {
            color: #D25600;
            background: rgba(210, 86, 0, 0.2);
            border-radius: 20px;
            padding: 6px 20px;
        }

        .jfss-edit-btn {
            background: #B8E6F0;
            border-radius: 10px;
            padding: 7px 12px;
            color: #000;
        }

        .jfss-edit-btn:hover {
            color: #000;
        }

        table tr {
            vertical-align: middle;
            font-family: 'Tahoma';
        }

        table tr td .pending {
            color: #D25600;
            background: rgba(210, 86, 0, 0.2);
            border-radius: 20px;
            padding: 6px 20px;
        }

        .jfss-edit-btn {
            background: #B8E6F0;
            border-radius: 10px;
            padding: 7px 12px;
        }

        .dt-buttons {
            margin-top: 40px;
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

        @media (max-width: 767px) {
            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
                justify-content: center;
            }

            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
                right: 0;
                left: 0;
                top: 75px;
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
        <div class="container-fluid ">
            <div class="row mt-4">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!--  Header Top bar search and Title Design Start-->
                            <div class="d-flex justify-content-center align-items-center mb-2 ">
                                <div>
                                    <h4 class="header-title" style="font-weight:bold;">Confirmed Order List</h4>
                                </div>
                                <div class="mx-5" style="width:26%">
                                    <input id="myinput" class="form-control me-2 p-2 w-100" type="text"
                                        onkeyup="myFunction()" placeholder="Search............ ">
                                </div>
                            </div>
                            <!--  Header Top bar search and Title Design Start-->
                            <div class="table-responsive">
                                <table id="mytable" class="table table-sm ">
                                    <thead class="table-success table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order Date & Time</th>
                                                <th>Confirm Order Date & Time</th>
                                                <th>Order no./Invoice no.</th>
                                                <th>Customer ID</th>
                                                <th>Customer Name</th>
                                                <th>Mobile Number</th>
                                                <th>Mobile Number 2</th>
                                                <th>Address</th>
                                                <th>Order Amount</th>
                                                <th>Payment</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="searchData">
                                                <td>{{ \carbon\carbon::parse($order->order_date)->format('d-m-Y h:i a') }}
                                                </td>
                                                <td>{{ \carbon\carbon::parse($order->confirmed_date)->format('d-m-Y h:i a') }}
                                                </td>
                                                <td>{{ $order->invoice_no }}</td>
                                                <td>{{ optional($order->user)->customer_id }}</td>
                                                <td>{{ optional($order->user)->name }}</td>
                                                <td>{{ optional($order->user)->mobile }}</td>
                                                <td> {{ $order->phone }}</td>
                                                <td><u>Floor No</u>: {{ $order->floor_no }} <u>Appartment No</u>:
                                                    {{ $order->appartment_no }}
                                                    <u>Street Address</u>: {{ $order->street_address }},
                                                    {{ $order->postCodes->postOffice }},
                                                    {{ $order->postCodes->upazila }}
                                                </td>
                                                <td>{{ $order->amount }} TK.</td>
                                                <td>{{ $order->payment_method }}</td>
                                                <td>
                                                    <span class="text-primary" style="font-weight: bold;">Confirmed</span>
                                                </td>
                                                <td><a href="{{ route('role.order.confirmOrdersDetails', ['admin', $order->id]) }}"
                                                        class="jfss-edit-btn"><i class="fe-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
        </div>
    </div>
@endsection
