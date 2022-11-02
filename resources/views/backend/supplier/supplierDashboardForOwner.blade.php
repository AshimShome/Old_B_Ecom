@extends('admin.admin_master')
@section('css')
<style>
    .submitArea {
        margin-top: 50px;
        border-radius: 7px;
        padding: 40px;
        box-shadow: 3px 3px 3px 3px grey;
        background-color:#28b779;
        color: white;
        
      }
      .text-size{
          font-size:25px;
      }
      /*.main-head:hover{*/
      /*      background-color: beige;*/
      /*}*/
      
       .submitArea1{
            border-radius: 7px;
        padding: 40px;
        box-shadow: 3px 3px 3px 3px grey;
            background-color:#17a2b8;
              color: white;
       }
         .submitArea2{
              border-radius: 7px;
        padding: 40px;
        box-shadow: 3px 3px 3px 3px grey;
            background-color: #28a745;
              color: white;
       }
         .submitArea3{
              border-radius: 7px;
        padding: 40px;
        box-shadow: 3px 3px 3px 3px grey;
            background-color: #ffc107;
              color: white;
       }
         .submitArea4{
              border-radius: 7px;
        padding: 40px;
        box-shadow: 3px 3px 3px 3px grey;
            background-color: #da542e;
              color: white;
       }
       
       
     .cls-1 {
            fill: #fff;
            opacity: 1.3;
          
        }
     
</style>

@endsection
@section('main-content')

    <div class="container-fluid p-4">

{{-- 1######################################################################################### --}}
        <div class="row">
            <div class="mb-3 main-head"><h2>Dashboard</h2></div>

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                                    <span class="dash-card-icon" >
                                        <svg width="40" height="30" style="margin: 16px;" viewBox="0 0 34 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="cls-1"
                                                d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 
                                                2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875
                                                31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 
                                                31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815
                                                23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                                stroke="#8B6BE8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                      
                                     
            
                                    </span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$totalSupplier}}</span></h4>
                                    <p class="text-muted mb-1 text-truncate">Total Supplier </p>
                                
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                    <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="text-dark mt-1 " ><span data-plugin="counterup">{{$totalProduct}} </span>PCS</h4>
                                    <p class="text-muted mb-1 text-truncate">Total Buying number of Products</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                    <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$SellingNumberOfProduct}}</span> PCS </h4>
                                    <p class="text-muted mb-1 text-truncate">Total Selling number of product</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                    <i class="fe-eye font-22 avatar-title text-warning"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$totalReturnProduct}}</span></h4>
                                    <p class="text-muted mb-1 text-truncate">Total Return number of Product</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>


        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                                    <span class="dash-card-icon" >
                                        <span class="dash-card-icon dash-card-icon2">
                                            <svg style="margin: 16px;" width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.4166 4.83691C14.7494 5.13498 12.2206 6.18009 10.1212 7.85195C8.02187 9.52382 6.43722 11.7545 5.54969 14.2872C4.66216 16.82 4.50781 19.5519 5.1044 22.1685C5.701 24.7851 7.0243 27.18 8.922 29.0777C10.8197 30.9754 13.2147 32.2987 15.8313 32.8953C18.4479 33.4919 21.1797 33.3376 23.7125 32.45C26.2452 31.5625 28.4759 29.9778 30.1478 27.8785C31.8196 25.7791 32.8647 23.2503 33.1628 20.5832H17.4166V4.83691Z"
                                                    stroke="#27BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M32.4393 14.2499H23.75V5.56055C25.7535 6.27135 27.5732 7.42023 29.0764 8.92345C30.5797 10.4267 31.7285 12.2464 32.4393 14.2499Z"
                                                    stroke="#27BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                      
                                     
            
                                    </span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="text-dark mt-1">{{$totalSupplierProductBuyingPurchase}}.Tk</h4>
                                    <p class="text-muted mb-1 text-truncate">Total Supplier Product Buying Purchase

                                    </p>
                                
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                    <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="text-dark mt-1 " >{{ $totalProductSellingPrice }} .Tk</h4>
                                    <p class="text-muted mb-1 text-truncate">Total Product Selling Price</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                    <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="text-dark mt-1">{{$totalReturnProductPrice}}.TK</h4>
                                    <p class="text-muted mb-1 text-truncate">Total Return Product Price</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                    <i class="fe-eye font-22 avatar-title text-warning"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="text-dark mt-1">{{$grocerycurrentTotalStockProductPrice}}.Tk</h4>
                                    <p class="text-muted mb-1 text-truncate">Current Total Stock Price</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>






        <div class="row">

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                                    <span class="dash-card-icon" >
                                        <svg width="40" height="30" style="margin: 16px;" viewBox="0 0 34 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="cls-1"
                                                d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 
                                                2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875
                                                31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 
                                                31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815
                                                23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                                stroke="#8B6BE8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                      
                                     
            
                                    </span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h4 class="text-dark mt-1">{{$currentTotalStockProductPrice}}.TK </h4>
                                    <p class="text-muted mb-1 text-truncate">Current Total Stock Price</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

           
        </div>


