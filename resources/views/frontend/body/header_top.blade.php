<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @php
        $seo = App\Models\Seo::first();
    @endphp
    <title>BPP Shops</title>    
    <meta name="facebook-domain-verification" content="q72pmlqilk1a7uw9i8ndqosavjccc7" />
    <meta name="facebook-domain-verification" content="q72pmlqilk1a7uw9i8ndqosavjccc7" />
    <meta name= "title" content="{{ optional($seo)->meta_title }}" >
    <meta name="author" content="{{ optional($seo)->meta_author }}">
    <meta name="description" content="{{ optional($seo)->meta_description }}"/>
    <meta name="keywords" content="{{ optional($seo)->meta_keyword }}">
    <meta name="google" content="{{ optional($seo)->google_analytics }}">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="kSn5VBlGeZved4nGvSwToyfqlnjD8vTjxdFfk44GgMA" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/fontawesome.min.css"/>
     <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/bootstrap.css ') }}">
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('frontend/assets/css/islamic_color_11.css') }}" media="screen"
        id="color">
 <link rel="stylesheet" href=" {{ asset('frontend/assets/css/footer.css ') }}">
 
     <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8S59MCDXNB"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-8S59MCDXNB');
    </script>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PPGRNZQ');</script>
    <!-- End Google Tag Manager -->
    
    @yield('css')
</head>
<style>
.bpp_shop_main_container .card {
    margin-bottom: 22px;
    text-align: center;
    padding: 0 0 20px 0;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}
.bpp_shop_main_container .card:hover {
    border: 1px solid #ffff;
    box-shadow: 1px 1px 8px lightgray;
    transform: translateY(-10px);
}
.bpp_shop_main_container .card .upcoming {
    margin: 5px 10px 0 0;
    position: absolute;
    right: 0;
}
.bpp_shop_main_container .card .upcoming p{
    background-color: #3a6d3a;
    border-radius: 15px;
    border: 1px solid #3a6d3a;
    color: #fff;
    width: 110px;
    padding: 3px 0;
}
.bpp_shop_main_container .card .card-body img {
    margin-top: 20px;
}
.bpp_shop_main_container .card .card-footer{
    background: transparent;
    border: transparent;
    text-align: center;
}
.bpp_shop_main_container .card .card-footer h5{
    font-size: 24px;
    color: rgb(99, 99, 99);
}
</style>

<body class="">