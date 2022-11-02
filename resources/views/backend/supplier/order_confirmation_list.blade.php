@extends('admin.admin_master')
@section('css')
@endsection
@section('main-content')
    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <h4 class="header-title">Pending Order List</h4>
                                        </div>

                                        <table id="datatable-buttons" class="datatable-buttons table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Order Date & Time</th>
                                                    <th>Invoice no. / Order no</th>
                                                    <th>Delivery date & time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orderConfirmationLists as $orderConfirmationList)
                                                <tr>
                                                    
                                                   
                                                      <td>{{ \carbon\carbon::parse($orderConfirmationList->order_date)->format('d-m-Y h:i a') }}</td>
                                                    
                                                    <td>{{optional($orderConfirmationList)->invoice_no}}</td>
                                                 
                                                       <td>{{ \carbon\carbon::parse(optional($orderConfirmationList)->delivery_date)->format('d-m-Y') }}
                                                       
                                                {{ optional($orderConfirmationList)->delivery_time }}</td>
                                                
                                                
                                                    <td>
                                                        <a href="{{ route('role.orderItemsConfirmationList', ['admin',$orderConfirmationList->id]) }}" class="btn btn-success"> View Order Items </a>
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
  @endsection
      
        
        