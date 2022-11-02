@extends('admin.admin_master')

@section('css')
  <style>
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
   $('#ele_id').css({
    display: 'none'

});
  </style>

@endsection

@section('main-content')

 <div class="container-fluid mt-3">
          <div class="row">
            <h3 class="header-title">Package Listing</h3>
            <div class="col-12">
              <div class="card">
                <div class="card-body" id="parentOfCardId">
                  <div class="row pack-row" id="cardId">
                    <div class="col-lg-2 col-md-4 col-sm-12">
                      <div class="mb-3">
                        <label for="name" class="form-label">Merchant Package Id</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter package id" required />
                        <div class="invalid-feedback">
                          please enter your Enter package id
                        </div>
                      </div>

                    </div>
                    <!-- end col  -->

                    <div class="col-lg-2 col-md-4 col-sm-12">
                      <div class="mb-3">
                        <label for="name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter customer Name" required />
                        <div class="invalid-feedback">
                          please enter your customer Name
                        </div>
                      </div>

                    </div>
                    <!-- end col  -->

                    <div class="col-lg-2 col-md-4 col-sm-12">
                      <div class="mb-3">
                        <label for="name" class="form-label">Customer Id</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter customer Id" required />
                        <div class="invalid-feedback">
                          please enter your customer Id
                        </div>
                      </div>

                    </div>
                    <!-- end col  -->


                    <div class="col-lg-2 col-md-4 col-sm-12">
                      <div class="mb-3">
                        <label for="name" class="form-label">Customer Phone No.</label>
                        <input type="text" class="form-control" id="name" placeholder="Relationship" required />
                        <div class="invalid-feedback">
                          please enter your Reference Relationship
                        </div>
                      </div>

                    </div>
                    <!-- end col  -->


                    <div class="col-lg-2 col-md-4 col-sm-12">
                      <div class="mb-3">
                        <label for="name" class="form-label">Package Category</label>
                        <select id="dprt-name" class="form-select" required="">
                          <option value="">Active</option>
                          <option value="">Front end</option>
                          <option value="press">Back end</option>
                        </select>
                      </div>

                    </div>
                    <!-- end col  -->


                    <div class="col-lg-2 col-md-4 col-sm-12">
                      <div class="mb-3">
                        <label for="name" class="form-label">Package Weight</label>
                        <input type="text" class="form-control" id="name" placeholder="weight" required />
                        <div class="invalid-feedback">
                          please enter your weight
                        </div>
                      </div>

                    </div>
                    <!-- end col  -->


                    <div class="col-lg-2 col-md-4 col-sm-12">
                      <div class="mb-3">
                        <label for="name" class="form-label">Customer Expected Delivery Time</label>
                        <input    type="datetime-local"class="form-control" id="name" placeholder="Enter parcel number" required />
                        <div class="invalid-feedback">
                          please enter your Enter parcel number
                        </div>
                      </div>

                    </div>
                    <!-- end col  -->


                    <div class="col-lg-2 col-md-4 col-sm-12">
                      <div class="mb-3">
                        <label for="name" class="form-label">Payment Type</label>
                        <select id="dprt-name" class="form-select" required="">
                          <option value="">Active</option>
                          <option value="">Front end</option>
                          <option value="press">Back end</option>
                        </select>
                      </div>

                    </div>
                    <!-- end col  -->


                    <div class="col-lg-2 col-md-4 col-sm-12">
                      <div class="mb-3">
                        <label for="name" class="form-label">Product Price</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Price" required />
                        <div class="invalid-feedback">
                          please enter your Enter Price
                        </div>
                      </div>

                    </div>
                    <!-- end col  -->


                    <div class="col-lg-2 col-md-4 col-sm-12">
                      <div class="mb-3">
                        <label for="name" class="form-label">Delivery Fee</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter fee" required />
                        <div class="invalid-feedback">
                          please enter your Enter fee
                        </div>
                      </div>

                    </div>
                    <!-- end col  -->

                    <div class="col-lg-2 col-md-4 col-sm-12">
                      <div class="mb-3">
                        <label for="name" class="form-label">Customer Address</label>
                        <textarea id="p-address" class="form-control" placeholder="Address" required></textarea>
                        <div class="invalid-feedback">
                          please enter your Enter Address
                        </div>
                      </div>

                    </div>
                    <!-- end col  -->

                    <div class="col-lg-2 col-sm-12 col-md-4">

                      <div class="mb-3">
                        <span></span>
                        <div class="package-listing-btn-holder d-flex justify-content-center align-items-center my-3">
                          <a href="javascript:void(0)" class="jfss-pack-btn delete"> Delete
                            <i class="fas fa-trash-alt"></i></a>
                          <button class="jfss-pack-btn print"
                            onclick="print('../default/bpp_shop_courier_invoice.html')"> Print <i
                              class="fas fa-print"></i> </button>
                        </div>
                      </div>

                    </div>

                    <div class="d-flex gap-4">
                      {{-- <div class="pack-add-new-btn-holder">
                        <a href="javascript:void(0)" class="add-new-btn" onclick="addNewBtn()"> Add New</a>
                      </div> --}}
                      <div class="pack-add-new-btn-holder">
                        <a href="merchantPackageList.html" class="add-new-btn">Submit </a>
                      </div>
                      <div class="pack-add-new-btn-holder">
                        <a href="merchantPackageList.html" class="add-new-btn">Complete</a>
                      </div>
                    </div>
                  </div>

                </div> <!-- end card body-->
              </div> <!-- end card -->
            </div><!-- end col-->
          </div>
