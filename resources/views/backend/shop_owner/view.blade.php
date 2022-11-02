@extends('admin.admin_master')
{{-- section id is yeild name --}}
@section('main-content')
    <div class="container-full">
        <section class="content">
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-end">
                                    <button data-bs-toggle="modal" data-bs-target="#addShopOwnerModal" type="button"
                                        class="btn btn-success waves-effect waves-light mb-2 me-2"><i
                                            class="fas fa-plus pe-2"></i> Add Shop Owners</button>
                                </div>
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Shop Owners List</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="datatable-buttons"
                                                class="table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Organization Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Phone 2</th>
                                                        <th>Address</th>
                                                        <th>Status</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="shopOwnerDataShow">
                                                </tbody>
                                            </table>
                                        </div> <!-- table res.. end -->
                                    </div> <!-- box body end -->
                                </div> <!-- box end -->
                            </div> <!-- col end -->
                        </div>
                    </div>
                </div> <!--  row end-->
            </div>
        </section>
    </div>
    {{-- ----------------Add Supplier modal start ----------------- --}}
    <div class="modal fade" id="addShopOwnerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl  ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black text-center" id="exampleModalLabel">Add suppliers</h5>
                    <button type="button" id="clickData" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="addShopOwnerForm">

                    <div class="modal-body p-4 bg-light ">
                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_name">Shop Owner Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
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
                                    <label for="supplyer_email">Shop Owner Email</label>
                                    <input type="email" name="email" id="supplyer_email" class="form-control">
                                    <span id="supplyer_email" class="errorColor"></span>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone">Mobile Number</label>
                                    <input type="text" name="phone" id="supplyer_phone" class="form-control">
                                    <span id="supplyer_phone" class="errorColor"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone2">Mobile Number2</label>
                                    <input type="text" name="phone2" id="supplyer_phone2" class="form-control">
                                    <span id="supplyer_phone2" class="errorColor"></span>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_address">Shop Owner Address</label>
                                    <textarea class="form-control" name="address" id="supplyer_address" rows="5"></textarea>
                                    <span id="supplyer_mobile_bank_info" class="errorColor"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="padding: 12px;width:90px;"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" style="padding: 12px; width:90px;" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ----------------Add Supplier modal end ----------------- --}}
    {{-- ----------------Edit Supplier modal start ----------------- --}}
    <div class="modal fade" id="editShopOwnerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl  ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Shop Owner</h5>
                    <button type="button" id="clickDatas" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="update_shop_owner_form">
                    <div class="modal-body p-4 bg-light ">
                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_name">Shop Owner Name</label>
                                    <input type="text" name="name" id="edit_shopOwner_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="company_name">Organization Name</label>
                                    <input type="text" name="company_name" class="form-control" id="edit_company_name">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_email">Shop Owner Email</label>
                                    <input type="email" name="email" id="edit_shopOwner_email" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone">Mobile Number</label>
                                    <input type="text" name="phone" id="edit_shopOwner_phone" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone2">Mobile Number 2</label>
                                    <input type="text" name="phone2" id="edit_shopOwner_phone2" class="form-control">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_address">shop Owner Address</label>
                                    <textarea class="form-control" name="address" id="edit_shopOwner_address" rows="5"></textarea>
                                    <span id="edit_supplyer_address" class="errorColor"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="modal-footer">
                        <button type="button" id="editModalCloseButton" class="btn btn-secondary"
                            style="padding: 12px;width:90px;" data-bs-dismiss="modal">Close</button>
                        <button type="submit" style="padding: 12px; width:90px;" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    {{-- ----------------Edit Supplier modal end ----------------- --}}
@endsection


