@extends('admin.admin_master')
@section('css')
<style>
    
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
    .PickedOrderProcesingList .dataTables_length .form-label {
                display: none;
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
                                <h4 class="header-title" style="font-weight:bold;">Picked Order Processing List</h4>
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
                    <th>Serial no.</th>
                    <th>Picked Order Date & Time</th>
                    <th>Total Product item no</th>
                    
                    <th>Zone</th>
                    <th>Pickup boy name</th>
                    <th>Single Supply Invoice</th>
                    <th>Pickup boy Product list details</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                         <tr class="searchData">
                            <td>{{$loop->iteration}}</td>
                            <td>{{\Carbon\Carbon::today()->format('d-M-Y')}}</td>
                            <td>{{$order->order_item_count}}</td>
                            
                            <td>{{optional($order->zone)->postOffice}}</td>
                            <td>{{$order->employee_name}}</td>
                            <td>
                                <a href="{{route('role.order.singleSupplierInvoice',['admin',$order->id])}}"><i class="fas fa-eye"
                                    style="background: #00FFF0; border-radius: 10px; color: #000; padding: 10px 12px; font-size: 20px;"></i></a>
                            </td>
                            <td>
                                <a href="{{route('role.order.allSupplierInvoice',['admin',$order->id])}}"><i class="fas fa-eye"
                                    style="background: #B8E6F0; border-radius: 10px; color: #000; padding: 10px 12px; font-size: 20px;"></i></a>
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
  </div> <!-- content -->

@endsection

@section('script')

@endsection