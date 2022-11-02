@extends('admin.admin_master')
@section('main-content')
  <!-- Start Content-->
  <div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="product-innr d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="header-title mb-3" style="font-size: 24px;"> Return Product List </h4>
                        </div>
                    </div>

                    <div class="product-table" style="overflow-x: auto;">
                        <table id="datatable-buttons" class="datatable-buttons table table-striped dt-responsive nowrap w-100 text-center">
                            <thead>
                                <tr>
                                    <td>Return Date</td>
                                    <td>Supplier Name</td>
                                    <td>Supplier Product Code</td>
                                    <td>Product Code</td>
                                    <td>Product Name</td>
                                    <td>Brand Name</td>
                                     <td>Return QTY</td>
                                    <td>Total Return Amount</td>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ( $supplierReturnProducts  as  $supplierReturnProduct)  
                                      <tr>
                                     <td>{{$supplierReturnProduct->created_at}}</td>
                                     <td>{{$supplierReturnProduct->SupplierDetailes->supplyer_name}}</td>
                                      <td>{{$supplierReturnProduct->SupplierDetailes->supplyer_id_code}}</td>
                                    <td>{{$supplierReturnProduct->product_code}}</td>
                                    <td>{{$supplierReturnProduct->product_name}}</td>
                                    <td>{{$supplierReturnProduct->brand_name}}</td>
                                    <td>{{$supplierReturnProduct->return_qty}}</td>
                                    <td>{{$supplierReturnProduct->return_amount	}} TK.</td>
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


    <!-- Modal JFSS 1 -->

    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content w-75">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit SKU Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body">
                    <h3>Submit SKU Code</h3>

                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1" style="margin-bottom: 10px;">SKU Code</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn jfss-btn1 " data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn  jfss-btn2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal2">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
