@extends('admin.admin_master')
@section('css')
    <style>
        .avatar-title {
            align-items: center;
            color: #fff;
            display: flex;
            height: 100%;
            justify-content: center;
            width: 100%;
        }

        .left-side-menu {
            width: 255px;
        }

        .footer {
            left: 255px;
        }

        .header-title {
            margin-bottom: 20px;
        }

        #datatable-buttons a {
            color: #0D6EFD;
        }

        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
            width: 100%;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
            position: absolute;
            right: 20px;
            top: 23px;
        }

        @media (max-width: 767px) {
            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
                justify-content: center;
            }
        }

        @media (max-width: 636px) {
            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
                right: 0;
                left: 0;
                top: 60px;
            }

            #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
                margin-top: 20px;
            }

            .header-title {
                text-align: center;
            }
        }

        #datatable-buttons .edit {
            font-size: 17px;
        }

    </style>
@endsection
@section('main-content')
    <div class="container-fluid mt-5">
        <div class="row" id="showDataAgent">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex justify-content-lg-between mb-2">
                            <div class="col-lg-6 col-md-6 col-12">
                                <h4 class="header-title">Customer List</h4>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 d-lg-flex d-inline justify-content-lg-end">
                                <!-- <div class="col-lg-4 col-12">
                              <input type="text" id="basic-datepicker" class="form-control flatpickr-input active"
                                placeholder="Select Date" readonly="readonly">
                            </div> -->
                            </div>
                        </div>
                        <table id="datatable-buttons" class="table table-striped nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Customer Address</th>
                                    <th>Action</th>
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



    {{-- ----------------Edit agent modal start ----------------- --}}
    <div class="modal fade" id="editSupplierModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl  ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update suppliers</h5>
                    <button type="button" id="clickDatas" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="edit_supplier_form">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title">Add New Manager</h4>
                            <!-- Add Image Container Start -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Add Image</h4>
                                        <input type="file" name="shop_manager_photo" id="edit_shop_manager_photo"
                                            data-plugins="dropify" data-height="300" />
                                    </div>
                                </div>
                            </div>
                            <!-- Add Image Container End -->
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="edit_name" class="form-control mt-1">
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="edit_email" class="form-control mt-1">
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                                    <label for="mobile-1">Mobile Number 1</label>
                                    <input type="number" name="phone" id="edit_phone" class="form-control mt-1">
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                                    <label for="mobile-2">Mobile Number 2</label>
                                    <input type="number" name="phone" id="edit_phone2" class="form-control mt-1">
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                                    <label for="pAddress" class="form-label">Present Address</label>
                                    <textarea class="form-control" name="shop_manager_address" id="edit_shop_manager_address" rows="3"></textarea>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                                    <label for="perAddress" class="form-label">Permanent Address</label>
                                    <textarea class="form-control" name="shop_manager_address2" id="edit_shop_manager_address2" rows="3"></textarea>
                                </div>
                                <input type="hidden" id="edit_id">
                            </div>
                            <div class="d-flex justify-content-center my-3">
                                <button type="submit" class="submitBtn">Update</button>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </form>
            </div>
        </div>

    </div>
    {{-- ----------------Edit Supplier modal end ----------------- --}}
@endsection
@section('script')
    <script>
        function supplierDataShow() {
            const role = "{{ config('fortify.guard') }}";
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/manager/show/customer`,
                success: function(response) {
                    console.log(response);
                    $('#supplierDataShow').empty();
                    var data = '';
                    $.each(response, function(key, value) {
                        data += ` <tr>
                                    <td>${value.shop_manager_id_code}</td>
                                    <td>${value.name}</td>
                                    <td>${value.email}</td>
                                    <td>${value.phone}</td>
                                    <td>${value.shop_manager_address}</td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editSupplierModal" id="supplierEdit"
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
                        url: `/${role}/manager/delete/customer/` + data,
                        success: function(response) {
                            supplierDataShow();
                            console.log(response)
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
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
                url: `/${role}/manager/agentManagerEdit/` + data,
                success: function(response) {
                    console.log(response);
                    $('#edit_id').val(response.id);
                    $('#edit_name').val(response.name);
                    $('#edit_email').val(response.email);
                    $('#edit_phone').val(response.phone);
                    $('#edit_phone2').val(response.phone2);
                    $('#edit_shop_manager_address').val(response.shop_manager_address);
                    $('#edit_shop_manager_address2').val(response.shop_manager_address2);
                    $('#edit_shop_manager_photo').val(response.shop_manager_photo);
                    console.log(response)
                },
            });
        }

        $(document).on('submit', '#edit_supplier_form', function(event) {
            event.preventDefault();
            const role = "{{ config('fortify.guard') }}";
            let id = $('#edit_id').val();
            let DataUpdate = new FormData($('#edit_supplier_form')[0]);
            console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: `/${role}/manager/agentManagerUpdate/` + id,
                data: DataUpdate,
                contentType: false,
                processData: false,
                success: function(response) {
                    toastr.success(response.message.message);
                    supplierDataShow();
                    $("#clickDatas").trigger("click");
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
