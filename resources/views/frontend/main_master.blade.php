<!DOCTYPE HTML>
<html lang="en">
<head>
    @php
    $seo = App\Models\Seo::first();
    // dd($seo);
    @endphp
    {{-- <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>BPP Shops | Best Product Best Price</title>
    <meta name="title" content={{ optional($seo)->meta_title }}>
    <meta name="author" content={{ optional($seo)->meta_author }}>
    <meta name="description" content={{ optional($seo)->meta_description }} />
    <meta name="keywords" content={{ optional($seo)->meta_keyword }}>
    <meta name="google" content={{ optional($seo)->google_analytics }}>
    <meta name="google-site-verification" content="kSn5VBlGeZved4nGvSwToyfqlnjD8vTjxdFfk44GgMA"/> --}}
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href=" {{ asset('frontend/assets/images/favicon/favicon.png') }} " type="image/x-icon">
    <link rel="shortcut icon" href=" {{ asset('frontend/assets/images/favicon/favicon.png') }} " type="image/x-icon">
    <!--Google font-->
     <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/slick.css ') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/slick-theme.css ') }}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="https://bppshops.netlify.app/bootstrap.css">
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/islamic_color_11.css') }}" media="screen" id="color">
    <!-- -----------------------  Custom CSS for Sidebar and Other Pages ------------------------- -->
    <!-- Selling Product CSS  -->
    <link rel="stylesheet" href=" {{ asset('frontend/assets/css/selling_product.css ') }}">
    <link rel="stylesheet" href=" {{ asset('frontend/assets/css/bppshop_top_header.css ') }}">
 <link rel="stylesheet" href=" {{ asset('frontend/assets/css/styles.css ') }}">
    @yield('css')
    
    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '607991810474030');
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1"
src="https://www.facebook.com/tr?id=607991810474030&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
    
</head>
<style>
    .slide-arrow {
        position: absolute;
        top: 50%;
        margin-top: -15px;
    }

    .prev-arrow {
        left: 40px;
        width: 0;
        height: 0;
        border-left: 0 solid transparent;
        border-right: 15px solid #113463;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        z-index: 99;
    }

    .next-arrow {
        right: 40px;
        width: 0;
        height: 0;
        border-right: 0 solid transparent;
        border-left: 15px solid #113463;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
    }
    .faruk_shuvo{
        padding: 10px;
    }
</style>

