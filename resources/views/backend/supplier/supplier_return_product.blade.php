@extends('admin.admin_master')
@section('main-content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex justify-content-lg-between mb-2">
                            <div class="col-lg-6">
                                <h4 class="header-title">Return Product</h4>
                            </div>

                        </div>
                        <table id="datatable-buttons" class="datatable-buttons  table table-striped nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Brand Name</th>
                                    <th>Return Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($returnPrductInformation as $item)
                                <tr>
                                    <td>{{$item->product_code}}</td>
                                    <td>{{$item->product_name}}</td>
                                    <td>{{$item->brand->brand_name_cats_eye}}</td>
                                    <td>৳ {{optional($item->returnHistory)->return_amount}}</td>
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
    <!-- return product modal -->
    <div class="return-product-modal">
        <div class="modal fade" tabindex="-1" id="return-product-modal">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Submit SKU Code</h5> <button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3"> <label for="name" class="form-label">SKU Code</label> <input
                                class="form-control" type="text" id="name"> </div>
                    </div>
                    <div class="modal-footer"> <button type="button"
                            class="btn btn-light waves-effect waves-light mb-2 me-2" data-bs-dismiss="modal">Close</button>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#return-product-submit-modal"><button
                                type="button" class="btn btn-success waves-effect waves-light mb-2 me-2">Submit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- return product submit modal -->
@endsection
