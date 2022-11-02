 @extends('admin.admin_master')
@section('main-content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h4 class="header-title">Product List</h4>
                            </div>
                            <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="datatable-buttons_length">
                                            <label class="form-label">Show <select name="datatable-buttons_length"
                                                    aria-controls="datatable-buttons" class="form-select form-select-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12" style="overflow-x: auto;">
                                        <table id="datatable-buttons" class=" table table-striped nowrap w-100 dataTable no-footer" role="grid"
                                            aria-describedby="datatable-buttons_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Date: activate to sort column descending"
                                                        style="width: 77.0781px;">Product Purchase Date</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Product Code: activate to sort column ascending"
                                                        style="width: 107.344px;">Product Code</th>
                                                         <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Product Code: activate to sort column ascending"
                                                        style="width: 107.344px;">Supplier Product Code</th>  
                                                           <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Product Code: activate to sort column ascending"
                                                        style="width: 107.344px;">Brand Name</th>
                                                           <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Product Code: activate to sort column ascending"
                                                        style="width: 107.344px;">Category</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Supplier Product Code: activate to sort column ascending"
                                                        style="width: 176.516px;">Product Name</th>
                                                          <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Product Name: activate to sort column ascending"
                                                        style="width: 253.172px;">Unit Price</th>
                                                        
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Brand Name: activate to sort column ascending"
                                                        style="width: 95.1875px;">Product Qty</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Category: activate to sort column ascending"
                                                        style="width: 73.1562px;">Buying Price</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Unit: activate to sort column ascending"
                                                        style="width: 32.1875px;">Product Return Price</th>
                                                        
                                                        
                                                        <!--  <th class="sorting" tabindex="0"-->
                                                        <!--aria-controls="datatable-buttons" rowspan="1" colspan="1"-->
                                                        <!--aria-label="Unit: activate to sort column ascending"-->
                                                        <!--style="width: 32.1875px;">Zone</th>-->
                                                        <!--  <th class="sorting" tabindex="0"-->
                                                        <!--aria-controls="datatable-buttons" rowspan="1" colspan="1"-->
                                                        <!--aria-label="Unit: activate to sort column ascending"-->
                                                        <!--style="width: 32.1875px;">Acquisition Employee</th>-->
                                                    
                                                   
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Product Return: activate to sort column ascending"
                                                        style="width: 118.328px;">Withdrawal Amount</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Withdrawal Amount: activate to sort column ascending"
                                                        style="width: 156.5px;">Due Amount</th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Total Balance: activate to sort column ascending"
                                                        style="width: 105.219px;">Total Balance</th>
                                                         <th class="sorting" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        aria-label="Total Balance: activate to sort column ascending"
                                                        style="width: 105.219px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                              @foreach ($productList as $supplierList)
                                                <tr class="odd">
                                                    <td>{{ $supplierList->start_date }}</td>
                                                    <td>{{ $supplierList->product_code }}</td>
                                                    <td>{{ $supplierList->supplier->supplyer_id_code }}</td>
                                                    <td>{{ $supplierList->brand->brand_name_cats_eye }}</td>
                                                    <td>{{ $supplierList->category->category_name}}</td>
                                                    <td>{{ $supplierList->product_name }}</td>
                                                    <td>{{ $supplierList->unit}}</td>
                                                    <td>{{ $supplierList->product_qty }} PCS</td>
                                                    <td>{{ $supplierList->purchase_price }} TK.</td>
                                                    <td>{{optional($supplierList->returnHistory)->return_amount}}.Tk.</td>
                                                    <td>{{$supplierList->paymentHistory->total_withdrow_amount}}.Tk.</td>
                                                    <td>{{$supplierList->paymentHistory->due_amount}}.Tk.</td>
                                                    <td>{{$supplierList->paymentHistory->due_amount+$supplierList->paymentHistory->total_withdrow_amount}}.Tk.</td>
                                                    <td class="d-flex gap-2">
                                                    <button class="eyeIcon" data-bs-toggle="modal"
                                                        data-bs-target="#supPrdViewModal"><i
                                                            class="fa fa-solid fa-eye"></i></button>
                                                   
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
    
    <!-- supplier Product view modal -->
    <div class="modal fade" id="supPrdViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Product Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row supPrdViewContainer">
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <p class="viewTitle">Product Code</p>
                            <p class="viewInfo">#12345</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <p class="viewTitle">Brand Name</p>
                            <p class="viewInfo">Brand Name</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <p class="viewTitle">Category</p>
                            <p class="viewInfo">Category</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <p class="viewTitle">Product Name</p>
                            <p class="viewInfo">Product Name</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <p class="viewTitle">Unit (meter)</p>
                            <p class="viewInfo">500 m</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <p class="viewTitle">Quantity</p>
                            <p class="viewInfo">5</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <p class="viewTitle">Buying Price</p>
                            <p class="viewInfo">50000</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <p class="viewTitle">Selling Price</p>
                            <p class="viewInfo">50000</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <p class="viewTitle">Color</p>
                            <p class="viewInfo">red, green</p>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <p class="viewTitle">Size</p>
                            <p class="viewInfo">XL, XXl</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-info px-4" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- supplier Product Edit modal -->
    <div class="modal fade" id="supPrdEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Product Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                     
                      
                        <div class="col-lg-6 mt-3">
                            <label for="prdDepositAmount">Deposit Amount</label>
                            <input type="number" name="" id="prdDepositAmount" class="form-control mt-1" value="" placeholder="0.00TK">
                        </div>
                        
                        <div class="col-lg-6 mt-3">
                            <label for="prdWithdrawAmount">Withdrawal Amount</label>
                            <input type="number" name="" id="prdWithdrawAmount" class="form-control mt-1" value="" placeholder="0.00TK">
                        </div>
                     
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <!-- <button type="button" class="btn btn-info px-4" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
