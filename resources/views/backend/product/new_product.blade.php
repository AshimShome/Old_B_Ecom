@extends('admin.admin_master')

@section('css')
<!-- Plugins css -->
<link href="{{ asset('backend/assets') }}/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />

<link href="{{ asset('backend/assets') }}/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('backend/assets') }}/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"
    type="text/css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
    rel="stylesheet" />
<style>
        .toggle {
        margin: 0 0 0 2rem;
        position: relative;
        display: inline-block;
        width: 6rem;
        height: 2.4rem;
    }

    .toggle input {
        display: none;
    }

    .roundbutton {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        background-color: #dae0eb;
        display: block;
        transition: all 0.3s;
        border-radius: 3.4rem;
        cursor: pointer;
    }

    .roundbutton:before {
        position: absolute;
        content: "";
        height: 1.4rem;
        width: 1.5rem;
        border-radius: 100%;
        display: block;
        left: 0.5rem;
        bottom: 0.5rem;
        background-color: white;
        transition: all 0.3s;
    }

    input:checked+.roundbutton {
        background-color: #7a88e6;
    }

    input:checked+.roundbutton:before {
        transform: translate(2.6rem, 0);
    }

    .bootstrap-tagsinput {
        background: #272e48;
        width: 100%;
        border: 1px solid rgba(255, 255, 255, 0.12);
        font: #ffffff;
    }

    .modal_scroll {
        height: 80vh;
        overflow-y: auto;
    }

    /* .ckchange{
        min-height: 50px !important;

        } */
    textarea.form-control {
        min-height: 50px !important;
    }

    /* new add for image */

    body {
        font-family: sans-serif;
        background-color: #eeeeee;
    }

    .file-upload {
        background-color: #ffffff;
        width: 250px;
        height: 198px;
        margin: 0 auto;
        padding: 10px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #ffffff;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        /* border: 4px dashed #1FB264; */
        position: relative;
    }

    /* .image-dropping,
    .image-upload-wrap:hover {
    background-color: #ffffff;
    border: 4px dashed #ffffff;
    } */

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 120px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    /* 2060 */
    .remove-image {
        /* width: 200px; */
        /* height: 45px; */
        /* margin: 0; */
        color: rgb(255, 0, 0);
        /* background: #b70000; */
        border: none;
        padding: 5px;
        border-radius: 4px;
        transition: all .2s ease;
        /* outline: none; */
        /* text-transform: uppercase; */
        font-size: 11px;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }

    .design {
        background-color: #f3f7f9;
        /* margin-bottom: 50px; */

        padding-left: 50px;
        padding-right: 50px;
    }

    .hr {
        /* margin: 1.5rem 0; */
        color: #e5e8eb;
        background-color: #e5e8eb !important;s
        border: 0;
        opacity: 1;
        padding: 0px !important;
        margin: 0px !important;

    }

    p {
        display: inline;
    }


    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        padding: 0 10px 0 22px !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        background-color: white !important;
        font-size: 16px !important;
    }

    span.select2-selection.select2-selection--single {
        outline: none !important;
    }

    .select2.select2-container .select2-selection {
        border: 1px solid #ced4da;
        border-radius: 3px;
        height: 37px;
        margin-bottom: 15px;
        outline: none !important;
        transition: all .15s ease-in-out;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 33px;
        right: 7px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 37px;
        color: #6c757d;
    }

    .select2-container .select2-search--inline {
        margin-top: -18px;
    }
</style>
@endsection

@section('main-content')

{{-- start add product --}}

