@extends('admin.admin_master')
@section('css')
    <style>
        table {
            font-family: 'Tahoma';
        }

        table tr {
            vertical-align: middle;
            font-family: 'Tahoma';
        }

        /* .dataTables_length {
                                  display: none;
                                }

                                .dataTables_filter {
                                  display: none;
                                } */

        .order-btn-wrap .jfss-order-btn {
            background: #0D99FF;
            color: #fff;
            font-weight: 400;
            font-size: 18px;
            line-height: 22px;
            margin-right: 20px;
        }

        .order-btn-wrap .jfss-order-btn2 {
            background: #16A085;
        }

        .order-btn-wrap .jfss-order-btn3 {
            background: #FF2E2E;
        }

        .jfss-order-btn4 {
            background: #88C604;
            color: #fff;
            font-weight: 400;
            font-size: 18px;
            line-height: 22px;
        }

        .order-btn-wrap .jfss-order-btn {
            margin-bottom: 20px;
        }



        .arrow {
            background: red;
            padding: 31px 80px;
            background: rgba(28, 28, 28, 0.4);
        }

        .temp {
            display: none;
        }

        .temp .success {
            font-weight: 400;
            font-size: 18px;
            line-height: 22px;
            color: #149078;
            background: rgba(22, 160, 133, 0.2);
            border-radius: 5px;
            border: none;
            padding: 6px 20px;
            display: block;
            margin-bottom: 10px;
        }

        .temp .cancel {
            font-weight: 400;
            font-size: 18px;
            line-height: 22px;
            color: #FF2E2E;
            background: rgba(255, 46, 46, 0.2);
            border-radius: 5px;
            border: none;
            padding: 6px 20px;
            display: block;
            margin-bottom: 10px;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main .success {
            font-weight: 400;
            font-size: 18px;
            line-height: 22px;
            color: #149078;
            background: rgba(22, 160, 133, 0.2);
            border-radius: 5px;
            border: none;
            padding: 6px 20px;
            display: block;
            margin-bottom: 10px;
        }

        .main .cancel {
            font-weight: 400;
            font-size: 18px;
            line-height: 22px;
            color: #FF2E2E;
            background: rgba(255, 46, 46, 0.2);
            border-radius: 5px;
            border: none;
            padding: 6px 20px;
            display: block;
            margin-bottom: 10px;
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
            top: 33px;
        }

        @media (max-width: 767px) {
            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
                justify-content: center;
            }

            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
                right: 0;
                left: 0;
                top: 75px;
            }
        }

        /*
                                @media (max-width: 636px) {
                                  #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
                                    right: 0;
                                    left: 0;
                                    top: 84px;
                                  }

                                  #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
                                    margin-top: 20px;
                                  }
                                } */



        @media (max-width: 636px) {

            .order-details-btn-wrap {
                margin-bottom: 50px;
            }

            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
                right: 0;
                left: 0;
                top: 256px;
            }
        }

        .social-icon .messanger {
            color: #00B2FF;
            font-size: 32px;
        }

        .social-icon .whatsapp {
            color: #25D366;
            font-size: 32px;
        }

        .social-icon .mobile {
            color: #222;
            font-size: 32px;
        }
    </style>
@endsection


@section('main-content')
@php
if($order->order_items_sum_pending_status == null)
{
    $order->order_items_sum_pending_status=0;
}
@endphp
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                <h3 class="pb-2 header-title">Pending Order Details</h3>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="order-details-btn-wrap">

                                <div class="order-details-btn-inner">

                                    <div class="order-btn-wrap">
                                        <a href="#" class="btn jfss-order-btn">Invoice no. / Order no.</a>
                                    </div>
                                    <!-- <br> -->

                                    <a href="#" class="btn jfss-order-btn jfss-order-btn4">{{ $order->invoice_no }}</a>

                                </div>
                                <!-- end order-details-btn-inner  -->
                            </div>
                            <!-- end order-details-btn-wrap  -->
                            <div class="table-responsive">
                                <table id="mytable" class="table table-sm ">
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>SKU Code</th>
                                        <th>Supplier Name</th>
                                        <th>Supplier Product Code</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Weight</th>
                                        <th>Quantity</th>
                                        <th>Buying Price</th>
                                        <th>Selling Price</th>
                                        
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderItems as $item)
                                        <tr class="searchData">
                                            <td><img src="{{ asset(optional($item->product)->product_thambnail) }}"
                                                    alt="img1" width="67px;" height="57px"> </td>
                                            <td>{{ optional($item->product)->product_name }}</td>
                                            <td>{{ optional($item->product)->product_code }}</td>
                                            <td>{{ optional($item->product)->sku_code }}</td>
                                            <td>{{ optional(optional($item->product)->supplier)->supplyer_name }}</td>
                                            <td>{{ optional($item->product)->supplier_product_code }}</td>
                                            <td>{{ $item->color }}</td>
                                            <td>{{ $item->size }}</td>
                               
                                               <td>{{ optional($item->product)->unit }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ optional($item->product)->unit_price }} TK.</td>
                                            <td>{{ optional($item->product)->discount_price != 0.0 ? optional($item->product)->discount_price : optional($item->product)->selling_price }} TK.
                                            </td>
                                            <td class="text-center">

                                                <span class="main text-center buttonHolder">
                                                   
                                                        <button class="btn btn-danger">Cancel</button>
                                                    
                                                </span>
                                            </td>

                                           
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
        </div>
    </div>
@endsection

@section('script')
    
@endsection
