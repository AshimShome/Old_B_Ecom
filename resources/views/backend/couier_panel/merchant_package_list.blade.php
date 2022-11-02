
@extends('admin.admin_master')

@section('css')

  <style>
    #exampleModal{
        width:1800px;
    }
    table tr {
      vertical-align: middle;
      font-family: 'Tahoma';
    }

    table th {
      text-align: left;
      display: inline-flexbox;
      justify-content: center;
    }

    table tr td {
      vertical-align: middle;
      text-align: center;
    }

    /* .dataTables_length {
      display: none;
    } */

    table tr td .pending {
      color: #D25600;
      background: rgba(210, 86, 0, 0.2);
      border-radius: 20px;
      padding: 6px 20px;
    }

    .jfss-edit-btn {
      background: #B8E6F0;
      border-radius: 10px;
      padding: 7px 12px;
    }

    .dataTables_length {
      display: none;
    }

    .dataTables_filter {
      display: none;
    }

    .package-list {
      background: #00666C;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 20px;
    }

    .package-list h6 {
      background: #00666C;
      border-radius: 5px;
      font-family: 'Inter';
      font-style: normal;
      font-weight: 700;
      font-size: 16px;
      line-height: 19px;

      color: #FFFFFF;
    }

    .add-package-btn-hlder {
      margin-bottom: 20px;
    }

    .add-package-btn-hlder .add-package-btn {
      background: #16A085;
      border-radius: 5px;
      font-weight: 400;
      font-size: 16px;
      line-height: 19px;
      padding: 8px 20px;
      color: #FFFFFF;

    }

    .pending {
      background: rgba(210, 86, 0, 0.2);
      border-radius: 20px;
    }

    .submit {
      background: rgba(4, 210, 0, 0.2);
      border-radius: 20px;
      padding: 6px 20px;
      color: #04D200;


    }
    /* ----------------- */
    table tr {
      vertical-align: middle;
      font-family: 'Tahoma';
    }

    /* .dataTables_length {
      display: none;
    } */

    table tr td .pending {
      color: #D25600;
      background: rgba(210, 86, 0, 0.2);
      border-radius: 20px;
      padding: 6px 20px;
    }

    .jfss-edit-btn {
      background: #B8E6F0;
      border-radius: 10px;
      padding: 7px 12px;
    }

    .dataTables_length {
      display: none;
    }

    .dataTables_filter {
      display: none;
    }

    .package-list {
      background: #00666C;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 20px;
    }

    .package-list h6 {
      background: #00666C;
      border-radius: 5px;
      font-family: 'Inter';
      font-style: normal;
      font-weight: 700;
      font-size: 16px;
      line-height: 19px;

      color: #FFFFFF;
    }

    .add-package-btn-hlder {
      margin-bottom: 20px;
    }

    .add-package-btn-hlder .add-package-btn {
      background: #16A085;
      border-radius: 5px;
      font-weight: 400;
      font-size: 16px;
      line-height: 19px;
      padding: 8px 20px;
      color: #FFFFFF;

    }

    .pending {
      background: rgba(210, 86, 0, 0.2);
      border-radius: 20px;
    }

    .submit {
      background: rgba(4, 210, 0, 0.2);
      border-radius: 20px;
      padding: 6px 20px;
      color: #04D200;

    }

    .jfss-pack-btn.delete {

      background: rgba(255, 0, 0, 0.1);
      border: 1px solid #FF0000;
      border-radius: 10px;
      font-weight: 700;
      font-size: 14px;
      line-height: 17px;
      padding: 10px 15px;
      margin-right: 10px;
      color: #FF0000;


    }

    .jfss-pack-btn.print {

      background: rgba(3, 158, 192, 0.2);
      border: 1px solid #039EC0;
      border-radius: 10px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 14px;
      line-height: 17px;
      padding: 10px 15px;
      margin-right: 10px;
      color: #039EC0;


    }

    .pack-row {
      border: 1px solid #000000;
      border-radius: 10px;
      padding: 20px;

    }

    .pack-add-new-btn-holder .add-new-btn {

      background: #44C003;
      border-radius: 10px;
      font-family: 'Inter';
      font-style: normal;
      font-weight: 700;
      font-size: 14px;
      line-height: 17px;
      padding: 8px 30px;
      color: #FFFFFF;
    }

    /* ----------------- */
  </style>
