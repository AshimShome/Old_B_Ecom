@extends('admin.admin_master')

@section('css')
 <style>
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
                                    <h3 class="header-title">Add Merchant</h3>
                                </div>
                               <form id="add_supplier_form">
                                @csrf
                                <div class="card  merchantAdd ">
                                    <div class="cusInputGrpoup">
                                        <div class="cusInput">
                                            <label for="m_name" class="form-label">Merchant Name (Organization Name)</label>
                                            <input type="text" class="form-control" name="merchant_name" id="merchant_name" placeholder="Full Name">
                                        </div>
                                        <div class="cusInput">
                                            <label for="m_id" class="form-label">Merchant Id</label>
                                            <input type="number m-2" class="form-control" id="m_id" placeholder="#123">
                                        </div>
                                        <div class="cusInput">
                                            <label for="w_name" class="form-label">Merchant Owner Name</label>
                                            <input type="text" class="form-control" name="merchant_owner_name" id="merchant_owner_name" placeholder="Full Name">
                                        </div>
                                        <div class="cusInput">
                                            <label for="mobile1" class="form-label">Merchant Mobile No. 1</label>
                                            <input type="number" value="+880" name="merchant_phone_one" class="form-control" id="merchant_phone_one">
                                        </div>
                                        <div class="cusInput">
                                            <label for="mobile2" class="form-label">Merchant Mobile No. 2</label>
                                            <input type="number" value="+880" class="form-control" name="merchant_phone_two" id="merchant_phone_two">
                                        </div>
                                        <div class="cusInput">
                                            <label for="bank_details" class="form-label">Merchant Bank Details</label>
                                            <input type="text" class="form-control" name="merchant_bank_details" id="merchant_bank_details" placeholder="Bank Details">
                                        </div>
                                        <div class="cusInput">
                                            <label for="mobile_detail" class="form-label">Merchant Mobile Banking Details</label>
                                            <input type="text" class="form-control" name="merchant_mobile_bank_details" id="merchant_mobile_bank_details" placeholder="Details">
                                        </div>
                                        <div class="cusInput">
                                            <label for="selectCategory">Business Category</label>
                                            <select class="form-select" name="business_category_id" aria-label="Default select example" id="business_category_id">
                                                <option selected>Select</option>
                                                @foreach ($add_marchants  as $add_marchant)
                                                <option value="{{ $add_marchant->id }}">{{ $add_marchant->business_name}}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                        <div class="cusInput">
                                            <label for="selectZone">Merchant Zone</label>
                                            <select class="form-select" name="merchant_zone_id" aria-label="Default select example" id="merchant_zone_id">
                                                <option selected>Select</option>
                                                @foreach ($post_codes  as $post_code)
                                                <option value="{{ $post_code->id }}">{{ $post_code->postOffice}}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                        <div class="cusInput">
                                            <label for="m_add" class="form-label">Merchant Address</label>
                                            <textarea class="form-control" name="merchant_address" id="merchant_address" rows="3" placeholder="Enter Marchent Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3 me-3">
                                        <button type="submit" class="addBtn">Add Merchant</button>
                                    </div>
                                </div> <!-- end card -->
                            </form>
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                    </div> <!-- container -->
@endsection
@section('script')
{{-- --------------formDataAdd modal start -------------------- --}}
<script>
    // categoryShow();
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
                url: `/${role}/courrier_panel/merchant/category/add`,
                data: imagesData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // categoryShow();
                    // ClearFunction();
                    // $('#exampleModal').modal('hide');
                     toastr.success("Category Add Successfully");
                     window.location='/admin/courrier_panel/merchant/list'
                },
            });
        });

        function ClearFunction() {
            $('#business_category').val('');

        }

</script>
{{-- --------------formDataAdd modal end -------------------- --}}
@endsection
