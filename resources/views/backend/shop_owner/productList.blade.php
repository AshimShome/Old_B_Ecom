@extends('admin.admin_master')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <h4 class="header-title">Product List For Return</h4>
                        </div>
                        <table id="datatable-buttons" class="datatable-buttons table table-striped nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Ecom Name</th>
                                    <th>Product Code</th>
                                    <th>Supplier Name</th>
                                    <th>Brand Name</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Unit</th>
                                    <th>Product Qty</th>
                                    <th>Unit Price</th>
                                    <th>Buying Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ownerLists as $ownerList)
                                    <tr>
                                        <td>{{ $ownerList->start_date }}</td>
                                        <td>{{ $ownerList->ecommerce->ecom_name }}</td>
                                        <td>{{ $ownerList->product_code }}</td>
                                        <td>{{ optional($ownerList->supplier)->supplyer_name }}</td>
                                        <td>{{ optional($ownerList->brand)->brand_name_cats_eye }}</td>
                                        <td>{{ optional($ownerList->category)->category_name }}</td>
                                        <td>{{ $ownerList->product_name }}</td>
                                        <td>{{ $ownerList->unit }}</td>
                                        <td>{{ $ownerList->product_qty }}</td>
                                        <td>{{ $ownerList->unit_price }}</td>
                                        <td>{{ $ownerList->purchase_price }}</td>
                                        <td class="d-flex gap-2">
                                            <a
                                                href="{{ route('role.product.edit', [config('fortify.guard'), $ownerList->id]) }}"><i
                                                    class="fas fa-edit"></i></a>
                                                    
                                                    
                                            <a href="#" class="viewBtn" data-bs-toggle="modal"
                                                data-bs-target="#viewProductModal" productview_id={{ $ownerList->id }}><i
                                                    class="fa fa-solid fa-eye"></i></a>
                                                    
                                            <button class="replyIcon btn btn-danger" data-bs-toggle="modal"
                                                onclick="ownerShopProductReturnShow({{ $ownerList->id }})"
                                                data-bs-target="#supPrdReplyModal">Return Product</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->
    <!-- supplier Product view modal -->
    <div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true" style="padding: 50px;">
        <div class="modal-dialog modal-xl modal_scroll">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">View Product Details</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-2 bg-light " style="margin-to: -37px">
                    <div class="design">
                        <div class="container">
                            <div class="row m-4">
                                <div class="col-lg-3">
                                    <div class="viewMultiImage">
                                        <label for="fname">View Thumbnail Image </label>

                                        <div class="row" id="preview_img1"></div>

                                    </div>
                                    <div class="">
                                        <img id="thumbnail_image1" src="#" alt="your image" style=" width: 108px;" />
                                    </div>
                                </div>
                                <div class="col-lg-9">

                                    <div class="viewMultiImage">
                                        <label for="fname">View Multiple Image </label>
                                        <div class="row" id="multiimageContainer2" class="p-3">

                                        </div>
                                        <div class="row" id="preview_img1"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr class="hr">

                        <div class="row ">
                            <div class="col-lg-3">
                                <label for="fname">Product Code </label>
                                <p id="product_code_edit1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Supplier Name </label>
                                <p id="edit_supplier1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Brand Name </label>
                                <p id="edit_brand_name1"></p>

                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Category </label>
                                <p id="edit_category1"></p>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-3">
                                <label for="fname">Sub Category</label>
                                <p id="edit_subcategory1"></p>

                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Sub Sub Category </label>
                                <p id="edit_subsubcategory1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Product Name </label>
                                <p id="edit_product_name1"></p>

                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Weight (gm / ml)<small
                                        style="color:#c2bebe; padding-left:10px;">(gm/ml)</small>
                                </label>
                                <p id="edit_unit1"></p>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-3">
                                <label for="fname">Quantity</label>
                                <p id="edit_product_qty1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Unit Price </label>
                                <p id="edit_unit_price1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Purchase Date </label>
                                <p id="edit_purchase_date1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Buying Price</label>
                                <p id="edit_purchase_price1"></p>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-3">
                                <label for="fname">Selling Price</label>
                                <p id="edit_selling_price1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Discount Price </label>
                                <p id="edit_discount_price1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Discount Start Date </label>
                                <p id="edit_start_date1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Discount Close Date </label>
                                <p id="edit_end_date1"></p>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-3">
                                <label for="fname">Product Expire Date</label>
                                <p id="edit_basic-datepicker1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Color </label>
                                <p id="edit_product_color1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Size </label>
                                <p id="edit_product_size1"></p>

                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Video </label>
                                <p id="edit_video_link1"></p>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-3">
                                <label for="fname">Product Stock Alert </label>
                                <p id="product_stock_alert1"></p>

                            </div>
                            <div class="col-lg-3">

                                <label for="fname">Product Expire Date Alert</label>
                                <p id="product_expire_date_alert1"></p>

                            </div>

                            <div class="col-lg-3">
                                <label for="fname">Vat</label>
                                <p id="vat1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">SKU Code</label>
                                <p id="edit_sku_code1"></p>
                            </div>

                        </div>
                        <div class="row my-3">
                            <div class="col-lg-3 forck">
                                <label for="fname">Add Description</label>
                                <p id="edit_product_descp1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Tag </label>
                                <p id="edit_product_tags1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Meta Title </label>
                                <p id="edit_meta_title1"></p>
                            </div>
                            <div class="col-lg-3">
                                <label for="fname">Add Meta Description </label>
                                <p id="edit_meta_desc1"></p>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
        {{-- view end --}}
        {{-- end edit product --}}
        <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentname"></h5>
                        <a href="#"><i id="closemodal" class="fas fa-window-close"></i></a>
                        </button>
                    </div>
                    <div class="modal-body" style="background-color: white">
                        <div class="form-group mx-sm-1 mb-1">
                            <label for="">Print Quantity</label>
                            <input id="submit_id" type="hidden">
                            <input id="print_quantity" class="form-control-sm" type="text">
                            <button id="submit" data-dismiss="modal" class="btn btn-success mb-2">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- supplier Product Edit modal -->
    <div class="modal fade" id="supPrdEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Product Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3 mt-3">
                            <label for="prdCode">Product Code</label>
                            <input type="text" name="" id="prdCode" class="form-control mt-1" value="#12354">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="supplierPrdCode">Supplier Product Code</label>
                            <input type="text" name="" id="supplierPrdCode" class="form-control mt-1" value="#12354">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="brndName">Brand Name</label>
                            <input type="text" name="" id="brndName" class="form-control mt-1" value="Brand Name">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="prdCategory">Category</label>
                            <input type="text" name="" id="prdCategory" class="form-control mt-1" value="Category">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="prdName">Product Name</label>
                            <input type="text" name="" id="prdName" class="form-control mt-1" value="Product Name">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="prdUnit">Unit (meter)</label>
                            <input type="text" name="" id="prdUnit" class="form-control mt-1" value="500 m">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="prdQty">Quantity</label>
                            <input type="number" name="" id="prdqty" class="form-control mt-1" value="4">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="prdBuyingP">Buying Price</label>
                            <input type="number" name="" id="prdBuyingP" class="form-control mt-1" value="50000">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="prdDepositAmount">Deposit Amount</label>
                            <input type="number" name="" id="prdDepositAmount" class="form-control mt-1" value="50000">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="prdReturn">Product Return</label>
                            <input type="number" name="" id="prdReturn" class="form-control mt-1" value="50000">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="prdWithdrawAmount">Withdrawal Amount</label>
                            <input type="number" name="" id="prdWithdrawAmount" class="form-control mt-1" value="50000">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="prdPurchaseDate">Purchase Date</label>
                            <input type="date" name="" id="prdPurchaseDate" class="form-control mt-1">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="prdTotalB">Total Balance</label>
                            <input type="number" name="" id="prdTotalB" class="form-control mt-1" value="450000">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label class="form-label">Color</label>
                            <input type="text" class="selectize-close-btn" value="Red,Green">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label class="form-label">Size</label>
                            <input type="text" class="selectize-close-btn" value="X,Xl,XXl">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <!-- <button type="button" class="btn btn-info px-4" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- supplier Product Reply modal -->
    <div class="modal fade" id="supPrdSkuSubmitModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Submit SKU Code</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <label for="skuCode">SKU Code</label>
                        <input type="text" name="" id="skuCode" class="form-control mt-1">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#supPrdSkuSubmitModal">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- supplier Product SKU Submit modal -->
    <div class="modal fade" id="supPrdReplyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form id="ownerReturnProductData">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Add Returnable Product</h4>
                        <button type="button" id="clickData" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="ownerReturnProductGet">
                        </div>
                        <table class="table" style="border: 1px solid #ced4da;">
                            <thead>
                                <tr class="text-center" style="border-bottom: 1px solid #ced4da; background: #F3F7F9;">
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Current Stock Qty</th>
                                    <th scope="col">Return Qty
                                        <span class="text-danger">*</span>
                                    </th>
                                    <th scope="col">Return Amount (Unit * Qty)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="ownerReturnProductGet" class="text-center">
                                    <td>
                                        <input type="number"
                                            style="border:none; background:transparent; width:100px; text-align:center;"
                                            name="unitPrice" id="unitPrice" readonly disabled>
                                    </td>
                                    <td>
                                        <input type="number"
                                            style="border:none; background:transparent; width:100px; text-align:center;"
                                            name="product_qty" id="product_qty" readonly disabled>
                                        <input type="hidden" id="product_qty_original" readonly disabled>
                                    </td>
                                    <td>
                                        <input class="prdQty " type="number" name="return_qty" id="qty" min="1"
                                            placeholder="0.00">
                                        <span class="text-danger error-text return_qty_error  "></span>
                                    </td>
                                    <td>
                                        <input type="number" name="return_amount" id="return_amount" placeholder="0.00" style="border:none; background:transparent; width:100px; text-align:center;"
                                            readonly>
                                            <span class="">TK.</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Return Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '.viewBtn', function() {
            //   e.preventDefault();
            var productview_id = $(this).attr('productview_id');
            console.log(productview_id);
            $('#viewProductModal').modal('show');
            $('#multiimageContainer2').html("");
            $('#thumbnail_image1').attr('src', `./`);
            $('#edit_product_qty1').text('');
            // baki ache

            $.ajax({
                type: "GET",
                url: `/{{ config('fortify.guard') }}/product/details/view/${productview_id}`,
                success: function(response) {
                    console.log(response);
                    console.log(response.product_edit.product_name);
                    $('#edit_products').val(response.product_edit.id);
                    $('#old_image').val(response.product_edit.product_thambnail);
                    $('#edit_subsubcategory1').text(response.product_edit.subsubcategory
                        .subsubcategory_name);
                    $('#edit_product_name1').text(response.product_edit.product_name);
                    $('#edit_unit1').text(response.product_edit.unit);
                    $('#edit_product_qty1').text(response.product_edit.product_qty);
                    $('#edit_unit_price1').text(response.product_edit.unit_price);
                    $('#edit_purchase_date1').text(response.product_edit.purchase_date);
                    $('#edit_purchase_price1').text(response.product_edit.purchase_price);
                    $('#edit_selling_price1').text(response.product_edit.selling_price);
                    $('#edit_discount_price1').text(response.product_edit.discount_price);
                    $('#edit_start_date1').text(response.product_edit.start_date);
                    $('#edit_end_date1').text(response.product_edit.end_date);
                    $('#edit_basic-datepicker1').text(response.product_edit.product_expire_date);
                    $('#edit_product_color1').text(response.product_edit.product_color);
                    $('#edit_product_size1').text(response.product_edit.product_size);
                    $('#edit_sku_code1').text(response.product_edit.sku_code);
                    $('#product_stock_alert1').text(response.product_edit.product_stock_alert);
                    $('#product_expire_date_alert1').text(response.product_edit
                        .product_expire_alert_date);
                    $('#vat1').text(response.product_edit.vat);
                    $('#edit_video_link1').text(response.product_edit.video_link);
                    $('#edit_product_stock_alert1').text(response.product_edit.product_stock_alert);
                    $('#edit_product_descp1').html(response.product_edit.product_descp);
                    // CKEDITOR.instances['edit_product_descp'].setData(response.product_edit.product_descp);
                    $('#edit_product_tags1').text(response.product_edit.product_tags);
                    // console.log(response.product_edit.product_tags);
                    $('#product_code_edit1').text(response.product_edit.product_code);
                    $('#edit_meta_title1').text(response.product_edit.meta_title);
                    $('#edit_meta_desc1').text(response.product_edit.meta_desc);
                    $('#edit_featured').val(response.product_edit.featured);
                    $('#edit_hot_deals').val(response.product_edit.hot_deals);
                    $('#edit_special_offer').val(response.product_edit.special_offer);
                    $('#edit_special_deals').val(response.product_edit.special_deals);
                    $('#edit_shipping_fee').val(response.product_edit.shipping_fee);
                    $('#thumbnail_image1').attr('src', `/${response.product_edit.product_thambnail}`);
                    // $('#edit_supplier1').text(response.product_edit.supplier.supplyer_name? response.product_edit.supplier.supplyer_name:'');
                    // $('#edit_brand_name1').text(response.product_edit.brand.brand_name_cats_eye?response.product_edit.brand.brand_name_cats_eye:'');
                    // $('#edit_category1').text(response.product_edit.category.category_name?response.product_edit.category.category_name:'');
                    // $('#edit_subcategory1').text(response.product_edit.subcategory.sub_category_name?response.product_edit.subcategory.sub_category_name:'');
                    $('#edit_supplier1').text(response?.product_edit?.supplier?.supplyer_name);
                    $('#edit_brand_name1').text(response?.product_edit?.brand?.brand_name_cats_eye);
                    $('#edit_category1').text(response?.product_edit?.category?.category_name);
                    $('#edit_subcategory1').text(response?.product_edit?.subcategory
                        ?.sub_category_name);
                    // 1111
                    // multi img
                    // console.log(response.multiimgs);
                    $.each(response.multiimgs, function(key, value) {
                        console.log('here in multiimage');
                        var s = `
                    <div class="col-lg-3" style=" margin-right:-80px;margin-bottom:5px;">
                            <img src="/${value.photo_name}" alt="" id="image${value.id}"  style="width:80px;margin-right:60px !important;">
                        </div>
                        `;
                        $('#multiimageContainer2').append(s);
                    });

                }

            })
        });
        // --------owner return product view-------
        function ownerShopProductReturnShow(id) {
            const role = "{{ config('fortify.guard') }}";
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/shop_owner/ownerreturnproduct/show/${id}`,
                success: function(response) {
                    console.log(response);
                    $('#ownerReturnProductGet').empty();
                    var data = '';
                    data = `<p> <span style="font-weight: bold;">Ecommerce Name :</span> <input  type='text' style="border:none;"  name="ecom_name" value='${response.ecommerce.ecom_name}' readonly></p>
                                 <span style="font-weight: bold;"></span> <input  type='text' style="border:none; display:none"  name="supplier_id" value='${response.supplier_id}' readonly></p>
                                 <span style="font-weight: bold;">Supplier Name :</span> <input  type='text' style="border:none;"  name="supplier_name" value='${response.supplier.supplyer_name}' readonly></p>
                                 <span style="font-weight: bold;"> </span> <input  type='text' style="border:none;display:none"  name="product_id" value='${response.id}' readonly></p>
                                 <p> <span style="font-weight: bold;">Product Name :</span><input  type='text'  style="border:none;"  name="product_name" value='${response.product_name}' readonly></p>
                                 <p> <span style="font-weight: bold;">Product Code :</span> <input  type='text'  style="border:none;" name="product_code" value=' ${response.product_code}' readonly></p>
                                 <p> <span style="font-weight: bold;">Brand Name:</span> <input  type='text' style="border:none;"  name="brand_name" value=' ${response.brand.brand_name_cats_eye}' readonly>
                          </p>`;
                    $('#unitPrice').val(response.unit_price);
                    $('#product_qty').val(response.product_qty);
                    $('#product_qty_original').val(response.product_qty);
                    $('#ownerReturnProductGet').append(data);
                },
            });
        }
        ownerShopProductReturnShow();

        /////ownerReturnProductInsert///////
        $(document).on('submit', '#ownerReturnProductData', function(event) {
            event.preventDefault();
            let ownerReturnData = new FormData($('#ownerReturnProductData')[0]);
            const role = "{{ config('fortify.guard') }}";
            console.log(ownerReturnData);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: `/${role}/shop_owner/ownerreturnproduct/insert`,
                data: ownerReturnData,
                contentType: false,
                processData: false,
                success: function(response) {
                    toastr.success("Owner Return Data Add Successfully");
                    // ClearFunction();
                    $("#clickData").trigger("click");
                    location.reload();
                },
            });
        });
    </script>
    <script>
        ///return qty/////
        $("#qty").on('keyup', function() {
            var qty = $("#qty").val();
            var unit_price = $("#unitPrice").val();
            var product_qty = $("#product_qty_original").val();
            var totalQty = product_qty - qty;
            $("#product_qty").val(totalQty);
            var totalPrice = qty * unit_price;
            $("#return_amount").val(totalPrice);
        });
    </script>
@endsection
