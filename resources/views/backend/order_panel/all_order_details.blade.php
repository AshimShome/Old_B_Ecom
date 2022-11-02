@extends('admin.admin_master')
@section('css')
    <style>
        .allOrderDetails .track-order-list a {
            text-decoration: none;
            color: #343a40;
        }

        .allOrderDetails table thead tr,
        .allOrderDetails table tbody tr {
            text-align: center;
            vertical-align: middle;
            font-size: 16px;
        }
    </style>
@endsection


@section('main-content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <h3 class="py-3">All Order Details</h3>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Track Order</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mt-0">Invoice no. / Order no.</h5>
                                        <p>#{{ $order->invoice_no }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="track-order-list">
                                <ul class="list-unstyled">
                                    <li class="{{ $order->order_date != null ? 'completed' : '' }}">
                                        <h5 class="mt-0 mb-1"><a href="#">Pending Orders</a></h5>
                                        <p class="text-muted">
                                            {{ \carbon\carbon::parse($order->order_date)->format('M d Y') }} <small
                                                class="text-muted ps-3">{{ \carbon\carbon::parse($order->order_date)->format('h:i A') }}</small>
                                        </p>
                                    </li>
                                    <li class="{{ $order->confirmed_date != null ? 'completed' : '' }}">
                                        <h5 class="mt-0 mb-1"><a href="#">Confirmed Orders</a></h5>
                                        <p class="text-muted">
                                            {{ \carbon\carbon::parse($order->confirmed_date)->format('M d Y') }} <small
                                                class="text-muted ps-3">{{ \carbon\carbon::parse($order->confirmed_date)->format('h:i A') }}</small>
                                            <small class="text-muted ps-3">{{optional($order->confirmOrderEmployee)->employee_name}}</small> </p>
                                    </li>
                                    <li class="{{ $order->processing_date != null ? 'completed' : '' }}">
                                        <h5 class="mt-0 mb-1"><a href="#">Processing Orders</a></h5>
                                        <p class="text-muted">
                                            {{ \carbon\carbon::parse($order->processing_date)->format('M d Y') }} <small
                                                class="text-muted ps-3">{{ \carbon\carbon::parse($order->processing_date)->format('h:i A') }}</small>
                                            <small class="text-muted ps-3">{{optional($order->processingOrderEmployee)->employee_name}}</small> </p>
                                    </li>
                                    <li class="{{ $order->picked_date != null ? 'completed' : '' }}">
                                        <h5 class="mt-0 mb-1"><a href="#">Picked Orders</a></h5>
                                        <p class="text-muted">
                                            {{ \carbon\carbon::parse($order->picked_date)->format('M d Y') }} <small
                                                class="text-muted ps-3">{{ \carbon\carbon::parse($order->picked_date)->format('h:i A') }}</small>
                                            <small class="text-muted ps-3">{{optional($order->pickOrderEmployee)->employee_name}}</small> </p>
                                    </li>
                                    <li class="completed">
                                        <h5 class="mt-0 mb-1"><a href="#">Picked Order Processing</a></h5>
                                        <p class="text-muted">May 30 2022 <small class="text-muted ps-3">07:30
                                                AM</small> <small class="text-muted ps-3">not functional</small> </p>
                                    </li>
                                    <li>
                                        <span class="active-dot dot"></span>
                                        <h5 class="mt-0 mb-1"><a href="#">Picked Order Complete</a></h5>
                                        <p class="text-muted">May 30 2022 <small class="text-muted ps-3">07:30
                                                AM</small> <small class="text-muted ps-3">not functional</small> </p>
                                    </li>
                                    <li>
                                        <h5 class="mt-0 mb-1"><a href="#">Ready to Shipped</a></h5>
                                        <p class="text-muted">May 30 2022 <small class="text-muted ps-3">07:30
                                                AM</small> <small class="text-muted ps-3">{{optional($order->readyOrderEmployee)->employee_name}}</small> </p>
                                    </li>
                                    <li class="{{ $order->shipped_date != null ? 'completed' : '' }}">
                                        <h5 class="mt-0 mb-1"><a href="#">Shipped Orders</a></h5>
                                        <p class="text-muted">
                                            {{ \carbon\carbon::parse($order->shipped_date)->format('M d Y') }} <small
                                                class="text-muted ps-3">{{ \carbon\carbon::parse($order->shipped_date)->format('h:i A') }}</small>
                                            <small class="text-muted ps-3">Mr.Abdul Karim</small> </p>
                                    </li>
                                    <li class="{{ $order->delivered_date != null ? 'completed' : '' }}">
                                        <h5 class="mt-0 mb-1"><a href="#">Delivered Orders</a></h5>
                                        <p class="text-muted">
                                            {{ \carbon\carbon::parse($order->delivered_date)->format('M d Y') }} <small
                                                class="text-muted ps-3">{{ \carbon\carbon::parse($order->delivered_date)->format('h:i A') }}</small>
                                            <small class="text-muted ps-3">Mr.Abdul Karim</small> </p>
                                    </li>
                                    <li class="{{ $order->cancel_date != null ? 'completed' : '' }}">
                                        <h5 class="mt-0 mb-1"><a class="{{ $order->cancel_date != null ? 'text-danger':''}}" href="#">Cancel Orders</a></h5>
                                        <p class="text-muted">
                                            {{ \carbon\carbon::parse($order->cancel_date)->format('M d Y') }} <small
                                                class="text-muted ps-3">{{ \carbon\carbon::parse($order->cancel_date)->format('h:i A') }}</small>
                                            <small class="text-muted ps-3">{{optional($order->cancelOrderEmployee)->employee_name}}</small> </p>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3">Items from Order #{{ $order->invoice_no }}</h3>

                            <div class="table-responsive">
                                <table class="table table-bordered table-centered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Product name</th>
                                            <th>Product Code</th>
                                            <th>SKU Code</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                             <th>Weight</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderItems as $item)
                                            <tr class="searchData">
                                                <th scope="row">{{optional($item->product)->product_name}}</th>
                                                <td>{{optional($item->product)->product_code}}</td>
                                                <td>{{optional($item->product)->sku_code}}</td>
                                                <td>{{$item->color}}</td>
                                                <td>{{$item->size}}</td>
                                                 <td>{{optional($item->product)->unit}}</td>
                                                <td>{{$item->qty}}</td>
                                                <td>৳ {{optional($item->product)->discount_price!=0.00? optional($item->product)->discount_price:optional($item->product)->selling_price}}</td>
                                                <td>৳ {{$item->price}}</td>
                                            </tr>
                                        @endforeach


                                        <tr>
                                            <th scope="row" colspan="8" class="text-end">Sub Total :</th>
                                            <td>
                                                <div class="fw-bold">৳ {{$order->amount}}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="8" class="text-end">Shipping Charge :</th>
                                            <td>৳ {{$order->delivery_charge}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="8" class="text-end">Estimated Tax :</th>
                                            <td>৳ {{$order->vat}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="8" class="text-end">Total :</th>
                                            <td>
                                                <div class="fw-bold">৳ {{$order->amount+$order->delivery_charge+$order->vat}}</div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row" style="display:flex; justify-content:center">
                <div class="col-lg-4">
                    <div class="card" style="border: 1px solid #4FC6E1; background: #4fc6e11a; height: 225px;">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Customer Information</h4>

                            <h5 class="font-family-primary fw-semibold">{{optional($order->user)->name}}</h5>

                            <p class="mb-2"><span class="fw-semibold me-2">Address:</span>Floor No: {{$order->floor_no}}, Appartment No: {{$order->appartment_no}},
                            {{$order->street_address}}, {{optional($order->postCodes)->postOffice}} </p>
                            
                            <p class="mb-2"><span class="fw-semibold me-2">Phone:</span> {{$order->phone}}</p>
                            <p class="mb-0"><span class="fw-semibold me-2">Mobile:</span> {{optional($order->user)->mobile}}</p>

                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-4">
                    <div class="card" style="border: 1px solid #16A085; background: #16a0851a; height: 225px;">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Delivery Address</h4>

                            <div class="text-center">
                                <i class="mdi mdi-truck-fast h2 text-muted"></i>
                                <p class="mb-1"><span class="fw-semibold">Order ID :</span> {{$order->invoice_no}}</p>
                                <p class="mb-0"><span class="fw-semibold">Payment Mode :</span> {{$order->payment_method}}</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
