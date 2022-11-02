@extends('frontend.main_master')
@section('islamic')
<style>
#overlay_background {
  -webkit-transform: scale(1);
          transform: scale(1);
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.4);
  opacity: 1;
  z-index: 1;
  -webkit-transition: opacity .3s linear;
  transition: opacity .3s linear;
   border-radius: 5px; }
  .isotopeSelector.stock-out-wrapper .overlay-background  .overlay-add-to-bag{
   color: #fff;
   display: block
  }
  .isotopeSelector.stock-out-wrapper .border-portfolio:hover:after {
    -webkit-animation: portfolio-circle 0.5s ease;
            animation: none;
            /* animation: portfolio-circle 0.5s ease;  */
         }
  .isotopeSelector.stock-out-wrapper .border-portfolio:hover:before {
    -webkit-animation: portfolio-circle 0.8s ease;
            animation: none;
            /* animation: portfolio-circle 0.8s ease; */
         }

    .collection-banner-main:nth-child(2) {
        margin-top: 14px !important;
    }

    .slick-track {
        display: flex !important;
    }

    .slick-slide {
        height: inherit !important;
    }
    @media screen and (max-width: 600px) {
        .latest-discounted-products-banner{
              display: none;
         }
        .img-fluid {
            margin-top: 5px; 
        }
    }
    
    .selling-product-info h6{
        white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
          max-width: 250px;
    }
  .color_see_more{
    font-size: 20px;
    margin-bottom: 41px;
    background-color: green;
    color: white;
    border:none;
}

.color_see_more:hover{
    background-color: #00ab00;
    color:white;
}
.latestdiscountproductsName{
    height: 100px;
}
.latestdiscountproductsNameLineClam{
    height: 30px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    font-size: 12px;
    
}
#faruk_with_shuvo{
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow:hidden;
}
.grocery-home .main-content .top-buttons .top-button-feature{
    height:60px;
}
.grocery-home .main-content .top-buttons button span{
    font-size:14px;
}
    .latest-discounted-products .discounted-product-card {
    border-radius: 10px;
}
.grocery-home .latest-discounted-products .overlay-add-to-bag {
    border-radius: 0px;
    height: 93%;
    width: 93%;
    margin: 8px 8px;
}

.serach_loader{
        position: fixed;
        width: 100%; 
        height: 100%; 
        
        display: none;
        justify-content: center;
        /*top: 0%;*/
        left: 0%;
        z-index: 9999;
        background-color: rgba(0,0,0,0.5);

    }
    .serach_loader > .loader{
        margin: auto;
        height: 150px;
        width: 260px;
        background: #fff;
        border-radius: 20px;
        padding: 15px;
        text-align: center;
    }
   
    .spinner-border {
        width: 6rem;
        height: 6rem;
    }

</style>