{{-- 1######################################################################################### --}}

{{--2 ################################################################ --}}


<div class="row">
    <div class="mb-3 main-head"><h2>Grocery Supplier Dashboard</h2></div>


    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                            <span class="dash-card-icon" >
                                <svg width="40" height="30" style="margin: 16px;" viewBox="0 0 34 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="cls-1"
                                        d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 
                                        2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875
                                        31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 
                                        31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815
                                        23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                        stroke="#8B6BE8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                              
                             
    
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$grocerytotalSupplier}}</span></h4>
                            <p class="text-muted mb-1 text-truncate">All Grocery Supplier Number</p>
                        
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1 " ><span data-plugin="counterup">{{$grocerytotalProduct}}</span> Pcs</h4>
                            <p class="text-muted mb-1 text-truncate">Total Buying number of Products</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                            <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h2 class="text-size" ><span data-plugin="counterup">{{$grocerySellingNumberOfProduct}}</span>.TK</h2>
                            <p class="text-muted mb-1 text-truncate">Total Selling number of product</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-eye font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h2 class="text-size" ><span data-plugin="counterup">{{$grocerytotalReturnProduct}}</span> PCS</h2>
                            <p class="text-muted mb-1 text-truncate">Total Return number of Product</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                            <span class="dash-card-icon" >
                                <span class="dash-card-icon dash-card-icon2">
                                    <svg style="margin: 16px;" width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.4166 4.83691C14.7494 5.13498 12.2206 6.18009 10.1212 7.85195C8.02187 9.52382 6.43722 11.7545 5.54969 14.2872C4.66216 16.82 4.50781 19.5519 5.1044 22.1685C5.701 24.7851 7.0243 27.18 8.922 29.0777C10.8197 30.9754 13.2147 32.2987 15.8313 32.8953C18.4479 33.4919 21.1797 33.3376 23.7125 32.45C26.2452 31.5625 28.4759 29.9778 30.1478 27.8785C31.8196 25.7791 32.8647 23.2503 33.1628 20.5832H17.4166V4.83691Z"
                                            stroke="#27BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M32.4393 14.2499H23.75V5.56055C25.7535 6.27135 27.5732 7.42023 29.0764 8.92345C30.5797 10.4267 31.7285 12.2464 32.4393 14.2499Z"
                                            stroke="#27BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                              
                             
    
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$grocerytotalSupplierProductBuyingPurchase}}</span>.Tk</h4>
                            <p class="text-muted mb-1 text-truncate">Total Supplier Product Buying Purchase

                            </p>
                        
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1 " > <span data-plugin="counterup">{{$grocerytotalProductSellingPrice}}</span>.Tk </h4>
                            <p class="text-muted mb-1 text-truncate">Total Product Selling Price</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                            <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$grocerytotalReturnProductPrice}}</span>.Tk</h4>
                            <p class="text-muted mb-1 text-truncate">Total Return Product Price</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-eye font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$grocerycurrentTotalStockProductPrice}}</span>.Tk</h4>
                            <p class="text-muted mb-1 text-truncate">Current Total Stock Price</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>
