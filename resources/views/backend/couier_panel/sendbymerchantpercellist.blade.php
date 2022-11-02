  @extends('admin.admin_master')

@section('css')
      <style>
            .merchantParcelList .faEye {
                background: #B8E6F0;
                border-radius: 10px;
                color: #000000;
                padding: 10px 12px;
                font-size: 20px;
            }
            .merchantParcelList .dataTables_length .form-label {
                display: none;
            }
            .merchantParcelList table {
                font-family: 'Tahoma';
            }
            .merchantParcelList table td {
                vertical-align: middle;
            }
            .merchantParcelList th{
                text-align: left;
                display: inline-flexbox;
                justify-content: center;
            }
            .merchantParcelList tr{
                vertical-align: middle;
            }
            .merchantParcelList tr td{
                vertical-align: middle;
                text-align: center;
            }
            .merchantParcelList .pending {
                background: rgba(210, 86, 0, 0.2);
                border-radius: 20px;
                font-family: 'Inter';
                font-weight: 400;
                font-size: 16px;
                color: #D25600;
                padding: 6px 20px;
            }
            .merchantParcelList .complete {
                background: rgba(55, 210, 0, 0.2);
                border-radius: 20px;
                font-family: 'Inter';
                font-weight: 400;
                font-size: 16px;
                color: #37D200;
                padding: 6px 20px;
            }
        </style>
@endsection

@section('main-content')

  <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <h3 class="header-title">Send by Merchant Parcel List</h3>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Parcel Received Date & Time</th>
                                                    <th>Merchant Name</th>
                                                    <th>Merchant Id</th>
                                                    <th>Number of Parcel Quantity</th>
                                                    <th>Cash on Delivery no. of Parcel Quantity</th>
                                                    <th>Payment Complete no. of Parcel Quantity</th>
                                                    <th>Total Parcel Weight</th>
                                                    <th>Payment Type</th>
                                                    <th>Amount</th>
                                                    <th>Total Delivery Charge </th>
                                                    <th>Parcel Picker Name</th>
                                                    <th>Parcel Receive Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2022-05-21  12:53:57</td>
                                                    <td>Mr. Abdul Hakim </td>
                                                    <td>01234568791</td>
                                                    <td>50</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                    <td>70kg</td>
                                                    <td>Cash On Delivery</td>
                                                    <td>500</td>
                                                    <td>100</td>
                                                    <td>Mr. Kamal</td>
                                                    <td><span class="pending">Pending</span></td>
                                                    <td><a href="merchant_single_package_list.html"><i class="fas fa-eye faEye"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>2022-05-21  12:53:57</td>
                                                    <td>Mr. Abdul Hakim </td>
                                                    <td>01234568791</td>
                                                    <td>50</td>
                                                    <td>40</td>
                                                    <td>40</td>
                                                    <td>70kg</td>
                                                    <td>Cash On Delivery</td>
                                                    <td>500</td>
                                                    <td>100</td>
                                                    <td>Mr. Kamal</td>
                                                    <td><span class="complete">Parcel Check Complete</span></td>
                                                    <td><a href="merchant_single_package_list.html"><i class="fas fa-eye faEye"></i></a></td>
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