</div>

      <div id="modelHide" class="container-fluid mt-3">


         <div id="duplicateData">
        <div class="row pack-row mt-4" id="childCardId">
          <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="mb-3">
              <label for="name" class="form-label">Merchant Package Id</label>
              <input type="text" class="form-control" id="name" placeholder="Enter package id" required />
              <div class="invalid-feedback">
                please enter your Enter package id
              </div>
            </div>
          </div>
          <!-- end col  -->
          <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="mb-3">
              <label for="name" class="form-label">Customer Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter customer Name" required />
              <div class="invalid-feedback">
                please enter your customer Name
              </div>
            </div>
          </div>
          <!-- end col  -->
          <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="mb-3">
              <label for="name" class="form-label">Customer Id</label>
              <input type="text" class="form-control" id="name" placeholder="Enter customer Id" required />
              <div class="invalid-feedback">
                please enter your customer Id
              </div>
            </div>
          </div>
          <!-- end col  -->
          <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="mb-3">
              <label for="name" class="form-label">Customer Phone No.</label>
              <input type="text" class="form-control" id="name" placeholder="Relationship" required />
              <div class="invalid-feedback">
                please enter your Reference Relationship
              </div>
            </div>
          </div>
          <!-- end col  -->
          <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="mb-3">
              <label for="name" class="form-label">Package Category</label>
              <select id="dprt-name" class="form-select" required="">
                <option value="">Active</option>
                <option value="">Front end</option>
                <option value="press">Back end</option>
              </select>
            </div>
          </div>
          <!-- end col  -->
          <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="mb-3">
              <label for="name" class="form-label">Package Weight</label>
              <input type="text" class="form-control" id="name" placeholder="weight" required />
              <div class="invalid-feedback">
                please enter your weight
              </div>
            </div>
          </div>
          <!-- end col  -->
          <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="mb-3">
              <label for="name" class="form-label">Customer Expected Delivery Time</label>
              <input type="text" class="form-control" id="name" placeholder="Enter parcel number" required />
              <div class="invalid-feedback">
                please enter your Enter parcel number
              </div>
            </div>
          </div>
          <!-- end col  -->
          <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="mb-3">
              <label for="name" class="form-label">Payment Type</label>
              <select id="dprt-name" class="form-select" required="">
                <option value="">Active</option>
                <option value="">Front end</option>
                <option value="press">Back end</option>
              </select>
            </div>
          </div>
          <!-- end col  -->
          <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="mb-3">
              <label for="name" class="form-label">Product Price</label>
              <input type="text" class="form-control" id="name" placeholder="Enter Price" required />
              <div class="invalid-feedback">
                please enter your Enter Price
              </div>
            </div>
          </div>
          <!-- end col  -->
          <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="mb-3">
              <label for="name" class="form-label">Delivery Fee</label>
              <input type="text" class="form-control" id="name" placeholder="Enter fee" required />
              <div class="invalid-feedback">
                please enter your Enter fee
              </div>
            </div>
          </div>
          <!-- end col  -->
          <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="mb-3">
              <label for="name" class="form-label">Customer Address</label>
              <textarea id="p-address" class="form-control" placeholder="Address" required></textarea>
              <div class="invalid-feedback">
                please enter your Enter Address
              </div>
            </div>
          </div>
          <!-- end col  -->
          <div class="col-lg-2 col-sm-12 col-md-4">
            <div class="mb-3">
              <span></span>
              <div class="package-listing-btn-holder d-flex justify-content-center align-items-center my-3">
                <a href="javascript:void(0)" class="jfss-pack-btn delete" onclick="removeItem(this)"> Delete
                  <i class="fas fa-trash-alt"></i></a>
                <a href="#" class="jfss-pack-btn print" onclick="print('../default/bpp_shop_courier_invoice.html')">
                  Print <i class="fas fa-print"></i> </a>
              </div>
            </div>
          </div>
          <div class="d-flex gap-4">
            <div class="pack-add-new-btn-holder">
              <a href="javascript:void(0)" class="add-new-btn" onclick="addNewBtn()"> Add New</a>
            </div>
            <div class="pack-add-new-btn-holder">
              <a href="#" class="add-new-btn">Submit </a>
            </div>
            <div class="pack-add-new-btn-holder">
              <a href="#" class="add-new-btn">Complete</a>
            </div>
          </div>
        </div>
      </div>

     </div>

@endsection

@section('script')

  <script>
$('#modelHide').hide();
    function addNewBtn() {
      $cardIdClone = $('#childCardId').clone();
      $('#parentOfCardId').append($cardIdClone);
    }
    function removeItem(event) {
      $('#childCardId').remove();
    }
    $(document).ready(function () {
      $('#duplicateData').hide();
    });


    function print(pdf) {

      var iframe = document.createElement('iframe');

      iframe.style.visibility = "hidden";
      // Define the source.
      iframe.src = pdf;

      document.body.appendChild(iframe);
      iframe.contentWindow.focus();
      iframe.contentWindow.print();
    }
  </script>
@endsection