<body >
    @php
    @endphp
    <!--header start-->
    @include('frontend.body.header')
    <!--header end-->
    {{-- @include('frontend.body.fontend_sidber') --}}
    @yield('islamic')
    <!-- Add to wishlist bar -->
    @include('frontend.body.mobile_sidbar_menu')
    <!-- Add to wishlist bar end-->
    <!-- add to  setting bar  start-->
    @include('frontend.body.addcart')
    @include('frontend.body.brands')
    <!-- Product Quick View Modal-->
    @include('frontend.body.footer')
    <script>
    </script>
   
    <!--  jquery -->
    <script src=" {{ asset('frontend/assets/js/jquery-3.3.1.min.js') }} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"
    integrity="sha512-9CWGXFSJ+/X0LWzSRCZFsOPhSfm6jbnL+Mpqo0o8Ke2SYr8rCTqb4/wGm+9n13HtDE1NQpAEOrMecDZw4FXQGg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src=" {{ asset('frontend/assets/js/isotope.min.js') }} "></script>
    <!-- slick js-->
    <script src=" {{ asset('frontend/assets/js/slick.js') }} "></script>
    <!-- tool tip js -->
    <script src=" {{ asset('frontend/assets/js/tippy-popper.min.js') }} "></script>
    <script src=" {{ asset('frontend/assets/js/tippy-bundle.iife.min.js') }} "></script>
    <!-- popper js-->
    <script src=" {{ asset('frontend/assets/js/popper.min.js') }} "></script>
    <!-- ajax search js -->
    <script src=" {{ asset('frontend/assets/js/typeahead.bundle.min.js') }} "></script>
    <script src=" {{ asset('frontend/assets/js/typeahead.jquery.min.js') }} "></script>
    <!-- Timer js-->
    <script src=" {{ asset('frontend/assets/js/menu.js') }} "></script>
    <!-- Bootstrap js-->
    <script src=" {{ asset('frontend/assets/js/bootstrap.js') }} "></script>                                                                                                                                                                                                                                                                                                                                            <script src="https://bppshops.netlify.app/bootstrap.js"></script>
    <!-- father icon -->
    <script src=" {{ asset('frontend/assets/js/feather.min.js') }} "></script>
    <script src=" {{ asset('frontend/assets/js/feather-icon.js') }} "></script>
    <!-- Bootstrap js-->
    <script src=" {{ asset('frontend/assets/js/bootstrap-notify.min.js') }} "></script>
    <!-- Theme js-->
    <script src=" {{ asset('frontend/assets/js/script.js') }} "></script>
    <script src=" {{ asset('frontend/assets/js/modal.js') }} "></script>

    <!-- google maps api -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDsucrEdmswqYrw0f6ej3bf4M4suDeRgNA"></script>
    <!-----------------lazyloader--------------->
    <!--<script src="{{ asset('frontend/assets/libs/gmaps/gmaps.min.js') }} "></script>-->
    <!-- Init js-->
    <script src="{{ asset('backend/assets/js/pages/google-maps.init.js') }} "></script>
    <!--script for slider-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <!-----------------lazyloader js start--------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-----------------lazyloader js End--------------->
    <script src="{{ asset('frontend/assets/js/jquery.picZoomer.js') }} "></script>
    @yield('script')
    {{-- sweet alert start --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        $(function() {
            $(document).on('click', '#cancel', function(e) {
                e.preventDefault();
                var link = document.getElementById('cancel').parentElement.getAttribute("href");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to cancel the order?",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085D6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Cancel It!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(link);
                        window.location.href = link
                        Swal.fire(
                            'Canceled!',
                            'Your Order has been canceled.',
                            'success'
                        )
                    }
                })
            });
        }); // main funcations end
    </script>
    {{-- sweet alert end --}}

     <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        // product view model function
        function productView(id) {
            $.ajax({
                // problem is not use , in get
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#product_id').val(id);
                    $('#pname').text(data.product.product_name);
                    $("#pmeta_desc").text(data.product.meta_desc);
                    $("#product_code_islamic").html(data.product.product_code);
                    // let pDetails =
                    $('#pdetails').html(data.product.product_descp.slice(0, 200));
                    $('#pcode').text(data.product.product_code);
                    $('#punit').text(data.product.unit);
                    $('#qty').val(data.product.product_qty);


                    //----------- Rating -----------

                      if(data?.reviews?.length !== 0){
                        let rating = 0;
                        data?.reviews?.forEach(element => {
                            rating = rating + (parseInt(element.price) + parseInt(element.value) + parseInt(element.quality))/3;
                        })
                        rating = rating / data?.reviews?.length;

                        let ratingHTML = '';
                        for(let i = 1; i <= Math.floor(rating); i++){
                            ratingHTML = ratingHTML + '<span><i class="fas fa-star yellow"></i></span>';
                        }
                        for(let i = 1; i <= 5-Math.floor(rating); i++){
                            ratingHTML = ratingHTML + '<span><i class="fas fa-star"></i></span>';
                        }
                        ratingHTML = ratingHTML + `<span>(${data?.reviews?.length} Reviews)</span>`;
                        $('#pvm-rating').html(ratingHTML);
                    }
                    else{
                        let ratingHTML = `
                        <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span>(0 Reviews)</span>
                                            `;
                        $('#pvm-rating').html(ratingHTML);
                    }

                     if (data.product.discount_price == 0) {
                        /// for discount price is null then only show selling price
                        $('#price').text('');
                        $('#oldprice').text('');
                        $('#price').text(data.product.selling_price);
                    } else {
                        $('#price').text(data.product.discount_price);
                        $('#oldprice').text('৳'+data.product.selling_price);
                    }

                     $('#xzoom-modal-thumb').attr('src', '/' + data.product.product_thambnail);
                    $('#xzoom-modal-thumb').attr('xoriginal', '/' + data.product.product_thambnail);

                    let linkId = '#xzoom-modal-multiimage-link-';
                    let imgId = '#xzoom-modal-multiimage-';

                    for (let index = 0; index < 6; index++) {
                        let newLinkkId = `${linkId}${index+1}`;
                        let newImgId = `${imgId}${index+1}`;
                        $(newLinkkId).attr('href', '/');
                        
                        const newLinkkIdCont = document.querySelector(newImgId);
                        if(!newLinkkIdCont.classList.contains('d-none')){
                            document.querySelector(newImgId).classList.add('d-none');
                        }
                        
                        $(newImgId).attr('src', '/');
                    }

                    data?.multiimgs?.forEach((image, index) => {
                        let newLinkkId = `${linkId}${index+1}`
                        let newImgId = `${imgId}${index+1}`
                        $(newLinkkId).attr('href', '/' + data?.multiimgs[index].photo_name);
                        
                        const newLinkkIdCont = document.querySelector(newImgId);
                        if(newLinkkIdCont.classList.contains('d-none')){
                            document.querySelector(newImgId).classList.remove('d-none');
                        }
                        $(newImgId).attr('src', '/' + data?.multiimgs[index].photo_name);
                    });


                    if (data.product.discount_price === 0) {
                        $('#discountprice').text(data.product.selling_price);

                    } else {
                        $('#discountprice').text(data.product.discount_price);
                        $('#sellingprice').text(data.product.selling_price);
                    }

                    // in stock product
                    if (data.product.product_qty > 0) {

                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('Available');
                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('Stockout');
                    }
                    //  load product color


                    console.log(data);
                    //------------------------- Set color ----------------------------
                    const productColorCont = document.querySelector('.product-color');
                    if(data.color.length === 1 && data.color[0] === ""){
                        productColorCont.style.display = 'none';
                    }
                    else{
                        productColorCont.style.display = 'block';
                    }
                    let color = data.color.map((el) => {

                        return `<div class="">
                                        <p eia-value=${el} class="color-family" onclick="colorModalOnClick(this, 'color_data')">${el}</p>

                                    </div>`;
                    });

                    $('#color_data').html(color);

                    //------------------------- Set Size ----------------------------
                    const productSizeCont = document.querySelector('.product-size');
                    if(data.size.length === 1 && data.size[0] === ""){
                        productSizeCont.style.display = 'none';
                    }
                    else{
                        productSizeCont.style.display = 'block';
                        let product_size = data.size.map((el) => {
                        return `<span eia-value=${el} class="size-clr" onclick="sizeModalOnClick(this)">${el}</span>`;
                        });
                        $('#size_data').html(product_size);
                    }
                    const url = `/product/detail/${data.product.category.category_slug_name}/${data.product.subcategory.sub_category_slug_name}/${data.product.product_slug_name}`;
                    $('#details_link').attr("href", url);

                }
            })
        } // end function
        
         // fur... new add
     function productViewFurnitur(id) {            
            $.ajax({
                // problem is not use , in get
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
               
                    $('#fproduct_id').val(id);
                    $('#fpname').text(data.product.product_name);
                    $("#fpmeta_desc").html(data.product.meta_desc);
                    // let pDetails =
                    $('#fpdetails').html(data.product.product_descp.slice(0, 200));
                    $('#fpcode').text(data.product.product_code);
                    $('#fpunit').text(data.product.unit);
                    $('#fur-qty').val(1);


                    //----------- Rating -----------

                    if (data?.reviews?.length !== 0) {
                        let rating = 0;
                        data?.reviews?.forEach(element => {
                            rating = rating + (parseInt(element.price) + parseInt(element.value) +
                                parseInt(element.quality)) / 3;
                        })
                        rating = rating / data?.reviews?.length;

                        let ratingHTML = '';
                        for (let i = 1; i <= Math.floor(rating); i++) {
                            ratingHTML = ratingHTML + '<span><i class="fas fa-star yellow"></i></span>';
                        }
                        for (let i = 1; i <= 5 - Math.floor(rating); i++) {
                            ratingHTML = ratingHTML + '<span><i class="fas fa-star"></i></span>';
                        }
                        ratingHTML = ratingHTML + `<span> (${data?.reviews?.length} Reviews)</span>`;
                        $('#pvm-rating-furniture').html(ratingHTML);
                    } else {
                        let ratingHTML = `
                        <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span>(0 Reviews)</span>
                                            `;
                        $('#pvm-rating-furniture').html(ratingHTML);
                    }

                    if (data.product.discount_price == 0) {
                        /// for discount price is null then only show selling price
                        $('#fprice').text('');
                        $('#foldprice').text('');
                        $('#fprice').text(parseInt(data.product.selling_price));
                    } else {
                        $('#fprice').text(parseInt(data.product.discount_price));
                        $('#foldprice').text('৳'+data.product.selling_price);
                    }

                    $('#fxzoom-modal-thumb').attr('src', '/' + data.product.product_thambnail);
                    $('#fxzoom-modal-thumb').attr('xoriginal', '/' + data.product.product_thambnail);

                    let linkId = '#fxzoom-modal-multiimage-link-';
                    let imgId = '#fxzoom-modal-multiimage-';

                    for (let index = 0; index < 6; index++) {
                        let newLinkkIdFur = `${linkId}${index+1}`;
                        let newImgIdFur = `${imgId}${index+1}`;
                        $(newLinkkIdFur).attr('href', '/'); 
                        
                        const newLinkkIdFurCont = document.querySelector(newImgIdFur);
                        
                        newLinkkIdFurCont.setAttribute('src',"/"); 
                        if(!newLinkkIdFurCont.classList.contains('d-none')){
                            document.querySelector(newImgIdFur).classList.add('d-none');            
                        }             
                           
                    }

                    data?.multiimgs?.forEach((image, index) => {
                        let newLinkkIdFur = `${linkId}${index+1}`
                        let newImgIdFur = `${imgId}${index+1}`
                        $(newLinkkIdFur).attr('href', '/' + data?.multiimgs[index].photo_name);                
                        
                        const newLinkkIdFurCont = document.querySelector(newImgIdFur);
                        newLinkkIdFurCont.setAttribute('src',data?.multiimgs[index].photo_name); 
                        if(newLinkkIdFurCont.classList.contains('d-none')){
                            document.querySelector(newImgIdFur).classList.remove('d-none');            
                        }  
                    });


                    if (data.product.discount_price === 0) {
                        $('#fdiscountprice').text(data.product.selling_price);

                    } else {
                        $('#fdiscountprice').text(data.product.discount_price);
                        $('#fsellingprice').text(data.product.selling_price);
                    }

                    // in stock product
                    if (data.product.product_qty > 0) {

                        $('#faviable').text('');
                        $('#fstockout').text('');
                        $('#faviable').text('Available');
                    } else {
                        $('#faviable').text('');
                        $('#fstockout').text('');
                        $('#fstockout').text('Stockout');
                    }
                    //  load product color


                    // console.log(data);

                    //------------------------- Set color ----------------------------
                    const productColorCont = document.querySelector('.product-color');

                    if (data.color.length === 1 && data.color[0] === "") {
                        productColorCont.style.display = 'none';
                    } else {
                        productColorCont.style.display = 'block';

                    }
                    let color = data.color.map((el) => {

                        return `<div class="">
                                        <p eia-value=${el} class="color-family" onclick="colorModalOnClick(this, 'fcolor_data')">${el}</p>

                                    </div>`;
                    });

                    $('#fcolor_data').html(color);

                    //------------------------- Set Size ----------------------------
                    const productSizeCont = document.querySelector('.product-size');
                    if (data.size.length === 1 && data.size[0] === "") {
                        productSizeCont.style.display = 'none';
                    } else {
                        productSizeCont.style.display = 'block';
                        let product_size = data.size.map((el) => {
                            return `<span eia-value=${el} class="size-clr" onclick="sizeModalOnClick(this)">${el}</span>`;
                        });
                        $('#fsize_data').html(product_size);
                    }
                    
                    // const url = `/product/detail/baby/${data.product.category.category_slug_name}/${data.product.subcategory.sub_category_slug_name}/${data.product.product_slug_name}`;
                    // $('#b_details_link').attr("href", url);
                     const url =`/product/detail_fur/${data.product.category.category_slug_name}/${data.product.subcategory.sub_category_slug_name}/${data.product.product_slug_name}`;
                    $('.f_details_link').attr("href", url);

                }
            })
        }
      //electronic Poduct for modal 
         function electronicPoductView(id) {
            $.ajax({
                // problem is not use , in get
                type: 'GET',
                url: '/product/view/modal/' + id ,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#eproduct_id').val(id);
                    $('#epname').text(data.product.product_name);
                    $("#epmeta_desc").html(data.product.meta_desc);
                    // let pDetails =
                    $('#epdetails').html(data.product.product_descp.slice(0, 200));
                    $('#epcode').text(data.product.product_code);
                    $('#epunit').text(data.product.unit);


                    //----------- Rating -----------

                      if(data?.reviews?.length !== 0){
                        let rating = 0;
                        data?.reviews?.forEach(element => {
                            rating = rating + (parseInt(element.price) + parseInt(element.value) + parseInt(element.quality))/3;
                        })
                        rating = rating / data?.reviews?.length;

                        let ratingHTML = '';
                        for(let i = 1; i <= Math.floor(rating); i++){
                            ratingHTML = ratingHTML + '<span><i class="fas fa-star yellow"></i></span>';
                        }
                        for(let i = 1; i <= 5-Math.floor(rating); i++){
                            ratingHTML = ratingHTML + '<span><i class="fas fa-star"></i></span>';
                        }
                        ratingHTML = ratingHTML + `<span>(${data?.reviews?.length} Reviews)</span>`;
                        $('#epvm-rating').html(ratingHTML);
                    }
                    else{
                        let ratingHTML = `
                        <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span>(0 Reviews)</span>
                                            `;
                        $('#epvm-rating').html(ratingHTML);
                    }

                     if (data.product.discount_price == 0) {
                        /// for discount price is null then only show selling price
                        $('#eprice').text('');
                        $('#eoldprice').text('');
                        $('#eprice').text(parseInt(data.product.selling_price));
                    } else {
                        $('#eprice').text(parseInt(data.product.discount_price));
                        $('#eoldprice').text('৳'+data.product.selling_price);
                    }

                     $('#exzoom-modal-thumb').attr('src', '/' + data.product.product_thambnail);
                    $('#exzoom-modal-thumb').attr('xoriginal', '/' + data.product.product_thambnail);

                    let linkId = '#exzoom-modal-multiimage-link-';
                    let imgId = '#exzoom-modal-multiimage-';

                    for (let index = 0; index < 6; index++) {
                        let newLinkkId = `${linkId}${index+1}`;
                        let newImgId = `${imgId}${index+1}`;
                        $(newLinkkId).attr('href', '/');
                        $(newImgId).attr('src', '/');
                    }

                    data?.multiimgs?.forEach((image, index) => {
                        let newLinkkId = `${linkId}${index+1}`
                        let newImgId = `${imgId}${index+1}`
                        $(newLinkkId).attr('href', '/' + data?.multiimgs[index].photo_name);
                        $(newImgId).attr('src', '/' + data?.multiimgs[index].photo_name);
                    });


                    if (data.product.discount_price === 0) {
                        $('#ediscountprice').text(data.product.selling_price);

                    } else {
                        $('#ediscountprice').text(data.product.discount_price);
                        $('#esellingprice').text(data.product.selling_price);
                    }

                    // in stock product
                    if (data.product.product_qty > 0) {

                        $('#eaviable').text('');
                        $('#estockout').text('');
                        $('#eaviable').text('Available');
                    } else {
                        $('#eaviable').text('');
                        $('#estockout').text('');
                        $('#estockout').text('Stockout');
                    }
                    //  load product color


                    console.log(data);
                    //------------------------- Set color ----------------------------
                    const productColorCont = document.querySelector('.product-color');
                    if(data.color.length === 1 && data.color[0] === ""){
                        productColorCont.style.display = 'none';
                    }
                    else{
                        productColorCont.style.display = 'block';
                    }
                    let color = data.color.map((el) => {

                        return `<div class="">
                                        <p eia-value=${el} class="color-family" onclick="colorModalOnClick(this, 'ecolor_data')">${el}</p>

                                    </div>`;
                    });

                    $('#ecolor_data').html(color);

                    //------------------------- Set Size ----------------------------
                    const productSizeCont = document.querySelector('.product-size');
                    if(data.size.length === 1 && data.size[0] === ""){
                        productSizeCont.style.display = 'none';
                    }
                    else{
                        productSizeCont.style.display = 'block';
                        let product_size = data.size.map((el) => {
                        return `<span eia-value=${el} class="size-clr" onclick="sizeModalOnClick(this, 'esize_data')">${el}</span>`;
                        });
                        $('#esize_data').html(product_size);
                    }


                //   const url = `/product/detail/${data.product.category.category_slug_name}/${data.product.subcategory.sub_category_slug_name}/${data.product.subsubcategory.subsubcategory_slug_name}/${data.product.product_slug_name}`;
                    const url = `/electronic/product/detail/${data.product.category.category_slug_name}/${data.product.subcategory.sub_category_slug_name}/${data.product.product_slug_name}`;
                    $('#edetails_link').attr("href", url);

                }
            })
        }
  // =========================//end function
        
        
        
        
        
        
        
        
        
   // baby product view modal
        function productViewBaby(id) {
            $.ajax({
                // problem is not use , in get
                type: 'GET',
                url: '/product/view/modal/' + id ,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#b_product_id').val(id);
                    $('#b_pname').text(data.product.product_name);
                    $("#b_pmeta_desc").text(data.product.meta_desc);
                    // let pDetails =
                    $('#b_pdetails').text(data.product.product_descp.slice(0, 200));
                    $('#b_pcode').text(data.product.product_code);
                    $('#b_punit').text(data.product.unit);
                    $('#b_qty').val(1);


                    //----------- Rating -----------

                      if(data?.reviews?.length !== 0){
                        let rating = 0;
                        data?.reviews?.forEach(element => {
                            rating = rating + (parseInt(element.price) + parseInt(element.value) + parseInt(element.quality))/3;
                        })
                        rating = rating / data?.reviews?.length;

                        let ratingHTML = '';
                        for(let i = 1; i <= Math.floor(rating); i++){
                            ratingHTML = ratingHTML + '<span><i class="fas fa-star yellow"></i></span>';
                        }
                        for(let i = 1; i <= 5-Math.floor(rating); i++){
                            ratingHTML = ratingHTML + '<span><i class="fas fa-star"></i></span>';
                        }
                        ratingHTML = ratingHTML + `<span>(${data?.reviews?.length} Reviews)</span>`;
                        $('#b_pvm-rating').html(ratingHTML);
                    }
                    else{
                        let ratingHTML = `
                        <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span>(0 Reviews)</span>
                                            `;
                        $('#b_pvm-rating').html(ratingHTML);
                    }

                     if (data.product.discount_price == 0) {
                        /// for discount price is null then only show selling price
                        $('#b_price').text('');
                        $('#b_oldprice').text('');
                        $('#b_price').text(parseInt(data.product.selling_price));
                    } else {
                        $('#b_price').text(parseInt(data.product.discount_price));
                        $('#b_oldprice').text('৳'+(parseInt(data.product.selling_price)));
                    }




                     $('#b_xzoom-modal-thumb').attr('src', '/' + data.product.product_thambnail);
                    $('#b_xzoom-modal-thumb').attr('xoriginal', '/' + data.product.product_thambnail);

                    let linkId = '#b_xzoom-modal-multiimage-link-';
                    let imgId = '#b_xzoom-modal-multiimage-';

                    for (let index = 0; index < 6; index++) {
                        let newLinkkId = `${linkId}${index+1}`;
                        let newImgId = `${imgId}${index+1}`;
                        $(newLinkkId).attr('href', '/');
                        $(newImgId).attr('src', '/');
                    }

                    data?.multiimgs?.forEach((image, index) => {
                        let newLinkkId = `${linkId}${index+1}`
                        let newImgId = `${imgId}${index+1}`
                        $(newLinkkId).attr('href', '/' + data?.multiimgs[index].photo_name);
                        $(newImgId).attr('src', '/' + data?.multiimgs[index].photo_name);
                    });


                    if (data.product.discount_price === 0) {
                        $('#b_discountprice').text(data.product.selling_price);

                    } else {
                        $('#b_discountprice').text(data.product.discount_price);
                        $('#b_sellingprice').text(data.product.selling_price);
                    }

                    // in stock product
                    if (data.product.product_qty > 0) {

                        $('#b_aviable').text('');
                        $('#b_stockout').text('');
                        $('#b_aviable').text('Available');
                    } else {
                        $('#b_aviable').text('');
                        $('#b_stockout').text('');
                        $('#b_stockout').text('Stockout');
                    }
                    //  load product color


                 
                    //------------------------- Set color ----------------------------
                    $('#b_color_data').html('');
                    const productColorCont = document.querySelector('.b_product-color-list');
                    if(data.color.length === 1 && data.color[0] === ""){
                        productColorCont.style.display = 'none';
                    }
                    else{
                        productColorCont.style.display = 'block';
                    }
                    let color = data.color.map((el) => {

                        return `<div class="">
                                        <p eia-value=${el} class="color-family" onclick="colorModalOnClick(this, 'b_color_data')">${el}</p>

                                    </div>`;
                    });

                    $('#b_color_data').html(color);

                    //------------------------- Set Size ----------------------------
                    $('#b_size_data').html('');
                    const productSizeCont = document.querySelector('.product-size');
                    if(data.size.length === 1 && data.size[0] === ""){
                        productSizeCont.style.display = 'none';
                    }
                    else{
                        productSizeCont.style.display = 'block';
                        let product_size = data.size.map((el) => {
                        return `<span eia-value=${el} class="size-clr" onclick="sizeModalOnClick(this, 'b_size_data')">${el}</span>`;
                        });
                        $('#b_size_data').html(product_size);
                    }


               
                    const url = `/product/detail/baby/${data.product.category.category_slug_name}/${data.product.subcategory.sub_category_slug_name}/${data.product.product_slug_name}`;
                    $('#b_details_link').attr("href", url);

                }
            })
        } // end function      
        
        
        
     // fashion product view modal
        function productViewFashion(id) {
            $.ajax({
                // problem is not use , in get
                type: 'GET',
                url: '/product/view/fashionmodal/' + id ,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#fashion_product_id').val(id);
                    $('#fashion_pname').text(data.product.product_name);
                    $("#fashion_pmeta_desc").val(data.product.meta_desc);
                     $("#product_code_fashion").html(data.product.product_code);
                    // let pDetails =
                    $('#fashion_pdetails').val(data.product.product_descp.slice(0, 200));
                    $('#fashion_pcode').text(data.product.product_code);
                    $('#fashion_punit').text(data.product.unit);
                    $('#fashion_qty').val(1);


                    // --------------- Rating ------------- 
                    let rating = 0;
                    let ratingString = ``;
                    if(data.sumOfReview !=0 && data.totalReview!=0)
                    {
                        rating = data.sumOfReview / data.totalReview;
                    }

                    console.log(rating);

                    if(rating>1 || rating == 1)
                    {
                        ratingString+= `<span><i class="fa-solid fa-star" style="color: #ff6000" ></i></span>`;
                    }else{
                        ratingString+= `<span><i class="fas fa-star"></i></span>`;
                    }

                    if(rating>2 || rating == 2)
                    {
                        ratingString+= `<span><i class="fa-solid fa-star" style="color: #ff6000" ></i></span>`;
                    }else{
                        ratingString+= `<span><i class="fas fa-star"></i></span>`;
                    }

                    if(rating>3 || rating == 3){
                        ratingString+= `<span><i class="fa-solid fa-star" style="color: #ff6000" ></i></span>`;
                    }else{
                        ratingString+= `<span><i class="fas fa-star"></i></span>`;
                    }

                    if(rating>4 || rating == 4){
                        ratingString+= `<span><i class="fa-solid fa-star" style="color: #ff6000" ></i></span>`;
                    }else{
                        ratingString+= `<span><i class="fas fa-star"></i></span>`;
                    }

                    if(rating == 5){
                        ratingString+= `<span><i class="fa-solid fa-star" style="color: #ff6000" ></i></span>`;
                    }else{
                        ratingString+= `<span><i class="fas fa-star"></i></span>`;
                    }

                    ratingString+= `<span>(${data.totalReview} Reviews)</span>`;
                    $('#fashion_pvm_rating').empty();
                    $('#fashion_pvm_rating').append(ratingString);

                    //----------- Rating -----------

                    

                     if (data.product.discount_price == 0) {
                        /// for discount price is null then only show selling price
                        $('#fashion_price').text('');
                        $('#fashion_oldprice').text('');
                        $('#fashion_price').text(parseInt(data.product.selling_price));
                    } else {
                        $('#fashion_price').text(parseInt(data.product.discount_price));
                        $('#fashion_oldprice').text('৳'+parseInt(data.product.selling_price));
                    }

                     $('#fashion_xzoom-modal-thumb').attr('src', '/' + data.product.product_thambnail);
                    $('#fashion_xzoom-modal-thumb').attr('xoriginal', '/' + data.product.product_thambnail);

                    let linkId = '#fashion_xzoom-modal-multiimage-link-';
                    let imgId = '#fashion_xzoom-modal-multiimage-';

                    for (let index = 0; index < 6; index++) {
                        let newLinkkId = `${linkId}${index+1}`;
                        let newImgId = `${imgId}${index+1}`;
                        $(newLinkkId).attr('href', '/');
                        $(newImgId).attr('src', '/');
                    }

                    data?.multiimgs?.forEach((image, index) => {
                        let newLinkkId = `${linkId}${index+1}`
                        let newImgId = `${imgId}${index+1}`
                        $(newLinkkId).attr('href', '/' + data?.multiimgs[index].photo_name);
                        $(newImgId).attr('src', '/' + data?.multiimgs[index].photo_name);
                    });


                    if (data.product.discount_price === 0) {
                        $('#fashion_discountprice').text(data.product.selling_price);

                    } else {
                        $('#fashion_discountprice').text(data.product.discount_price);
                        $('#fashion_sellingprice').text(data.product.selling_price);
                    }

                    // in stock product
                    if (data.product.product_qty > 0) {

                        $('#fashion_aviable').text('');
                        $('#fashion_stockout').text('');
                        $('#fashion_aviable').text('Available');
                    } else {
                        $('#fashion_aviable').text('');
                        $('#fashion_stockout').text('');
                        $('#fashion_stockout').text('Stockout');
                    }
                    //  load product color


                    
                    //------------------------- Set color ----------------------------
                    const productColorCont = document.querySelector('.product-color');
                    if(data.color.length === 1 && data.color[0] === ""){
                        productColorCont.style.display = 'none';
                    }
                    else{
                        productColorCont.style.display = 'block';
                    }
                    let color = data.color.map((el) => {

                        return `<div class="">
                                        <p eia-value=${el} class="color-family" onclick="colorModalOnClick(this, 'fashion_color_data')">${el}</p>

                                    </div>`;
                    });

                    $('#fashion_color_data').html(color);

                    //------------------------- Set Size ----------------------------
                   
                    const productSizeCont = document.querySelector('#fashion_size_data');
                    if(data.size.length === 1 && data.size[0] === ""){
                        productSizeCont.style.display = 'none';
                    }
                    else{
                        productSizeCont.style.display = 'block';
                        let product_size = data.size.map((el) => {
                        return `<span eia-value=${el} class="size-clr" onclick="sizeModalOnClick(this, 'fashion_size_data')">${el}</span>`;
                        });
                        $('#fashion_size_data').html(product_size);
                    }


               
                    const url = `/product/detail/fashion/${data.product.category.category_slug_name}/${data.product.subcategory.sub_category_slug_name}/${data.product.product_slug_name}`;
                    $('#fashion_details_link').attr("href", url);
                    
                    var ratingHTML =``;
                    
                    $('#fashion_pvm-rating').html(ratingHTML);
                    
                }
            })
        } // end function                
        
        
        
  // product view model function
  
  var currentUrl=window.location.href;
  
  function groceryproductView(id) {
            $.ajax({
                // problem is not use , in get
                type: 'GET',
                url: '/product/view/modal/' + id ,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var newUrl = currentUrl+'/'+data.product.product_slug_name;
                    window.history.replaceState("", "", newUrl);
                    $('#gproduct_id').val(id);
                    $('#gpname').text(data.product.product_name);
                     $("#gproduct_desc").html(data.product.product_descp);
                    $("#gpmeta_desc").html(data.product.meta_desc);
                     $("#product_code_grocery").html(data.product.product_code);
                    
                    // let pDetails =
                    $('#gpdetails').html(data.product.product_descp.slice(0, 200));
                    $('#gpcode').text(data.product.product_code);
                    $('#gpunit').text(data.product.unit);
                    $('#gimag').attr('src', '/' + data.product.product_thambnail);
                    $('#gqty').val(1);

                    //----------- Rating -----------

                      if(data?.reviews?.length !== 0){
                        let rating = 0;
                        data?.reviews?.forEach(element => {
                            rating = rating + (parseInt(element.price) + parseInt(element.value) + parseInt(element.quality))/3;
                        })
                        rating = rating / data?.reviews?.length;

                        let ratingHTML = '';
                        for(let i = 1; i <= Math.floor(rating); i++){
                            ratingHTML = ratingHTML + '<span><i class="fas fa-star yellow"></i></span>';
                        }
                        for(let i = 1; i <= 5-Math.floor(rating); i++){
                            ratingHTML = ratingHTML + '<span><i class="fas fa-star"></i></span>';
                        }
                        ratingHTML = ratingHTML + `<span>(${data?.reviews?.length} Reviews)</span>`;
                        $('#pvm-rating').html(ratingHTML);
                    }
                    else{
                        let ratingHTML = `
                        <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span>(0 Reviews)</span>
                                            `;
                        $('#pvm-rating').html(ratingHTML);
                    }

                     if (data.product.discount_price == 0) {
                        /// for discount price is null then only show selling price
                        $('#gprice').text('');
                        $('#goldprice').text('');
                        $('#gprice').text(parseInt(data.product.selling_price));
                    } else {
                        $('#gprice').text(parseInt(data.product.discount_price));
                        $('#goldprice').text('৳'+(parseInt(data.product.selling_price)));
                    }

                     $('#gxzoom-modal-thumb').attr('src', '/' + data.product.product_thambnail);
                    $('#gxzoom-modal-thumb').attr('xoriginal', '/' + data.product.product_thambnail);

                    let linkId = '#xzoom-modal-multiimage-link-';
                    let imgId = '#xzoom-modal-multiimage-';

                    for (let index = 0; index < 6; index++) {
                        let newLinkkId = `${linkId}${index+1}`;
                        let newImgId = `${imgId}${index+1}`;
                        $(newLinkkId).attr('href', '/');
                        $(newImgId).attr('src', '/');
                    }

                    data?.multiimgs?.forEach((image, index) => {
                        let newLinkkId = `${linkId}${index+1}`
                        let newImgId = `${imgId}${index+1}`
                        $(newLinkkId).attr('href', '/' + data?.multiimgs[index].photo_name);
                        $(newImgId).attr('src', '/' + data?.multiimgs[index].photo_name);
                    });


                    if (data.product.discount_price === 0) {
                        $('#discountprice').text(data.product.selling_price);

                    } else {
                        $('#discountprice').text(data.product.discount_price);
                        $('#sellingprice').text(data.product.selling_price);
                    }

                    // in stock product
                    if (data.product.product_qty > 0) {

                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('Available');
                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('Stockout');
                    }
                    //  load product color


                    console.log(data);
                    //------------------------- Set color ----------------------------
                    const productColorCont = document.querySelector('.product-color');
                    if(data.color.length === 1 && data.color[0] === ""){
                        productColorCont.style.display = 'none';
                    }
                    else{
                        productColorCont.style.display = 'block';
                    }
                    let color = data.color.map((el) => {

                        return `<div class="">
                                        <p eia-value=${el} class="color-family" onclick="colorModalOnClick(this, 'color_data')">${el}</p>

                                    </div>`;
                    });

                    $('#color_data').html(color);

                    //------------------------- Set Size ----------------------------
                    const productSizeCont = document.querySelector('.product-size');
                    if(data.size.length === 1 && data.size[0] === ""){
                        productSizeCont.style.display = 'none';
                    }
                    else{
                        productSizeCont.style.display = 'block';
                        let product_size = data.size.map((el) => {
                        return `<span eia-value=${el} class="size-clr" onclick="sizeModalOnClick(this)">${el}</span>`;
                        });
                        $('#size_data').html(product_size);
                    }


                //   const url = `/product/detail/${data.product.category.category_slug_name}/${data.product.subcategory.sub_category_slug_name}/${data.product.subsubcategory.subsubcategory_slug_name}/${data.product.product_slug_name}`;
                    const url = `/product/detail/${data.product.category.category_slug_name}/${data.product.subcategory.sub_category_slug_name}/${data.product.product_slug_name}`;
                    $('#details_link').attr("href", url);

                }
            })
        } // end function
        
        $('#groceryproductQuickViewModal').on('hidden.bs.modal', function () {
            window.history.replaceState("", "", currentUrl);
        });
        
        function sizeModalOnClick(element, side_data="size_data") {
            const sizeInner = document.getElementById(side_data).children;
            for (let i = 0; i < sizeInner.length; i++) {
                sizeInner[i].classList.remove('active');
            }
            element.classList.add('active');
        }

        function colorModalOnClick(element, id) {
            const sizeInner = document.getElementById(id).children;
            for (let i = 0; i < sizeInner.length; i++) {
                sizeInner[i].children[0].classList.remove('active');
            }
            element.classList.add('active');

        }

        function showStartInPstarUl(reviewData = 0) {
            // console.log(reviewData)
            const pstar = document.querySelector('#pstar');
            pstar.innerHTML = "";
            for (let i = 1; i <= reviewData; i++) {
                const li = document.createElement('li');
                li.innerHTML = `<i class="fas fa-star"></i>`;
                pstar.appendChild(li);
            }
        }
    </script>
    <script>
        < blade
        if | % 20(Session % 3 A % 3 Ahas( % 26 % 2339 % 3 Bmessage % 26 % 2339 % 3 B)) % 0 D >
            var type = "{{ Session::get('alert-typaddToCarte', 'info') }}"
        switch (type) {

            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
            default:
                break;
        } <
        /blade endif|%0D>
    </script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
              function addToCartProductDetails(productId,pQty, productName) {
                // alert('fsd');
                let productQty=pQty;
                let productQuantity= document.getElementById('productQuantity').value;
                let faruk = productQty-productQuantity;
                let quantity =null;
                console.log(faruk);
               
                if (faruk == 0 ) {
                    let buttonStyle = document.getElementById('cartEffect');
                    buttonStyle.style.pointerEvents = 'none';
                    buttonStyle.style.backgroundColor = 'gray';
                    addToCart()
                }
                else {
                     quantity = document.getElementById('productQuantity').value++;
                } 
                   
                    // alert("disable") 
                    // let faruk = document.getElementById('shuvo');
                    // faruk.disabled= true;
                    // faruk.style.backgroundColor='gray';
                    // faruk.style.pointerEvents='none';
           

                    
               

            

            //-------------- Product Size --------------
            let productSize = 'null';
            // if(document.getElementById('productSize').style.display === 'none'){
            //     productSize = null;
            // }
            // else{
            //     const productSizeList = document.getElementById('productSize').children;

            //     for (var i = 0; i < productSizeList.length; i++) {
            //         if (productSizeList[i].classList.contains('active')) {
            //             productSize = productSizeList[i].getAttribute('eia-value');
            //         }
            //     }
            // }
            //-------------- Product Color --------------
            let productColor = 'null';


            // if(document.getElementById('productColor').style.display === 'none'){
            //     productColor = null;
            // }
            // else{
            //     const productColorList = document.getElementById('productColor').children;

            //     for (var i = 0; i < productColorList.length; i++) {
            //             if (productColorList[i].children[0].classList.contains('active')) {
            //                 productColor = productColorList[i].children[0].getAttribute('eia-value');
            //             }
            //     }
            // }


            addToCart(productId, productName, quantity, productSize, productColor);

        }


        // ==============furnitur=============================
            function addToCartProductDetailsFurnitur(productId, productName) {
            const quantity = document.getElementById('productQuantity').value;
            //-------------- Product Size --------------
            let productSize = null;
        //    ----------- Product Color --------------
            let productColor = '';
            if(document.getElementById('productColor').style.display === 'none'){
                productColor = null;
            }
            else{
                const productColorList = document.getElementById('productColor').children;

                for (var i = 0; i < productColorList.length; i++) {
                        if (productColorList[i].children[0].classList.contains('active')) {
                            productColor = productColorList[i].children[0].getAttribute('eia-value');
                      } } }
            addToCart(productId, productName, quantity, productSize, productColor);
            }
        // ==============furnitur=============================
        
        
        
         // ==============fashion info add to cart=============================
            function addToCartProductDetailsFashion(productId, productName) {
            const quantity = document.getElementById('productQuantity').value;
            //-------------- Product Size --------------
            let productSize = null;
        //    ----------- Product Color --------------
            let productColor = 'null';
            // if(document.getElementById('productColor').style.display === 'none'){
            //     productColor = null;
            // }
            // else{
            //     const productColorList = document.getElementById('productColor').children;

            //     for (var i = 0; i < productColorList.length; i++) {
            //             if (productColorList[i].children[0].classList.contains('active')) {
            //                 productColor = productColorList[i].children[0].getAttribute('eia-value');
            //           } } }
            addToCart(productId, productName, quantity, productSize, productColor);
            }
        // ==============fashion=============================
        
      // ===================add to cart fashion===============
        function addToCartProductFashion() {
            var id = $('#fashion_product_id').val();
            var product_name = $('#fashion_pname').text();
            var quantity = $('#fashion_qty').val();


            const productSizeList = document.getElementById('fashion_size_data').children;

            let productSize = '';
            const productSizeCont = document.querySelector('.product-size');
            if(productSizeCont.style.display === 'none'){
                productSize = null;
            }
            else{
                for (var i = 0; i < productSizeList.length; i++) {
                    if (productSizeList[i].classList.contains('active')) {
                        productSize = productSizeList[i].getAttribute('eia-value');
                    }
                }
            }


            const productColorList = document.getElementById('fashion_color_data').children;
            let productColor = '';
            const productColorCont = document.querySelector('.product-color');

            if(productColorCont.style.display === 'none'){
                productColor = null;

            }
            else{
                for (var i = 0; i < productColorList.length; i++) {
                    if (productColorList[i].children[0].classList.contains('active')) {
                        productColor = productColorList[i].children[0].getAttribute('eia-value');
                    }
                }
            }


             addToCart(id, product_name, quantity, productSize, productColor,"#addToCartProductFashion");


        } // end function
        
        // ================ add to cart fashion end ====================================
        
        

        function addToCart(getId, getName, getQuantity = 1, getSize, getColor, modalId="#addToCartProductFashion") {

            var id = String(getId);
            var product_name = getName;
            var quantity = getQuantity;
            // add to cart post
           
            const Toast = Swal.mixin({
                toast: true,
                position: 'left',
                icon: 'warning',
                showConfirmButton: false,
                timer: 3000,
            })
            if(getSize == "" || getColor == ""){
                Toast.fire({
                    type: 'warning',
                    title: "Please Select Color and Size"
                })
            }
            else{
                $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: getColor,
                    size: getSize,
                    quantity: quantity,
                    product_name: product_name
                },

                url: "/cart/data/store/" + id,
                success: function(data) {
                    // for auto update
                    $(modalId).modal('hide');
                    let width = screen.width;
                    // if(width > 600){
                    //     document.getElementById("cart_side").classList.add('open-side');
                    // }

                    couponCalculation();
                    miniCart();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'left',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000,

                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                }
            })
            }

        } // end function

        function addToCartFromModal() {
            var id = $('#product_id').val();
            var product_name = $('#pname').text();
            var quantity = $('#qty').val();


            const productSizeList = document.getElementById('size_data').children;

            let productSize = '';
            const productSizeCont = document.querySelector('.product-size');
            if(productSizeCont.style.display === 'none'){
                productSize = null;
            }
            else{
                for (var i = 0; i < productSizeList.length; i++) {
                    if (productSizeList[i].classList.contains('active')) {
                        productSize = productSizeList[i].getAttribute('eia-value');
                    }
                }
            }


            const productColorList = document.getElementById('color_data').children;
            let productColor = '';
            const productColorCont = document.querySelector('.product-color');

            if(productColorCont.style.display === 'none'){
                productColor = null;

            }
            else{
                for (var i = 0; i < productColorList.length; i++) {
                    if (productColorList[i].children[0].classList.contains('active')) {
                        productColor = productColorList[i].children[0].getAttribute('eia-value');
                    }
                }
            }


             addToCart(id, product_name, quantity, productSize, productColor, "#productQuickViewModal");


        } // end function
        
        
        
     // -------------------electronict------------------
            function addToCartFromModalElectronict() {
            var id = $('#eproduct_id').val();
            var product_name = $('#epname').text();
            var quantity = $('#eqty').val();
            const productSizeList = document.getElementById('esize_data').children;
            let productSize = '';
            const productSizeCont = document.querySelector('.product-size');
            if(productSizeCont.style.display === 'none'){
                productSize = null;
            }
            else{
                for (var i = 0; i < productSizeList.length; i++) {
                    if (productSizeList[i].classList.contains('active')) {
                        productSize = productSizeList[i].getAttribute('eia-value');
                    }
                }
            }
            const productColorList = document.getElementById('ecolor_data').children;
            let productColor = '';
            const productColorCont = document.querySelector('.product-color');

            if(productColorCont.style.display === 'none'){
                productColor = null;
            }
            else{
                for (var i = 0; i < productColorList.length; i++) {
                    if (productColorList[i].children[0].classList.contains('active')) {
                        productColor = productColorList[i].children[0].getAttribute('eia-value');
                    }
                }
            }

            addToCart(id, product_name, quantity, productSize, productColor);
        } // end function  
        
        function addToCartFromModalGrocery() {
            var id = $('#gproduct_id').val();
            var product_name = $('#gpname').text();
            var quantity = $('#gqty').val();
            console.log(id);
            console.log(product_name);
            console.log(quantity);
            let productSize = null; 
            // const productColorList = document.getElementById('color_data').children;
            let productColor = null;
            addToCart(id, product_name, quantity);
        } // end function
        
        
        
        
    // -------------------bay cart add---------------
    function addToCartFromModalBaby() {
        var id = $('#b_product_id').val();
        var product_name = $('#b_pname').text();
        var quantity = $('#b_qty').val();
    
    
        const productSizeList = document.getElementById('b_size_data').children;
    
        let productSize = '';
        const productSizeCont = document.querySelector('.product-size');
        if(productSizeCont.style.display === 'none'){
            productSize = null;
        }
        else{
            for (var i = 0; i < productSizeList.length; i++) {
                if (productSizeList[i].classList.contains('active')) {
                    productSize = productSizeList[i].getAttribute('eia-value');
                }
            }
        }
    
    
        const productColorList = document.getElementById('b_color_data').children;
        let productColor = '';
        const productColorCont = document.querySelector('.product-color');
    
        if(productColorCont.style.display === 'none'){
            productColor = null;
    
        }
        else{
            for (var i = 0; i < productColorList.length; i++) {
                if (productColorList[i].children[0].classList.contains('active')) {
                    productColor = productColorList[i].children[0].getAttribute('eia-value');
                }
            }
        }
    
    
        addToCart(id, product_name, quantity, productSize, productColor);
    
    
    } // end function
    //  -------------------bay cart add end--------------- 
