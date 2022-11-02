 @extends('admin.admin_master')
@section('main-content')
  
       <!-- Start Content-->
        <div class="container-fluid mt-0">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-lg-flex justify-content-lg-between mb-2">
                    <div id="ownerReturnProductGet" class="col-lg-6 col-12 paymentInfo">
                      <h4 class="header-title">Payment History</h4>
                      <p><b>Supplier Name :</b> {{$supplierInformation->supplyer_name}}</p>
                      <p><b>Supplier ID :</b>{{$supplierInformation->supplyer_id_code}}</p>
                      <p><b>Contact No :</b>{{$supplierInformation->supplyer_phone}}</p>
                      <p><b>Address :</b> {{$supplierInformation->supplyer_address}}</p>
                    </div>
                    <div class="col-lg-6 col-12 d-lg-flex justify-content-lg-end">
                      <!-- <div class="col-4 date">
                        <input type="text" id="basic-datepicker" class="form-control flatpickr-input active"
                          placeholder="Select Date" readonly="readonly">
                      </div> -->
                    </div>
                  </div>
                  <table id="datatable-buttons" class=" datatable-buttons table table-striped nowrap w-100">
                    <thead>
                      <tr>
                        <th>Product Purchase Date</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                         <th>Purchase Qty</th>
                        <th>Current Stock Qty</th>
                        <th>Unit Price</th>
                        
                        <th>Total Purchase Price</th>
                        
                         <th>Current Stock Price</th>
                        
                        <th>Product Return Price </th>
                        <th>Withdrawal Amount</th>
                        <th>Due Amount</th>
                        <th>Payment Statment</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $supplierProducts as  $supplierProduct)
                         <tr>
                        <td>{{$supplierProduct->purchase_date}}</td>
                        <td>{{$supplierProduct->product_code}}</td>
                        <td>{{$supplierProduct->product_name}}</td>
                         <td>{{$supplierProduct->purchase_qty}}</td>
                        <td>{{$supplierProduct->product_qty}}</td>
                        <td>{{$supplierProduct->unit_price}} TK.</td>
                        
                          <td>{{$supplierProduct->old_purchase_price}} TK.</td>
                        
                        <td>{{$supplierProduct->unit_price*$supplierProduct->product_qty}} TK.</td>
                        
                        <td>{{optional($supplierProduct->returnHistory)->return_amount}} TK.</td>
                        <td>{{optional($supplierProduct->paymentHistory)->withdrawal_amount}} TK.</td>
                        <td>{{optional($supplierProduct->paymentHistory)->due_amount}} TK.</td>
                        <td>
                        <button class="replyIcon btn btn-success" data-bs-toggle="modal"
                          onclick="singleSupplierPayment({{$supplierProduct->id}})"
                          data-bs-target="#paymentStatmentModal"> Pay Amount
                         </button>
                           <button class="replyIcon btn btn-info" data-bs-toggle="modal"
                          onclick="singleSupplierPayment({{$supplierProduct->id}})"
                          data-bs-target="#supplierProductReportModal"><i class="fa fa-solid fa-eye"></i>
                         </button>
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
      </div>
      
   <!-- Modal -->
<div class="modal fade" id="paymentStatmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form id="saveData">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Payment Statment</h4>
                        <button type="button" id="clickData" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="singleSupplierProductGet">
                        </div>
                        <table class="table" style="border: 1px solid #ced4da;">
                            <thead>
                                <tr class="text-center" style="border-bottom: 1px solid #ced4da; background: #F3F7F9;">
                                     <th scope="col">Total Withdrawal Amount
                                        <span class="text-danger">*</span>
                                    </th>
                                     <th scope="col">Withdrawal Amount
                                        <span class="text-danger">*</span>
                                    </th>
                                    <th scope="col">Due Amount</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="singleSupplierProductGets" class="text-center">
                                    
                                    
                                       <td>
                                        <input class="prdQty " type="number" name="total_products_purchase_price" id="total_products_purchase_price" min="1"placeholder="0.00 TK.">
                                        
                                        <input class="prdQty " type="hidden" name="old_products_purchase_price" id="old_products_purchase_price" min="1"placeholder="0.00 TK.">
                                        <span class="text-danger error-text return_qty_error "></span>
                                    </td>
                                   
                                     <td>
                                        <input class="prdQty" style="" type="number" name="withdrowAmount" id="withdrowAmount" min="1"
                                            placeholder="0.00 TK.">
                                        <span class="text-danger error-text return_qty_error "></span>
                                    </td>
                                  
                                   
                                    <td><input type="number" name="totalPrice" id="totalPrice"
                                            style="border:none; background:transparent; width:100px; text-align:center;"
                                            readonly  placeholder="0.00">
                                    <td><input type="hidden"  name="totalPrice_orginal" id="totalPrice_orginal">
                                            </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Payment Submit</button>
                    </div>
                </div>
            </form>
        </div>
