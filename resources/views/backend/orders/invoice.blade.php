@extends('admin.admin_master')
@section('main-content')
@section('css')
<style>
     
    .table>:not(caption)>*>*{
        padding: .30rem .10rem;
    }
</style>
@endsection
     
  <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                   
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Logo & title -->
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-4">
                                                <div class="float-start">
                                                    <div class="auth-logo">
                                                    @php
                                                    $setting = App\Models\SiteSetting::first();
                                                    @endphp
                                                        <div class="logo logo-dark" >
                                                            <span class="logo-lg ">
                                                                <img src="{{asset(optional($setting)->logo)}}" alt="bppshop" height="32">
                                                            </span>
                                                        </div>
                                                         <br>
                                               
                                                        <div style="padding-left: 22px;>
                                                            <p style="line-height: 14px">Order Date : {{ Carbon\Carbon::parse($order->order_date)->format('j F Y')}} <br> Order Invoice : <span style="font-size: 14px; font-weight:bold">  {{ $order->invoice_no}} </span>  </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="mt-3">
                                                    <h6>Billing Address</h6>
                                                    <p style="line-height: 18px"> 
                                                        17, Alhaz Samsuddin Mansion (9th Floor),<br> Moghbazar, Dhaka-1217</b><br>
                                                        <abbr style="font-size: 14px; font-weight:bold"> Phone: {{ $setting->phone_one }}</abbr> 
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-4 col-sm-4">
                                                <div class="float-start">
                                                    <div class="mt-3">
                                                    
                                                        <h6>Customer  Address </h6>
                                                        <p style="line-height: 18px; font-size: 14px; font-weight:bold">
                                                           Name: {{ optional($order->user)->name }}<br>
                                                            ID: #000598<br>
                                                            Address: Floor: #{{ $order->floor_no }}, Appartment: #{{ $order->appartment_no }}, {{  optional($order)->street_address }} , {{ $order->postCodes->postOffice}}, {{ $order->postCodes->upazila}}<br>
                                                           Email: {{ optional($order->user)->email }}<br>
                                                            <abbr>Phone:  {{ optional($order->user)->mobile }}</abbr> 
                                                            
                                                            
                          
                                                            
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="float-end">
                                                    <h4 class="m-0 d-print-none">Invoice</h4>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-centered">
                                                        <thead>
                                                        <tr><th>Sl No</th>
                                                            <th>Item Name </th>
                                                              <th style="width: 10%">Color</th>
                                                                <th style="width: 10%">Size</th>
                                                                
                                                                  <th style="width: 10%">Weight (gm/ml)</th>
                                                                  
                                                                  
                                                            <th style="width: 10%">QTY</th>
                                                            <th style="width: 10%">Price</th>
                                                            <th style="width: 10%" class="text-end">Total Price</th>
                                                        </tr></thead>
                                                        <tbody>
                                                            @php
                                                            $sub_total = 0;
                                                            @endphp
                                                            
                                                            @foreach($orderItem as $orderItems)
                                                                @php
                                                                $sub_total += optional($orderItems->product)->selling_price * optional($orderItems)->qty;
                                                                @endphp
                                                            @endforeach
                                                            @php
                                                            $count = 1;
                                                            @endphp
                                                        @foreach($orderItem as $item)
                                                            <tr>
                                                                <td>@php echo $count++; @endphp</td>
                                                                <td>
                                                                    <b>{{ optional($item->product)->product_name }}</b> 
                                                                </td>
                                                                
                                                                   <td>{{ optional($item)->color }}</td>
                                                                      <td>{{ optional($item)->size }}</td>
                                                                      
                                                                         <td> {{ optional($item->product)->unit }}</td>
                                                                         
                                                                <td>{{ optional($item)->qty }}</td>
                                                                <td>{{floor(optional($item->product)->selling_price)}} TK.</td>
                                                                <td class="text-end">{{optional($item->product)->selling_price * optional($item)->qty }} TK.</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div> <!-- end table-responsive -->
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
            
                                        <div class="row">
                                            <div class="col-sm-6 mt-2">
                                            
                                            
                                            
                                                <p class="d-flex justify-content-center">
                                                    
                                                    
                               <img style="margin-top: 10px; margin-left: 30px" width="350" height="100px" 
                               src="data:image/png;base64,{{ DNS1D::getBarcodePNG('invoice: '.strval($order->invoice_no), 'C128', 4.0, 30, [1, 1, 1]) }}"
                            alt="barcode" />
                            
                            
                           
                           
                                                </p>
                                                
                                                
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="float-end" style="line-height: 7px">
                                                    <p><b>Sub-total:</b> <span class="float-end">{{$sub_total }} TK.</span></p>
                                                    <p><b>Delivery Charge:</b> <span class="float-end">&nbsp;&nbsp; {{floor($item->order->delivery_charge)}} TK.</span></p>
                                         
                                                    <h5 class="text-end">Total: {{ $sub_total + optional($item->order)->delivery_charge}} TK.</h5>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
            
                                        <div class="mt-4 mb-1">
                                            <div class="text-end d-print-none">
                                                <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer me-1"></i> Print</a>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row --> 
                        
                    </div>   
     
     
     
@endsection