<div class="container-fluid">
    {{-- modal show start --}}
    {{-- supplier modal start --}}
    <div class="modal fade" id="supplier_new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Add Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add_supplier_form">
                    @csrf
                    <div class="modal-body">
                        <div class="row  d-flex justify-content-center align-items-center">
                            <div class="row p-2">
                                   <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <select name="ecom_name" class=" form-select form-control ">
                                        <option value="" selected="" disabled="">Select Ecommerce Name
                                        </option>
                                        @foreach($ecom as $ecoms)
                                        <option value="{{ $ecoms->id }}">
                                            {{ $ecoms->ecom_name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="ecom_name" class="errorColor"></span>
                                </div>
                                 <div class="col-lg-4"></div>
                            </div>
                            <div class="row p-2">
                                <div class="col-3">
                                    <div class="col-lg">
                                        <label for="supplyer_name">Supplier Name</label>
                                        <input type="text" name="supplyer_name" id="supplyer_name" class="form-control">
                                        <span id="supplyer_name" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="col-lg">
                                        <label for="company_name">Organization Name</label>
                                        <input type="text" name="company_name" class="form-control" id="company_name">
                                        <span id="company_name" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="col-lg">
                                        <label for="supplyer_email">Supplier Email</label>
                                        <input type="email" name="supplyer_email" id="supplyer_email"
                                            class="form-control">
                                        <span id="supplyer_email" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="col-lg">
                                        <label for="supplyer_phone">Mobile Number</label>
                                        <input type="text" name="supplyer_phone" id="supplyer_phone"
                                            class="form-control">
                                        <span id="supplyer_phone" class="errorColor"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-3">
                                    <div class="col-lg">
                                        <label for="supplyer_phone2">Mobile Number2</label>
                                        <input type="text" name="supplyer_phone2" id="supplyer_phone2"
                                            class="form-control">
                                        <span id="supplyer_phone2" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="col-lg">
                                        <label for="supplyer_bank_info">Bank Details</label>
                                        <textarea class="form-control" name="supplyer_bank_info" id="supplyer_bank_info"
                                            rows="5"></textarea>
                                        <span id="supplyer_bank_info" class="errorColor"></span>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="col-lg">
                                        <label for="supplyer_mobile_bank_info">Mobile Banking Details</label>
                                        <textarea class="form-control" name="supplyer_mobile_bank_info"
                                            id="supplyer_mobile_bank_info" rows="5"></textarea>
                                        <span id="supplyer_mobile_bank_info" class="errorColor"></span>

                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="col-lg">
                                        <label for="supplyer_address">Supplier Address</label>
                                        <textarea class="form-control" name="supplyer_address" id="supplyer_address"
                                            rows="5"></textarea>
                                        <span id="supplyer_mobile_bank_info" class="errorColor"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-info">Add Supplier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- supplier modal end --}}


    @php
    $all_product=App\Models\Product::select('product_name')->get();
    $all_brand=App\Models\Brand::select('brand_name_cats_eye','ecom_id')->get();
    $all_cat=App\Models\Category::select('category_name')->get();
    $all_sub_cat=App\Models\SubCategory::select('sub_category_name')->get();
    $all_subsub_cat=App\Models\SubSubCategory::select('subsubcategory_name')->get();

    @endphp

    <div class="modal fade" id="brand_new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Add Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="AddBrandForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row  d-flex justify-content-center align-items-center">
                            <div class="col-lg-3">
                                <label for="fname" style="margin-top: 29px;">Ecommerce Name </label>
                                <select name="ecom_id" class=" form-select form-control " id="add_brand_ecom_select">
                                    <option value="" selected="" disabled="">Select Ecommerce Name
                                    </option>
                                    @foreach($ecom as $ecoms)
                                    <option value="{{ $ecoms->id }}">
                                        {{ $ecoms->ecom_name }}</option>
                                    @endforeach

                                </select>
                                <span id="error_ecom_name" class="errorColor"></span>
                            </div>
                            <div class="col-lg-3 mt-3">
                                <label for="prdCode">Brand Name </label>
                                <input type="text" id="brand_name_cats_eye" name="brand_name_cats_eye"
                                    placeholder="Brand name" class="form-control mt-1 brand_name">
                                  <p>
                                <span class="emsg4 d-none text-danger">This Name Is Already Exist(Please Enter Unique Name)</span> </p>
                                <input type="hidden" id="all_brand" value="{{ $all_brand }}">
                                <span id="error_name" class="errorColor"></span>
                            </div>
                            <div class="col-lg-3 mt-3">
                                <label for="supplierPrdCode">Brand Image <b style="color:red">(Size: 400px X 400px )</b> </label>
                                <input type="file" id="brand_image" name="brand_image" class="form-control mt-1">
                                <span id="error_image" class="errorColor"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-info">Add Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- 1234 --}}
    <div class="modal fade" id="supPrdEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_category_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row  d-flex justify-content-center align-items-center">
                            <div class="col-lg-3">
                                <label for="fname" style="margin-top:31px;">Ecommerce Name </label>
                                <select name="ecom_id" class=" form-select form-control " >
                                    <option value="" selected="" disabled="">Select Ecommerce Name
                                    </option>
                                    @foreach($ecom as $ecoms)
                                    <option value="{{ $ecoms->id }}">
                                        {{ $ecoms->ecom_name }}</option>
                                    @endforeach

                                </select>
                                <span id="error_cat_ecom_name" class="errorColor"></span>

                            </div>
                            <div class="col-lg-3 mt-3">
                                <label for="prdCode" style="margin-top:7px;">Category Name </label>
                                <input type="text" name="category_name" class="form-control c_name"
                                    placeholder="Category Name">
                                     <p><span class="emsg1 d-none text-danger">This Name Is Already Exist(Please Enter Unique Name)</span>
                                </p>
                                <input type="hidden" id="all_cat" value="{{ $all_cat }}">
                                <span id="error_cat_name" class="errorColor"></span>
                            </div>
                            <div class="col-lg-3 mt-3">
                                <label for="supplierPrdCode">Category Image</label>
                                <input type="file" name="category_image" class="form-control mt-1">
                                <span id="error_cat_image" class="errorColor"></span>
                            </div>
                            <div class="col-lg-3 mt-3">
                                <label for="brndName">Category Icon</label>
                                <input type="file" name="category_icon" class="form-control mt-1">
                                <span id="error_icon" class="errorColor"></span>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-info">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--55-->
    <div class="modal fade" id="subcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Add Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_subcategory_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row  d-flex justify-content-center align-items-center">
                            <div class="col-lg-3">
                                <label for="fname" style="margin-top: 30px;">Ecommerce Name </label>
                                <select name="ecom_id" class=" form-select form-control ecomauto" >
                                    <option value="" selected="" disabled="">Select Ecommerce Name
                                    </option>
                                    @foreach($ecom as $ecoms)
                                    <option value="{{ $ecoms->id }}">
                                        {{ $ecoms->ecom_name }}</option>
                                    @endforeach
                                </select>
                                <span id="error_s_ecom_id" class="errorColor"></span>
                            </div>
                            <div class="col-lg-3 mt-3">
                                <label for="prdCode" style="margin-top: 6px;"> Category Name </label>
                                <select name="category_id" class="form-control catecomauto" >
                                    <option selected>Select a category</option>
                                    @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}
                                    </option>
                                    @endforeach
                                </select>
                                <span id="error_s_category_id" class="errorColor"></span>
                            </div>
                            <div class="col-lg-3 mt-3">
                                <label for="prdCode"> Sub Category Name </label>
                                <input type="text" name="sub_category_name" placeholder="Sub category name"
                                    class="form-control mt-1 scat_name">
                                     <p><span class="emsg2 d-none text-danger">This Name Is Already Exist(Please Enter Unique
                                        Name)</span>
                                </p>
                                <input type="hidden" id="all_subcat" value="{{ $all_sub_cat }}">
                                <span id="error_sub_category_name" class="errorColor"></span>
                            </div>
                            <div class="col-lg-3 mt-3">
                                <label for="supplierPrdCode"> Sub Category Image</label>
                                <input type="file" name="subcategory_image" class="form-control mt-1">
                                <span id="error_sub_category_image" class="errorColor"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-info">Add Sub Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="subsubcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center"> Add Sub Sub Category </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row  d-flex justify-content-center align-items-center">

                                <div class="col-lg-2 mt-2">
                                    <label for="fname" style="margin-top: 12px;">Ecommerce Name </label>
                                    <select name="ecom_id" class=" form-select form-control ecomauto2">
                                        <option value="" selected="" disabled="">Select Ecommerce Name
                                        </option>

                                        @foreach($ecom as $ecoms)
                                        <option value="{{ $ecoms->id }}">
                                            {{ $ecoms->ecom_name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="error_ss_ecom_name" class="errorColor"></span>
                                </div>



                            <div class="col-lg-2 mt-2">
                                <label for="prdCode" style="margin-top: 15px;">Category Name </label>
                                <select name="category_id" class="form-control catecomauto2 catcat">
                                    <option selected>Select a category</option>
                                    @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <span id="error_category_id" class="errorColor"></span>
                            </div>
                            <div class="col-lg-3 mt-2">
                                <label for="prdCode" style="margin-top: 15px;"> Sub Category Name </label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control subcatecomauto2 subcatcat"
                                    aria-invalid="false" >
                                    <option value="" selected="" disabled="">Select Sub Category </option>

                                </select>
                                <span id="error_sub_category_id" class="errorColor"></span>
                            </div>
                            <div class="col-lg-3 mt-2">
                                <label for="prdCode" style="margin-top: 12px;">Sub Sub Category Name </label>
                                <input type="text" name="subsubcategory_name" placeholder="sub sub category name"
                                    class="form-control mt-1 subsubcat_name">
                                      <p><span class="emsg3 d-none text-danger">This Name Is Already Exist(Please Enter Unique
                                        Name)</span>
                                </p>
                                <input type="hidden" id="all_subsubcat" value="{{ $all_subsub_cat }}">
                                <span id="error_sub_sub_category_name" class="errorColor"></span>
                            </div>
                            <div class="col-lg-2 mt-2">
                                <label for="supplierPrdCode">Sub Sub Category Image</label>
                                <input type="file" style="margin-bottom: 12px;" name="subsubcategory_image" class="form-control mt-1">
                                <span id="error_sub_sub_category_image" class="errorColor"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-info">Add Sub SUb Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Add ecom modal-->
       <div class="modal fade" id="ecommmerce_name" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Add Ecommerce Name <b style="color:red">*</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- 5050 --}}
                <form id="AddEcommerceForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <h5 style="color: black"> <span class="text-danger">*</span>Ecommerce Name </h5>
                            <div class="controls">
                                <input type="text" name="ecom_name" placeholder="Ecommerce Name" class="form-control">
                                <span id="error_name" class="errorColor"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-info">Add Ecommerce Name</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <!--=========================================== End All Modal =====================================================================-->
 <!-- Selling Price modal Start-->
    <div id="sellingPriceModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="discount-modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="cash-modalLabel">Selling Price Type</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3" style="padding: 0;">
                                            <select class="form-select" aria-label="Default select example"
                                                id="select-option">
                                                <option selected disabled>Selling Price Type</option>
                                                <option value="taka">Taka (&#2547;)</option>
                                                <option value="percentage">Percentage (%)</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-9" id="input-details" style="padding: 0;">
                                            <div class="input-group taka details">
                                                <input id="taka" type="text" class="form-control" placeholder="Taka">
                                            </div>
                                            <div class="input-group mb-3 percentage details datachange d-none">
                                                <input id="Percentage" type="text" onkeyup="discounts_show()"
                                                    class="form-control" placeholder="%">
                                                <div class="input-group-text">
                                                    Selling Price with Discount
                                                </div>
                                                <input id="discount_show" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light modal-close" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="SaveDiscount()">Save</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

<!-- Selling Price modal End-->

 <!--=========================================== End All Modal =====================================================================-->


   <!--=========================================== Start Product Add From 30303030 =====================================================================-->
    <form method="post" action="{{ route('role.product_store', config('fortify.guard')) }}"
        enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
            <input id="new_purchase_qty" type="hidden" name="purchase_qty" value="">

            <div class="row">
                <div class="col-lg-3">
                    <label for="" class="mb-2">Thumbnail Image </label>
                    <div class="file-upload">

                        <div class="image-upload-wrap">
                            <input class="file-upload-input" type='file' name="product_thambnail"
                                onchange="readURL(this);" accept="image/*" height="200px" />
                            <div class="drag-text mt-4">
                                <i class="fas fa-image" style="font-size:35px;color:darkgray"></i>
                                <p style="font-family: ubuntu; color:red">Add Image <br> <b
                                        class="text-danger; text:bold">Size: 1024px *
                                        1024px</b></p>
                            </div>
                        </div>

                        <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image" />
                            <div class="image-title-wrap">
                                <a type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                        class="image-title">Uploaded Image</span>

                                </a>
                            </div>
                        </div>
                    </div>
                     @error('product_thambnail')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-3">
                    <label for="fname" class="mb-2" style="font-size: 13px">Multiple Image Add <span
                            style="color:red; font-weight:bold; font-size: 16">(1024px * 1024px)</span> </label>
                    <input type="file" data-plugins="dropify" name="multi_img[]" multiple="" id="MultiImg"
                        class="form-control">
                         @error('multi_img.*')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label for="fname">View Multiple Image </label>
                    <div class="row" id="preview_img"></div>
                </div>
            </div>


            <div class="row my-3">


                 <div class="col-lg-3">
                    <div class="brand-select-wrap d-flex justify-content-between align-items-center">
                        <p class="mb-1 fw-bold  mt-3 mt-md-0">Ecommerce Name <b style="color:red; font-weight:bold;font-size: 18px">**</b> </p>
                        <p class=" font-15 brand-text text-blue" data-bs-toggle="modal"
                            data-bs-target="#ecommmerce_name">
                            Add Ecommerce Name <i class="fa fa-plus-circle"> </i>
                        </p>
                    </div>
                    <select name="ecom_name" class=" form-select form-control ee"  data-toggle="select2" >
                        <option value="" selected="" >Select Ecommerce Name
                        </option>
                        @foreach($ecom as $ecoms)
                        <option value="{{ $ecoms->id }}" {{ old("ecom_name") == $ecoms->id  ? "selected":"" }}>
                            {{ $ecoms->ecom_name }}</option>
                        @endforeach
                    </select>
                    @error('ecom_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-3 mt-2" >
                    <div class="brand-select-wrap d-flex justify-content-between align-items-center "
                        style="margin-bottom: -10px;">
                        <p class=" fw-bold">Supplier Name (Organazation Name)<b style="color:red; font-weight:bold;font-size: 18px">**</b></p>

                    </div>
                    <select name="supplier_id" id="supplier_r" class=" form-select form-control ss"  data-toggle="select2" >
                        <option value="" selected=""  >Select Supplier Name
                        </option>

                        @foreach($supplier as $sup)
                        <option value="{{$sup->id }}" {{ old("supplier_id") == $sup->id  ? "selected":"" }}>
                            {{ $sup->supplyer_name }}
                        </option>
                        @endforeach
                    </select>
                     @error('supplier_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- 5050 --}}
                <div class="col-lg-3">
                    <div class="brand-select-wrap d-flex justify-content-between align-items-center">
                        <p class="mb-1 fw-bold  mt-3 mt-md-0">Brand Name <b style="color:red; font-weight:bold;font-size: 18px">**</b></p>
                        <p class=" font-15 brand-text text-blue" data-bs-toggle="modal" data-bs-target="#brand_new">
                            Add brand <i class="fa fa-plus-circle"> </i>
                        </p>
                    </div>
                    <select name="brand_id" id="brand" class=" form-select form-control bb"  data-toggle="select2" >
                        <option value="" selected=""  >Select Brand Name
                        </option>

                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old("brand_id") == $brand->id  ? "selected":"" }}>
                            {{ $brand->brand_name_cats_eye }}</option>
                        @endforeach
                    </select>
                     @error('brand_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-3">
                    <div class="brand-select-wrap d-flex justify-content-between align-items-center">
                        <p class="mb-1 fw-bold  mt-3 mt-md-0">Category <b style="color:red; font-weight:bold;font-size: 18px">**</b></p>
                        <p class=" font-15 brand-text text-blue" data-bs-toggle="modal"
                            data-bs-target="#supPrdEditModal">
                            Add Category <i class="fa fa-plus-circle"> </i>
                        </p>
                    </div>
                    <select name="category_id" id="cat" class=" form-select form-control cat_r cc"  data-toggle="select2" >
                        <option value="" selected="" >Select Category Name
                        </option>

                        @foreach($categorys as $cat)
                        <option value="{{ $cat->id }}" {{ old("category_id") == $cat->id  ? "selected":"" }}>
                            {{ $cat->category_name }}</option>
                        @endforeach
                    </select>
                     @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3">
                    <div class="brand-select-wrap d-flex justify-content-between align-items-center">
                        <p class="mb-1 fw-bold  mt-3 mt-md-0">Sub Category <b style="color:red; font-weight:bold;font-size: 18px">**</b></p>
                        <p class=" font-15 brand-text text-blue" data-bs-toggle="modal" data-bs-target="#subcategory">
                            Add Sub Category <i class="fa fa-plus-circle"> </i>
                        </p>
                    </div>
                    <select name="sub_category_id" id="subcat" class=" form-select form-control subcat_rr sscc"  data-toggle="select2" >
                        <option value="" selected=""  >Select Sub Category Name
                        </option>

                        @foreach($subcategory as $subcat)
                        <option value="{{ $subcat->id }}" {{ old("sub_category_id") == $subcat->id ? "selected":"" }}>
                            {{ $subcat->sub_category_name }}</option>
                        @endforeach
                    </select>
                     @error('sub_category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-3">
                    <div class="brand-select-wrap d-flex justify-content-between align-items-center">
                        <p class="mb-1 fw-bold  mt-3 mt-md-0">Sub Sub Category</p>
                        <p class=" font-15 brand-text text-blue" data-bs-toggle="modal"
                            data-bs-target="#subsubcategory">
                            Add Sub Sub Category <i class="fa fa-plus-circle"> </i>
                        </p>
                    </div>
                    <select name="sub_sub_category_id" id="subsubcat" class=" form-select form-control sssscc"  data-toggle="select2" >
                        <option selected="" >Select Sub Sub Category Name </option>
                        @foreach($subsubcategory as $subsubcat)
                        <option value="{{ $subsubcat->id }}"  {{ old("sub_sub_category_id") == $subsubcat->id  ? "selected":"" }}>
                            {{ $subsubcat->subsubcategory_name }}</option>
                        @endforeach
                    </select>
                    <!-- @error('sub_sub_category_id')-->
                    <!--<span class="text-danger">{{ $message }}</span>-->
                    <!--@enderror-->
                </div>


                 @php
                $all_product=App\Models\Product::select('product_name')->get();
                @endphp
                   <div class="col-lg-3 mt-2">
                    <label for="fname">Product Name <b class="text-danger">*</b> </label>
                    <input type="text" value="{{old('product_name')}}"  name="product_name" class="form-control p_name" placeholder="Product Name">

                    <input type="hidden" id="all_product" value="{{ $all_product }}">
                    @error('product_name') <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-lg-3 mt-2">
                    <label for="fname">Weight (gm / ml)
                    </label>
                    <input type="text" name="unit" value="{{old('unit')}}" class="form-control" placeholder="120gm / 1ml">
                    <span id="error_weight" class="errorColor"></span>
                </div>
            </div>
            <div class="row my-3">

                <div class="col-lg-3">
                    <label for="fname">Quantity <b style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                    <input type="text" value="{{old('product_qty')}}" name="product_qty" class="form-control" placeholder="0" id='qty'>
                    @error('product_qty')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-lg-3">
                    <label for="fname">Unit Cost Price <b style="color:red; font-weight:bold;font-size: 18px">**</b> </label>
                    <input type="text" class="form-control check" value="{{old('unit_price')}}" name="unit_price" placeholder="0.00tk"
                        id='unit_price'>
                      @error('unit_price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-3">
                    @php
                    $todaypurchasedate = Carbon\Carbon::now()->format('Y-m-d');
                    @endphp
                    <label for="fname">Purchase Date <b style="color:red; font-weight:bold;font-size: 18px">**</b> </label>
                    <input type="date" name="purchase_date"  class="form-control" value="{{$todaypurchasedate}}">
                    <!--<span id="error_name" class="errorColor"></span>-->
                </div>
                <div class="col-lg-3">
                    <label for="fname">Buying Price </label>
                    <input type="text" name="purchase_price" value="{{old('purchase_price')}}"class="form-control totalprice" placeholder="Buying Price" >
                    <span id="error_name" class="errorColor"></span>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3">
                    <div class="brand-select-wrap d-flex justify-content-between align-items-center">
                         <label for="fname">Sell Price <b style="color:red; font-weight:bold;font-size: 18px">**</b> </label>
                        <!--<p class=" font-15 brand-text text-blue" data-bs-toggle="modal" data-bs-target="#sellingPriceModal">Add Selling Price <i class="fa fa-plus-circle"> </i></p>-->
                    </div>
                    <input type="text"  name="selling_price" value="{{old('selling_price')}}" class="form-control" placeholder="0.00TK" >
                    <!--@error('selling_price')-->
                    <!--<span class="text-danger">{{ $message }}</span>-->
                    <!--@enderror-->
                </div>
                <div class="col-lg-3">
                    <label for="fname">Discount Price </label>
                    <input type="text" name="discount_price"  value="{{old('discount_price')}}" class="form-control" placeholder="0.00TK" id="myTextBox"
                        onKeyUp="checkInput()">
                    <div id="invalid" style="color: red;">
                    </div>
                    <span id="error_name" class="errorColor"></span>
                </div>
                <div class="col-lg-3">
                    <label for="fname">Discount Start Date </label>
                    <input type="date" name="start_date" class="form-control" value="{{old('start_date')}}"
                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                    <span id="error_name" class="errorColor"></span>
                </div>
                <div class="col-lg-3">
                    <label for="fname">Discount Close Date </label>
                   <input type="date" name="end_date" class="form-control" placeholder="Discount Close Date" value="{{old('end_date')}}"
                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                    <span id="error_name" class="errorColor"></span>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3">
                    <label for="fname">Product Expire Date</label>
                    <input type="date" id="basic-datepicker" class="form-control" placeholder="Product Expire Date" value="{{old('product_expire_date')}}"
                        name="product_expire_date">
                    <span id="error_name" class="errorColor"></span>
                </div>
                <div class="col-lg-3">
                    <label for="fname">Color </label>


                    <select class="form-control select2" style="background-color: #1FB264" id="select2insidemodal"
                        data-toggle="select2" data-width="100%" multiple="multiple" data-placeholder="Choose Color..."
                        name="product_color[]">
                        <option value="Lime" id="Lime">Lime</option>
                        <option value="Aqua" id="Aqua">Aqua</option>
                        <option value="Pea Green" id="Pea Green">Pea Green</option>
                        <option value="Red" id="red">Red</option>
                        <option value="Pink" id="pink">Pink</option>
                        <option value="White" id="white">White</option>
                        <option value="Blue" id="blue">Blue</option>
                        <option value="Yellow" id="yellow">Yellow</option>
                        <option value="Green" id="green">Green</option>
                        <option value="Black" id="black">Black</option>
                        <option value="Brown" id="Brown">Brown</option>
                        <option value="Purple" id="Purple">Purple</option>
                        <option value="Dark Blue" id="Dark Blue">Dark Blue</option>
                        <option value="Off white" id="Off white">Off white</option>
                        <option value="Dark Coffee" id="Dark Coffee">Dark Coffee</option>
                        <option value="Dark Green" id="Dark Green">Dark Green</option>
                         <option value="Deep Ash" id="Deep Ash">Deep Ash</option>
                          <option value="Deep Denim" id="Deep Denim">Deep Denim</option>
                          <option value="Multi Colour" id="Multi Colour">Multi Colour</option>
                        <option value="Grey" id="Grey">Grey</option>
                         <option value="Tan" id="Tan">Tan</option>
                         <option value="Olive Drab" id="Olive Drab">Olive Drab</option>
                         <option value="Red Violet" id="Red Violet">Red Violet</option>
                         <option value="Orange" id="Orange">Orange</option>
                         <option value="Crimson" id="Crimson">Crimson</option>

                         <option value="Amber" id="Amber">Amber</option>
                         <option value="indigo" id="indigo">indigo</option>
                         <option value="Assh" id="Assh">Assh</option>

                         <option value="Dark Sea Green" id="Dark Sea Green">Dark Sea Green</option>

                          <option value="Sky Blue" id="Sky Blue">Sky Blue</option>
                        <option value="Turquoise" id="Turquoise">Turquoise</option>
                        <option value="Turquoise" id="Turquoise">Orange</option>
                        <option value="Blue Gray" id="blue gray">Blue Gray</option>

                        <option value="Dark Red" id="Dark Red">Dark Red</option>
                        <option value="Dark Marron" id="Dark Marron">Dark Marron</option>
                        <option value="Gray" id="Gray">Gray</option>
                        <option value="Olive" id="Olive">Olive</option>
                        <option value="Maroon" id="Maroon">Maroon</option>
                        <option value="Violet" id="Violet">Violet</option>
                        <option value="Charcoal" id="Charcoal">Charcoal</option>
                        <option value="Magenta" id="Magenta">Magenta</option>
                        <option value="Bronze" id="Bronze">Bronze</option>
                        <option value="Cream" id="Cream">Cream</option>
                        <option value="Ten" id="Ten">Ten</option>
                        <option value="Teal" id="Teal">Teal</option>
                        <option value="Mustard" id="Mustard">Mustard</option>
                        <option value="Navy Blue" id="Navy Blue">Navy Blue</option>
                        <option value="Coral" id="Coral">Coral</option>
                        <option value="Burgundy" id="Burgundy">Burgundy</option>
                        <option value="Lavender" id="Lavender">Lavender</option>
                        <option value="Mauve" id="Mauve">Mauve</option>
                        <option value="Peach" id="Peach">Peach</option>
                        <option value="Rust" id="Rust">Rust</option>
                        <option value="Gold" id="Gold">Gold</option>
                        <option value="Silver" id="Silver">Silver</option>
                        <option value="Cyan" id="Cyan">Cyan</option>
                    </select>
                    <span id="error_name" class="errorColor"></span>
                </div>
                <div class="col-lg-3">
                    <label for="fname">Size </label>
                    <select class="form-control select2" id="select23insidemodal" data-toggle="select2"
                        data-width="100%" multiple="multiple" data-placeholder="Choose Color..." name="product_size[]">

                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                        <option>XXL</option>
                        <option>XXXL</option>
                        <option>20</option>
                        <option>22</option>
                        <option>24</option>
                        <option>26</option>
                        <option>28</option>
                        <option>30</option>
                        <option>32</option>
                        <option>34</option>
                        <option>36</option>
                        <option>38</option>
                        <option>40</option>
                        <option>42</option>
                        <option>44</option>
                        <option>46</option>
                        <option>48</option>
                        <option>50</option>


                    </select>

                    <span id="error_name" class="errorColor"></span>
                </div>
                <div class="col-lg-3">
                    <label for="fname">Video </label>
                    <input type="text" name="video_link" class="form-control" value="{{old('video_link')}}" placeholder="Video Link">
                    <span id="error_name" class="errorColor"></span>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3">
                    <label for="fname">Product Stock Alert </label>
                    <input type="text" name="product_stock_alert" class="form-control" value="{{old('product_stock_alert')}}"
                        placeholder="0 PCS">
                    <span id="error_name" class="errorColor"></span>
                </div>
                <div class="col-lg-3">

                    <label for="fname">Product Expire Date Alert</label>

                    <select class="form-control" name="product_expire_alert_date" >
                        <option value="" selected="" disabled="">Select Expire Date
                        </option>
                        <option value="1" id="red">1day</option>
                        <option value="2" id="pink">2day</option>
                        <option value="3" id="white">3day</option>
                        <option value="4" id="blue">4day</option>
                        <option value="5" id="yellow">5day</option>
                        <option value="6" id="green">6day</option>
                        <option value="7" id="pink">1week</option>
                        <option value="14" id="white">2week</option>
                        <option value="21" id="blue">3week</option>
                        <option value="28" id="yellow">4week</option>
                        <option value="30" id="green">1month</option>
                        <option value="60" id="black">2month</option>
                        <option value="90" id="black">3month</option>
                        <option value="120" id="black">4month</option>
                        <option value="150" id="black">5month</option>
                        <option value="180" id="black">6month</option>
                    </select>
                    <span id="error_name" class="errorColor"></span>
                </div>

                <div class="col-lg-3">
                    <label for="fname">Vat% </label>
                    <input type="text" class=" form-control"  name="vat" placeholder="50%" value="{{old('vat')}}">
                    <span id="error_name" class="errorColor"></span>
                </div>
                <div class="col-lg-3">
                    <label for="fname">SKU Code </label>
                    <input type="text" class=" form-control"  name="sku_code" value="{{old('sku_code')}}"
                        placeholder="184421965_BD-1129385135">
                    <span id="error_name" class="errorColor"></span>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-3">
                    <label for="fname">Supplier Product Code </label>
                    <input type="text" class=" form-control"  name="supplier_product_code" value="{{old('supplier_product_code')}}"
                        placeholder="#________">
                    <span id="error_name" class="errorColor"></span>
                </div>


                <div class="col-lg-3">

                </div>

                <div class="col-lg-3">

                </div>
                <div class="col-lg-3">

                </div>

            </div>

<!--     -->







            <div class="row my-3">
                <div class="col-lg-7">
                    <label for="fname">Add Short Description  <b style="color:red; font-weight:bold;font-size: 18px">**</b></label>
                    <textarea class=" form-control ckeditor " name="product_descp" >{{ old('product_descp') }}</textarea>
                    @error('product_descp')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-5 mb-5" style="margin-top:-25px">
                    <div class="row my-3 ">
                        <div class="col-lg-12 ">
                            <label for="fname">Tags </label>
                            <input type="text" class="selectize-close-btn form-control" value="" id="input-tags" name="product_tags">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-lg-12">
                            <label for="fname">Meta Title </label>
                            <input type="text" name="meta_title" class="form-control" placeholder="Meta Title " value="{{old('meta_title')}}">
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-12">
                            <label for="fname">Add Meta Description </label>
                            <textarea type="text" name="meta_desc" class="form-control" rows="2" cols="2">{{old('meta_desc')}} </textarea>
                            <span id="error_name" class="errorColor"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <label for="fname">Add Long Description </label>
                    <textarea class=" form-control ckeditor " name="long_info" >{{ old('long_info') }}</textarea>

                </div>

                </div>
            <div class="row my-3">
                <div class="col-lg-1"></div>

                <div class="col-lg-10">

                    <div class="row">
                        <div class="col-lg-6">
                            <h3 style="text-align: center;">All Deals</h3>
                            <div class="row" style="text-align: center;">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="fname">Featured </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="toggle">
                                                                <input id="toggleswitch" type="checkbox"
                                                                    name="featured">
                                                                <span class="roundbutton"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="fname">Hot Deals </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="toggle">
                                                                <input id="toggleswitch" type="checkbox"
                                                                    name="hot_deals">
                                                                <span class="roundbutton"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    {{-- jcjdscj --}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="fname">Special Offer </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="toggle">
                                                                <input id="toggleswitch" type="checkbox"
                                                                    name="special_offer">
                                                                <span class="roundbutton"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="fname">Special Deal </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label class="toggle">
                                                                <input id="toggleswitch" type="checkbox"
                                                                    name="special_deals">
                                                                <span class="roundbutton"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3" style="text-align: center;">
                            <h3>Shipping</h3>
                            <div class="row">
                                <div class="col-lg-4" id="labony">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="fname">Free Delivery </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="toggle">
                                                <input id="toggleswitch" type="checkbox" name="shipping"
                                                    onclick=check()>
                                                <span class="roundbutton"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3" style="text-align: center;">
                            <h3>Delivery Details</h3>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="fname">Cash On Delivery</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="toggle">
                                                <input id="toggleswitch" type="checkbox" name="cash_on_delivery">
                                                <span class="roundbutton"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="fname" class="pe-3">Refundable</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="toggle">
                                                <input type="checkbox" name="refundable">
                                                <span class="roundbutton ms-3"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>

            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="add_product_btn" class="btn btn-success">Add Product</button>
        </div>
    </form>
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function(){

        var allproduct = $('#all_product').val();
        let allproduct_object = JSON.parse(allproduct);
        console.log(allproduct_object);
        $('.p_name').on('keyup',function(){

            if(allproduct_object.find((pd) => pd.product_name == $(this).val())){
                $('.emsg').removeClass('d-none');
                $('.emsg').show();
            }
            else{
                $('.emsg').addClass('d-none');
            } });});

    $(document).ready(function() {
        $('#select-option').change(function() {
            $(".datachange").removeClass("d-none");
            var optionName = $('#select-option').val();
            $(".details").hide();
            $("." + optionName).show();

            if(optionName == 'taka'){
                document.getElementById("selling").value = sellintTaka;
                document.getElementById('discount_show').value = "";
                document.getElementById("selling").value = "";

            }else if(optionName == 'percentage'){
                document.getElementById("selling").value = "";
                document.getElementById('taka').value = "";
                document.getElementById("selling").value = percentageTaka;
            }

        })
    });

    function discounts_show() {

        var discount_show = document.getElementById('discount_show');
        var Percentage = document.getElementById('Percentage').value;
        var total_grand = document.getElementById('unit_price').value;
        //console.log(typeof total_grand);
        var test1 = (total_grand * Percentage) / 100;
        // var test=total_grand-test1;
        discount_show.value = parseInt(total_grand) + test1;

    }

    // save selling price function
    function SaveDiscount() {
        //var discountText = document.getElementById('tot_disc');
        var sellintTaka = document.getElementById('taka').value;
        var percentageTaka = document.getElementById('discount_show').value;
        console.log(percentageTaka);

        if (sellintTaka > 0) {
            var total_grand_discount = document.getElementById("selling").value = sellintTaka;
         }
        else if (percentageTaka > 0) {
            var total_grand_discount = document.getElementById("selling").value = percentageTaka;
        }
        //################################################################################################################################## grand_total

        $('.modal-close').click();
    }
</script>
<!-- ================Brand,Ctaegory,SubCategory,SubSUbCategory unique name validation Start=========== -->
<!--for check-->

<script>
 $(document).ready(function(){
        var allbrand = $('#all_brand').val();
        let allbrand_object = JSON.parse(allbrand);
        const selectedEComId = $('#add_brand_ecom_select').val();
        const typedBrandObject = allbrand_object.find((pd) => pd.brand_name_cats_eye == $(this).val());
        if(typedBrandObject && typedBrandObject.ecom_id == selectedEComId){
        $('.emsg4').removeClass('d-none');
        $('.emsg4').show();
        }
        else{
        $('.emsg4').addClass('d-none');
        }
        });
 });
</script>

<!--end-->
<script>
    $(document).ready(function(){
        // ====================for category====================================//

        var allcategory = $('#all_cat').val();
        let allcategory_object = JSON.parse(allcategory);
        $('.c_name').on('keyup',function(){

            if(allcategory_object.find((pd) => pd.category_name == $(this).val())){
                $('.emsg1').removeClass('d-none');
                $('.emsg1').show();
            }
            else{
                $('.emsg1').addClass('d-none');
            }
        });
        // ====================for brand====================================//
        var allbrand = $('#all_brand').val();
        console.log(allbrand);
        let allbrand_object = JSON.parse(allbrand);
        console.log(allbrand_object);
        $('.brand_name').on('keyup',function(){

         const selectedEComId = $('#add_brand_ecom_select').val();
        const typedBrandObject = allbrand_object.find((pd) => pd.brand_name_cats_eye == $(this).val());
        if(typedBrandObject && typedBrandObject.ecom_id == selectedEComId){
        $('.emsg4').removeClass('d-none');
        $('.emsg4').show();
        }
        else{
        $('.emsg4').addClass('d-none');
        }
        });
        // ====================for sub category====================================//
        var allsubcat = $('#all_subcat').val();
        let allsubcat_object = JSON.parse(allsubcat);
        $('.scat_name').on('keyup',function(){

            if(allsubcat_object.find((pd) => pd.sub_category_name == $(this).val())){
                $('.emsg2').removeClass('d-none');
                $('.emsg2').show();
            }
            else{
                $('.emsg2').addClass('d-none');
            }
        });
// ====================for sub sub category====================================//
        var allsubsub = $('#all_subsubcat').val();
        let allsubsubcat_object = JSON.parse(allsubsub);
        $('.subsubcat_name').on('keyup',function(){

            if(allsubsubcat_object.find((pd) => pd.subsubcategory_name == $(this).val())){
                $('.emsg3').removeClass('d-none');
                $('.emsg3').show();
            }
            else{
                $('.emsg3').addClass('d-none');
            }
        });
 });

</script>
<!-- ================Brand,Ctaegory,SubCategory,SubSUbCategory unique name validation end=========== -->


<script>
    CKEDITOR.replace('product_descp', {
        height: '120px'
    });
    CKEDITOR.replaceClass('ck', {
        height: '120px'
    });
</script>
<script>



</script>

<script>
    function readURLImage(input) {

        var id =$(input).attr("data-image");

        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        $(`#image${id}`).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
        }
        }

        function setToggleValue(value, id) {
        if (value == 1) {
        var element = document.getElementById(id);
        element.setAttribute("checked", true);
        }
        }
</script>
{{-- selling discount price start --}}
<script>
    var myTextBox = document.getElementById('myTextBox').val();

        function checkInput() {
            var myTextBox = document.getElementById("myTextBox").value;
            var value = document.getElementById('selling').value;
            if (parseFloat(myTextBox) >= parseFloat(value)) {
                document.getElementById("invalid").innerHTML = 'discount price can not be bigger or equal than selling price';
            } else {
                document.getElementById("invalid").innerHTML = '';
            }
        }

</script>
{{-- selling discount price end --}}


{{-- // Img Tham script --}}
<script type="text/javascript">
    function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
{{-- ---------------------------Show Multi Image JavaScript Code ------------------------ --}}
<script>
    $(document).ready(function() {
            $('#MultiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|webp?|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src'
                                            , e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });

</script>
<script>
    $("#qty").on('keyup', function() {

            var qty = $("#qty").val();
            console.log(qty);
            $("#new_purchase_qty").val(qty);
        });


    </script>
    <!-- 2020202020 -->




    <!-- All modal start -->
    <script>
  // ======================== Ecommerce Name Start =================================
    $(document).ready(function() {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    //Add Submit
    $(document).on('submit', '#AddEcommerceForm', function(e) {
    e.preventDefault();

    console.log("good");
    let formData = new FormData($('#AddEcommerceForm')[0]);
    $.ajax({
    type: "POST",
    url: "{{ route('role.ecommerce.store', config('fortify.guard')) }}",
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
    if (response.status == 400) {

    } else {
    toastr.success(response.message);
   $('#ecommmerce_name').modal('hide');
    $('.ee').append(new Option(response.ecom.ecom_name));
    document.getElementById("AddEcommerceForm").reset();
    }
    }

    });
    });
    });
 // ======================== Ecommerce Name End =================================
 // ======================== brand start =================================
$(document).ready(function() {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    //Add Submit
    $(document).on('submit', '#AddBrandForm', function(e) {
    e.preventDefault();

    console.log("good");
    let formData = new FormData($('#AddBrandForm')[0]);
    $.ajax({
        type: "POST",
        url: "{{ route('role.brandnew.store', config('fortify.guard')) }}",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
        if (response.status == 400) {
        $('#error_ecom_name').text(response.errors.ecom_id);
        $('#error_name').text(response.errors.brand_name_cats_eye);
        $('#error_image').text(response.errors.brand_image);

        } else {
        toastr.success(response.message);
         $('.bb').append(new Option(response.brands.brand_name_cats_eye));
        $('#brand_new').modal('hide');
        document.getElementById("AddBrandForm").reset();
       }
    }

    });
    });
});
  // ======================== brand End =================================
  // ======================== Category start =================================
    $(document).on('submit', '#add_category_form', function(e) {
    e.preventDefault();
    console.log("good");
    $('#error_name').text("");
    $('#error_image').text("");
    $('#error_icon').text("");
    let formData = new FormData($('#add_category_form')[0]);
    $.ajax({
    type: "POST",
    url: "{{ route('role.category.store', config('fortify.guard')) }}",
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
    if (response.status == 400) {
        $('#error_cat_ecom_name').text(response.errors.ecom_id);
        $('#error_cat_name').text(response.errors.category_name);
        $('#error_cat_image').text(response.errors.category_image);
        $('#error_icon').text(response.errors.category_icon);
    } else {
    // toastr.success(" {{ Session::get('message') }} ");
        toastr.success(response.message);
        $('.cc').append(new Option(response.category.category_name));
        $('#supPrdEditModal').modal('hide');
        document.getElementById("add_category_form").reset();
    }
    }
    });
    });
 // ======================== Category End =================================
 // ======================== Sub Category Start ===========================
    $(document).on('submit', '#add_subcategory_form', function(e) {
    e.preventDefault();

    console.log("good");
    let formData = new FormData($('#add_subcategory_form')[0]);
    $.ajax({
    type: "POST",
    url: "{{ route('role.subcategory.store', config('fortify.guard')) }}",
    data: formData,
    contentType: false,
    processData: false,
    success: function(response) {
    if (response.status == 400) {
    $('#error_s_ecom_id').text(response.errors.ecom_id);
    $('#error_s_category_id').text(response.errors.category_id);
    $('#error_sub_category_name').text(response.errors.sub_category_name);
    $('#error_sub_category_image').text(response.errors.subcategory_image);

    } else {
    toastr.success(response.message);
    $('#subcategory').modal('hide');
    $('.sscc').append(new Option(response.subcategory.sub_category_name));
    document.getElementById("add_subcategory_form").reset();
    }
    }
    });
    });
 // ======================== Sub Category End ===========================
 // ======================== Sub Sub Category Start ========================
$(document).on('submit', '#add_employee_form', function(e) {
        e.preventDefault();

        console.log("good");
        let formData = new FormData($('#add_employee_form')[0]);
        $.ajax({
        type: "POST",
        url: "{{ route('role.subsubcategory.store', config('fortify.guard')) }}",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {

        if (response.status == 400) {
        $('#error_ss_ecom_name').text(response.errors.ecom_id);
        $('#error_category_id').text(response.errors.category_id);
        $('#error_sub_category_id').text(response.errors.subcategory_id);
        $('#error_sub_sub_category_name').text(response.errors
        .subsubcategory_name);
        $('#error_sub_sub_category_image').text(response.errors
        .subsubcategory_image);

        } else {
        toastr.success(response.message);
         $('#subsubcategory').modal('hide');
        $('.sssscc').append(new Option(response.subsubcategory.subsubcategory_name));
        document.getElementById("add_employee_form").reset();
        }
        }
        });
        });
 // ======================== Sub Sub Category End ========================
 // ======================== Supplier Start ========================

   $(document).on('submit', '#add_supplier_form', function(event) {
    event.preventDefault();
    let imagesData = new FormData($('#add_supplier_form')[0]);
    const role = "{{ config('fortify.guard') }}";
    console.log(imagesData);
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
    type: "POST",
    url: `/${role}/suppliers/supplier/insertData`,
    data: imagesData,
    contentType: false,
    processData: false,
    success: function(response) {

    if (response.status == 400) {
    $('#ecom_name').text(response.errors.ecom_name);
    } else {
    toastr.success(response.message);
    $('#supplier_new').modal('hide');
    $('.ss').append(new Option(response.supplier.supplyer_name));
    document.getElementById("add_supplier_form").reset();

    }
    },
    });
    });
 // ======================== Supplier End ========================
