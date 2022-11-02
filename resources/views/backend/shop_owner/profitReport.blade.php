@extends('admin.admin_master')
@section('main-content')
   <!-- Start Content-->
   <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="d-lg-flex justify-content-lg-between mb-2">
              <div class="col-lg-6 col-md-6 col-12">
                <h4 class="header-title">Product Wise Profit Report</h4>
              </div>
              <div class="col-lg-6 col-md-6 col-12 d-lg-flex d-inline justify-content-lg-end">
                <!-- <div class="col-lg-4 col-12">
                  <input type="text" id="basic-datepicker" class="form-control flatpickr-input active"
                    placeholder="Select Date" readonly="readonly">
                </div> -->
              </div>
            </div>
            <table id="datatable-buttons" class="table table-striped nowrap w-100">
              <thead>
                <tr>
                  <th>Purchase Date</th>
                  <th>Allocated Date</th>
                  <th>Product Code</th>
                  <th>Supplier
                  Product Code</th>
                  <th>Category</th>
                  <th>Product Name</th>
                  <th>Stock</th>
                  <th>Sales QTY</th>
                  <th>After Discount
                  Selling Price</th>
                  <th>Buying Price</th>
                  <th>Profit</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>10 Feb, 2022</td>
                  <td>10 Feb, 2022</td>
                  <td># WBH 5484</td>
                  <td># WBH 5484</td>
                  <td>Category</td>
                  <td>P47 - Wireless Bluetooth
                    Headphone WBH 5484</td>
                  <td>52</td>
                  <td>25</td>
                  <td>৳ 1,00,000</td>
                  <td>৳ 1,00,000</td>
                  <td>৳ 1,00,000</td>
                  <td><a href="#" data-bs-toggle="modal" data-bs-target="#report-modal"><i class="fas fa-edit edit"></i></a></td>
                </tr>
                <tr>
                  <td>10 Feb, 2022</td>
                  <td>10 Feb, 2022</td>
                  <td># WBH 5484</td>
                  <td># WBH 5484</td>
                  <td>Category</td>
                  <td>P47 - Wireless Bluetooth
                    Headphone WBH 5484</td>
                  <td>52</td>
                  <td>25</td>
                  <td>৳ 1,00,000</td>
                  <td>৳ 1,00,000</td>
                  <td>৳ 1,00,000</td>
                  <td><a href="#" data-bs-toggle="modal" data-bs-target="#report-modal"><i class="fas fa-edit edit"></i></a></td>
                </tr>
                <tr>
                  <td>10 Feb, 2022</td>
                  <td>10 Feb, 2022</td>
                  <td># WBH 5484</td>
                  <td># WBH 5484</td>
                  <td>Category</td>
                  <td>P47 - Wireless Bluetooth
                    Headphone WBH 5484</td>
                  <td>52</td>
                  <td>25</td>
                  <td>৳ 1,00,000</td>
                  <td>৳ 1,00,000</td>
                  <td>৳ 1,00,000</td>
                  <td><a href="#" data-bs-toggle="modal" data-bs-target="#report-modal"><i class="fas fa-edit edit"></i></td>
                </tr>
                <tr>
                  <td>10 Feb, 2022</td>
                  <td>10 Feb, 2022</td>
                  <td># WBH 5484</td>
                  <td># WBH 5484</td>
                  <td>Category</td>
                  <td>P47 - Wireless Bluetooth
                    Headphone WBH 5484</td>
                  <td>52</td>
                  <td>25</td>
                  <td>৳ 1,00,000</td>
                  <td>৳ 1,00,000</td>
                  <td>৳ 1,00,000</td>
                  <td><a href="#" data-bs-toggle="modal" data-bs-target="#report-modal"><i class="fas fa-edit edit"></i></td>
                </tr>
              </tbody>
            </table>

          </div> <!-- end card body-->
        </div> <!-- end card -->
      </div><!-- end col-->
    </div>
    <!-- end row-->

  </div> <!-- container -->


  <!--profit modal-->
  <div class="profit-modal">
    <div class="modal fade" tabindex="-1" id="report-modal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Allocated Date</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Days</label>
                    <input class="form-control" type="text" id="name">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light waves-effect waves-light mb-2 me-2" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success waves-effect waves-light mb-2 me-2">Submit</button>
            </div>
          </div>
        </div>
      </div>
  </div>

@endsection