gfgfg
<!--====================== All E-com Product Show ===========================-->
  <div id="popular-products" class="section-title-no-bg px-md-5 px-3 mt-5">
          <h4 class="pt-3 text-center">Popular Products</h4>
       </div>
       
        <div class="serach_loader">
            <div class="loader">
                <div class="loaderElement">
                    <div class="spinner-border text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                    <p >Please wait...</p>
                </div>
               
            </div>
        </div>
       <section class="popular-products mt-4">
           <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <label style="font-size: 13px; color: red; line-height: 1.2" for="prodictSearchWithAjax">Search By: Product ID & Name </label>
                    <input type="text" class="form-control" placeholder="Serach here (Type and click enter key)..." id="prodictSearchWithAjax">
                </div>
            </div>
          <div class="product-gallery-wrapper  portfolio-section grid-portfolio ratio2_3 portfolio-padding ">
             <div class="ec-card-group card-group zoom-gallery portfolio-2 px-lg-5 pt-lg-2 pb-lg-3 px-3 py-3">

        

               @foreach ($all_product_show as $all_product)
                <div class="isotopeSelector filter all ec-card-lg">
                   <div class="overlay ec-card-inner">
                      <div class="border-portfolio">
                         <div class="card product-port added-to-bag">
                            <div class="image-overlay-container">
                               <img src="{{ asset($all_product->product_thambnail) }}" class="img-fluid  bg-img"
                                  alt="">
                            </div>
                            <div class="text-center mt-3 mb-1">
                               <h4 class="text-dark"> {{ $all_product->product_name }}</h4>
                               <b>{{ $all_product->unit }}</b>
                               <h4 class="price">
                                   
                                   
                                   
                                <!-- Selling and Discount Price Start -->
                                @if ($all_product->discount_price == 0)
                                <h4 style="color:black"> <span style="font-size:15px">৳</span>
                                    {{ intval($all_product->selling_price) }} </h4>
                                @else
                                <h4>
                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                        {{ intval($all_product->discount_price) }}</span>
                                    <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                            {{ intval($all_product->selling_price) }}</s></span>
                                </h4>
                                @endif
                                <!-- Selling and Discount Price End -->
                                
                                
                               </h4>
                            </div>
                            <?php
                            $productName = strval("'" . $all_product->product_name . "'");
                            ?>
                            
                            @if($all_product->product_qty <= 0)
                                <div id="overlay_background">
                                 <button class="overlay-add-to-bag" id="overlay_background"
                                 disabled>
                                 <div class="text-danger">
                                    Stock <br> Out
                                 </div>
                                 </button>
                               <div class="overlay-button" id="add_inc_dec" style="display: none;">
                                  <h4 class="overlay-product-amount">TK. <span class="pro-price">420.0</span></h4>
                                  <div class="overlay-product-quantity">
                                     <button class="btn incre-btn" onclick="quickViewQunatityIncrOverlay(event)"><i
                                           class="fas fa-plus"></i></button>
                                     <input class="quantity-text" id="input_value" type="text" value="1">
                                     <button class="btn decre-btn" onclick="quickViewQunatityDecOverlay(event)"><i
                                           class="fas fa-minus"></i></button>
                                  </div>
                                  <h4 class="overlay-product-in-bag">In Bag</h4>
                               </div>
                              
                                </div>
                                 </div>
        
                                 <div class="d-flex justify-content-center cart-details-btn ">
                                   <a href="#" style="pointer-events: none;"><button
                                           class="btn btn-primary-filled px-4" disabled><i
                                               class="fas fa-cart-plus me-2"></i>Stock Out
                                       </button></a>
        
                               </div>
                            @else
                                <div class="overlay-background">
 
                                 <button class="overlay-add-to-bag"
                                 
                                  onclick="addToCart({{ $all_product->id }}, <?php echo $productName; ?>)"
                                >
                                 <div class="text-white">
                                    Add <br> To <br> Bag
                                 </div>
                                 </button>
                                 
                                 
                                 
                               <div class="overlay-button" id="add_inc_dec" style="display: none;">
                                  <h4 class="overlay-product-amount">TK. <span class="pro-price">420.0</span></h4>
                                  <div class="overlay-product-quantity">
                                     <button class="btn incre-btn" onclick="quickViewQunatityIncrOverlay(event)"><i
                                           class="fas fa-plus"></i></button>
                                     <input class="quantity-text" id="input_value" type="text" value="1">
                                     <button class="btn decre-btn" onclick="quickViewQunatityDecOverlay(event)"><i
                                           class="fas fa-minus"></i></button>
                                  </div>
                                  <h4 class="overlay-product-in-bag">In Bag</h4>
                               </div>
                               <a class="overlay-details-link"
                                                    onclick="groceryproductView({{ $all_product->id }})"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#groceryproductQuickViewModal">Details
                                                    >></a>
                            </div>
                         </div>

                         <div class="d-flex justify-content-center cart-details-btn ">
                           <a onclick="addToCart({{ $all_product->id }}, <?php echo $productName; ?>)"
                               ><button
                                   class="btn btn-primary-filled px-4"><i
                                       class="fas fa-cart-plus me-2"></i>Shop Now
                               </button></a>

                       </div>
                            @endif    
                      </div>
                   </div>
                </div>
                @endforeach             
             </div>
          </div>
       </section>
<!--====================== All E-com Product Show end ========================-->









 <script>
   //======================== Search option start ======================//
   let searchById = document.getElementById("searchId");
   
       searchById.addEventListener("keyup", event => {
           let searchBy = event.target.value;
           if(searchBy !=''){
                  $.ajax({
                      url:"{{ route('searchproduct.ajax') }}",
                      method:"GET",
                      data:{squery:searchBy},
                      success:function(response){
                       //  console.log(response);
                       $("#show-list").html(response);
                      }
                  });
              }else{
               $.ajax({
                      url:"{{ route('searchproduct.ajax') }}",
                      method:"GET",
                      data:{squery:searchBy},
                      success:function(response){
                       //  console.log(response);
                       $("#show-list").html('');
                      }
                  });
              }
   
       });
   
   //======================== Search option end ======================//
   </script>



@endsection

