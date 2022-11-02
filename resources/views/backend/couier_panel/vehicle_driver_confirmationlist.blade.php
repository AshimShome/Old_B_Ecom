  @extends('admin.admin_master')

@section('css')
 <style>
    table {
      font-family: 'Tahoma', sans-serif;
      white-space: nowrap;
    }
    table.dataTable>thead .sorting:after, table.dataTable>thead .sorting:before, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_asc_disabled:before, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_desc:before, table.dataTable>thead .sorting_desc_disabled:after, table.dataTable>thead .sorting_desc_disabled:before{
      bottom: 1.6rem;
    }
    table th{
      text-align: left;
      display: inline-flexbox;
      justify-content: center;
    }
    table tr{
      vertical-align: middle;
    }
    
    table tr td{
      vertical-align: middle;
      text-align: center;
    }
    table tr td .pending {
      color: #D25600;
      background: rgba(210, 86, 0, 0.2);
      border-radius: 20px;
      padding: 6px 20px;
    }

    table tr td .complete {
      color: #37D200;
      background: rgba(55, 210, 0, 0.2);
      border-radius: 20px;
      padding: 6px 20px;
    }
    .driverConfirmationList .dataTables_length .form-label {
      display: none;
    }
  </style>
@endsection

@section('main-content')
<div class="container-fluid mt-3">
          <div class="row">
            <div class="col-12">
              <div class="mb-2">
                <h3 class="header-title">Zone Wise Vehicle & Driver Confirmation List</h3>
              </div>

              <div class="card">
                <div class="card-body">
                  <table id="datatable-buttons" class="table table-striped nowrap w-100">
                    <thead>
                      <tr>
                        <th>Date & Time</th>
                        <th>Zone</th>
                        <th>Driver Invoice Number <br> or Order Number</th>
                        <th>Driver Name</th>
                        <th>Vehicle No.</th>
                        <th>Total Quantity of <br> Package Handover to Driver</th>
                        <th>Total Package <br> Weight</th>
                        <th>Vehicle Parcel <br> Process by</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2022-05-21  12:53:57</td>
                        <td>Mirpur</td>
                        <td>01234568791</td>
                        <td>Mr. Kalam</td>
                        <td>Dhaka Metro La- 43-5560 </td>
                        <td>10</td>
                        <td>20 Kg</td>
                        <td>Mr. Abdul Hakim</td>
                        <td><span class="pending">Pending</span></td>
                      </tr>
                      <tr>
                        <td>2022-05-21  12:53:57</td>
                        <td>Mirpur</td>
                        <td>01234568791</td>
                        <td>Mr. Kalam</td>
                        <td>Dhaka Metro La- 43-5560 </td>
                        <td>10</td>
                        <td>20 Kg</td>
                        <td>Mr. Abdul Hakim</td>
                        <td><span class="pending">Pending</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div> <!-- end card body-->
              </div> <!-- end card -->
            </div><!-- end col-->
          </div>
          <!-- end row-->
        </div> <!-- container -->

@endsection