</script>

<!-- ===================== Brand , Supplier , Cat, SUb  cat, Sub sub Cat start ===================== -->
<script>
    $(document).ready(function() {

    $('select[name="ecom_name"]').on('change', function() {
    var ecom_id = $(this).val();
    console.log(ecom_id);
    if (ecom_id) {
     $.ajax({
    url: `/{{ config('fortify.guard') }}/listbrandCategory/autoload/all/${ecom_id}`,
    type: "GET",
    dataType: "json",
    success: function(data) {
        console.log(data);
        var d = $('#subcat').empty();
         // select
         var sub_cat_fixed = `<option value="">Select Sub Category Name</option>`;
        $('#subcat').append(sub_cat_fixed);
        // end
        console.log($('#subcat'));
        $.each(data.subcat, function(key, value) {
            var s = `<option value="${value.id}">${value.sub_category_name}</option>`;
            $('#subcat').append(s);
            console.log(data.subcat);
        });
        var d = $('#brand').empty();
         // select
         var brand_fixed = `<option value="">Select Brand Name</option>`;
        $('#brand').append(brand_fixed);
        // end
        $.each(data.brand, function(key, value) {
        var s = `<option value="${value.id}">${value.brand_name_cats_eye}</option>`;
        $('#brand').append(s);
        console.log(data.brand);
        });

        var d = $('#cat').empty();

          // select
         var cat_fixed = `<option value="">Select Category Name</option>`;
        $('#cat').append(cat_fixed);
        // end

        $.each(data.cat, function(key, value) {
        var s = `<option value="${value.id}">${value.category_name}</option>`;
        $('#cat').append(s);
        });


        // select
        var d = $('#subsubcat').empty();
         var subsub_cat_fixed = `<option value="">Select Sub Sub Category Name</option>`;
        $('#subsubcat').append(subsub_cat_fixed);
        // end
        $.each(data.subsubcat, function(key, value) {
        var s = `<option value="${value.id}">${value.subsubcategory_name}</option>`;
        $('#subsubcat').append(s);
        });

        var d = $('#supplier_r').empty();
        var s_fixed = `<option value="">Select Supplier Name</option>`;
        $('#supplier_r').append(s_fixed);


        $.each(data.supplier, function(key, value) {
        var s = `<option value="${value.id}">${value.supplyer_name}</option>`;

        $('#supplier_r').append(s);
        });

    },
    });

    }
    else
    {

    }



    });
});