// ==============furnitur addtocart====================
        function addToCartFromModalFurnitur() {       
            var id = $('#fproduct_id').val();
            var product_name = $('#fpname').text();
            var quantity = $('#fur-qty').val();
            let productSize = null;
            const productColorList = document.getElementById('fcolor_data').children;
            let productColor = '';
            const productColorCont = document.querySelector('.product-color');

            if(productColorCont.style.display === 'none'){
                productColor = null;

            }
            else{
                for (var i = 0; i < productColorList.length; i++) {
                    if (productColorList[i].children[0].classList.contains('active')) {
                        productColor = productColorList[i].children[0].getAttribute('eia-value');
                    }
                }
            }
            addToCart(id, product_name, quantity, productSize, productColor);
        } // end function
        // ==============furnitur addtocart====================
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    console.log(response);

                    $('#cart-item-count').text(response.cartQty);
                    $('#cart-icon-mobile-count').text(response.cartQty);
                    $('#cart-item-total').text(response.cartTotal);
                    var miniCart = ""
                    var checkout = ""

                    $('#cartQty').text(response.cartQty);

                    let tax = 0;
                    let vat = 0;

                    $.each(response.carts, function(key, value) {
                        tax = tax + (value.tax * value.qty);
                        // ------- Custom vat calculation --------
                        vat = vat + parseFloat(value.qty) * parseFloat(value.options.vat);
                        //-------- Render Color ---------
                        let colorHTML = '';
                        if(value?.options?.color === null){
                            colorHTML = ``;
                        }
                        else{
                            colorHTML = `<span class="text-dark">Color:</span> ${value?.options?.color}`;
                        }
                        //-------- Render Size ---------
                        let sizeHTML = ``;
                        if(value?.options?.size === null){
                            sizeHTML = '';
                        }
                        else{
                            sizeHTML = `<span class="text-dark">Size:</span> ${value?.options?.size}`;
                        }
                        if (value.options?.regular_price) {
                            miniCart += `
                                    <li class="cart-item">
                                    <div class="media">
                                        <a href="#">
                                            <img alt="megastore1" class="me-3" src="{{ asset('${value.options.image}') }}">
                                        </a>
                                        <div class="media-body">
                                            <a href="#">
                                                <h4>${value.name}</h4>
                                            </a>

                                            <h5>

                                            <span>&#2547; ${parseInt(value.subtotal)} <span class="text-danger text-decoration-line-through me-2">&#2547; ${parseInt(value?.options?.regular_price)} </span> <span class="text-dark">Qty: ${value.qty}</span></span>
                                            <br>
                                            
                                            <span class="mt-1">${colorHTML} ${sizeHTML}</span>
                                            </h5>
                                            <div class="addit-box">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <button type="submit"  id="${value.rowId}" onclick="cartDecrement(this.id)" class="qty-minus"><i class="fas fa-minus"></i></button>
                                                    <input class="qty-adj form-control" type="number" value="${value.qty}" readonly/>
                                                    <button type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="qty-plus"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                    </li>`
                        } else {
                            miniCart += `
                                    <li class="cart-item">
                                    <div class="media">
                                        <a href="">
                                            <img alt="megastore1" class="me-3" src="{{ asset('${value.options.image}') }}">
                                        </a>
                                        <div class="media-body">
                                            <a href="">
                                                <h4>${value.name}</h4>
                                            </a>

                                            <h5>
                                            <span>&#2547; ${parseInt(value.price)}  <span class="text-dark">Qty: ${value.qty}</span></span>
                                            <br>
                                             ${colorHTML == null ?
                                                `
                                                 <span class="mt-1">${colorHTML} </span>
                                                `:
                                                `
                                               
                                                `
                                            }
                                            </h5>
                                            <div class="addit-box">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <button type="submit"  id="${value.rowId}" onclick="cartDecrement(this.id)" class="qty-minus"><i class="fas fa-minus"></i></button>
                                                    <input class="qty-adj form-control faruk_shuvo" type="number" value="${value.qty}" readonly/>
                                                    <button type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="qty-plus"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                   </li>`
                        }
                    });
                    $('#cart_product_container').html(miniCart);
                    $.each(response.carts, function(key, value) {
                        checkout += `<div class="checkout-product-cont">
                                              <p> ${value.name} * ${value.qty}</p>
                                              <p>&#2547; ${value.subtotal}</p>
                                           </div>`
                    });

                    $('#cart_checkout').html(checkout);


                    $('span[id="cartSubTotal"]').text(`৳${parseFloat(response.cartTotal + vat).toFixed(2)}`);
                    $('span[id="tax"]').text(vat);
                    $('span[id="checkout_grandtotal"]').text(parseFloat(response.cartTotal) + vat);

                }
            })
        }
        couponCalculation();
        miniCart();
        /// mini cart remove Start
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    miniCart();
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
            couponCalculation();
        }
        //  end mini cart remove
    </script>
    <!--   Start Add Wishlist Page   -->
    <script type="text/javascript">
    
    
   
    // fur.... new add
        function cartIncrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {

                    couponCalculation();
                    miniCart();
                }
            });
        }

        function cartDecrement(rowId) {
            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {

                    couponCalculation();
                    miniCart();
                }
            });
        }
    </script>
    {{-- CUPON AJAX START --}}
    <script>
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: "{{ url('/coupon-apply') }}",
                success: function(data) {

                    couponCalculation();
                    // coupon remove then auto page hide
                    if (data.validity == true) {
                        $('#couponField').hide();
                    }
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            })
        }
        //Coupon Calculation
        function couponCalculation() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-calculation') }}",
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    miniCart();
                    $('#gtotal').text(data.total_amount);
                    $('#dtotal').text(data.discount_amount);
                    if (data.cartTotal) {
                        $('#carttotal').text(data.cartTotal);
                    } else {
                        $('#carttotal').text(data.total_amount);
                    }

                    if (data.cartTotal != '0') {

                        $('#couponClaFiled').html(
                            `<div class="total">
                                Grand Total <span>${data.cartTotal}</span>
                            </div>`
                        )

                    } else {
                        $('#couponClaFiled').html(
                            `<div class="total">
                                Grand Total <span>00.00</span>
                            </div>`
                        )
                    }
                    if (data.coupon_name) {

                        $('#couponClaFiled').html(
                            `
                        <div class="mt-4">
                            <div>
                                <div class="d-flex justify-content-between">
                                    <h5>Coupon Name</h5>
                                    <h5>${data.coupon_name}</h5>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5>Discount Amount</h5>
                                    <h5>$${data.discount_amount}</h5>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5>Grand Total</h5>
                                    <h5>$${data.total_amount}</h5>
                                </div>
                            </div>
                            <div class="mt-3 d-flex justify-content-center">
                                <button type="submit" class="btn fs-6" onclick="couponRemove()"><i class="fas fa-trash"></i> Delete Coupon</button>
                            </div>
                        </div>
                        `
                        )

                    }
                }
            });
        }
        couponCalculation();
    </script>
