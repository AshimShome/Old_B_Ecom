@extends('admin.admin_master')
{{-- section id is yeild name --}}


@section('main-content')
<div class="container-full">
    <section class="content">
        <div class="container-fluid">
                         <div class="text-end" style="padding-top:20px">
                                <button data-bs-toggle="modal" data-bs-target="#addSupplierModal_supplieradd" type="button"
                                    class="btn btn-success waves-effect waves-light mb-2 me-2"><i class="fas fa-plus pe-2"></i> Add Suppliers</button>
                          </div>
            <div class="row" style="margin-top: -14px">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Suppliers List</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                       <table id="datatable-buttons" class="datatable-buttons table table-striped nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Ecommerce Name</th>
                                                    <th>Suppliers ID</th>
                                                    <th>Supplier Name (Organization Name)</th>
                                                    <th>Owner Name</th>
                                                    <th>supplier email</th>
                                                    <th>supplier phone</th>
                                                    <th>supplier phone2</th>
                                                    <th>supplier bank_info</th>
                                                    <th>supplier mobile_bank_info</th>
                                                    <th>supplier address</th>
                                                    <th>Zone</th>
                                                    <th>Acquisition Employee</th>
                                                    <th>Status</th>
                                                    <th>All Product List</th>
                                                    <th>Action</th>
                                                    <th>--</th>


                                                </tr>
                                            </thead>
                                                <tbody >


                                                    @foreach ($suppliers as $supplier)
                                                <tr>
                                                    <td>{{optional($supplier->ecommerce)->ecom_name}}</td>
                                                    <td>{{$supplier->supplyer_id_code}}</td>
                                                    <td>{{$supplier->supplyer_name}}</td>
                                                    <td>{{$supplier->company_name}}</td>
                                                    <td>{{$supplier->supplyer_email}}</td>
                                                    <td>{{$supplier->supplyer_phone}}</td>
                                                    <td>{{$supplier->supplyer_phone2}}</td>
                                                    <td>{{$supplier->supplyer_bank_info}}</td>
                                                    <td>{{$supplier->supplyer_mobile_bank_info}}</td>
                                                    <td>{{$supplier->supplyer_address}}</td>
                                                      <td>{{optional($supplier->zone)->postOffice}}</td>
                                                     <td>
                                                <a   href="{{ route('role.acquisitionSupplierShow', [config('fortify.guard'),$supplier->aquisition_employee_id]) }}" class="btn btn-warning"> {{optional($supplier->acquisiton)->employee_name}}</a>

                                                     </td>
                                                    <td>
                                                   @if($supplier->supplyer_status == 1)
                                                        <a href="{{ route('role.SupplierDeactive', [config('fortify.guard'), $supplier->id]) }}"
                                                            class="btn btn-success" title="Product Active Now">Active </a>
                                                        @else
                                                        <a href="{{ route('role.SupplierActive', [config('fortify.guard'), $supplier->id]) }}"
                                                            class="btn btn-danger" title="Product Active Now">Deactive </a>
                                                        @endif
                                                    </td>
                                                       <td>
                                                     <a href="{{ route('role.supplierAllProductShow', [config('fortify.guard'), $supplier->id]) }}"
                                                    class="btn btn-info" title="Product List" id="allProductShow">
                                                   <i class="fa fa-eye"></i>
                                                    </a>
                                                    </td>
                                                    <td>
                                                     <a href="{{ route('role.supplier_delete', [config('fortify.guard'), $supplier->id]) }}"
                                                class="btn btn-danger" title="Delete Data" id="delete">
                                                   <i class="fa fa-trash"></i>
                                                    </a>
                                                    </td>
                                                    <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editSupplierModal" id="supplierEdit"
                                                     onclick="supplierShowDataEdit({{$supplier->id}})"><i class="fas fa-edit fa-lg"></i></a>
                                                    </td>



                                                </tr>
                                                @endforeach
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
<div class="modal fade" id="addSupplierModal_supplieradd" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl  ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black text-center" id="exampleModalLabel">Add suppliers</h5>
                <button type="button" id="#" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="add_supplier_form">
                <div class="modal-body p-4 bg-light ">
                     <div class="row p-2">
                        <div class="col-3">
                            <div class="col-lg">

                                <label for="supplyer_name">Zone</label>
                                <span class="errorColor">**</span>
                                 <select name="zone_id" id="zone_id"    req class="form-select form-control ss">

                                        <option value="" selected="" disabled="">Select Zone </option>
                                        @foreach ($zone_id as $zone_id)

                                        <option value="{{$zone_id->id}}">{{$zone_id->postOffice}} </option>

                                        @endforeach

                                 </select>
                                 <span id="zone_id" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_name">Ecommerce Name</label>
                                  <span class="errorColor">**</span>
                                  <select name="ecom_name" class=" form-select form-control "  data-toggle="select2">

                                        <option value="" selected="" disabled="">Select Ecommerce Name </option>
                                        @foreach($ecom as $ecoms)
                                        <option value="{{ $ecoms->id }}">{{ $ecoms->ecom_name }}</option>
                                        @endforeach
                                   </select>
                                    <span id="ecom_name" class="errorColor"></span>
                            </div>
                        </div>
                         <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_name">Acquisition Employee</label>
                                  <span class="errorColor">**</span>
                                 <select name="employee_id" class=" form-select form-control">
                                        <option value="" selected="" disabled="">Select Acquisition Employee Name</option>
                                         @foreach ($employee_id as $employee_id)

                                        <option value="{{$employee_id->id}}">{{$employee_id->employee_name}} </option>

                                        @endforeach
                                 </select>
                                    <span id="ecom_name" class="errorColor"></span>
                            </div>
                        </div>




                          <div class="col-3">
                            <div class="col-lg">
                               <label for="messengerLink">Messenger Link</label>
                                <input type="text" name="messengerLink" id="" class="form-control">
                                <span id="messengerLink" class="errorColor"></span>
                            </div>
                        </div>




                     </div>
                    <div class="row p-2">
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_name">Supplier Name (Organization Name)</label>
                                <input type="text" name="supplyer_name" id="supplyer_name" class="form-control">
                                <span id="supplyer_name" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="company_name">Owner Name</label>
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
                            <div class="col-lg input-group">

                                <!--<label for="supplyer_phone">Mobile Number</label>-->
                                <!--<input type="text" name="supplyer_phone" id="supplyer_phone" class="form-control">-->
                                <!--<span id="supplyer_phone" class="errorColor"></span>-->


                                 <label for="supplyer_phone">Mobile Number</label>
                                <div class="input-group mb-3">
                               <span class="input-group-text">+88</span>
                               <input type="text" class="form-control" name="supplyer_phone" id="supplyer_phone"  aria-label="Amount (to the nearest dollar)">
                                <span id="supplyer_phone" class="errorColor"></span>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-3">
                            <label for="supplyer_phone2">Mobile Number2</label>
                            <div class="col-lg input-group">
                                  <span class="input-group-text">+88</span>
                                <input type="text" name="supplyer_phone2" id="supplyer_phone2" class="form-control">
                                <span id="supplyer_phone2" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_bank_info">Bank Details</label>
                                <textarea class="form-control" name="supplyer_bank_info" id="supplyer_bank_info"
                                    rows="5"></textarea>
                                <span id="supplyer_bank_info" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_mobile_bank_info">Mobile Banking Details</label>
                                <textarea class="form-control" name="supplyer_mobile_bank_info"
                                    id="supplyer_mobile_bank_info" rows="5"></textarea>
                                <span id="supplyer_mobile_bank_info" class="errorColor"></span>

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_address">Supplier Address</label>
                                <textarea class="form-control" name="supplyer_address" id="supplyer_address"
                                    rows="5"></textarea>
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
<div class="modal fade" id="editSupplierModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl  ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update suppliers</h5>
                <button type="button" id="clickDatassupplier" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="edit_supplier_form">
                <div class="modal-body p-4 bg-light ">
                    <div class="row p-2">
                        <div class="col-4">
                            <div class="col-lg">
                                <label for="supplyer_name">Ecommerce Name</label>
                      <select name="ecom_id" id="edit_ecom_name" class=" form-select form-control ">
                            <option value="" selected="" disabled="">Select Ecommerce Name
                            </option>
                            @foreach($ecom as $ecoms)
                            <option value="{{ $ecoms->id }}">{{ $ecoms->ecom_name }}</option>
                            @endforeach
                        </select>


                                <span id="ecom_name" class="errorColor"></span>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="col-lg">
                            <label for="messengerLink">messenger Link</label>
                                <input type="text" name="messengerLink" id="edit_messenger_link" class="form-control">
                            </div>

                        </div>
                          <div class="col-4">
                            <div class="col-lg">
                            <label for="supplierCode">Supplier Code</label>
                                <input type="text" name="supplyer_id_code" id="edit_supplyer_id_code" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_name">Supplier Name (Organization Name)</label>
                                <input type="text" name="supplyer_name" id="edit_supplyer_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="company_name">Owner Name</label>
                                <input type="text" name="company_name" class="form-control" id="edit_company_name">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_email">Supplier Email</label>
                                <input type="email" name="supplyer_email" id="edit_supplyer_email" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_phone">Mobile Number</label>
                                <input type="text" name="supplyer_phone" id="edit_supplyer_phone" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_phone2">Mobile Number2</label>
                                <input type="text" name="supplyer_phone2" id="edit_supplyer_phone2"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_bank_info">Bank Details</label>
                                <textarea class="form-control" name="supplyer_bank_info" id="edit_supplyer_bank_info"
                                    rows="5"></textarea>
                                <span id="edit_supplyer_bank_info" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_mobile_bank_info">Mobile Banking Details</label>
                                <textarea class="form-control" name="supplyer_mobile_bank_info"
                                    id="edit_supplyer_mobile_bank_info" rows="5"></textarea>
                                <span id="edit_supplyer_mobile_bank_info" class="errorColor"></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-lg">
                                <label for="supplyer_address">Supplier Address</label>
                                <textarea class="form-control" name="supplyer_address" id="edit_supplyer_address"
                                    rows="5"></textarea>
                                <span id="edit_supplyer_address" class="errorColor"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="padding: 12px;width:90px;"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" style="padding: 12px; width:90px;" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>
{{-- ----------------Edit Supplier modal end ----------------- --}}
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
                url: `/${role}/suppliers/supplier/insertData`,
                data: imagesData,
                contentType: false,
                processData: false,
                success: function(response) {


                    $('#addSupplierModal_supplieradd').modal('hide');
                     toastr.success("Supplier Add Successfully");

                    //reload/refresh
                        window.location.reload();
                },
            });
        });



        // -----------------supplier Data Delete--------------------
        function supplierShowDataDelete(id) {
            const role = "{{ config('fortify.guard') }}";
            var data = id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/suppliers/supplier/delete/` + data,
                success: function(response) {

                  toastr.success("Supplier Delete Successfully");
                   //reload/refresh
                        window.location.reload();

                },
            });
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
                    $('#edit_ecom_name').val(response.ecom_id);
                    $('#edit_supplyer_name').val(response.supplyer_name);
                    $('#edit_messenger_link').val(response.messengerLink);
                    $('#edit_supplyer_id_code').val(response.supplyer_id_code);
                    $('#edit_company_name').val(response.company_name);
                    $('#edit_supplyer_email').val(response.supplyer_email);
                    $('#edit_supplyer_phone').val(response.supplyer_phone);
                    $('#edit_supplyer_phone2').val(response.supplyer_phone2);
                    $('#edit_supplyer_bank_info').val(response.supplyer_bank_info);
                    $('#edit_supplyer_mobile_bank_info').val(response.supplyer_mobile_bank_info);
                    $('#edit_supplyer_address').val(response.supplyer_address);


                    console.log(response)

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


                    $('#editSupplierModal').modal('hide');
                     toastr.success("Supplier Update Successfully");
                    //reload/refresh
                        window.location.reload();

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

