@extends('admin.admin_master')

@section('main-content')

 {{--  Delivery Code generate  --}}
 <div class="modal fade DeliveryCode" id="DeliveryCode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" > Delivery Code Generate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body" style="background-color: white">
                    <div class="form-group mx-sm-1 mb-1">
                        <label for="">Print Quantity</label>
                        <input  class="submit_id" type="hidden">
                        <input  class="form-control-sm print_quantity" type="text">
                        <button  data-dismiss="modal" class="btn btn-success submit">Print</button>
                    </div>
                </div>
            </div>
        </div>
</div>
{{--  Delivery Code generate end  --}}


<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card" style="margin-left: 50px">
                    <div class="card-body">
                        <div class="mb-2">
                            <h4 class="header-title">Pending Orders List </h4>
                        </div>

                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                             
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-buttons" class="datatable-buttons table table-striped dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid"
                                    aria-describedby="datatable-buttons_info" style="width: 1581px;">
                                        <thead>
                                            <tr role="row">

                                                <th>Order Date</th>
                                                <th>Invoice</th>
                                                <th>order Amount</th>
                                                <th>Payment</th>
                                                <th>Barcode generate</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>

                                        <tbody>

                                            @foreach ($orders as $item)

                                            <tr class="odd">
                                                <td>{{ $item->order_date }}</td>
                                                <td>{{ $item->invoice_no }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->payment_method }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success deliverycode" data-bs-toggle="modal"
                                                        data-bs-target="#DeliveryCode"  data-id="{{ $item->id }}" >
                                                            Delivery Code Generate
                                                    </button>
                                                </td>

                                                <td width="25%">
                                                    <a href="{{route('role.pending.orders.details',[config('fortify.guard'),$item->id ])}}"
                                                        class="action-icon view-icon"><i class="fa fa-eye"></i>
                                                    </a>
                                                </td>

                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

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
{{-- deliveryCode start --}}
<script>
    $(function() {
        $('.deliverycode').click(function() {
            let order_id = $(this).data('id');
            $('.submit_id').val(order_id);
            //alert("hello");
            $('#DeliveryCode').modal('show');
            // $('#print_quantity').val('show');
            $('#closemodal').click(function() {
                $('#DeliveryCode').modal('hide');
            });
            $('.submit').click(function() {

                let print_quantity = $('.print_quantity').val();
                let order_id = $('.submit_id').val();

                $('#DeliveryCode').modal('hide');
                url =
                    `/{{ config('fortify.guard') }}/orders/get/deliverycode/${order_id}/${print_quantity}`;
                let w = window.open(url);
                w.print();
            });
        });
    });

</script>

@endsection