<div class="row">

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                            <span class="dash-card-icon" >
                                <svg width="40" height="30" style="margin: 16px;" viewBox="0 0 34 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="cls-1"
                                        d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 
                                        2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875
                                        31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 
                                        31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815
                                        23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                        stroke="#8B6BE8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                              
                             
    
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$grocerycurrentProductQty}}</span> PCS</h4>
                            <p class="text-muted mb-1 text-truncate">Current Total number of Stock</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

   
</div>
{{-- 2#################################################################### --}}

{{--3 ################################################################ --}}

<div class="row">
    <div class="mb-3 main-head"><h2>Islamic Supplier Dashboard</h2></div>


    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                            <span class="dash-card-icon" >
                                <svg width="40" height="30" style="margin: 16px;" viewBox="0 0 34 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="cls-1"
                                        d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 
                                        2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875
                                        31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 
                                        31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815
                                        23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                        stroke="#8B6BE8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                              
                             
    
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$islamictotalSupplier}}</span></h4>
                            <p class="text-muted mb-1 text-truncate">All Islamic Supplier Number</p>
                        
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1 " ><span data-plugin="counterup">{{$islamictotalProduct}}</span> Pcs</h4>
                            <p class="text-muted mb-1 text-truncate">Total Buying number of Products</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                            <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h2 class="text-size" ><span data-plugin="counterup">{{$islamicSellingNumberOfProduct}}</span>.TK</h2>
                            <p class="text-muted mb-1 text-truncate">Total Selling number of product</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-eye font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h2 class="text-size" ><span data-plugin="counterup">{{$islamictotalReturnProduct}}</span> PCS</h2>
                            <p class="text-muted mb-1 text-truncate">Total Return number of Product</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                            <span class="dash-card-icon" >
                                <span class="dash-card-icon dash-card-icon2">
                                    <svg style="margin: 16px;" width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.4166 4.83691C14.7494 5.13498 12.2206 6.18009 10.1212 7.85195C8.02187 9.52382 6.43722 11.7545 5.54969 14.2872C4.66216 16.82 4.50781 19.5519 5.1044 22.1685C5.701 24.7851 7.0243 27.18 8.922 29.0777C10.8197 30.9754 13.2147 32.2987 15.8313 32.8953C18.4479 33.4919 21.1797 33.3376 23.7125 32.45C26.2452 31.5625 28.4759 29.9778 30.1478 27.8785C31.8196 25.7791 32.8647 23.2503 33.1628 20.5832H17.4166V4.83691Z"
                                            stroke="#27BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M32.4393 14.2499H23.75V5.56055C25.7535 6.27135 27.5732 7.42023 29.0764 8.92345C30.5797 10.4267 31.7285 12.2464 32.4393 14.2499Z"
                                            stroke="#27BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                              
                             
    
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$islamictotalSupplierProductBuyingPurchase}}</span>.Tk</h4>
                            <p class="text-muted mb-1 text-truncate">Total Supplier Product Buying Purchase

                            </p>
                        
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1 " > <span data-plugin="counterup">{{$islamictotalProductSellingPrice}}</span>.Tk </h4>
                            <p class="text-muted mb-1 text-truncate">Total Product Selling Price</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                            <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$islamictotalReturnProductPrice}}</span>.Tk</h4>
                            <p class="text-muted mb-1 text-truncate">Total Return Product Price</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-eye font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$islamiccurrentTotalStockProductPrice}}</span>.Tk</h4>
                            <p class="text-muted mb-1 text-truncate">Current Total Stock Price</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>
<div class="row">

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                            <span class="dash-card-icon" >
                                <svg width="40" height="30" style="margin: 16px;" viewBox="0 0 34 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="cls-1"
                                        d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 
                                        2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875
                                        31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 
                                        31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815
                                        23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                        stroke="#8B6BE8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                              
                             
    
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$islamiccurrentProductQty}}</span> PCS</h4>
                            <p class="text-muted mb-1 text-truncate">Current Total number of Stock</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

   
