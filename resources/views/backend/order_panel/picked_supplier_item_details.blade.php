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
    .header-title {
      font-family: 'Inter';
      font-weight: 400;
      font-size: 28px;
      color: #6c757d;
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
      font-size: 16px;
    }
    table tbody tr td {
      vertical-align: middle;
      text-align: center;
    }
    .details-input {
      border: 0;
      border-bottom: 1px solid #ced4da;
      border-radius: 0px;
      font-size: 18px;
    }
    .supplier_n_picker_details .card-body {
      height: 650px;
      font-family: 'Inter';
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
      #datatable-buttons_wrapper .row:nth-child(1) > .col-sm-12:nth-child(2) .dataTables_filter {
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
        <!-- Start Content-->
        <div class="container-fluid">
           
           <div class="row mt-3">
               
               <div class="col-lg-5"></div>
               <div class="col-lg-2"><button onclick="window.print()" class="btn btn-success" style="margin-left: 200px">Print</button></div>
                <div class="col-lg-5"></div>
           </div>
          <div class="row mt-4">
               
            <h4 class="header-title">Supplier Item Details</h4>
          </div>
          <hr style="height: 6px; color: #38414A; border-radius: 5px; margin-top: 10px;">
          <div class="row supplier_n_picker_details">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="header-title2 text-center">Supplier Details</h4>
                  <div class="row">
                    <div class="col-lg-12">
                      <form>
                        <div class="mb-3 mt-3">
                          <p class="form-control details-input" > Supplier ID: {{$supplier->supplyer_id_code}} </p>
                        </div>
                        <div class="mb-3 mt-3">
                          
                          <p class="form-control details-input" > Supplier Name: {{$supplier->supplyer_name}} </p>

                        </div>
                        <div class="mb-3 mt-3">
                          
                         <p class="form-control details-input" > Supplier Phone : {{$supplier->supplyer_phone}} </p>

                        </div>
                        <div class="mb-3 mt-3">
                            <p class="form-control details-input" > Supplier Mobile no : {{$supplier->supplyer_phone2}} </p>

                        </div>
                        <div class="mb-3 mt-3">
                            <p class="form-control details-input" > Supplier Delivery Address : {{$supplier->supplyer_address}} </p>
                        </div>
                        <div class="mb-3 mt-3">
                          <p class="form-control details-input" > Zone : {{optional($supplier->zone)->postOffice}} </p>

                        </div>
                        
                        <div class="mb-3 mt-3">
                          <p class="form-control details-input" > Invoice Date and Time : {{\Carbon\Carbon::today()->format('d-M-Y h:i A')}} </p>

                        </div>
                      </form>
                    </div> <!-- end col -->
                  </div>
                  <!-- end row-->

                </div> <!-- end card-body -->
              </div> <!-- end card -->
            </div><!-- end col -->
            <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="header-title2 text-center">Picker Details</h4>

                  <div class="row">
                    <div class="col-lg-12">
                      <form>
                        <div class="mb-3 mt-3">

                            <p class="form-control details-input" > Picker Id : {{$employee->employee_office_id}}</p>

                        </div>
                        <div class="mb-3 mt-3">
                           <p class="form-control details-input" > Picker Name : {{$employee->employee_name}}</p>

                        </div>
                        <div class="mb-3 mt-3">
                          <p class="form-control details-input" > Mobile no : {{$employee->employee_phone}}</p>

                        </div>
                      </form>
                    </div> <!-- end col -->
                  </div>
                  <!-- end row-->

                </div> <!-- end card-body -->
              </div> <!-- end card -->
            </div><!-- end col -->
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                   <div class="table-responsive">
                      <table id="mytable" class="table table-sm ">
                    <thead>
                      <tr>
                        <th>SL NO.</th>
                        <th>Order no./Invoice no.</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>SKU Code</th>
                        <th>Supplier Product Code</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Weight</th>
                        <th>Quantity</th>
                        <th>Buying Price</th>
                      </tr>
                    </thead>
                    @php
                        $totalQty = 0;
                        $totalSum = 0;
                    @endphp
                    <tbody>
                        @foreach($orderItems as $item)
                        
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->orderItemInvoice}}</td>
                            <td><img src="{{asset($item->product_thambnail)}}" alt="" height="46" width="40"
                                style="justify-content: center; display: flex;"></td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->product_code}}</td>
                            <td>{{$item->sku_code}}</td>
                            <td>{{$item->supplier_product_code}}</td>
                            <td>{{$item->product_color}}</td>
                            <td>{{$item->product_size}}</td>
                            <td>{{$item->unit}}</td>
                            <td>{{$item->qty}}</td>
                            <td>৳ {{$item->unit_price}}</td>
                          </tr>
                          @php
                          
                              $totalQty += $item->qty;
                              $totalSum += ($item->qty*$item->unit_price);
                          
                          @endphp
                          
                        @endforeach
                      
                    </tbody>
                    <tfoot style="background-color: #f3f4f4;">
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="color: #000; font-size: 16px;"><b>Total Qty {{$totalQty}} </b></td>
                        <td style="color: #000; font-size: 16px;"><b>Total Price {{$totalSum}} TK.</b></td>
                      </tr>
                    </tfoot>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- container -->
      </div> <!-- content -->

@endsection

@section('script')

@endsection