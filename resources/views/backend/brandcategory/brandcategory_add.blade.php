@extends('admin.admin_master')

@section('css')

<link href="{{ asset('backend/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet"
    type="text/css" />

@endsection


@section('main-content')


<!-- Begin page -->
<div id="wrapper">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="header-title">Add Brand & Category</h2>
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                    <div class="brand-select-wrap d-flex justify-content-between align-items-center">
                                        <p class="mb-1 fw-bold text-muted mt-3 mt-md-0">E-Commerce Nmae*</p>
                                    </div>
                                    <select class="form-control" data-toggle="select2" data-width="100%">
                                        <option>Select</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </select>
                                </div> <!-- end col -->
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                    <div class="brand-select-wrap d-flex justify-content-between align-items-center">
                                        <p class="mb-1 fw-bold text-muted mt-3 mt-md-0">Brand Name</p>
                                        <p class=" font-13 brand-text text-blue" data-bs-toggle="modal"
                                            data-bs-target="#brand_new">
                                            Add brand <i class="fa fa-plus-circle"> </i>
                                        </p>
                                    </div>
                                    <select class="form-control" data-toggle="select2" data-width="100%">
                                        <option>Select</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </select>
                                </div> <!-- end col -->
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                    <div class="brand-select-wrap d-flex justify-content-between align-items-center">
                                        <p class="mb-1 fw-bold text-muted mt-3 mt-md-0">Category</p>
                                        <p class=" font-13 brand-text text-blue" data-bs-toggle="modal"
                                            data-bs-target="#supPrdEditModal">
                                            Add Category <i class="fa fa-plus-circle"> </i>
                                        </p>
                                    </div>
                                    <select class="form-control" data-toggle="select2" data-width="100%">
                                        <option>Select</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </select>
                                </div> <!-- end col -->
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                    <div class="brand-select-wrap d-flex justify-content-between align-items-center">
                                        <p class="mb-1 fw-bold text-muted mt-3 mt-md-0">Sub Category</p>
                                        <p class=" font-13 brand-text text-blue" data-bs-toggle="modal"
                                            data-bs-target="#subcategory">
                                            Add Sub Category <i class="fa fa-plus-circle"> </i>
                                        </p>
                                    </div>
                                    <select class="form-control" data-toggle="select2" data-width="100%">
                                        <option>Select</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </select>
                                </div> <!-- end col -->
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                    <div class="brand-select-wrap d-flex justify-content-between align-items-center">
                                        <p class="mb-1 fw-bold text-muted mt-3 mt-md-0">Sub Sub Category</p>
                                        <p class=" font-13 brand-text text-blue" data-bs-toggle="modal"
                                            data-bs-target="#subsubcategory">
                                            Add Sub Sub Category <i class="fa fa-plus-circle"> </i>
                                        </p>
                                    </div>
                                    <select class="form-control" data-toggle="select2" data-width="100%">
                                        <option>Select</option>
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                    </select>
                                </div> <!-- end col -->
                                <div class="brand_category_add d-flex justify-content-center align-items-center">
                                    <button class="btn btn-dark m-3">Close</button>
                                    <button class="btn btn-info">Add Brnad & Category</button>
                                </div>
                            </div> <!-- end row -->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
        </div>


    </div> <!-- content -->
</div>
<!-- END wrapper -->


<div class="modal fade" id="brand_new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center">Add Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row  d-flex justify-content-center align-items-center">
                    <div class="col-lg-3 mt-3">
                        <label for="prdCode">Brand Name </label>
                        <input type="text" name="" id="" placeholder="Brand name" class="form-control mt-1">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label for="supplierPrdCode">Brand Image</label>
                        <input type="file" name="" id="" class="form-control mt-1">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label for="brndName">Brand Icon</label>
                        <input type="file" name="" id="" class="form-control mt-1">
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-info">Add Brand</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="supPrdEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row  d-flex justify-content-center align-items-center">
                    <div class="col-lg-3 mt-3">
                        <label for="prdCode">Category Name </label>
                        <input type="text" name="" id="" placeholder="category name" class="form-control mt-1">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label for="supplierPrdCode">Category Image</label>
                        <input type="file" name="" id="" class="form-control mt-1">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label for="brndName">Category Icon</label>
                        <input type="file" name="" id="" class="form-control mt-1">
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-info">Add Category</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="subcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center">Add Sub Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row  d-flex justify-content-center align-items-center">
                    <div class="col-lg-3 mt-3">
                        <label for="prdCode"> Sub Category Name </label>
                        <input type="text" name="" id="" placeholder="Sub category name" class="form-control mt-1">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label for="supplierPrdCode"> Sub Category Image</label>
                        <input type="file" name="" id="" class="form-control mt-1">
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-info">Add Sub Category</button>
            </div>
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
            <div class="modal-body">
                <div class="row  d-flex justify-content-center align-items-center">
                    <div class="col-lg-3 mt-3">
                        <label for="prdCode">Sub Sub Category Name </label>
                        <input type="text" name="" id="" placeholder="sub sub category name" class="form-control mt-1">
                    </div>
                    <div class="col-lg-3 mt-3">
                        <label for="supplierPrdCode">Sub Sub Category Image</label>
                        <input type="file" name="" id="" class="form-control mt-1">
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-info">Add Sub SUb Category</button>
            </div>
        </div>
    </div>
</div>


@endsection


@section('script')
<script src=" {{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js ') }}"></script>
<script src=" {{ asset('backend/assets/libs/select2/js/select2.min.js ') }}"></script>
<script src=" {{ asset('backend/assets/js/pages/form-advanced.init.js ') }}"></script>


@endsection
