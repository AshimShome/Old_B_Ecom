  @extends('admin.admin_master')

@section('css')
  <style>
            table {
                font-family: 'Tahoma', sans-serif;
                white-space: nowrap;
            }
            .merchantList .faEye {
                background: #B8E6F0;
                border-radius: 10px;
                color: #000000;
                padding: 10px 12px;
                font-size: 20px;
            }
            .merchantList .dataTables_length .form-label {
                display: none;
            }
            .merchantList table {
                font-family: 'Tahoma';
            }
            table th{
                text-align: left;
                display: inline-flexbox;
                justify-content: center;
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
        </style>
@endsection

@section('main-content')

 <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <h3 class="header-title">All Parcel Received List from Merchant </h3>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Parcel Received Date & time</th>
                                                    <th>Merchant Name</th>
                                                    <th>Merchant Id</th>
                                                    <th>Number of Parcel Quantity</th>
                                                    <th>Cash on Delivery No. of Parcel Quantity</th>
                                                    <th>Payment Complete No. of Parcel Quantity</th>
                                                    <th>Total Parcel Weight</th>
                                                    <th>Payment Type</th>
                                                    <th>Amount</th>
                                                    <th>Total Delivery Charge</th>
                                                    <th>Parcel Check by</th>
                                                    <th>Parcel Receive Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ( $businessCategorys  as  $businessCategory)
                                                <tr>
                                                    <td>{{ $businessCategory->customer_expected_delivery_time }}</td>
                                                    <td>{{ optional($businessCategory->Merchant)->merchant_name }}</td>
                                                    <td>{{ optional($businessCategory->Merchant)->merchant_id }}</td>
                                                    <td>01238791</td>
                                                    <td>50</td>
                                                    <td>55</td>
                                                    <td>{{ $businessCategory->count('package_weight') }}</td>
                                                    <td>{{ $businessCategory->payment_type }}</td>
                                                    <td>Cash On Delivery</td>
                                                    <td>{{ $businessCategory->sum('delivery_fee') }}</td>
                                                    <td>100</td>
                                                    <td>Mr. Kamal</td>
                                                    <td><a href="delivery_zone_select_page.html"><i class="fas fa-eye faEye"></i></a></td>
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