@section('script')
    <script>
        const role = "{{ config('fortify.guard') }}";

        function fetchShopOwners() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/shop_owner/getAll`,
                success: function(response) {
                    console.log(response);
                    $('#shopOwnerDataShow').empty();
                    var data = '';
                    $.each(response, function(key, value) {

                        data += ` <tr>
                                    <td>${value.shop_owner_id_code}</td>
                                    <td>${value.name}</td>
                                    <td>${value.company_name}</td>
                                    <td>${value.email}</td>
                                    <td>${value.phone}</td>
                                    <td>${value.phone2}</td>
                                    <td>${value.shop_owner_address}</td>
                                    <td>${value.shop_owner_photo}</td>
                                    <td>`;
                        if (value.shop_owner_status == 1) {
                            data += ` <span class="btn btn-success">Active</span>`;
                        } else {
                            data += ` <span class="btn btn-success">Deactive</span>`;
                        }

                        data += `</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editShopOwnerModal" id="supplierEdit"
                                         onclick="shopOwnerShowDataEdit(${value.id})"><i class="fas fa-edit fa-lg"></i></a>

                                        <form id="deleteShopOwner" data-route="/${role}/shop_owner/destroy/${value.id}">
                                            @csrf
                                            <button class="btn font-15 text-danger" data-id="${ value.id }" type="submit"> <i class="fas fa-trash-alt"> </i> </button>
                                        </form>
                                    </td>
                                </tr> `;
                    });
                    $('#shopOwnerDataShow').append(data);
                },
            });
        }

        $('#addShopOwnerForm').on('submit', function(e) {
            e.preventDefault();

            // let formData = new FormData($(this)[0]);
            let formDataCheck = new FormData($('#addShopOwnerForm')[0]);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: `/${role}/shop_owner/store`,
                type: 'POST',
                data: formDataCheck,
                contentType: false,
                processData: false,
                success: function(data) {
                    fetchShopOwners();
                },
                error: function(er) {
                    if (er.status == 422) {
                        $.each(er.responseJSON.errors, function(index, value) {
                            toastr.error(value);
                        });
                    }
                },
                cache: false,
                processData: false,
            });

        })

        $(document).on('submit', '#deleteShopOwner', function(e) {
            e.preventDefault();
            let url = $(this).data('route');

            let formDataCheck = new FormData($('#deleteShopOwner')[0]);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'POST',
                data: formDataCheck,
                contentType: false,
                processData: false,
                success: function(data) {
                    fetchShopOwners();
                    toastr.error("Data Has Been Deleted");
                },
                error: function(er) {
                    toastr.error("Something Went Wrong");
                },
                cache: false,
                processData: false,
            });

        });

        function shopOwnerShowDataEdit(id) {
            console.log(id);
            $('#update_shop_owner_form')[0].reset();

            $.ajax({
                url: `/${role}/shop_owner/edit/${id}`,
                type: 'GET',
                success: function(data) {

                    console.log(data);
                    $('#edit_shopOwner_name').val(data.name);
                    $('#edit_company_name').val(data.company_name);
                    $('#edit_shopOwner_email').val(data.email);
                    $('#edit_shopOwner_phone').val(data.phone);
                    $('#edit_shopOwner_phone2').val(data.phone2);
                    $('#edit_shopOwner_address').val(data.shop_owner_address);
                    $('#edit_id').val(data.id);

                },
                error: function(er) {

                },

            });
        }


        $('#update_shop_owner_form').on('submit', function(e) {
            e.preventDefault();

            // let formData = new FormData($(this)[0]);
            let formDataCheck = new FormData($('#update_shop_owner_form')[0]);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: `/${role}/shop_owner/update`,
                type: 'POST',
                data: formDataCheck,
                contentType: false,
                processData: false,
                success: function(data) {

                    $('#editModalCloseButton').trigger('click');
                    fetchShopOwners();
                    toastr.success("Data Updated Successfully");

                },
                error: function(er) {
                    if (er.status == 422) {
                        $.each(er.responseJSON.errors, function(index, value) {
                            toastr.error(value);
                        });
                    }
                },
                cache: false,
                processData: false,
            });

        })


        fetchShopOwners();
    </script>
@endsection
