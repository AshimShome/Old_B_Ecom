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
      <div class="row mt-4">
        <h4 class="header-title">Supplier List</h4>
      </div>
      <div class="row mt-3">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="datatable-buttons" class="datatable-buttons table table-striped nowrap w-100">
                <thead>
                  <tr class="text-center">
                    <th>Serial no.</th>
                    <th>Supplier Name</th>
                    <th>Supplier ID</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($allSupplier as $sup)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$sup->supplyer_name}}</td>
                            <td>{{$sup->supplyer_id_code}}</td>
                            <td>
                                <a  class="btn btn-danger" href="{{route('role.order.pickedSupplierItemDetails',['admin',$sup->id,$sup->employee_id])}}">Invoice</a>
                            </td>
                            
                      </tr>
                    @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- container -->
  </div> <!-- content -->

@endsection

@section('script')

@endsection