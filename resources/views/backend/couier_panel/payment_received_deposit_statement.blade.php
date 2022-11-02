  @extends('admin.admin_master')

@section('css')
 <style>
            table.dataTable>thead .sorting:after, table.dataTable>thead .sorting:before, table.dataTable>thead .sorting_asc:after, table.dataTable>thead .sorting_asc:before, table.dataTable>thead .sorting_asc_disabled:after, table.dataTable>thead .sorting_asc_disabled:before, table.dataTable>thead .sorting_desc:after, table.dataTable>thead .sorting_desc:before, table.dataTable>thead .sorting_desc_disabled:after, table.dataTable>thead .sorting_desc_disabled:before{
                bottom: 1.6rem;
            }
            .zonePaymentReceiveStatement .dataTables_length .form-label {
                display: none;
            }
            .zonePaymentReceiveStatement table {
                font-family: 'Tahoma';
            }
            .zonePaymentReceiveStatement table td {
                vertical-align: middle;
                text-align: center;
            }
            .zonePaymentReceiveStatement th{
                text-align: left;
                display: inline-flexbox;
                justify-content: center;
            }
            .zonePaymentReceiveStatement tr{
                vertical-align: middle;
            }
            .zonePaymentReceiveStatement table
            .zonePaymentReceiveStatement .pending {
                background: rgba(210, 86, 0, 0.2);
                border-radius: 20px;
                font-family: 'Inter';
                font-weight: 400;
                font-size: 16px;
                color: #D25600;
                padding: 6px 20px;
            }
            .zonePaymentReceiveStatement .submit {
                background: rgba(55, 210, 0, 0.2);
                border-radius: 20px;
                font-family: 'Inter';
                font-weight: 400;
                font-size: 16px;
                color: #37D200;
                padding: 6px 20px;
            }
            .zonePaymentReceiveStatement .calender {
                display: block;
                width: 100%;
                padding: 0.45rem 0.9rem;
                font-size: .875rem;
                font-weight: 400;
                line-height: 1.5;
                color: #6c757d;
                background-color: #fff;
                border: 1px solid #ced4da;
                border-radius: 0.2rem;
                appearance: none;
                margin: 20px 0 0 20px;
            }
        </style>
@endsection

@section('main-content')
        <!-- Start Content-->
                    <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <h3 class="header-title">All Zone Payment Received & Deposit Statement</h3>
                                </div>
                                
                                <div class="card">
                                    <div class="col-lg-2 calender-wrapper">
                                        <input type="date" class="calender">
                                    </div>

                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped nowrap w-100">
                                            <thead>
                                                <tr>
                                                   <th>Date & Time</th>
                                                   <th>Zone Name</th>
                                                   <th>Zone Id</th>
                                                   <th>Transaction Completed <br> Person</th>
                                                   <th>Total Payment Received <br> from Courier Boy </th>
                                                   <th>Total Deposit <br> at Bank Account</th>
                                                   <th>Total Cash <br> Expense at Zone</th>
                                                   <th>Balance Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2022-05-21  12:53:57</td>
                                                    <td>Mohakhali</td>
                                                    <td>254878</td>
                                                    <td>Mr. Hamid</td>
                                                    <td>Complete</td>
                                                    <td>2022052</td>
                                                    <td>100000</td>
                                                    <td>100000</td>
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