@section('script')
<script>
    function loadMoreData(page){
           $.ajax({
               url:'?page='+page,
               type:'get',
               beforeSend:function(){
                   $('.loading_img_section').show();
               }
           })
           .done(function(response){
                // console.log(response);
            
               if(response.data.length == 0){
                   $('.loading_img_section').html('');
                   return;
               }

               $('.loading_img_section').hide();
               let loadData='';
               $.each(response.data,function(index,value){
                loadData+= `
                        
                        <div class="isotopeSelector filter all ec-card-lg">
                   <div class="overlay ec-card-inner">
                      <div class="border-portfolio">
                         <div class="card product-port added-to-bag">
                            <div class="image-overlay-container">
                               <img src="/${ value.product_thambnail }" class="img-fluid  bg-img"
                                  alt="">
                            </div>
                            <div class="text-center mt-3 mb-1">
                               <h4 class="text-dark"> ${value.product_name }</h4>
                               <b>${value.unit }</b>
                               <h4 class="price">
                                   
                                   
                                   
                                <!-- Selling and Discount Price Start -->`;
                                if (value.discount_price == 0){
                                loadData+= `<h4 style="color:black"> <span style="font-size:15px">৳</span>
                                   ${value.selling_price} </h4>`;
                                }else{
                                loadData+= `<h4>
                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                        ${value.discount_price}</span>
                                    <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                           ${value.selling_price}</s></span>
                                </h4>`;
                                    }
                                loadData+=`<!-- Selling and Discount Price End -->
                                
                                
                               </h4>
                            </div>`;
                         
                            
                            if(value.product_qty <= 0){
                                loadData+= `<div id="overlay_background">
                                 <button class="overlay-add-to-bag" id="overlay_background"
                                 disabled>
                                 <div class="text-danger">
                                    Stock <br> Out
                                 </div>
                                 </button>
                               <div class="overlay-button" id="add_inc_dec" style="display: none;">
                                  <h4 class="overlay-product-amount">TK. <span class="pro-price">420.0</span></h4>
                                  <div class="overlay-product-quantity">
                                     <button class="btn incre-btn" onclick="quickViewQunatityIncrOverlay(event)"><i
                                           class="fas fa-plus"></i></button>
                                     <input class="quantity-text" id="input_value" type="text" value="1">
                                     <button class="btn decre-btn" onclick="quickViewQunatityDecOverlay(event)"><i
                                           class="fas fa-minus"></i></button>
                                  </div>
                                  <h4 class="overlay-product-in-bag">In Bag</h4>
                               </div>
                              
                                </div>
                                 </div>
        
                                 <div class="d-flex justify-content-center cart-details-btn ">
                                   <a href="#" style="pointer-events: none;"><button
                                           class="btn btn-primary-filled px-4" disabled><i
                                               class="fas fa-cart-plus me-2"></i>Stock Out
                                       </button></a>
        
                               </div>`;
                            }else{
                                loadData+=`<div class="overlay-background">
 
                                 <button class="overlay-add-to-bag"
                                 
                                  onclick="addToCart(${ value.id }, '${value.product_name}')"
                                >
                                 <div class="text-white">
                                    Add <br> To <br> Bag
                                 </div>
                                 </button>
                                 
                                 
                                 
                               <div class="overlay-button" id="add_inc_dec" style="display: none;">
                                  <h4 class="overlay-product-amount">TK. <span class="pro-price">420.0</span></h4>
                                  <div class="overlay-product-quantity">
                                     <button class="btn incre-btn" onclick="quickViewQunatityIncrOverlay(event)"><i
                                           class="fas fa-plus"></i></button>
                                     <input class="quantity-text" id="input_value" type="text" value="1">
                                     <button class="btn decre-btn" onclick="quickViewQunatityDecOverlay(event)"><i
                                           class="fas fa-minus"></i></button>
                                  </div>
                                  <h4 class="overlay-product-in-bag">In Bag</h4>
                               </div>
                               <a class="overlay-details-link"
                                                    onclick="groceryproductView(${ value.id })"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#groceryproductQuickViewModal">Details
                                                    >></a>
                            </div>
                         </div>

                         <div class="d-flex justify-content-center cart-details-btn ">
                           <a onclick="addToCart(${ value.id }, '${value.product_name}')"
                               ><button
                                   class="btn btn-primary-filled px-4"><i
                                       class="fas fa-cart-plus me-2"></i>Shop Now
                               </button></a>

                       </div>`;
                        }    
                      loadData+=`</div>
                   </div>
                </div>
          
                `;
                
               })
               
               
              $('.ec-card-group').append(loadData);
              
              
           })
           .fail(function(jqXHR,ajaxOptions,thrownError){
               alert('Server not responding...');
           }) }
        var pages=1;
       $(window).scroll(function(){
           if($(window).scrollTop() + $(window).height() >= $(document).height()-600 ){
            pages++;
               loadMoreData(pages);
               console.log(pages);  }  })
</script>

