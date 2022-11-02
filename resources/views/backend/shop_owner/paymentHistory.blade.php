@extends('admin.admin_master')
@section('main-content')
   <!-- Start Content-->
   <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
          <div>
              <h3>All Supplier Payment History</h3>
          </div>
            <table id="datatable-buttons" class="datatable-buttons table table-striped nowrap w-100">
              <thead>
                <tr>
                  <th>Supplier Add Date</th>
                  <th>Supplier Name</th>
                  <th>Supplier Code</th>
                  <th>Ecommerce Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <!--<th>Total Withdrawal Amount</th>-->
                  <!--<th>Total Due Amount</th>-->
                  <!--<th>Total Amount</th>-->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($tatalSuppliers as $tatalSupplier)
                <tr>
                  <td>{{$tatalSupplier->created_at}}</td>
                  <td>{{$tatalSupplier->supplyer_name}}</td>
                  <td>{{$tatalSupplier->supplyer_id_code}}</td>
                 
                  <td>{{optional($tatalSupplier->ecommerce)->ecom_name}}</td>
                  <td>{{$tatalSupplier->supplyer_phone}}</td>
                  <td>{{$tatalSupplier->supplyer_address}}</td>
                  <!--<td>0.00TK</td>-->
                  <!--<td>0.00TK</td>-->
                  <!--<td>0.00TK</td>-->
                  <td>
                  <button> <a class="replyIcon" href="{{route('role.allSuppilerList',[config('fortify.guard'),$tatalSupplier->id])}}"><i class="fa fa-solid fa-eye"></i></a></button>
                  </td>
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
  
  <!-- Modal start View Data -->

@endsection