</div>




<!-- Modal view -->
<div class="modal fade" id="supplierProductReportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product wise Payment Report</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <table id="datatable-buttons" class=" datatable-buttons table table-striped nowrap w-100">
                    <thead>
                      <tr>
                        <th>Payment Date</th>
                        <th>Product Name</th>
                        <th>Supplier Name</th>
                        <th>Total Product Price</th>
                        <th>Product Return Price </th>
                        <th>Withdrawal Amount</th>
                        <th>Due Amount</th>
                    
                      </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ( $supplierProductReports as  $supplierProductReport)
                         <tr>
                        <td>{{$supplierProductReport->date}}</td>
                        <td>{{optional($supplierProductReport->products)->product_name}}</td>
                        <td>{{optional($supplierProductReport->suppliers)->supplyer_name}}</td>
                        <td>{{$supplierProductReport->current_product_amount}} TK.</td>
                        <td>{{$supplierProductReport->supplier_return_product_amount}} TK.</td>
                        <td>{{$supplierProductReport->withdrawal_amount}} TK.</td>
                        <td>{{$supplierProductReport->due_amount}} TK.</td>
                        </tr>
                       @endforeach
                    </tbody>
                  </table>
      </div>
    </div>
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
        function singleSupplierPayment(id) {
           
            const role = "{{ config('fortify.guard') }}";
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/suppliers/single/product/show/${id}`,
                success: function(response) {
                    
                  console.log(response);
                    $('#singleSupplierProductGet').empty();
                    var data = '';
                    data = `
                                 <span style="font-weight: bold;">Supplier Name :</span> <input  type='text' style="border:none;"  name="supplyer_name" value='${response.supplier.supplyer_name}' readonly></p>
                                 <p> <span style="font-weight: bold;">Product Name :</span><input  type='text'  style="border:none;"   name="product_name" value='${response.products.product_name}' readonly></p>
                                 <input  type='hidden'  style="border:none;"   name="suppler_payment_histories_id" value='${response.id}' readonly>
                                 <input  type='hidden'  style="border:none;"   name="product_id" value='${response.products.id}' readonly>
                                 <input  type='hidden'  style="border:none;"   name="supplier_id" value='${response.supplier.id}' readonly>
                                 <p> <span style="font-weight: bold;"> Total Product purchase Price :</span><input  type='text'  style="border:none;"  name="purchase_price" value='${response.products.purchase_price}' readonly></p>
                                 <p> <span style="font-weight: bold;">Product Code :</span> <input  type='text'  style="border:none;" name="product_code" value=' ${response.products.product_code}' readonly></p>
                          </p>`;
                     $('#old_products_purchase_price').val(response.products.purchase_price);
                     //total_withdrow_amount
                    $('#total_products_purchase_price').val(response.total_withdrow_amount);
                     $('#totalPrice').val(response.due_amount);
                    // $('#withdrowAmount').val(response.withdrawal_amount);
                    $('#totalPrice_orginal').val(response.due_amount);
                    $('#products_purchase_price').val(response.total_withdrow_amount);
                    console.log(data);
                    $('#singleSupplierProductGet').append(data);
                },
            });
        }
      
//due_amount
        /////ownerReturnProductInsert///////
        $(document).on('submit', '#saveData', function(event) {
            event.preventDefault();
            let ownerReturnData = new FormData($('#saveData')[0]);
      
            const role = "{{ config('fortify.guard') }}";
            console.log(ownerReturnData);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: `/${role}/suppliers/single/product/insert`,
                data: ownerReturnData,
                contentType: false,
                processData: false,
                success: function(response) {
                   $('#withdrowAmount).reset();
                    // console.log(response);
                    toastr.success("Payment Submit Successfully");
                    // ClearFunction();
                    $("#clickData").trigger("click");
                    // location.reload();
                },
            });
        });
        
        
    </script>
    <script>
        ///return qty/////  alert(withdrowAmount);
        $("#withdrowAmount").on('keyup', function() {
            var withdrowAmount = $("#withdrowAmount").val();
            var totalPrice_original = $("#totalPrice_orginal").val();
            var totalPrice =totalPrice_original-withdrowAmount;
            $("#totalPrice").val(totalPrice);
            var product_qty = $("#product_qty_original").val();
             var oldProductTotalPrice = $("#old_products_purchase_price").val();
             var totalPriceWithdrow =oldProductTotalPrice -totalPrice;
            $('#total_products_purchase_price').val(totalPriceWithdrow);
        });
        
    //     function clear() {
    // $("#withdrowAmount").val("");
  
}
    </script>
@endsection

