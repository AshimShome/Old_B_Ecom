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
      text-align: center;
    }

    .print-pdf-part .pdfIcon,
    .excelIcon,
    .printIcon {
      font-size: 26px;
      margin: 0px 15px;
      cursor: pointer;
    }

    table {
      font-family: 'Tahoma', sans-serif;
      white-space: nowrap;


    }

    table th,
    table td {
      font-size: 16px;
    }

    table tbody tr {
      border: 1px solid rgba(0, 0, 0, 0.2);
      color: #000;
    }

    table tbody tr td {
      vertical-align: middle;
      text-align: center;
    }

    table tfoot tr td {
      vertical-align: middle;
      text-align: center;
      color: #000;
    }

    table tfoot {
      background-color: #f3f4f4;
      border: 1px solid #f3f4f4;
    }

    table tbody tr td:first-child {
      background-color: rgba(56, 65, 74, 0.4);
      color: #000;
      font-weight: bold;
    }

    .details-input {
      border: 0;
      border-bottom: 1px solid #ced4da;
      border-radius: 0px;
      font-size: 18px;
    }

    .supplier_n_picker_details .card-body {
      font-family: 'Inter';
    }

    .dt-buttons {
      margin-top: 40px;
    }

    .btn1 {
      padding: 10px 55px;
      background: #0D99FF;
      border-radius: 5px;
      color: #fff;
      margin: 0px 7px;
    }

    .btn2 {
      padding: 10px 55px;
      background: #16A085;
      border-radius: 5px;
      color: #fff;
    }

    .btn1:hover {
      color: #fff;
    }

    .btn2:hover {
      color: #fff;
    }

    .dataTables_wrapper {
      overflow-x: auto;
    }

    .done-btn {
      background-color: #A8AEB3;
      color: #fff;
      border-radius: 5px;
      padding: 5px 25px;
    }

    table thead {
      text-align: center;
    }
    .table th {
      padding: .85rem 0.4rem;
    }

    .table-responsive .donebtn {
      background-color: #fff;
      justify-content: end;
      display: flex;
    }

    .table-responsive .donebtn .btn {
      padding: 7px 40px;
      margin-top: 7px;
      background: #16A085;
      color: #fff;
      border-radius: 10px;
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
        <!-- Start Content-->
        <div class="container-fluid">
          <div class="row mt-4">
              
              <div class="col-4"> <h4 class="header-title">Pickup boy Product list details</h4></div>
              <div class="col-4"> <a href="{{route('role.order.backToPickedOrderProcessList','admin')}}" class="btn btn-success">Confirm</a></div>
           
           
          </div>
          
          <hr style="height: 6px; color: #38414A; border-radius: 5px; margin-top: 10px;">
          <div class="row supplier_n_picker_details">
            <div class="col-lg-12 col-md-12 col-12">
              <div class="card">
                <div class="card-body">
                  <div class="col-lg-10 d-flex justify-content-lg-end justify-content-center print-pdf-part">
                    <div class="pdfIcon"><i class="far fa-file-pdf"></i></div>
                    <div class="excelIcon"><i class="fas fa-file-excel"></i></div>
                    <div onclick="window.print()" class="printIcon"><i  class="fas fa-print"></i></div>
                    
                  </div>
                  <h4 class="header-title2">Picker Details</h4>
                  <div class="row">
                    <div class="col-lg-7" style="width: 50%; margin-left: 25%;">
                      <form>
                        <div class="mb-3 mt-3">
                          <p class="form-control details-input">Picker Id : {{$pickerBoy->employee_office_id}}</p>
                        </div>
                        <div class="mb-3 mt-3">
                          <p class="form-control details-input">Picker Name : {{$pickerBoy->employee_name}}</p>
                        </div>
                        <div class="mb-3 mt-3">
                          <p class="form-control details-input">Mobile no : {{$pickerBoy->employee_phone}}</p>
                        </div>
                        
                        <!-- <div class="mb-3 mt-3">-->
                          <!--<p class="form-control details-input">Total Items: 200</p>-->
                        <!--</div>-->
                        
                        
                      </form>
                    </div> <!-- end col -->
                  </div>
                  <!-- end row-->
                </div> <!-- end card-body -->
              </div> <!-- end card -->
            </div><!-- end col -->
          </div>
          @foreach($orders as $order)
          
              @php
                $totalQty = 0;
                $totalPrice = 0;
              @endphp
              
              <div class="row mb-2">
                <div class="col-lg-12">
                  <button class="btn btn1 mt-2">{{$order->supplyer_name}}</button>
                  
                  <button class="btn btn2 mt-2">{{\Carbon\Carbon::now()->format('d-m-Y h:i A')}}</button>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table mb-0">
                          <thead>
                            <tr>
                              
                              <th>SL NO.</th>
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
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($order->orderItem as $item)
                              
                                <tr>
                                  
                                  <td>{{$loop->iteration}}</td>
                                  <td><img src="{{asset(optional($item->product)->product_thambnail)}}" alt="" height="46" width="40"
                                      style="justify-content: center; display: flex;"></td>
                                  <td>{{optional($item->product)->product_name}}</td>
                                  <td>{{optional($item->product)->product_code}}</td>
                                  <td>{{optional($item->product)->sku_code}}</td>
                                  <td>{{optional($item->product)->supplier_product_code}}</td>
                                  <td>{{$item->color}}</td>
                                  <td>{{$item->size}}</td>
                                 <td>{{optional($item->product)->unit}}</td>
                                  <td>{{$item->qty}}</td>
                                  <td>৳ {{optional($item->product)->unit_price}}</td>
                                  <td><button class="btn btn-success statusChangeButton" data-id={{$item->id}} >Picked Complete</button></td>
                                </tr>
                            
                                @php
                                    $totalQty += $item->qty;
                                    $totalPrice += (optional($item->product)->unit_price*$item->qty);
                                @endphp
                            
                            
                            @endforeach
                          </tbody>
                          <tfoot>
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
                              <td>Total Qty {{$totalQty}}</td>
                              <td>Total Price ৳ {{$totalPrice}}</td>
                              <td></td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
          
        </div> <!-- container -->
      </div> <!-- content -->


@endsection

@section('script')
<script>
    $('.statusChangeButton').on('click', function() {
            
            
            console.log('here');
            
            let itemid = $(this).data('id');
            
            let statusButton = $(this);
            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/admin/order/setStatusToPickedComplete`,
                type: "POST",
                data: {
                    status: 1,
                    id: itemid,
                },
                cache: false,
                success: function(response) {
                    $(statusButton).hide();
                    toastr.success("Order Processing Complete Status Has Been Changed");
                    
                },
                errors: function(e) {
                    toastr.error("Something Went Wrong");
                }
            });

        });
        </script>
@endsection