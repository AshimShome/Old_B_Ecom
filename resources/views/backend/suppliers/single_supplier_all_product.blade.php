@extends('admin.admin_master')
{{-- section id is yeild name --}}
@section('main-content')
<div class="container-full">
    <section class="content">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="box">
                                        <div style="font-size:18px;" class="col-lg-6 col-12 paymentInfo">
                                        <h4 class="header-title">Supplier Product List</h4>
                                        <p><b>Supplier Name :</b>{{$supplierDetails->supplyer_name}}</p>
                                        <p><b>Acquisition Name :</b>{{optional($supplierDetails->zone)->postOffice}}</p>
                                     
                                        <p><b>Zone Name :</b>{{optional($supplierDetails->acquisiton)->employee_name}}</p>
                                        <p><b>Supplier ID :</b>{{$supplierDetails->supplyer_id_code}}</p>
                                        <p><b>Contact No :</b>{{$supplierDetails->supplyer_phone}}</p>
                                        <p><b>Address :</b> {{$supplierDetails->supplyer_address}}</p>
                                        </div>
                                  <form action="{{route('role.supplierAllProductShowSearch',[config('fortify.guard'),$supplier_id])}}" method="post"> 
                                  @csrf
                                  <div class="row">
                                  <div class="col-md-2">
                                    <label for="fromDate">From Date</label>
                                    <input type="date" name="fromDate" id="fromDate" class="form-control" />
                                  </div>
                                  <div class="col-md-2">
                                    <label for="toDate">To Date</label>
                                    <input type="date" name="toDate" id="toDate" class="form-control" />
                                  </div>
                                  <div class="col-md-2">
                                    <br>
                                    <button type="submit" class="btn btn-info">Search</button>
                                  </div>
                                 </div>
                                </form>                           
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="datatable-buttons"
                                            class=" datatable-buttons table table-striped">
                                            <thead>
                                                <tr>
                                                     <th>Purchase Date</th>
                                                     <th>Product Code</th>
                                                      <th>Supplier Product Code</th>
                                                     <th>Brand Name</th>
                                                     <th>Category</th>
                                                    <th>Product Name</th>
                                                     <th>Unit Price</th>
                                                      <th>Product Qty</th> 
                                                      <th>Buying Price</th>
                                                    <th>Product Return Price</th>
                                                    <th>Withdrawal Amount </th> 
                                                  
                                                    <th>Due Amount </th>
                                                    <th>Total Balance</th>

                                                    
                                                      
                                                    <!-- <th>Ecommerce Name</th>-->
                                                    
                                                    <!--  <th>Suplier Name</th>-->
                                                     
                                                    <!--<th>Category Name</th>-->
                                                  
                                                    <!-- <th>Unit</th>-->
                                                   
                                                    <!-- <th> Unit Price</th>-->
                                                    <!-- <th>Old Purchase Price</th>-->
                                                    
                                                </tr>
                                            </thead>
                                            
                                            <!--@php-->
                                            <!--dd($supplierAllProductShows);-->
                                            <!--@endphp-->
                                            
                                                <tbody >
                                                    @foreach ($supplierAllProductShows as $supplierAllProductShow)
                                                <tr>
                                                    
                                                    <td>{{$supplierAllProductShow->purchase_date}}</td>
                                                    <td>{{optional($supplierAllProductShow)->product_code}}</td>
                                                     <td>{{optional($supplierAllProductShow->supplier)->supplyer_id_code}}</td>
                                                    <td>{{optional($supplierAllProductShow->brand)->brand_name_cats_eye}}</td>
                                                    <td>{{optional($supplierAllProductShow->category)->category_name}}</td>
                                                     <td>{{optional($supplierAllProductShow)->product_name}}</td>
                                                    <td>{{optional($supplierAllProductShow)->unit_price}}</td>
                                                    <td>{{optional($supplierAllProductShow)->product_qty}}</td>
                                                    <td>{{optional($supplierAllProductShow)->old_purchase_price}}</td>
                                                     <td>{{optional($supplierAllProductShow->returnHistory)->return_amount}}</td>
                                                    <td>{{optional($supplierAllProductShow->paymentHistory)->withdrawal_amount}}</td>
                                                    <td>{{optional($supplierAllProductShow->paymentHistory)->due_amount}}</td>
                                                     <td>{{optional($supplierAllProductShow)->purchase_price}}</td>




                                                    
                                                    
                                                    <!--<td>{{optional($supplierAllProductShow->ecommerce)->ecom_name}}</td>-->
                                                    <!--<td>Supplier name</td>-->
                                                    <!-- <td>Unit</td>-->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- table res.. end -->
                                </div> <!-- box body end -->
                            </div> <!-- box end -->
                        </div> <!-- col end -->
                    </div>
                </div>
            </div> <!--  row end-->
        </div>
    </section>
</div>

@endsection
