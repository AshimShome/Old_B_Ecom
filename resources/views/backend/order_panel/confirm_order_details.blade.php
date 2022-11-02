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

        .jfss-order-btn4:hover {
            color: #fff;
        }

        .order-btn-wrap .jfss-order-btn {
            margin-bottom: 20px;
        }

        .social-icon a {
            font-size: 25px;
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

        .confirm-btn {
            background: #dee2e6;
            padding: 5px 20px;
            border-radius: 5px;
            border: none;
        }

        .aferConfirm {
            background-color: rgba(22, 160, 133, 0.2);
            color: #16A085;
        }

     .colorfy {
    background-color: red;
    color: white;
  }
  
  
    </style>
@endsection


@section('main-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                 
                
                <h3 class="pb-2 header-title">Confirmed Order Details </h3>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="order-details-btn-wrap">

                                <div class="order-details-btn-inner">

                                    <div class="order-btn-wrap">
                                        <a href="#" class="btn jfss-order-btn">Invoice no. / Order no.</a>
                                        <a href="{{ route('role.order.setStatusToProcessing', [config('fortify.guard'), $orders->id]) }}"
                                            class="btn jfss-order-btn jfss-order-btn2 "
                                            id="processingButton">Processing
                                            Order</a>
                                            
                                            <!-- <a href="{{ route('role.order.setStatusToProcessing', [config('fortify.guard'), $orders->id]) }}"-->
                                            <!--class="btn jfss-order-btn jfss-order-btn2 {{ $orders->order_items_count !== $orders->assignedEmployee ? 'd-none' : '' }} "-->
                                            <!--id="processingButton">Processing-->
                                            <!--Order</a>-->
                                            
                                            
                                        <a href="{{ route('role.order.setStatusToCancel', [config('fortify.guard'), $orders->id]) }}"
                                            class="btn jfss-order-btn jfss-order-btn3">Cancel Order</a>
                                    </div>
                                    <!-- <br> -->

                                    <a href="#" class="btn jfss-order-btn jfss-order-btn4">#{{ $orders->invoice_no }}</a>

                                </div>
                                <!-- end order-details-btn-inner  -->
                            </div>
                              <h3 class="pb-2 header-title text-center">  </h3>
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
                                        <th>BPP Shops Process by Employee Set</th>
                                        <th>Employee Process by</th>
                                        <th>Status</th>
                                        <th> Product Barcode Print </th>
                                        <th>Confirm Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderItems as $item)
                                        <tr>
                                            <td><img src="{{ asset(optional($item->product)->product_thambnail) }}"
                                                    alt="img1" width="67px;" height="57px"> </td>
                                            <td>{{ optional($item->product)->product_name }}</td>
                                            <td>{{ optional($item->product)->product_code }}</td>
                                            <td>{{ optional($item->product)->sku_code }}</td>
                                            
                                            
                                            
                                                
                                                @if($item->product->supplier->id == 143)
                                                
                                              <td style="color: red; font-size: 25px; font-weight: 900">  {{ optional(optional($item->product)->supplier)->supplyer_name }}     </td>
                                              @else
                                              
                                              <td>
                                                   <td>  {{ optional(optional($item->product)->supplier)->supplyer_name }}     </td>
                                                  
                                              </td>
                                            @endif
                                            
                                            
                                        
                                            
                                            
                                            
                                            <td>{{ optional($item->product)->supplier_product_code }}</td>
                                            <td>{{ $item->color }}</td>
                                            <td>{{ $item->size }}</td>
                                           <td>{{ optional($item->product)->unit }}</td>
                                            <td>{{ $item->qty }}</td>

                                            <td>{{ optional($item->product)->unit_price }} TK.</td>
                                            <td>{{ optional($item->product)->discount_price != 0.0 ? optional($item->product)->discount_price : optional($item->product)->selling_price }}
                                                TK.</td>
                                            <td>
                                                <select class="form-select" data-id="{{ $item->id }}"
                                                    id="employee_list{{ $item->id }}"
                                                    aria-label="Default select example">
                                                    <option selected disabled value="null">Select</option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}"
                                                            {{ $item->comfirm_processed_employee_id == $employee->id ? 'selected' : '' }}>
                                                            {{ $employee->employee_name }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                            </td>
                                            
                                            <td>
                                                @if ($item->employee_processing_status == 1)
                                                    <button class="success ">Processing Complete</button>
                                                @elseif($item->employee_processing_status == 0)
                                                    <button class="cancel">Not Complete</button>
                                                @endif
                                            </td>





                                              <td> <a href="{{ route('role.order.bppshopsbarcodeProductBarCode',['admin',optional($item->product)->id,$orders->invoice_no])}}" 
                                                id="print_bangladesh" class="btn btn-danger" target="_blank">Product Bar Code</a> </td>
                                                
                                                
                                                
                                                

                                            <td class="text-center">
                                                <button id="btn1"
                                                    class="confirm-btn confirm_button{{ $item->id }} {{ $item->comfirm_processed_employee_id !== null ? 'aferConfirm' : '' }}"
                                                    onclick="confirmF({{ $item->id }})">Confirm</button>

                                                <!-- <span id="bt1" class="confirm-btn">confirm</span> -->
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            
                            </div>
                            
                            
                            <!--supplier order all items-->
                            
                            
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
            console.log('here');
            $(this).next('.temp').css('display', 'block');
        });

        $('.statusButton').on('click', function() {
            console.log(this);
            $(this).parent().css('display', 'none');
            $(this).parent().prev('.arrow').css('display', 'block');
            console.log($(this).parent().parent().parent().prev('td').children('.main'));
            let butttonElemnt = $(this).clone();
            $(this).parent().parent().parent().prev('td').children('.main').empty();
            $(this).parent().parent().parent().prev('td').children('.main').append(butttonElemnt);

        });

        // #dee2e6

        $('#bt1').click(function() {
            $('#bt1').css('background', 'rgba(22, 160, 133, 0.2);');
        });

        $('.form-select').on('change', function() {
            item_id = $(this).data('id');
            console.log(item_id);

            $(`.confirm_button${item_id}`).css("background-color", '#dee2e6');
            $(`.confirm_button${item_id}`).css("color", '#000000');
        })



        function confirmF(id) {

            var employee_id = $(`#employee_list${id}`).find(":selected").val();

            if (employee_id != 'null') {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/admin/order/setEmployeeToConfirmOrderProcessing",
                    type: "POST",
                    cache: false,
                    data: {
                        orderItemId: id,
                        employeeId: employee_id,
                    },
                    success: function(response) {

                        $(`.confirm_button${id}`).css("background-color", 'rgba(22, 160, 133, 0.2)');
                        $(`.confirm_button${id}`).css("color", '#16A085');
                        toastr.success("Order Item Status Has Been Changed");
                        checkEmployeeAssignedToAllItem();
                    },
                    errors: function(e) {
                        toastr.error("Something Went Wrong");
                    }
                });
            }

        }

        function checkEmployeeAssignedToAllItem() {
            $.ajax({
                url: "/admin/order/checkEmployeeAssignedToAllItem/{{ $orders->id }}",
                type: "GET",
                success: function(response) {
                    console.log(response[0]);
                    if (response[0].totalItem === response[0].assignedCount) {
                        $('#processingButton').removeClass('d-none');
                    }
                },
                errors: function(e) {
                    toastr.error("Something Went Wrong");
                }
            });
        }

        checkEmployeeAssignedToAllItem();
    </script>
@endsection
