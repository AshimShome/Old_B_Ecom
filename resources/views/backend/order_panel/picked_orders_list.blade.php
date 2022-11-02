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
    .processingOrderList .dataTables_length .form-label {
        display: none;
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
    <div class="container-fluid pickedOrderList">
     
      <div class="row mt-3">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                 <!--  Header Top bar search and Title Design Start-->
                         <div class="d-flex justify-content-center align-items-center mb-2 ">
                             <div>
                                <h4 class="header-title" style="font-weight:bold;">Picked Order List</h4>
                             </div>
                            <div class="mx-5" style="width:26%">
                               <input id="myinput" class="form-control me-2 p-2 w-100" type="text" onkeyup="myFunction()" placeholder="Search............ ">
                           </div>
                         </div>
                    <!--  Header Top bar search and Title Design Start-->
             <div class="table-responsive">
                                <table id="mytable" class="table table-sm ">
                <div class="row select-btn-row">
                  <div class="col-xl-6"></div>
                  <div class="select-btn col-xl-6 col-lg-12">
                    <select class="picker-btn">
                      <option>Picker</option>
                      <option>Mr. XYZ</option>
                      <option>Mr. XYZ</option>
                      <option>Mr. XYZ</option>
                    </select>
                    <select class="Supplier-btn">
                      <option>Supplier</option>
                      <option>Mr. XYZ</option>
                      <option>Mr. XYZ</option>
                      <option>Mr. XYZ</option>
                    </select>
                  </div>
                </div>
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)

                    <tr class="searchData">
                      <td>{{ \carbon\carbon::parse($order->order_date)->format('d-m-Y h:i a')}}</td>
                      <td>{{ \carbon\carbon::parse($order->picked_date)->format('d-m-Y h:i a')}}</td>
                      <td>{{ $order->invoice_no }}</td>
                      <td><img src="../assets/images/mango.png" alt="" height="46" width="40"
                          style="justify-content: center; display: flex;"></td>
                      <td>Mango</td>
                      <td>66167554</td>
                      

                      <td>66167554</td>
                      <td>Mr.abcdef</td>
                      <td>66167554</td>
                      <td>Red</td>
                      <td>M</td>
                      <td>2kg</td>
                      <td>20</td>
                      <td>৳  600</td>
                      <td>Moghbazar, Gulsan, Dhaka</td>
                      <td>Mr.XYZ, Mr.ABC, Mr.Been</td>
                      <td>
                          <a href="picked_supplier_item_details.html"><i class="fas fa-eye"
                              style="background: #4FC6E1; border-radius: 10px; color: #000; padding: 10px 12px; font-size: 20px;"></i></a>
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

@endsection