@extends('admin.admin_master')

@section('css')
 <style>
            table th{
                text-align: left;
                display: inline-flexbox;
                justify-content: center;
            }
            table tr{
                vertical-align: middle;
            }

            table tr td{
                vertical-align: middle;
                text-align: center;
            }
            .merchantList .addBtn {
                background: #16A085;
                border-radius: 5px;
                border: 1px solid #16A085;
                padding: 8px 30px;
                font-family: 'Inter';
                font-weight: 300;
                font-size: 18px;
            }
            .merchantList .addBtn a {
                color: #FFFFFF;
            }
            .merchantList .faEye {
                background: #B8E6F0;
                border-radius: 10px;
                color: #000000;
                padding: 10px 12px;
                font-size: 20px;
            }
            .merchantList .dataTables_length .form-label {
                display: none;
            }
            .merchantList table {
                font-family: 'Tahoma';
            }
            .merchantList table td {
                vertical-align: middle;
            }
            .merchantAdd .cusInputGrpoup {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
                margin: 30px 0;
            }
            .cusInput {
                width: 300px;
                margin:10px;
            }
            .cusInput select {
                margin-top: 9px;
            }

            .merchantAdd .addBtn {
                background: #16A085;
                border-radius: 5px;
                border: 1px solid #16A085;
                padding: 8px 30px;
                font-family: 'Inter';
                font-weight: 300;
                font-size: 18px;
                margin-bottom: 30px;
            }
            .merchantAdd .addBtn a {
                color: #FFFFFF;
            }

        </style>
@endsection

@section('main-content')
    <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <h3 class="header-title">Merchant List</h3>
                                </div>
                                <div class="text-end mt-3 me-3">
                                    <button class="addBtn"><a href="{{ route('role.MerchantListAdd', config('fortify.guard')) }}">Add Merchant <i class="fas fa-user-plus ms-2"></i></a></button>
                                </div>
                                <div class="card merchantList">

                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table datatable-buttons table-striped nowrap w-100">
                                            <thead >
                                                <tr>
                                                    <th>Merchant Name (Organization Name)</th>
                                                    <th>Merchant Id</th>
                                                    <th>Merchant Owner Name</th>
                                                    <th>Merchant Address</th>
                                                    <th>Merchant Mobile no. 1</th>
                                                    <th>Merchant Mobile no. 2 </th>
                                                    <th>Merchant Bank Details</th>
                                                    <th>Merchant Mobile Banking Details</th>
                                                    <th>Business Category</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($marchents as $marchent)


                                                <tr>
                                                    <td>{{ $marchent->merchant_name }} </td>
                                                    <td>{{ $marchent->merchant_id }} </td>
                                                    <td>{{ $marchent->merchant_owner_name }} </td>
                                                    <td>{{ $marchent->merchant_address }} </td>
                                                    <td>{{ $marchent->merchant_phone_one }} </td>
                                                    <td>{{ $marchent->merchant_phone_two }} </td>
                                                    <td>{{ $marchent->merchant_bank_details }} </td>
                                                    <td>{{ $marchent->merchant_mobile_bank_details }} </td>
                                                    <td>{{ optional($marchent->merchantCategorys)->business_name }} </td>

                                                   <td class="text-end" >
                                                    <button class="btn btn-success"
                                                    onclick="DeletecategoryDeleteData({{$marchent->id}})">Delete
                                                   </button>
                                                   <button class=" btn btn-info" data-bs-toggle="modal"
                                                   onclick="categoryShowDataEdit({{$marchent->id}})"
                                                   data-bs-target="#exampleModaledit"><i class="fa fa-solid fa-eye"></i>
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

{{-- =================edit model================= --}}
<div class="modal fade " id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content formInput">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Merchant</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="row">
            <div class="col-12">
               <form id="edit_supplier_form">
                @csrf
                <div class="card  merchantAdd ">
                    <div class="cusInputGrpoup">
                        <div class="cusInput">
                            <label for="m_name" class="form-label">Merchant Name (Organization Name)</label>
                            <input type="text" class="form-control" name="merchant_name" id="edit_merchant_name" placeholder="Full Name">
                            <input type="hidden"  id="edit_id">
                        </div>

                        <div class="cusInput">
                            <label for="w_name" class="form-label">Merchant Owner Name</label>
                            <input type="text" class="form-control" name="merchant_owner_name" id="edit_merchant_owner_name" placeholder="Full Name">
                        </div>
                        <div class="cusInput">
                            <label for="mobile1" class="form-label">Merchant Mobile No. 1</label>
                            <input type="number" value="+880" name="merchant_phone_one" class="form-control" id="edit_merchant_phone_one">
                        </div>
                        <div class="cusInput">
                            <label for="mobile2" class="form-label">Merchant Mobile No. 2</label>
                            <input type="number" value="+880" class="form-control" name="merchant_phone_two" id="edit_merchant_phone_two">
                        </div>
                        <div class="cusInput">
                            <label for="bank_details" class="form-label">Merchant Bank Details</label>
                            <input type="text" class="form-control" name="merchant_bank_details" id="edit_merchant_bank_details" placeholder="Bank Details">
                        </div>
                        <div class="cusInput">
                            <label for="mobile_detail" class="form-label">Merchant Mobile Banking Details</label>
                            <input type="text" class="form-control" name="merchant_mobile_bank_details" id="edit_merchant_mobile_bank_details" placeholder="Details">
                        </div>

                        <div class="cusInput">
                            <label for="m_add" class="form-label">Merchant Address</label>
                            <textarea class="form-control" name="merchant_address" id="edit_merchant_address" rows="3" placeholder="Enter Marchent Address"></textarea>
                        </div>
                    </div>
                    <div class="text-center mt-3 me-3">
                        <button type="submit" class="addBtn">Update Merchant</button>
                    </div>
                </div> <!-- end card -->
            </form>
            </div><!-- end col-->
        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script>
    //    -----------------Category Data Delete--------------------
        function DeletecategoryDeleteData(id) {
            const role = "{{ config('fortify.guard') }}";
            var data = id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/courrier_panel/merchant/business/delete/` + data,
                success: function(response) {
                    location.reload();
                  toastr.success("Business Delete Successfully");
                },
            });
        }
        // ----------------------------merchant edit data -------------------
        function categoryShowDataEdit(id) {
            const role = "{{ config('fortify.guard') }}";
            var data = id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/courrier_panel/merchant/business/edit/` + data,
                success: function(response) {
                    $('#edit_id').val(response.id);
                    $('#edit_merchant_name').val(response.merchant_name);
                    $('#edit_merchant_address').val(response.merchant_address);
                    // $('#edit_business_category_id').val(response.merchantCategorys.business_name);
                    $('#edit_merchant_mobile_bank_details').val(response.merchant_mobile_bank_details);
                    $('#edit_merchant_bank_details').val(response.merchant_bank_details);
                    $('#edit_merchant_phone_two').val(response.merchant_phone_two);
                    $('#edit_merchant_phone_one').val(response.merchant_phone_one);
                    $('#edit_merchant_owner_name').val(response.merchant_owner_name);


                },
            });

        }

        // -----------------update Data ---------------------
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
                url: `/${role}/courrier_panel/merchant/business/updateData/` + id,
                data: DataUpdate,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#exampleModaledit').modal('hide');
                    location.reload();
                     toastr.success("Marchent Update Successfully");

                },
            });
        });

</script>
@endsection
