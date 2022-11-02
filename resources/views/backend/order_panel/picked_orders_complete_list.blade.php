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
      font-size: 16px;
    }

    table tbody tr td {
      vertical-align: middle;
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
      margin-top: 0px;
    }

    .picker-btn {
      background: #38414A;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 5px 10px;
      margin: 10px;
    }

    .Supplier-btn {
      background: #38414A;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 5px 10px;
      margin: 10px;
    }

    .select-btn {
      display: flex;
      justify-content: center;
    }

    option {
      background-color: #fff;
      color: #000;
      border: 1px solid #000;
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
    .cmpltBtn {
      background: #A8AEB3;
      border-radius: 10px;   
      color: #000000;
    }
    .cmpltBtn:hover {  
      color: #000000;
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
                                <h4 class="header-title" style="font-weight:bold;">Picked Order Complete List</h4>
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
                    <th>Processing Order Date & Time</th>
                    <th>Order no./Invoice no.</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>SKU Code</th>
                    <th>Supplier Name</th>
                    <th>Supplier Product Code</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Weight</th>
                    <th>Quantity</th>
                    <th>Buying Price</th>
                    <th>Zone</th>
                    <th>Pickup boy name</th>
                    
                    <th>Check by</th>
                    <th>Check Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($orderItems as $item)
                        <tr class="searchData">
                            <td>{{\Carbon\Carbon::parse(optional($item->order)->order_date)->format('d-M-Y h:i A')}}</td>
                            <td>{{\Carbon\Carbon::parse($item->updated_at)->format('d-M-Y h:i A')}}</td>
                            <td>{{optional($item->order)->invoice_no}}</td>
                            <td><img src="{{asset(optional($item->product)->product_thambnail)}}" alt="" height="46" width="40"
                                style="justify-content: center; display: flex;"></td>
                            <td>{{optional($item->product)->product_name}}</td>
                            <td>{{optional($item->product)->product_code}}</td>
                            <td>{{optional($item->product)->sku_code}}</td>
                            <td>{{optional(optional($item->product)->supplier)->supplyer_name}}</td>
                            <td>{{optional($item->product)->supplier_product_code}}</td>
                            <td>{{$item->color}}</td>
                            <td>{{$item->size}}</td>
                            <td>{{optional($item->product)->unit}}</td>
                            <td>{{$item->qty}}</td>
                            <td>৳ {{optional($item->product)->unit_price}}</td>
                            <td>{{optional(optional(optional($item->product)->supplier)->zone)->postOffice}}</td>
                            <td>{{optional($item->pickedOrderEmployee)->employee_name}}</td>
                            
                            <td>{{optional($item->checkedOrderEmployee)->employee_name}}</td>
                            <td>
                                
                                
                                <a href="{{route('role.order.supplier_ProductBarCode',['admin',optional($item->product)->id,$item->order->invoice_no])}}" 
                                 class="btn btn-danger" target="_blank"   >Product BarCode Print </a>
                                 
                                 

                                @if(!isset($item->checked_employee_id))
                                    <button class="btn btn-info checked" data-item="{{$item->id}}" >Check Completed</button> 
                                @endif
                                
                                <button class="btn btn-dark" onclick="confirmFun()">	Back to Pickup Order</button>
                                
                                @if(!isset($item->ready_to_ship_status))
                                    <button class="btn btn-success shipCheck" data-item="{{$item->id}}">Ready to Shipped</button> 
                                @endif
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
  </div>

@endsection

@section('script')
    <script>
        $('.checked').on('click', function() {
            
            
            console.log('here');
            
            let itemid = $(this).data('item');
            
            let statusButton = $(this);
            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/admin/order/setEmployeeToCheckedItems`,
                type: "POST",
                data: {
                    id: itemid,
                },
                cache: false,
                success: function(response) {
                    $(statusButton).html('Done');
                    $(statusButton).removeClass('checked');
                    $(statusButton).removeClass('btn-success');
                    $(statusButton).addClass('btn-warning');
                    toastr.success("Item Ready To Shiped");
                    
                },
                errors: function(e) {
                    toastr.error("Something Went Wrong");
                }
            });

        });
        
        
        
        $('.shipCheck').on('click', function() {
            
            
            console.log('here');
            
            let itemid = $(this).data('item');
            
            let statusButton = $(this);
            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/admin/order/setReadyToShippedStatus`,
                type: "POST",
                data: {
                    id: itemid,
                },
                cache: false,
                success: function(response) {
                    $(statusButton).html('Shipped Done');
                    $(statusButton).removeClass('shipCheck');
                    $(statusButton).removeClass('btn-info');
                    $(statusButton).addClass('btn-success');
                    toastr.success("Order Checked and Ready To Ship");
                    
                },
                errors: function(e) {
                    toastr.error("Something Went Wrong");
                }
            });

        });
    </script>
    
    
    
    
    
    
     <script>
    
        $('#print_bangladesh').click(function() {
            console.log('this is good click');
            let product_id = $(this).data('id');
             
                url =
                    `/{{ config('fortify.guard') }}/order/generateProductBarCode/${product_id}`;
                let w = window.open(url);
                w.print();
        
        });
 

    </script>
    
    
    
    
    
    
    
    
    
    
@endsection