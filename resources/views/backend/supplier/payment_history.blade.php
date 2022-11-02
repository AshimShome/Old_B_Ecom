



@extends('admin.admin_master')

@section('main-content') 
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="d-lg-flex justify-content-lg-between mb-2">
                <div class="col-lg-6 col-12 paymentInfo">
                  <h4 class="header-title">Payment History</h4>
                  <p><b> Name:</b> {{$supplierInformation->supplyer_name}}</p>
                  <p><b> ID:</b>{{$supplierInformation->supplyer_id_code}}</p>
                  <p><b>Contact No:</b>{{$supplierInformation->supplyer_phone}}</p>
                  <p><b>Address:</b> {{$supplierInformation->supplyer_address}}</p>
                </div>
                <div class="col-lg-6 col-12 d-lg-flex justify-content-lg-end">
                </div>
              </div>
              <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                  <div class="row">
                      <div class="col-sm-12 col-md-6">
                          <div class="dataTables_length" id="datatable-buttons_length">
                              <label class="form-label">Show <select name="datatable-buttons_length" aria-controls="datatable-buttons" class="form-select form-select-sm">
                                  <option value="10">10</option><option value="25">25</option>
                                  <option value="50">50</option><option value="100">100</option>
                                </select> entries</label>
                         </div>
                      </div>                      
                  </div>
                 <div class="row">
                 <div class="col-sm-12" style="overflow-x: auto;">
                <table id="datatable-buttons" class="datatable-buttons   table table-striped nowrap w-100 dataTable no-footer" role="grid" aria-describedby="datatable-buttons_info">
                <thead>
                  <tr role="row">
                      <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" 
                  colspan="1" aria-sort="ascending" aria-label="Date: activate to sort column descending" style="width: 89.2188px;">Purchase Date</th>
                  
                  <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Product ID: activate to 
                  sort column ascending" style="width: 89.5625px;">Product ID</th>
                  <th class="sorting" tabindex="0" aria-controls="datatable-butt
                  ons" rowspan="1" colspan="1" aria-label="Brand Name: activate to sort column ascending" style="width: 103.688px;">
                      Brand Name</th>
                       <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Product Name: acti
                  vate to sort column ascending" style="width: 373.656px;">Supplier Product Code</th>
                  
                      <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Product Name: acti
                  vate to sort column ascending" style="width: 373.656px;">Product Name</th>
                  
                  <th class="sorting" tabindex="0" aria-controls="dat
                  atable-buttons" rowspan="1" colspan="1" aria-label="Product Price: activate to sort column ascending" style="width: 115.125px
                  ;">Buying Price (Per Unit)</th>
                  <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="
                  Product Return Price : activate to sort column ascending" style="width: 174.859px;">Product Return Price </th>
                  <th class="sorting"
                  tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Withdrawal Amount: activate to sort column ascending"
                  style="width: 168.75px;">Withdrawal Amount</th>
                  
                   <th class="sorting"
                  tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Withdrawal Amount: activate to sort column ascending"
                  style="width: 168.75px;">Due Amount</th>
                  
                  
                  <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="
                  1" aria-label="Total Balance: activate to sort column ascending" style="width: 114.391px;">Total Balance</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($productInformations as $productInformation)    
                <tr class="odd">
                    <td class="sorting_1">{{$productInformation->purchase_date}}</td>
                    <td>{{$productInformation->product_code}}</td>
                    <td>{{$productInformation->brand->brand_name_cats_eye}}</td>
                     <td>{{$productInformation->supplier_product_code}}</td>
                    <td>{{$productInformation->product_name}}</td>
                    <td>{{ optional($productInformation)->unit_price}}.TK.</td>
                    <td>{{ optional($productInformation->returnHistory)->return_amount}}.Tk.</td>
                    <td>{{$productInformation->paymentHistory->total_withdrow_amount}}.Tk.</td>
                    <td>{{$productInformation->paymentHistory->due_amount}}.Tk.</td>
                    <td>{{$productInformation->paymentHistory->due_amount+$productInformation->paymentHistory->total_withdrow_amount}}.Tk.</td>

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
    </div> <!-- container -->
</div>



@endsection