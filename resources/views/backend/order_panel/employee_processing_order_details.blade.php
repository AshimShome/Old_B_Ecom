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
        

         .success {
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

        .cancel {
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

        .main .statusButton.success {
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

        .main .statusButton.cancel {
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
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                <h3 class="pb-2 header-title " style="color: green">Product Packing Employee Page </h3>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="order-details-btn-wrap">

                                <div class="order-details-btn-inner">

                                    <div class="order-btn-wrap">
                                        <a href="#" class="btn jfss-order-btn">Invoice no. / Order no:
                                            {{ $order->invoice_no }}</a>
                                    </div>
                                    <!-- <br> -->
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
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Weight</th>
                                        <th>Quantity</th>
                                        <th>Buying Price </th>
                                        <th>Selling Price</th>
                                                <th> Product Barcode Print </th>
                                        <th>Product Weight Packing And Bar Code Complete</th>
                                        <th>Processing Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems as $item)
                                        <tr>
                                            <td><img src="{{ asset($item->product_thambnail) }}" alt="Empty Image" width="67px;" height="57px"> </td>
                                            
                                            <td>{{ optional($item->product)->product_name }}</td>
                                            <td>{{ $item->product_code }}</td>
                                            <td>{{ $item->sku_code }}</td>
                                            <td>{{ $item->color }}</td>
                                            <td>{{ $item->size }}</td>
                                            <td>{{ $item->unit }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{optional($item->product)->unit_price }} Tk.</td>
                                            <td>{{  optional($item->product)->discount_price != 0.0 ? optional($item->product)->discount_price : optional($item->product)->selling_price }}
                                                TK.</td>
                                                
                                                
                                                
                                          <td> <a href="{{ route('role.order.bppshopsbarcodeProductBarCode',['admin',optional($item->product)->id,$order->invoice_no])}}" 
                                                id="print_bangladesh" class="btn btn-danger" target="_blank">Product Bar Code</a> </td>
                                                
                                                
                                                
                                                
                                            <td class="text-center">
                                                <span class="main text-center buttonHolder"> </span>
                                                @if ($item->employee_processing_status === 1)
                                                    <button class="success statusButton" 
                                                       >Processing Complete</button>
                                                @elseif($item->employee_processing_status === 0)
                                                    <button class="cancel statusButton" 
                                                        >Not Complete</button>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                @if ($item->employee_processing_status === null)
                                                    <div class="sideMain">

                                                        <span class="arrow"><i
                                                                class="fas fa-angle-down"></i></span>

                                                        <div class="temp">
                                                            <button class="success statusButton" data-status="1"
                                                                data-id="{{ $item->id }}">Processing Complete</button>
                                                            <button class="cancel statusButton" data-status="0"
                                                                data-id="{{ $item->id }}">Not Complete</button>
                                                        </div>


                                                    </div>
                                                @endif
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
    <script>
        $('.arrow').on('click', function(e) {
            $(this).css('display', 'none');

            $(this).next('.temp').css('display', 'block');
        });

        $('.statusButton').on('click', function() {

            let itemStatus = $(this).data('status');
            let itemid = $(this).data('id');
            let mainElement = $(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: `/admin/order/employeeOrderProcessingStatusSet`,
                type: "POST",
                data: {
                    status: itemStatus,
                    id: itemid,
                },
                cache: false,
                success: function(response) {
                    console.log(response);
                    $(mainElement).parent().css('display', 'none');
                    $(mainElement).parent().prev('.arrow').css('display', 'none');
                    let butttonElemnt = $(mainElement).clone();
                    $(mainElement).parent().parent().parent().prev('td').children('.main').empty();
                    $(mainElement).parent().parent().parent().prev('td').children('.main').append(
                        butttonElemnt);
                    $(mainElement).parent().empty();
                    toastr.success("Order Processing Status Has Been Changed");
                },
                errors: function(e) {
                    toastr.error("Something Went Wrong");
                }
            });

        });
    </script>
@endsection
