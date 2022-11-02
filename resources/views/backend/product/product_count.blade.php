@extends('admin.admin_master')

@section('main-content')

<div class="row">
    <div class="col-6"><h1  > Product Count</h1></div>
    <div class="col-4">
<form method="POST" action="{{route('role.singleEcomProductCount','admin')}}">
    @csrf
    <legend>Select a E-com Name</legend>
   <div class="row">
        <div class="col-6">
             <div class="mb-3">
      <select id="ecom_id" name="ecom_id" class="form-select">
        <option> select One</option>
            @foreach ($Ecom_names as $key => $Ecom_name)
                <option value="{{$Ecom_name->id}}">{{$Ecom_name->ecom_name}}</option>
             @endforeach 

      </select>
    </div>
   </div>
    <div class="col-6">
           <button type="submit" class="btn btn-primary">Submit</button>
   </div>
       
   </div>
   

</form>

</div>
<div class="table-responsive">
<table class="table table table-bordered" style="border:0.5px solid black; ">
  <thead class="table-dark">
   <tr>
      <th width="4%" scope="col">Sl</th>
      <th width="10%" scope="col">E-com Name</th>
      <th width="40%" scope="col">Brand Name</th>
      <th width="20%" scope="col">All Category</th>
      <th width="20%" scope="col">All Supplier</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($Ecom_names as $key => $Ecom_name)
    <tr>
      <td>{{$key+1}}</td>
      <td>
          @php
          $ecom_product_count=App\Models\Product::select('id')->where('ecom_name',$Ecom_name->id)->count();
         
          @endphp
          <b><span style="color:red; font-size:25px;">{{$Ecom_name->ecom_name}} = {{$ecom_product_count}} </span></b>
          </td>
            <td>
          @php
          $brand_products=App\Models\Brand::select('id','brand_name_cats_eye')->where('ecom_id',$Ecom_name->id)->get();
          @endphp
          
          <table class="table " >
              <tr>
                  <td width:100%>
                     
                      <div class="row">
                            @foreach ($brand_products as $brand_product)
                             @php
                             $brand_products_count=App\Models\Product::select('id')->where('brand_id',$brand_product->id)->count();
                            @endphp
                          <div style="border: 1px solid black;"  class ='col-4'>
                              <h>{{$brand_product->brand_name_cats_eye}}= <b><span style="color:red">{{$brand_products_count}}</span></b> </h>
                          </div>
                             @endforeach 
                      </div>
                  </td>
              </tr>
          </table>
          </td>
             <td>
          @php
          $all_Category_products=App\Models\Category::select('id','category_name')->where('ecom_id',$Ecom_name->id)->get();
          @endphp
          <table class="table" >
              <tr>
                  <td width:100%>
                      <div class="row">
                            @foreach ($all_Category_products as $all_Category_product)
                             @php
                             $category_products_count=App\Models\Product::select('id')->where('category_id',$all_Category_product->id)->count();
                            @endphp
                          <div style="border: 1px solid black;"  class ='col-6'>
                              <h>{{$all_Category_product->category_name}}= <b><span style="color:red">{{$category_products_count}}</span></b> </h>
                          </div>
                             @endforeach 
                      </div>
                  </td>
              </tr>
          </table>
          </td>
        <td>
          @php
          $all_supplier_products=App\Models\Supplier::select('id','supplyer_name')->where('ecom_id',$Ecom_name->id)->get();
          @endphp
          
          <table class="table" >
              <tr>
                  <td width:100%>
                      <div class="row">
                            @foreach ($all_supplier_products as $all_supplier_product)
                             @php
                             $supplier_products_count=App\Models\Product::select('id')->where('supplier_id',$all_supplier_product->id)->count();
                            @endphp
                          <div style="border: 1px solid black;"  class ='col-6'>
                              <h>{{$all_supplier_product->supplyer_name}}= <b><span style="color:red">{{$supplier_products_count}}</span></b> </h>
                          </div>
                             @endforeach 
                      </div>
                  </td>
              </tr>
          </table>
          </td>
    </tr>
    @endforeach
  
   
  </tbody>
</table>
</div>
 @endsection
