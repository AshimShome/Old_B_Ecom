@extends('admin.admin_master')

@section('main-content')

 <!-- Start Content-->
 <div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex col-lg-10 mb-2">
                      <div class="col-lg-5">
                        <h4 class="header-title">Supplier List</h4>
                      </div>
                      <div  class="col-lg-7 addReturnAblePrdBtn">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addSupplier"><button type="button" class="btn btn-success waves-effect waves-light mb-2 me-2">Add New Supplier <i class="fas fa-user-plus"></i></button></a>
                      </div>
                    </div>
                    <table id="datatable-buttons" class="table table-striped nowrap w-100">
                        <thead>
                            <tr>
                                <th> Supplier ID</th>
                                <th> Supplier Name </th>
                                <th> Name </th>
                                <th> Bank Details </th>
                                <th> Mobile Bank Details </th>
                                <th> Supplier Contact </th>
                                <th> Supplier Address </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody id="supplierDataShow">

                        </tbody>
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
  </div> <!-- container -->
     <!-- supplier Add Model -->
     <div class="modal fade" id="addSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"> Add Supplier</h4>
                <button type="button" id="clickData" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add_supplier_form">
                <div class="modal-body p-4 bg-light ">
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
                                <label for="company_name">Name</label>
                                <input type="text" name="company_name" class="form-control" id="company_name">
                                <span id="company_name" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_email">Supplier Email</label>
                                <input type="email" name="supplyer_email" id="supplyer_email" class="form-control">
                                <span id="supplyer_email" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_phone">Mobile Number</label>
                                <input type="text" name="supplyer_phone" id="supplyer_phone" class="form-control">
                                <span id="supplyer_phone" class="errorColor"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_phone2">Mobile Number2</label>
                                <input type="text" name="supplyer_phone2" id="supplyer_phone2" class="form-control">
                                <span id="supplyer_phone2" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_bank_info">Bank Details</label>
                                <textarea class="form-control" name="supplyer_bank_info" id="supplyer_bank_info" rows="5"></textarea>
                                <span id="supplyer_bank_info" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_mobile_bank_info">Mobile Banking Details</label>
                                <textarea class="form-control" name="supplyer_mobile_bank_info" id="supplyer_mobile_bank_info" rows="5"></textarea>
                                <span id="supplyer_mobile_bank_info" class="errorColor"></span>

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_address">Supplier Address</label>
                                <textarea class="form-control"  name="supplyer_address" id="supplyer_address" rows="5"></textarea>
                                <span id="supplyer_mobile_bank_info" class="errorColor"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="padding: 12px;width:90px;"data-bs-dismiss="modal">Close</button>
                    <button type="submit" style="padding: 12px; width:90px;" class="btn btn-info">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- supplier edit Model -->
    <div class="modal fade" id="editSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"> Add Supplier</h4>
                <button type="button" class="btn-close" id="editClickDatas" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit_supplier_form">
                <div class="modal-body">

                    <div class="row">

                        <div class="col-lg-3 mt-3">
                            <label for="supplierPrdCode">Supplier Name </label>
                            <input type="text" id="edit_supplyer_name" name="supplyer_name" class="form-control mt-1" value="">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="supplierPrdCode"> Company Name </label>
                            <input type="text" name="company_name" id="edit_company_name" class="form-control mt-1" value="">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="supplierPrdCode"> Email </label>
                            <input type="text" name="supplyer_email" id="edit_supplyer_email" class="form-control mt-1" value="">
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="supplierPrdCode">  Mobile Number  </label>
                            <input type="text" name="supplyer_phone" id="edit_supplyer_phone" class="form-control mt-1" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 mt-3">
                            <label for="prdCode"> Mobile Number 2 </label>
                            <input type="text" name="supplyer_phone2" id="edit_supplyer_phone2" class="form-control mt-1" value="">
                        </div>


                        <div class="col-lg-3 mt-3">
                            <label for="supplierPrdCode">  Bank Name  </label>
                            <textarea type="text" name="supplyer_bank_info" id="edit_supplyer_bank_name" class="form-control" > </textarea>
                        </div>
                        <div class="col-lg-3 mt-3">
                            <label for="supplierPrdCode">  Bank Details  </label>
                            <textarea type="text" name="supplyer_mobile_bank_info" id="edit_supplyer_mobile_bank_details" class="form-control" > </textarea>
                        </div>


                        <div class="col-lg-3 mt-3">
                            <label for="supplierPrdCode">  Supplier Address  </label>
                            <textarea type="text" id="edit_supplyer_address" name="supplyer_address" class="form-control"> </textarea>
                        </div>
                        <div class="col-lg-3 mt-3">

                            <input type="hidden" name="id"  id="id" class="form-control mt-1" value="#12354">
                        </div>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-info px-4" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- --------------formDataAdd modal start -------------------- --}}
    <script>
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
                url: `/${role}/shop_owner/owner/insertData`,
                data: imagesData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // ClearFunction();
                    supplierDataShow();
                    $("#clickData").trigger("click");
                    console.log(response);
                },
            });
        });

        // ---------------------supplier Data Show Start----------------------
        function supplierDataShow() {
            const role = "{{ config('fortify.guard') }}";
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/suppliers/supplier/all`,
                success: function(response) {
                    console.log(response);
                    $('#supplierDataShow').empty();
                    var data = '';
                    $.each(response, function(key, value) {

                        data += ` <tr>
                                    <td>${value.supplyer_id_code}</td>
                                    <td>${value.supplyer_name}</td>
                                    <td>${value.company_name}</td>
                                    <td>${value.supplyer_bank_info}</td>
                                    <td>${value.supplyer_mobile_bank_info}</td>
                                    <td>${value.supplyer_phone}</td>
                                    <td>${value.supplyer_address}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editSupplier" id="supplierEdit"
                                         onclick="supplierShowDataEdit(${value.id})"><i class="fas fa-edit fa-lg"></i></a>
                                         <a href="#" class="btn font-15 text-danger" onclick="supplierShowDataDelete(${value.id})">
                                            <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr> `;
                    });
                    $('#supplierDataShow').append(data);
                },
            });
        }
        supplierDataShow();
        // ---------------------supplier Data Show end----------------------

        // -----------------supplier Data Delete--------------------
        function supplierShowDataDelete(id) {


            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    const role = "{{ config('fortify.guard') }}";
                    var data = id;
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: `/${role}/shop_owner/owner/delete/` + data,
                        success: function(response) {
                            supplierDataShow();
                            toastr.error("Supplier Deleted Successfully.");
                            Swal.fire('Deleted!','Your file has been deleted.','success');
                            console.log(response)

                        },
                    });


                }
            })



        }

        // ---------------------edit supplier------------------------
        function supplierShowDataEdit(id) {
            const role = "{{ config('fortify.guard') }}";
            var data = id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/suppliers/supplier/edit/` + data,
                success: function(response) {
                    $('#id').val(response.id);
                    $('#edit_supplyer_name').val(response.supplyer_name);
                    $('#edit_company_name').val(response.company_name);
                    $('#edit_supplyer_email').val(response.supplyer_email);
                    $('#edit_supplyer_phone').val(response.supplyer_phone);
                    $('#edit_supplyer_phone2').val(response.supplyer_phone2);
                    $('#edit_supplyer_bank_name').val(response.supplyer_bank_info);
                    $('#edit_supplyer_mobile_bank_details').val(response.supplyer_mobile_bank_info);
                    $('#edit_supplyer_address').val(response.supplyer_address);


                    console.log(response);

                },
            });

        }

        $(document).on('submit', '#edit_supplier_form', function(event) {
            event.preventDefault();
            const role = "{{ config('fortify.guard') }}";
            let id = $('#id').val();
            let DataUpdate = new FormData($('#edit_supplier_form')[0]);
            console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: `/${role}/suppliers/supplier/updateData/` + id,
                data: DataUpdate,
                contentType: false,
                processData: false,
                success: function(response) {
                    supplierDataShow();
                    $("#editClickDatas").trigger("click");
                    console.log(response);
                },
            });
        });

        // ----------------data clear function ---------------------------
        function ClearFunction() {
            $('#supplyer_name').val('');
            $('#company_name').val('');
            $('#supplyer_email').val('');
            $('#supplyer_phone').val('');
            $('#supplyer_phone2').val('');
            $('#supplyer_bank_info').val('');
            $('#supplyer_mobile_bank_info').val('');
            $('#supplyer_address').val('');
        }
    </script>
    {{-- --------------formDataAdd modal end -------------------- --}}
@endsection