<script>
    
    let searchBar = document.getElementById('prodictSearchWithAjax');
    searchBar.addEventListener('keyup',function(e){
        if(e.keyCode === 13){
            let value = searchBar.value;
            if(value[0] == '#'){
                value = value.substring(1);
            }
            let searchData = value.trim();
            $('.serach_loader').css('display','block');
            $.ajax({
                url: `/admin/product/search/agent-search/${searchData}`,
                type: "get",
                dataType: "json",
                success: function(data) {
                    let loadData='';
                    $('.serach_loader').css('display','none');
                     $('.ec-card-group').html('');
                    if(data.product.length > 0){
                        $.each(data.product, function(key, value) {
                            loadData+= `
                        
                        <div class="isotopeSelector filter all ec-card-lg">
                   <div class="overlay ec-card-inner">
                      <div class="border-portfolio">
                         <div class="card product-port added-to-bag">
                            <div class="image-overlay-container">
                               <img src="/${ value.product_thambnail }" class="img-fluid  bg-img"
                                  alt="">
                            </div>
                            <div class="text-center mt-3 mb-1">
                               <h4 class="text-dark"> ${value.product_name }</h4>
                               <b>${value.unit }</b>
                               <h4 class="price">
                                   
                                   
                                   
                                <!-- Selling and Discount Price Start -->`;
                                if (value.discount_price == 0){
                                loadData+= `<h4 style="color:black"> <span style="font-size:15px">৳</span>
                                   ${value.selling_price} </h4>`;
                                }else{
                                loadData+= `<h4>
                                    <span style="color:black"> <span style="font-size:15px">৳</span>
                                        ${value.discount_price}</span>
                                    <span><s class="text-danger"><span style="font-size:15px">৳</span>
                                           ${value.selling_price}</s></span>
                                </h4>`;
                                    }
                                loadData+=`<!-- Selling and Discount Price End -->
                                
                                
                               </h4>
                            </div>`;
                         
                            
                            if(value.product_qty <= 0){
                                loadData+= `<div id="overlay_background">
                                 <button class="overlay-add-to-bag" id="overlay_background"
                                 disabled>
                                 <div class="text-danger">
                                    Stock <br> Out
                                 </div>
                                 </button>
                               <div class="overlay-button" id="add_inc_dec" style="display: none;">
                                  <h4 class="overlay-product-amount">TK. <span class="pro-price">420.0</span></h4>
                                  <div class="overlay-product-quantity">
                                     <button class="btn incre-btn" onclick="quickViewQunatityIncrOverlay(event)"><i
                                           class="fas fa-plus"></i></button>
                                     <input class="quantity-text" id="input_value" type="text" value="1">
                                     <button class="btn decre-btn" onclick="quickViewQunatityDecOverlay(event)"><i
                                           class="fas fa-minus"></i></button>
                                  </div>
                                  <h4 class="overlay-product-in-bag">In Bag</h4>
                               </div>
                              
                                </div>
                                 </div>
        
                                 <div class="d-flex justify-content-center cart-details-btn ">
                                   <a href="#" style="pointer-events: none;"><button
                                           class="btn btn-primary-filled px-4" disabled><i
                                               class="fas fa-cart-plus me-2"></i>Stock Out
                                       </button></a>
        
                               </div>`;
                            }else{
                                loadData+=`<div class="overlay-background">
 
                                 <button class="overlay-add-to-bag"
                                 
                                  onclick="addToCart(${ value.id }, '${value.product_name}')"
                                >
                                 <div class="text-white">
                                    Add <br> To <br> Bag
                                 </div>
                                 </button>
                                 
                                 
                                 
                               <div class="overlay-button" id="add_inc_dec" style="display: none;">
                                  <h4 class="overlay-product-amount">TK. <span class="pro-price">420.0</span></h4>
                                  <div class="overlay-product-quantity">
                                     <button class="btn incre-btn" onclick="quickViewQunatityIncrOverlay(event)"><i
                                           class="fas fa-plus"></i></button>
                                     <input class="quantity-text" id="input_value" type="text" value="1">
                                     <button class="btn decre-btn" onclick="quickViewQunatityDecOverlay(event)"><i
                                           class="fas fa-minus"></i></button>
                                  </div>
                                  <h4 class="overlay-product-in-bag">In Bag</h4>
                               </div>
                               <a class="overlay-details-link"
                                                    onclick="groceryproductView(${ value.id })"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#groceryproductQuickViewModal">Details
                                                    >></a>
                            </div>
                         </div>

                         <div class="d-flex justify-content-center cart-details-btn ">
                           <a onclick="addToCart(${ value.id }, '${value.product_name}')"
                               ><button
                                   class="btn btn-primary-filled px-4"><i
                                       class="fas fa-cart-plus me-2"></i>Shop Now
                               </button></a>

                       </div>`;
                        }    
                      loadData+=`</div>
                   </div>
                </div>
          
                `;
                        });
                    $('.ec-card-group').append(loadData);
                    }else{
                        
                        alert('No Product Found')
                    }
                    
                }
            });
            
        }
    });
</script>


@endsection
