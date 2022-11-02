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
            text-align: center;
        }



        .readyToShipped .dataTables_length .form-label {
            display: none;
        }

        .readyToShipped .selectCourier {
            background: #38414A;
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Tahoma';
            padding: 5px 10px;
        }

        .readyToShipped .codeGnrt {
            margin: 0;
            padding: 0;
            background: #4FC6E1;
            border: transparent;
            border-radius: 10px;
            color: #000;
            padding: 7px 10px;
            font-size: 14px;
            font-weight: 500;
            font-family: 'Tahoma';
        }

        .codeGnrtModal {
            display: flex;
            gap: 10px;
        }

        .codeGnrtModal button {
            color: #fff;
            background-color: #4FC6E1;
            border: #4FC6E1;
            padding: 0 10px;
        }
        
        .border_style th{
            border: 1px solid #ddd;
        }
    </style>
@endsection

@section('main-content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid pickedOrderList">
           
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        
                        <!--  Header Top bar search and Title Design Start-->
                         <div class="d-flex justify-content-center align-items-center mb-2 ">
                             <div>
                                <h4 class="header-title" style="font-weight:bold;">Ready to shipped List</h4>
                             </div>
                            <div class="mx-5" style="width:26%">
                               <input id="myinput" class="form-control me-2 p-2 w-100" type="text" onkeyup="myFunction()" placeholder="Search............ ">
                           </div>
                         </div>
                    <!--  Header Top bar search and Title Design Start-->
                     
                            
                     
                                <table id="mytable" class="table table-sm ">
                                <thead class="table-success table-striped">
                                    <tr  class="border_style">
                                        <th>Order Date & Time</th>
                                        <th>Pickedup Order Complete Date & Time</th>
                                        <th>Order no./Invoice no.</th>
                                        <th>Customer Id</th>
                                        <th>Customer Name</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Amount</th>
                                        <th>Payment Type</th>
                                        <th>Product item number</th>
                                        <th>Product packing</th>
                                        <th>Order Barcode</th>
                                           <th>Customer invoice</th>
                                        <th>Order Status</th>
                               
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                         
                             @if(!empty($orders) && $orders->count())
                                @foreach($orders as $key => $order)
                                                     
                                      <tr class="searchData">
                                          <td>{{\Carbon\Carbon::parse($order->order_date)->format('d-M-Y h:i A')}}</td>
                                          <td>{{\Carbon\Carbon::parse($order->picked_date)->format('d-M-Y h:i A')}}</td>
                                          <td>{{$order->invoice_no}}</td>
                                          <td>{{optional($order->user)->customer_id}}</td>
                                          <td>{{optional($order->user)->name}}</td>
                                          <td>{{optional($order->user)->mobile}} </td>
                                          <td><u>Floor No</u>: {{ $order->floor_no }} <u>Appartment No</u>:
                                                {{ $order->appartment_no }}
                                                <u>Street Address</u>: {{ $order->street_address }}, {{ $order->postCodes->postOffice}}, {{ $order->postCodes->upazila}}
                                            </td>
                                          <td>{{$order->amount}}</td>
                                          <td>{{$order->payment_method}}</td>
                                          <td>{{$order->order_items_count}}</td>
                                          <td><span class="btn btn-success">Complete</span> </td>
                                          
                                          <td>
                                              <a id="order_print_invoice" target="_blank" href="{{route('role.order.generateOrderBarCode',['admin',$order->id])}}" 
                                              class="btn btn-danger">Order BarCode Print</a> </td>
                                            
                                             <td style="color:red; font-weight:bold; font-size: 16px">
                                                 <a href="{{route('role.order.customer_invoice',['admin',$order->id])}}">customer invoice</a></td>  
                                             
                                             
                                              
                                          <td>Handover to Courier</td>
                                        
                                      </tr>
                                    @endforeach
                                    
                                     @else
                                            <tr>
                                       <td> no data.</td>
                                       
                                        </tr>
                                @endif
                                
                                
                                </tbody>
                            </table>
                            </div> 
                    
                            
                            {!! $orders->appends(Request::all())->links() !!}
           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div>
@endsection

@section('script')




@endsection
