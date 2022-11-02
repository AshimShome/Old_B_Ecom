  @extends('admin.admin_master')

@section('css')
   <style>
            .pckgDetailsListMerchant .faEye {
                background: #B8E6F0;
                border-radius: 10px;
                color: #000000;
                padding: 10px 12px;
                font-size: 20px;
            }
            .pckgDetailsListMerchant .dataTables_length .form-label {
                display: none;
            }
            .pckgDetailsListMerchant table {
                font-family: 'Tahoma';
            }
            .pckgDetailsListMerchant table td {
                vertical-align: middle;
                text-align: center;
            }
        </style>
@endsection

@section('main-content')
<div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <h3 class="header-title">All Package Details List from Merchant</h3>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Parcel Received Date & Time </th>
                                                    <th>Merchant Id</th>
                                                    <th>Merchant Parcel Number</th>
                                                    <th>Invoice Number or Order Number</th>
                                                    <th>Customer Name</th>
                                                    <th>Customer Phone Number</th>
                                                    <th>Customer Address</th>
                                                    <th>Package Category</th>
                                                    <th>Package Weight</th>
                                                    <th>Customer Expected Delivery Time</th>
                                                    <th>Payment Type</th>
                                                    <th>Product Price</th>
                                                    <th>Delivery Fee</th>
                                                    <th>Receivable Amount from Customer</th>
                                                    <th>Zone</th>
                                                    <th>Process by</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2022-05-21  12:53:57</td>
                                                    <td>20225455</td>
                                                    <td>453453</td>
                                                    <td>011675545425</td>
                                                    <td>Mr. Sharif</td>
                                                    <td>011675545453</td>
                                                    <td>Moghbazar, Dhaka 1219</td>
                                                    <td>Vacuum Packaging</td>
                                                    <td>50kg</td>
                                                    <td>2022-05-21  12:53:57</td>
                                                    <td>Cash On Delivery</td>
                                                    <td>10000</td>
                                                    <td>60</td>
                                                    <td>10060</td>
                                                    <td>Moghbazar, Dhaka 1217</td>
                                                    <td>Mr. Jamal kHAN</td>
                                                    <td><a href="#ggh"><i class="fas fa-eye faEye"></i></a></td>
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