</script>
<!-- ===================== Brand , Supplier , Cat, SUb  cat, Sub sub Cat End ===================== -->

<script>
    $(document).ready(function() {
                $('select[name="category_id"]').on('change', function() {
                    var category_id = $(this).val();
                    if (category_id) {
                        $.ajax({
                            url: `/{{ config('fortify.guard') }}/subsubcategory/subcategory/ajax/${category_id}`,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                var d = $('select[name="subcategory_id"]').empty();

                                // $('select[name="subcategory_id"]').append(
                                // '<option>' + 'Select Sub Category Name' + '</option>');
                                  var d = $('select[name="subcategory_id"]').empty();
                                        var subsub_cat_fixed = `<option value="">Select Sub Category Name</option>`;
                                        $('select[name="subcategory_id"]').append(subsub_cat_fixed);

                                $.each(data, function(key, value) {
                                    $('select[name="subcategory_id"]').append(
                                        '<option value="' + value.id + '">' + value
                                        .sub_category_name + '</option>');
                                });
                            },
                        });
                    } else {

                    }
                });
            });

</script>
{{-- for auto subcategory start --}}
<script>
    $(document).ready(function() {


     // from sub category modal direct category show from ecom start
        $('.ecomauto').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: `/{{ config('fortify.guard') }}/product/category/select/ajax/${category_id}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('.catecomauto').empty();

                         $('.catecomauto').append(
                                '<option>' + 'Select Category Name' + '</option>');

                        $.each(data, function(key, value) {
                            $('.catecomauto').append(
                                '<option value="' + value.id + '">' + value
                                .category_name + '</option>');
                        });
                    },
                });
            } else {

            }
        });
      // from sub category modal direct category show from ecom end

      // from sub sub category modal direct category show from ecom start
        $('.ecomauto2').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: `/{{ config('fortify.guard') }}/product/category/select/ajax/${category_id}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('.catecomauto2').empty();

                         $('.catecomauto2').append(
                                '<option>' + 'Select Category Name' + '</option>');

                        $.each(data, function(key, value) {
                            $('.catecomauto2').append(
                                '<option value="' + value.id + '">' + value
                                .category_name + '</option>');


                        });

                             // // for sub
                    //         var d = $('.subcatecomauto2').empty();

                    //         $('.subcatecomauto2').append(
                    //         '<option>' + 'Select Category Name' + '</option>');

                    //         $.each(data.autoselect_subcat, function(key, value) {
                    //         $('.subcatecomauto2').append(
                    //         '<option value="' + value.id + '">' + value
                    //             .category_name + '</option>');
                    // });
                    },
                });
            } else {

            }
        });
      // from sub sub category modal direct category show from ecom end


        // sub category
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: `/{{ config('fortify.guard') }}/product/subcategory/ajax/${category_id}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        //  $('select[name="sub_category_id"]').append(
                        //         '<option>' + 'Select Sub Category Name' + '</option>');
                        var d = $('select[name="sub_category_id"]').empty();

                        var subsub_cat_fixed = `<option value="">Select Sub Category Name</option>`;
                        $('select[name="sub_category_id"]').append(subsub_cat_fixed);

                        $.each(data, function(key, value) {
                            $('select[name="sub_category_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .sub_category_name + '</option>');
                            // showSubSubCategory(value.id);
                        });
                    },
                });
            } else {

            }
        });

        // for sub sub category auto
        $('select[name="sub_category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: `/{{ config('fortify.guard') }}/product/subsubcategory/ajax/${category_id}`,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="sub_sub_category_id"]').empty();

                            //   $('select[name="sub_sub_category_id"]').append(
                            //     '<option>' + 'Select Sub Sub Category Name' + '</option>');
                        var d = $('select[name="sub_sub_category_id"]').empty();
                        var subsub_cat_fixed = `<option value="">Select Sub Sub Category Name</option>`;
                        $('select[name="sub_sub_category_id"]').append(subsub_cat_fixed);

                        $.each(data, function(key, value) {


                            $('select[name="sub_sub_category_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subsubcategory_name + '</option>');


                        });
                    },
                });
            } else {

            }
        });

    });


$('#input-tags').selectize({
    delimiter: ',',
    persist: false,
    create: function(input) {
        return {
            value: input,
            text: input
        }
    }
});




</script>
<script>
    //    for calculation
    $(".check , #qty").on('keyup', function() {
        var total = 0;
        var qty = $("#qty").val();
        var unit = $("#unit_price").val();
        var total = parseFloat(qty) * parseFloat(unit);
        $(".totalprice").val(total);
    });

</script>
<script src="{{ asset('backend/assets') }}/libs/selectize/js/standalone/selectize.min.js"></script>
<script src="{{ asset('backend/assets') }}/libs/mohithg-switchery/switchery.min.js"></script>
<script src="{{ asset('backend/assets') }}/libs/multiselect/js/jquery.multi-select.js"></script>

<script src="{{ asset('backend/assets') }}/libs/select2/js/select2.min.js"></script>

<script src="{{ asset('backend/assets') }}/libs/dropzone/min/dropzone.min.js"></script>
<script src="{{ asset('backend/assets') }}/libs/dropify/js/dropify.min.js"></script>
<script src="{{ asset('backend/assets') }}/js/pages/form-fileuploads.init.js"></script>

<script src="{{ asset('backend/assets') }}/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<!-- Init js-->
<script src="{{ asset('backend/assets') }}/js/pages/form-advanced.init.js"></script>
<script src="{{ asset('backend/assets') }}/js/pages/form-masks.init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
@endsection