</div>
{{-- 3#################################################################### --}}

  {{--4 ################################################################ --}}


<div class="row">
    <div class="mb-3 main-head"><h2>Fashion Supplier Dashboard</h2></div>


    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                            <span class="dash-card-icon" >
                                <svg width="40" height="30" style="margin: 16px;" viewBox="0 0 34 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="cls-1"
                                        d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 
                                        2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875
                                        31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 
                                        31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815
                                        23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                        stroke="#8B6BE8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                              
                             
    
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$fashiontotalSupplier}}</span></h4>
                            <p class="text-muted mb-1 text-truncate">All Fashion Supplier Number</p>
                        
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1 " ><span data-plugin="counterup">{{$fashiontotalProduct}}</span> Pcs</h4>
                            <p class="text-muted mb-1 text-truncate">Total Buying number of Products</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                            <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h2 class="text-size" ><span data-plugin="counterup">{{$fashionSellingNumberOfProduct}}</span>.TK</h2>
                            <p class="text-muted mb-1 text-truncate">Total Selling number of product</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-eye font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h2 class="text-size" ><span data-plugin="counterup">{{$fashiontotalReturnProduct}}</span> PCS</h2>
                            <p class="text-muted mb-1 text-truncate">Total Return number of Product</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                            <span class="dash-card-icon" >
                                <span class="dash-card-icon dash-card-icon2">
                                    <svg style="margin: 16px;" width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.4166 4.83691C14.7494 5.13498 12.2206 6.18009 10.1212 7.85195C8.02187 9.52382 6.43722 11.7545 5.54969 14.2872C4.66216 16.82 4.50781 19.5519 5.1044 22.1685C5.701 24.7851 7.0243 27.18 8.922 29.0777C10.8197 30.9754 13.2147 32.2987 15.8313 32.8953C18.4479 33.4919 21.1797 33.3376 23.7125 32.45C26.2452 31.5625 28.4759 29.9778 30.1478 27.8785C31.8196 25.7791 32.8647 23.2503 33.1628 20.5832H17.4166V4.83691Z"
                                            stroke="#27BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M32.4393 14.2499H23.75V5.56055C25.7535 6.27135 27.5732 7.42023 29.0764 8.92345C30.5797 10.4267 31.7285 12.2464 32.4393 14.2499Z"
                                            stroke="#27BAD8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                              
                             
    
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$fashiontotalSupplierProductBuyingPurchase}}</span>.Tk</h4>
                            <p class="text-muted mb-1 text-truncate">Total Supplier Product Buying Purchase

                            </p>
                        
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1 " ><span data-plugin="counterup"> {{$fashiontotalProductSellingPrice}}</span>.Tk </h4>
                            <p class="text-muted mb-1 text-truncate">Total Product Selling Price</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                            <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$fashiontotalReturnProductPrice}}</span>.Tk</h4>
                            <p class="text-muted mb-1 text-truncate">Total Return Product Price</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-eye font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$fashioncurrentTotalStockProductPrice}}</span>.Tk</h4>
                            <p class="text-muted mb-1 text-truncate">Current Total Stock Price</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
</div>
<div class="row">

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border" >
                            <span class="dash-card-icon" >
                                <svg width="40" height="30" style="margin: 16px;" viewBox="0 0 34 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="cls-1"
                                        d="M20.25 1H16.75H12.375M4.5 8H29M4.5 8C3.57174 8 2.6815 7.63125 2.02513 6.97487C1.36875 6.3185 1 5.42826 1 4.5C1 3.57174 1.36875 
                                        2.6815 2.02513 2.02513C2.6815 1.36875 3.57174 1 4.5 1H29C29.9283 1 30.8185 1.36875
                                        31.4749 2.02513C32.1313 2.6815 32.5 3.57174 32.5 4.5C32.5 5.42826 32.1313 6.3185 
                                        31.4749 6.97487C30.8185 7.63125 29.9283 8 29 8M4.5 8V20.25C4.5 21.1783 4.86875 22.0685 5.52513 22.7249C6.1815
                                        23.3813 7.07174 23.75 8 23.75H25.5C26.4283 23.75 27.3185 23.3813 27.9749 22.7249C28.6313 22.0685 29 21.1783 29 20.25V8"
                                        stroke="#8B6BE8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                              
                             
    
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h4 class="text-dark mt-1"><span data-plugin="counterup">{{$fashioncurrentProductQty}} </span></h4>
                            <p class="text-muted mb-1 text-truncate">Current Total number of Stock</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

   
</div>
{{-- 4 #################################################################### --}}
        

      

    </div>
@endsection
