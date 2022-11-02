@extends('admin.admin_master')
@section('css')
<style></style>
@endsection
@section('main-content')
 <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="d-lg-flex justify-content-lg-between mb-2">
              <div class="col-lg-6 col-md-6 col-12">
                <h4 class="header-title">Customer List </h4>
              </div>
              <div class="col-lg-6 col-md-6 col-12 d-lg-flex d-inline justify-content-lg-end">
              </div>
            </div>
            <table id="datatable-buttons" class="table table-striped nowrap w-100">
              <thead>
                <tr>
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Customer Address</th>
                </tr>
              </thead>
              <tbody>
                  
                 @foreach($agent_all_customer as $all_customer) 
                <tr>
                  <td>{{ $all_customer->customer_id}}</td>
                  <td>{{ $all_customer->name}}</td>
                  <td>{{ $all_customer->email}}</td>
                  <td>{{ $all_customer->mobile}}</td>
                  <td>{{ $all_customer->address}}</td>
                </tr>
                
                @endforeach
                
              </tbody>
            </table>
          </div> <!-- end card body-->
        </div> <!-- end card -->
      </div><!-- end col-->
    </div>
  </div> <!-- container -->
  @endsection
@section('script')

@endsection