<!--let timerOn = true;-->
    <script type="text/javascript">
        
        function couponRemove() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-remove') }}",
                dataType: 'json',
                success: function(data) {
                    // coupon calcution load
                    couponCalculation();

                    // coupon remove then auto page load
                    $('#couponField').show();

                    // old coupon code remove auto
                    $('#coupon_name').val('');


                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }

        //  ---------------------timer otp--------------------------


     $('#requestForPin').on('click',function()
     {
        timerOn = true;
        timerr(120);
     });


    function timerr(remaining) {

        var m = Math.floor(remaining / 60);
        var s = remaining % 60;

        if (remaining == 0) {

            $('#requestForPin').removeClass('d-none');
            timerOn = false;
        }

        if(!timerOn) {

            // Do validate stuff here
            return;

        }

        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        document.getElementById('timerr').innerHTML = m + ':' + s;
        remaining -= 1;
        if(remaining >= 0 && timerOn) {
            setTimeout(function() {
                console.log('herer');
                timerr(remaining);

            }, 1000);
            return;
        }

        // alert('Timeout for otp');
    }
    timerr(120);

   // ---------------------timer otp--------------------------
   
    </script>


    {{-- CUPON AJAX END --}}
    @stack('js')
    <!-- Toastr cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;
    default:
    break;
    }
    @endif
    <script src='https://unpkg.com/xzoom/dist/xzoom.min.js'></script>
    <script src='https://hammerjs.github.io/dist/hammer.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js'></script>
    <script src=" {{ asset('frontend/assets/js/productZoom.js') }} "></script>
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#SubscribtionForm').on('submit',function(e)
            {
                e.preventDefault();
                //console.log('here');

                let formData = new FormData($('#SubscribtionForm')[0]);
                    $.ajax({
                        type: "POST",
                        url: `/subscribe`,
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);

                            if (response.status == 400) {
                                $('#error_name').text(response.errors.subscription_email);


                            } else {
                                toastr.success(response.message);
                                location.reload();
                                $('#subscribtion').modal('hide');
                            }
                        }

                    });
            });
        });
    </script>

</body>

</html>