@endsection
@section('main-content')

  <div class="container-fluid mt-3">
          <div class="row">
            <h3 class="header-title">Merchant Package List</h3>
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="add-package-wrap d-flex justify-content-between align-items-center flex-wrap">

                    <div>

                    </div>

                    <div class="add-package-btn-hlder">
                      <a href="" type="button" class="add-package-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Package
                      </a>
                    </div>
                  </div>
                  <table id="datatable-buttons" class="table datatable-buttons table-striped nowrap w-100">
                    <thead>
                      <tr>
                        <th>Date & Time</th>
                        <th>Merchant Package Id</th>
                        <th>Customer Id</th>
                        <th>Customer Name</th>
                        <th>Customer Phone No.</th>
                        <th>Customer Address</th>
                        <th>Package Category</th>
                        <th>Package Weight</th>
                        <th>Customer Expected Delivery Time</th>
                        <th>Payment Type</th>
                        <th>Product Price</th>
                        <th>Delivery Fee</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody id="doctorShowData">

                    </tbody>
                  </table>
                </div> <!-- end card body-->
              </div> <!-- end card -->
            </div><!-- end col-->
          </div>
        </div>
{{-- ==============model data add============== --}}
<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        {{-- ------------------- --}}
        <div class="container-fluid mt-3">
            <div class="row">
              <h3 class="header-title">Package Listing</h3>
              <div class="col-12">
                <div class="card">
                  <div class="card-body" id="parentOfCardId">
                    <form id="add_supplier_form">
                    <div class="row pack-row" id="cardId">
                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Merchant Package ID</label>
                           @php
                               $dd=floatval($data);
                               if ($dd == 0.0) {
                                $dd =$data  + 500;
                               }else {
                                $dd = $data  + 1;
                               }
                                @endphp
                                <input type="text" name="merchant_package_id" value="{{ $dd}}" class="edit_merchants_package_id  form-control " id="edit_merchants_package_id" readonly />
                          <div class="invalid-feedback">
                            please enter your Enter package id
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->

                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Customer Name</label>
                          <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Enter customer Name" required />
                          <div class="invalid-feedback">
                            please enter your customer Name
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->

                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Marchant </label>
                          <select id="merchant_id" name="merchant_id" class="form-select" >
                            <option value=""> marchant </option>
                            @foreach ($merchantAllDatas   as $merchantAllData )
                             <option value="{{ $merchantAllData->id }}">{{ $merchantAllData->merchant_name}}</option>
                             @endforeach
                          </select>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Customer Phone No.</label>
                          <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Relationship" required />
                          <div class="invalid-feedback">
                            please enter your Reference Relationship
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Package Category</label>
                          <select id="package_category_id" name="package_category_id" class="form-select" required="">
                            <option value=""> Package Category</option>
                            @foreach ($post_codesPackages  as $post_codesPackages)
                             <option value="{{ $post_codesPackages->id }}">{{ $post_codesPackages->business_name}}</option>
                             @endforeach
                          </select>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Package Weight</label>
                          <input type="text" class="form-control" name="package_weight" id="package_weight" placeholder="weight" required />
                          <div class="invalid-feedback">
                            please enter your weight
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Customer Expected Delivery Time</label>
                          <input type="datetime-local"class="form-control" name="customer_expected_delivery_time" id="edit_customer_expected_delivery_time" placeholder="Enter parcel number" required />

                          <div class="invalid-feedback">
                            please enter your Enter parcel number
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="payment_type" class="form-label">Payment Type</label>
                          <select id="payment_type" name="payment_type" class="form-select" >
                            <option value="">Select</option>
                            <option value="Cash on Delivery">Cash on Delivery</option>
                            <option value="Paid">Paid</option>
                          </select>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Product Price</label>
                          <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter Price" required />
                          <div class="invalid-feedback">
                            please enter your Enter Price
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Delivery Fee</label>
                          <input type="text" class="form-control" name="delivery_fee" id="delivery_fee" placeholder="Enter fee" required />
                          <div class="invalid-feedback">
                            please enter your Enter fee
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->

                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Customer Address</label>
                          <textarea id="customer_address" name="customer_address" class="form-control" placeholder="Address" required></textarea>
                          <div class="invalid-feedback">
                            please enter your Enter Address
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->
                      <div class="d-flex gap-4">
                        <div class="pack-add-new-btn-holder">
                          <button type="submit" style="border: none"  class="btn btn-success" >Submit</button>
                        </div>

                      </div>
                    </div>
                </form>
                  </div> <!-- end card body-->
                </div> <!-- end card -->
              </div><!-- end col-->
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>
  {{-- --------------------edit modal --------------------- --}}
  <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="container-fluid mt-3">
            <div class="row">
              <h3 class="header-title"> Update Package Listing</h3>
              <div class="col-12">
                <div class="card">
                  <div class="card-body" id="parentOfCardId">
                    <form id="edit_supplier_form">
                    <div class="row pack-row" id="cardId">
                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Merchant Package Id</label>
                          <input type="text" class="form-control" id="package_id" placeholder="Enter package id"  />
                          <div class="invalid-feedback">
                            please enter your Enter package id
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->

                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Customer Name</label>
                          <input type="text" class="form-control" name="customer_name" id="edit_merchant_name" placeholder="Enter customer Name" required />
                          <div class="invalid-feedback">
                            please enter your customer Name
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->

                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Customer Id</label>
                          <input type="text" class="form-control" id="customer_id" placeholder="Enter customer Id"  />
                          <input type="hidden" class="form-control" id="edit_id"/>
                          <div class="invalid-feedback">
                            please enter your customer Id
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Customer Phone No.</label>
                          <input type="text" class="form-control" id="eidt_customer_phone" name="customer_phone" placeholder="Relationship" required />
                          <div class="invalid-feedback">
                            please enter your Reference Relationship
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Package Category</label>
                          <select id="eidt_package_category_id" name="package_category_id" class="form-select">
                            <option value=""> Package Category</option>
                            {{-- @foreach ($post_codesPackages  as $post_codesPackages)
                             <option value="{{ $post_codesPackages->id }}">{{ $post_codesPackages->business_name}}</option>
                             @endforeach --}}
                          </select>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Package Weight</label>
                          <input type="text" class="form-control" name="package_weight" id="eidt_package_weight" placeholder="weight" required />
                          <div class="invalid-feedback">
                            please enter your weight
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Customer Expected Delivery Time</label>
                          <input  type="datetime-local"class="form-control" name="customer_expected_delivery_time" id="edit_customer_expected_delivery_time11" placeholder="Enter parcel number" required />

                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="payment_type" class="form-label">Payment Type</label>
                          <select id="eidt_payment_type" name="payment_type" class="form-select" >
                            <option value="">Select</option>
                            <option value="Cash">Cash</option>
                            <option value="Back">Back</option>
                          </select>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Product Price</label>
                          <input type="text" class="form-control" name="product_price" id="eidt_product_price" placeholder="Enter Price" required />
                          <div class="invalid-feedback">
                            please enter your Enter Price
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->


                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Delivery Fee</label>
                          <input type="text" class="form-control" name="delivery_fee" id="eidt_delivery_fee" placeholder="Enter fee" required />
                          <div class="invalid-feedback">
                            please enter your Enter fee
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->

                      <div class="col-lg-2 col-md-4 col-sm-12">
                        <div class="mb-3">
                          <label for="name" class="form-label">Customer Address</label>
                          <textarea id="eidt_customer_address" name="customer_address" class="form-control" placeholder="Address" required></textarea>
                          <div class="invalid-feedback">
                            please enter your Enter Address
                          </div>
                        </div>

                      </div>
                      <!-- end col  -->

                      <div class="d-flex gap-4">
                        <div class="pack-add-new-btn-holder">
                          <button type="submit" style="border: none"  class="add-new-btn" >Update</button>
                        </div>
                        <div class="pack-add-new-btn-holder">
                          <button type="submit" style="border: none"  class="add-new-btn" >Complete</button>
                        </div>
                      </div>
                    </div>
                </form>
                  </div> <!-- end card body-->
                </div> <!-- end card -->
              </div><!-- end col-->
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
{{-- --------------formDataAdd modal start -------------------- --}}
<script>
   categoryShow();
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
                url: `/${role}/courrier_panel/merchant/package/category/add`,
                data: imagesData,
                contentType: false,
                processData: false,
                success: function(response) {
                    categoryShow();
                    $('#add_supplier_form').trigger('reset');
                    $('#exampleModal').modal('hide');
                     toastr.success("Category Add Successfully");
                    //  window.location='/admin/courrier_panel/merchant/list'
                },
            });
        });

        function ClearFunction() {
            $('#business_category').val('');

        }
        // =============================package data show ===============================
        function categoryShow() {
          const role = "{{ config('fortify.guard') }}";
            $.ajax({
                type: "GET",
                url: `/${role}/courrier_panel/merchant/package/category/all/show`,
                success: function(response) {
                    console.log(response);

                    $('#doctorShowData').empty();
                    var data = '';
                    $.each(response, function(key, value) {

                        let date = new Date(value.customer_expected_delivery_time);
                        data += ` <tr>
                                    <td>  ${ date.toDateString()} || ${date.getHours() }:${date.getMinutes() }:${date.getSeconds()}</td>
                                    <td>${value.merchant_package_id}</td>
                                    <td>${value.customer_id}</td>
                                    <td>${value.customer_name}</td>
                                    <td>${value.customer_phone}</td>
                                    <td>${value.customer_address}</td>
                                    <td>${value.merchant_categorys_business_packages ?.business_name }</td>
                                    <td>${value.package_weight}</td>
                                    <td> ${ date.toDateString()} || ${date.getHours() }:${date.getMinutes() }:${date.getSeconds()}</td>
                                    <td>${value.payment_type}</td>
                                    <td>${value.product_price}</td>
                                    <td>${value.delivery_fee}</td>
                                    <td class="text-end" > <a href="#" class="btn btn-danger" onclick="DeletecategoryDeleteData(${value.id})"><i class="fas fa-trash-alt"></i></a>
                                    <a href="#" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#exampleModalEdit" onclick="categoryShowDataEdit(${value.id})">
                                        <i class="fas fa-marker"></i></a></td>
                                </tr>`;
                    });
                    $('#doctorShowData').append(data);
                },

            })
        }
        // ===========================packages delete ============================

