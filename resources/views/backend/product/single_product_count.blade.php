@extends('admin.admin_master')



@section('main-content')

<div class="row ">
    <div class="col-4"><h1  >{{$Ecom_names->ecom_name}} E-com  Product Count</h1></div>
    <div style='margin-top: 10px;' class="col-2">
           <button id="SingleEComProductPrint" onclick="printDivAllBody()" class="btn btn-primary">Print</button>
   </div>
    <div class="col-6">
</div>
<div class="printDivAllBodyId">
<div class="printDivBrandId">
<div class="table-responsive" >
<table class="table table table-bordered" style="border:0.5px solid black; ">
  <thead class="table-dark">
   <tr>
        <th width="100%" scope="col"> All Brand With Products <button  onclick="printDivBrand()" class="btn btn-primary">Print</button>

        </th>
        
    
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>
         <table class="table " >
              <tr>
                  <td width:100%>
                     
                      <div class="row">
                            @foreach ($brand_products as $brand_product)
                             @php
                             $brand_products_count=App\Models\Product::select('id')->where('brand_id',$brand_product->id)->count();
                            @endphp
                          <div style="border: 1px solid black;"  class ='col-3'>
                              <h>{{$brand_product->brand_name_cats_eye}}={{$brand_products_count}} </h>
                          </div>
                             @endforeach 
                      </div>
                  </td>
              </tr>
          </table>
         
     </td>
    </tr>
  </tbody>
</table>
</div>

</div>
<div class="printDivCategoryId">
<div class="table-responsive">
<table class="table table table-bordered" style="border:0.5px solid black; ">
  <thead class="table-dark">
   <tr>
        <th width="100%" scope="col">All Category With Products  <button   onclick="printDivCategory()" class="btn btn-primary">Print</button> </th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>
         <table class="table " >
              <tr>
                  <td width:100%>
                     
                      <div class="row">
                            @foreach ($all_Category_products as $all_Category_product)
                             @php
                             $category_products_count=App\Models\Product::select('id')->where('category_id',$all_Category_product->id)->count();
                            @endphp
                          <div style="border: 1px solid black;"  class ='col-3'>
                              <h>{{$all_Category_product->category_name}}={{$category_products_count}} </h>
                          </div>
                             @endforeach 
                      </div>
                  </td>
              </tr>
          </table>
         
     </td>
    </tr>
  </tbody>
</table>
</div>

    
</div>
<div class="printDivSupplierId">

    <div class="table-responsive">
<table class="table table table-bordered" style="border:0.5px solid black; ">
  <thead class="table-dark">
   <tr>
        <th width="100%" scope="col">All Supplier With Products   <button  onclick="printDivSupplier()" class="btn btn-primary">Print</button></th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>
         <table class="table " >
              <tr>
                  <td width:100%>
                     
                      <div class="row">
                            @foreach ($all_supplier_products as $all_supplier_product)
                             @php
                             $supplier_products_count=App\Models\Product::select('id')->where('supplier_id',$all_supplier_product->id)->count();
                            @endphp
                          <div style="border: 1px solid black;"  class ='col-3'>
                              <h>{{$all_supplier_product->supplyer_name}}={{$supplier_products_count}} </h>
                          </div>
                             @endforeach 
                      </div>
                  </td>
              </tr>
          </table>
         
     </td>
    </tr>
  </tbody>
</table>
<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
</div>

</div>
</div>
 @endsection
 @section('script')  
 <script>
 
 function printDivAllBody() {

         window.frames["print_frame"].document.body.innerHTML = document.querySelector(".printDivAllBodyId").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
         
                   

       }
      function printDivBrand() {

         window.frames["print_frame"].document.body.innerHTML = document.querySelector(".printDivBrandId").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
         
                   

       }
       
          function printDivCategory() {

         window.frames["print_frame"].document.body.innerHTML = document.querySelector(".printDivCategoryId").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
         
                   

       }
       
         function printDivSupplier() {

         window.frames["print_frame"].document.body.innerHTML = document.querySelector(".printDivSupplierId").innerHTML;
         window.frames["print_frame"].window.focus();
         window.frames["print_frame"].window.print();
         
                   

       }
 </script>
 @endsection


 

