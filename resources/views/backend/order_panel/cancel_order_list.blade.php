@extends('admin.admin_master')
@section('css')
    <style>
        table tr {
            vertical-align: middle;
            font-family: 'Tahoma';
        }

        /* .dataTables_length {
          display: none;
        } */

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
            color: #000000;
        }

        .jfss-edit-btn:hover {
            color: #000000;
        }

        .dt-buttons {
            margin-top: 40px;
        }
    </style>
@endsection


@section('main-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row  mt-4">
               
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                             <!--  Header Top bar search and Title Design Start-->
                         <div class="d-flex justify-content-center align-items-center mb-2 ">
                             <div>
                                <h4 class="header-title" style="font-weight:bold;">Pending Order List</h4>
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
                                        <th>Customer Id</th>
                                        <th>Customer Name</th>
                                        <th>Mobile Number</th>
                                         <th>Mobile Number 2</th>
                                        <th>Address</th>
                                        <th>Amount</th>
                                        <th>Payment Type</th>
                                        <th>Delivery date & time</th>
                                        <th>Order Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="searchData">
                                            <td>{{ \carbon\carbon::parse($order->order_date)->format('d-m-Y h:i a') }}</td>
                                            <td>{{ $order->invoice_no }}</td>
                                            <td>{{ optional($order->user)->customer_id }}</td>
                                            <td>{{ optional($order->user)->name }}</td>
                                            <td>{{ optional($order->user)->mobile }}</td>
                                            <td> {{ $order->phone }}</td>
                                            <td><u>Floor No</u>: {{ $order->floor_no }} <u>Appartment No</u>:
                                                {{ $order->appartment_no }}
                                                <u>Street Address</u>: {{ $order->street_address }}, {{ $order->postCodes->postOffice}}, {{ $order->postCodes->upazila}}
                                            </td>
                                            <td>{{ $order->amount }} TK.</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ \carbon\carbon::parse($order->delivery_date)->format('d-m-Y') }}
                                                {{ $order->delivery_time }}</td>
                                            <td>
                                                <span class="pending">Cancel</span>
                                            </td>
                                            <td><a href="{{route('role.order.cancelOrdersDetails',['admin',$order->id])}}" class="jfss-edit-btn"><i
                                                        class="fe-eye"></i></a>
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
