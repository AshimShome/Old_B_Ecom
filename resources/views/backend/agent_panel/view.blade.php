@extends('admin.admin_master')
{{-- section id is yeild name --}}
@section('css')
<style>
    tbody, td, tfoot, th, thead, tr th{
        padding: 0.85rem 0rem !important;
    
    }
    tbody .action{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
</style>
@endsection
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
                                            class="fas fa-plus pe-2"></i> Add Agent</button>
                                </div>
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Agent Panel List</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table id="datatable-buttons"
                                                class="table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Agent ID</th>
                                                        <th>Agent Name</th>
                                                        <th>Organization Name</th>
                                                        <th>Agent Email</th>
                                                        <th>Agent Mobile Number</th>
                                                        <th>Agent Mobile Number 2</th>
                                                        <th>Agent Address</th>
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

    {{-- ----------------Add Agent modal start ----------------- --}}
    <div class="modal fade" id="addShopOwnerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl  ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black text-center" id="exampleModalLabel">Add Agent</h5>
                    <button type="button" id="clickData" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="addShopOwnerForm">

                    <div class="modal-body p-4 bg-light ">
                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_name">Agent Name</label>
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
                                    <label for="supplyer_email">Agent Email</label>
                                    <input type="email" name="email" id="supplyer_email" class="form-control">
                                    <span id="supplyer_email" class="errorColor"></span>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone">Agent Mobile Number</label>
                                    <input type="number" name="phone" id="supplyer_phone" class="form-control">
                                    <span id="supplyer_phone" class="errorColor"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone2">Agent Mobile Number2</label>
                                    <input type="number" name="phone2" id="supplyer_phone2" class="form-control">
                                    <span id="supplyer_phone2" class="errorColor"></span>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_address">Agent Address</label>
                                    <textarea class="form-control" name="address" id="supplyer_address" rows="5"></textarea>
                                    <span id="supplyer_mobile_bank_info" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_address">Agent Commission</label>
                                    <input class="form-control" name="commission_given" >
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
                    <h5 class="modal-title" id="exampleModalLabel">Update Agent Details</h5>
                    <button type="button" id="clickDatas" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="update_shop_agent_form">
                    <div class="modal-body p-4 bg-light ">
                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_name">Agent Name</label>
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
                                    <label for="supplyer_email">Agent Email</label>
                                    <input type="email" name="email" id="edit_shopOwner_email" class="form-control">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone">Agent Mobile Number</label>
                                    <input type="number" name="phone" id="edit_shopOwner_phone" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_phone2">Agent Mobile Number 2</label>
                                    <input type="number" name="phone2" id="edit_shopOwner_phone2" class="form-control">
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_address">Agent Address</label>
                                    <textarea class="form-control" name="address" id="edit_shopOwner_address" rows="5"></textarea>
                                    <span id="edit_supplyer_address" class="errorColor"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="col-lg">
                                    <label for="supplyer_address">Agent Commission</label>
                                    <input class="form-control" name="commission_given" id="edit_commission" >
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
                url: `/${role}/agent/getAll`,
                success: function(response) {
                    console.log(response);
                    $('#shopOwnerDataShow').empty();
                    var data = '';
                    $.each(response, function(key, value) {
                        data += `<tr>
                                    <td>${value.shop_agent_id_code}</td>
                                    <td>${value.name}</td>
                                    <td>${value.company_name}</td>
                                    <td>${value.email}</td>
                                    <td>${value.phone}</td>
                                    <td>${value.phone2}</td>
                                    <td>${value.shop_agent_address}</td>
                                    <td>
                                        ${value.shop_agent_status == 1 ? '<span class="btn btn-success">Active</span>':'<span class="btn btn-danger">Inactive</span>'}
                                    </td> 
                                     
                                    <td class="action">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editShopOwnerModal" id="supplierEdit"
                                        onclick="shopOwnerShowDataEdit(${value.id})"><i class="fas fa-edit fa-lg"></i></a>
                        
                                        <form id="deleteShopOwner" data-route="/${role}/agent/destroy/${value.id}">
                                            @csrf
                                            <button class="btn font-15 text-danger" data-name="${ value.id }" type="submit"> <i class="fas fa-trash-alt delete-confirm"> </i> </button>
                                        </form>
                                    </td>
        
                                </tr>`;
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
                url: `/${role}/agent/store`,
                type: 'POST',
                data: formDataCheck,
                contentType: false,
                processData: false,
                success: function(data) {
                    fetchShopOwners();
                    $('.btn-close').trigger('click');
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
                    toastr.error("Agent data has been deleted");
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
            $('#update_shop_agent_form')[0].reset();

            $.ajax({
                url: `/${role}/agent/edit/${id}`,
                type: 'GET',
                success: function(data) {

                    console.log(data);
                    $('#edit_shopOwner_name').val(data.name);
                    $('#edit_company_name').val(data.company_name);
                    $('#edit_shopOwner_email').val(data.email);
                    $('#edit_shopOwner_phone').val(data.phone);
                    $('#edit_shopOwner_phone2').val(data.phone2);
                    $('#edit_shopOwner_address').val(data.shop_agent_address);
                    $('#edit_commission').val(data.commission_given);
                    $('#edit_id').val(data.id);

                },
                error: function(er) {

                },

            });
        }

        $('#update_shop_agent_form').on('submit', function(e) {
            e.preventDefault();

            // let formData = new FormData($(this)[0]);
            let formDataCheck = new FormData($('#update_shop_agent_form')[0]);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: `/${role}/agent/update`,
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

        });

        // Start Delete Section
        $('.delete-confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("id");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete ${id}?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
      // End Delete Section
  
        fetchShopOwners();
    </script>
@endsection
