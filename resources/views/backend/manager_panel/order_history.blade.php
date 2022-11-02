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
      margin-bottom: 20px;
    }

    #datatable-buttons a {
      color: #0D6EFD;
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
      top: 23px;
    }

    @media (max-width: 767px) {
      #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
        justify-content: center;
      }
    }

    @media (max-width: 636px) {
      #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
        right: 0;
        left: 0;
        top: 60px;
      }

      #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
        margin-top: 20px;
      }

      .header-title {
        text-align: center;
      }
    }

    #datatable-buttons .edit {
      font-size: 17px;
    }
  </style>
@endsection
@section('main-content')
 <!-- Start Content-->
 <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="d-lg-flex justify-content-lg-between mb-2">
              <div class="col-lg-6 col-md-6 col-12">
                <h4 class="header-title">Order History</h4>
              </div>
           
            </div>
            <table id="datatable-buttons" class="table table-striped nowrap w-100">
              <thead>
                <tr>
                  <th>Agent ID</th>
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Product QTY</th>
                  <th>Total order Amount</th>
                  <th>Sales Commission</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($all_customer_order_info as $all_orders)
                  @php
                
                  $commission=App\Models\AgentCommission::where('order_id',$all_orders->id)->first();
                  $quantity=App\Models\OrderItem::where('order_id',$all_orders->id)->select('qty')->sum('qty');
            
                  @endphp
                <tr>
                  <td>{{optional(optional($all_orders)->agentpanel)->shop_agent_id_code}}</td>
                  <td>{{optional($all_orders)->user->customer_id}}</td>
                  <td>{{optional($all_orders)->user->name}}</td>
                  <td>{{$quantity}}</td>
                  <td>৳ {{optional($all_orders)->totalAmount}}</td>
                  <td>৳ {{optional($commission)->commission_amount}}</td>
                  <td><a href="{{ route('role.manager_panel.all_customer_order', [config('fortify.guard'), $all_orders->id]) }}"><button class="btn btn-success">See Order Invoice</button></a></td>
                </tr>
                @endforeach
 
              </tbody>
            </table>

          </div> <!-- end card body-->
        </div> <!-- end card -->
      </div><!-- end col-->
    </div>
    <!-- end row-->

  </div> <!-- container -->
@endsection
@section('script')

@endsection
