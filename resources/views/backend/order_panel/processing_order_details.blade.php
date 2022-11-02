@extends('admin.admin_master')
@section('css')
    <style>
        .processingOrderDetails .pickBoyName,
        .sbmtBtn {
            background: #FFFFFF;
            border: 1px solid lightgray;
            padding: 5px 15px;
            width: 170px;
        }

        .processingOrderDetails .pickBoyName:focus {
            outline: none;
        }

        .processingOrderDetails .dataTables_length .form-label {
            display: none;
        }

        .processingOrderDetails table {
            font-family: 'Tahoma';
        }

        .processingOrderDetails table td {
            vertical-align: middle;
        }

        .processingOrderDetails .buttons {
            display: flex;
            gap: 8px;
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

        .processingOrderDetails .buttons .invcBtn,
        .pckBtn,
        .idBtn {
            background: #0D99FF;
            border-radius: 5px;
            border: transparent;
            padding: 7px 20px;
            font-family: Tahoma;
            font-weight: 400;
            font-size: 18px;
            color: #FFFFFF;
            margin-bottom: 10px;
        }

        .processingOrderDetails .buttons .pckBtn {
            background: #16A085;
        }

        .processingOrderDetails .idBtn {
            background: #88C604;
        }

        .processingOrderDetails .headerTitle {
            border-bottom: 4px solid #38414A;
            margin-bottom: 30px;
        }

        .processingOrderDetails .headerTitle h3 {
            font-size: 30px;
        }

        .aferConfirm {
            background-color: #16A085;
            color: #FFFFFF;
        }
    </style>
@endsection


@section('main-content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="headerTitle">
                        <h3 class="">Processing Order Details</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="buttons">
                                <button class="invcBtn">Invoice no. / Order no. </button>
                                <button class="pckBtn {{ $orders->order_items_count !== $orders->assignedEmployee ? 'd-none' : '' }}"><a
                                        href="{{ route('role.order.setStatusToPicked', [config('fortify.guard'), $orders->id]) }}"
                                        style="color: #fff;">Picked
                                        Order</a></button>
                            </div>
                            <button class="idBtn">{{ $orders->invoice_no }}</button>
                             <div class="table-responsive">
                                <table id="mytable" class="table table-sm ">
                                <thead>
                                    <tr>
                                        <th>Product Image </th>
                                        <th>Product Name </th>
                                        <th>Product Code </th>
                                        <th>SKU Code</th>
                                        <th>Supplier Name</th>
                                        <th>Supplier Product Code </th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Weight</th>
                                        <th>Quantity</th>
                                        <th>Buying Price</th>
                                        <th>Selling Price</th>
                                        <th>Supplier Zone</th>
                                        <th>Pickup Boy Select</th>
                                        <th>Pickup Boy Confirm Status</th>
                                 
                                        <th>Pickup Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderItems as $item)
                                        <tr>
                                            <td>
                                                <div class="prdImg" style="height: 70px;">
                                                    <img class="img-fluid" style="height:70px"
                                                        src="{{ asset(optional($item->product)->product_thambnail) }}"
                                                        alt="...">
                                                </div>
                                            </td>
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
                                            <td>{{ optional($item->product)->discount_price != 0.0 ? optional($item->product)->discount_price : optional($item->product)->selling_price }}
                                                TK. </td>
                                                
                                                
                                            <td>{{optional(optional(optional($item->product)->supplier)->zone)->postOffice }}</td>
                                            
                                            
                                            
                                            <td>
                                                <select class="form-select" data-id="{{ $item->id }}"
                                                    id="employee_list{{ $item->id }}">
                                                    <option value="null" selected disabled>Select Pickup boy</option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}"
                                                            {{ $item->picked_employee_id == $employee->id ? 'selected' : '' }}>
                                                            {{ $employee->employee_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                @if ($item->picked_employee_status == 1)
                                                    <button class="success ">Pick Complete</button>
                                                @elseif($item->picked_employee_status == 0)
                                                    <button class="cancel">Pick Not Complete</button>
                                                @endif
                                            </td>

                                            <td>
                                                <button onclick="submitFnc({{ $item->id }})"
                                                    class="sbmtBtn confirm-btn confirm_button{{ $item->id }} {{ $item->picked_employee_id !== null ? 'aferConfirm' : '' }}">Submit</button>
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
            <!-- end row-->
        </div> <!-- container -->
    </div>
@endsection

@section('script')
    <script>
        $('.pickBoyName').on('change', function() {
            item_id = $(this).data('id');
            console.log(item_id);

            $(`.confirm_button${item_id}`).css("background-color", '#dee2e6');
            $(`.confirm_button${item_id}`).css("color", '#000000');
        })

        function submitFnc(id) {
            event.target.style.background = '#FFFFFF';
            event.target.style.color = '#FFFFFF';

            var employee_id = $(`#employee_list${id}`).find(":selected").val();

            if (employee_id != 'null') {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "/admin/order/setEmployeeToPickedOrder",
                    type: "POST",
                    cache: false,
                    data: {
                        orderItemId: id,
                        employeeId: employee_id,
                    },
                    success: function(response) {

                        $(`.confirm_button${id}`).css("background-color", '#16A085');
                        $(`.confirm_button${id}`).css("color", '#FFFFFF');
                        $(`.confirm_button${id}`).html("Submitted");
                        toastr.success("Order Item Status Has Been Changed");
                        checkPickBoyAssignedToAllItem();
                        console.log(response);
                    },
                    errors: function(e) {
                        toastr.error("Something Went Wrong");
                    }
                });
            }

        }

        function checkPickBoyAssignedToAllItem() {
            $.ajax({
                url: "/admin/order/checkPickBoyAssignedToAllItem/{{ $orders->id }}",
                type: "GET",
                success: function(response) {
                    console.log(response[0]);
                    if (response[0].totalItem === response[0].assignedCount) {
                        $('.pckBtn').removeClass('d-none');
                    }
                },
                errors: function(e) {
                    toastr.error("Something Went Wrong");
                }
            });
        }

        checkPickBoyAssignedToAllItem();

    </script>
@endsection
