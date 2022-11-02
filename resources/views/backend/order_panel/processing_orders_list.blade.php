@extends('admin.admin_master')
@section('css')
    <style>
        .processingOrderList .prcDn button {
            background: #FFFFFF;
            border: 1px solid #B8B8B8;
            border-radius: 5px;
            padding: 7px 12px;
            color: #6c757d;
        }

        .processingOrderList .faEye {
            background: #B8E6F0;
            border-radius: 10px;
            color: #000000;
            padding: 10px 12px;
            font-size: 20px;
        }

        .processingOrderList .dataTables_length .form-label {
            display: none;
        }

        .jfss-edit-btn {
            background: #B8E6F0;
            border-radius: 10px;
            padding: 7px 12px;
        }

        .processingOrderList table {
            font-family: 'Tahoma';
        }

        .processingOrderList table td {
            vertical-align: middle;
        }
    </style>
@endsection


@section('main-content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid mt-3">
            <div class="row mt-3">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <!--  Header Top bar search and Title Design Start-->
                            <div class="d-flex justify-content-center align-items-center mb-2 ">
                                <div>
                                    <h4 class="header-title" style="font-weight:bold;">Processing Order List</h4>
                                </div>
                                <div class="mx-5" style="width:26%">
                                    <input id="myinput" class="form-control me-2 p-2 w-100" type="text"
                                        onkeyup="myFunction()" placeholder="Search............ ">
                                </div>
                            </div>
                            <!--  Header Top bar search and Title Design Start-->
                            <div class="table-responsive">
                                <table id="mytable" class="table table-sm ">
                                    <thead>
                                        <tr>
                                            <th>Order Date & Time</th>
                                            <th>Processing Order Date & Time</th>
                                            <th>Order no./Invoice no.</th>
                                            <th>Customer Id</th>
                                            <th>Customer Name</th>
                                            <th>Mobile Number</th>
                                            <th>Mobile Number 2</th>
                                            <th>Address</th>
                                            <th>Amount</th>
                                            <th>Payment</th>
                                            <!--<th>Product check by</th>-->
                                            <th>Order Status</th>
                                            <th>BPP Shops Processing</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="searchData" id="row{{ $order->id }}">
                                                <td>{{ \carbon\carbon::parse($order->order_date)->format('d-m-Y h:i a') }}
                                                </td>
                                                <td>{{ \carbon\carbon::parse($order->processing_date)->format('d-m-Y h:i a') }}
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
                                                <td>{{ $order->amount }}</td>
                                                <td>{{ $order->payment_method }}</td>
                                                <!--<td>Mr.XYZ, Mr.ABC, Mr.Been</td>-->
                                                <td> <span class="btn btn-info"> Processing</span></td>
                                                <td class="prcDn text-center">
                                                    <button onclick="highlight(this,{{ $order->id }})"
                                                        class="btn btn-success"
                                                        style="color: rgb(255, 255, 255); font-weight:bold">Processing
                                                        done</button>
                                                </td>

                                                <td><a href="{{ route('role.order.processingOrdersDetails', [config('fortify.guard'), $order->id]) }}"
                                                        class="jfss-edit-btn"><i class="fas fa-eye faEye"></i></a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container -->
    </div>
@endsection

@section('script')
    <script>
        var buttonClicked = null;

        function highlight(element, order_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/admin/order/processDone',
                type: "POST",
                data: {
                    order: order_id,
                },

                success: function(response) {
                    console.log(response);
                    toastr.success("Order Processing Complete");
                    $(`#row${order_id}`).hide();
                }
            });


            buttonClicked = element;
            buttonClicked.style.background = "#16A085";
            buttonClicked.style.color = "white";
        }
    </script>
@endsection