function DeletecategoryDeleteData(id) {
            const role = "{{ config('fortify.guard') }}";
            var data = id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/courrier_panel/merchant/package/business/delete/` + data,
                success: function(response) {
                    categoryShow();
                  toastr.success("Business Delete Successfully");
                },
            });
        }
        // ---------------- package edit data------------------

   // ----------------------------merchant edit data -------------------
   function categoryShowDataEdit(id) {
            const role = "{{ config('fortify.guard') }}";
            var data = id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/courrier_panel/merchant/package/business/edit/` + data,
                success: function(response) {
                    console.log(response);
                    $('#edit_id').val(response.id);
                    $('#edit_merchant_name').val(response.customer_name);
                    $('.edit_merchants_package_id').val(response.merchant_package_id);
                    $('#customer_id').val(response.customer_id);
                    $('#package_id').val(response.merchant_package_id);
                    $('#edit_merchant_address').val(response.merchant_address);
                    $('#eidt_delivery_fee').val(response.delivery_fee);
                    $('#eidt_product_price').val(response.product_price);
                    $('#eidt_customer_phone').val(response.customer_phone);
                    $('#eidt_payment_type').val(response.payment_type);
                    $('#eidt_package_weight').val(response.package_weight);
                    $('#eidt_customer_address').val(response.customer_address);
                    $('#edit_customer_expected_delivery_time11').val(response.customer_expected_delivery_time);


                },
            });

        }

        // ------------------package update-------------------

 $(document).on('submit', '#edit_supplier_form', function(event) {
            event.preventDefault();
            const role = "{{ config('fortify.guard') }}";
            let id = $('#edit_id').val();
            let DataUpdate = new FormData($('#edit_supplier_form')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: `/${role}/courrier_panel/merchant/package/business/update/` + id,
                data: DataUpdate,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#exampleModalEdit').modal('hide');
                     toastr.success("Marchent Update Successfully");

                },
            });
        });

</script>
{{-- --------------formDataAdd modal end -------------------- --}}

{{-- <td> ${ date.getDate()  }/${date.getMonth() }/${date.getFullYear() } || ${date.getHours() }:${date.getMinutes() }:${date.getSeconds()}</td> --}}


<script>

// window.onload = function () {
//           let d = $last_rows ++;
//           alert('ok');

//         };

document.getElementById("demo").innerHTML=Math.floor( Math.random() *10);
</script>
@endsection
