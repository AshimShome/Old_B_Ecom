@extends('admin.admin_master')
@section('css')
    <style>
        .content-page-box {
            height: 100%;
        }

        .add-customer-input label {
            font-weight: 400;
            font-size: 16px;
            line-height: 25px;
            color: #6C757D;

        }

        .agent-jfss-btn-holder {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: end;
            margin-bottom: 50px;
            margin-top: 50px;
        }

        .agent-jfss-btn-holder .jfss-btn {
            background: #1ABC9C;
            border-radius: 5.25025px;
            font-weight: 600;
            font-size: 18.9009px;
            line-height: 26px;
            text-align: center;
            color: #FFFFFF;
            padding: 10px 30px;
        }

        .agent-card-footer {
            background: #fff;

        }

    </style>
@endsection
@section('main-content')
   <!-- Start Content-->
   <div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-4">
            <form id="add_supplier_form">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add New Manager</h4>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Add Image</h4>
                                <span class="text-danger" >*</span>
                                <input type="file" name="shop_manager_photo" data-plugins="dropify" data-height="300" />
                            </div>
                        </div>
                    </div>
                    <!-- Add Image Container End -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control mt-1" >
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control mt-1">
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <label for="mobile-1">Mobile Number 1</label>
                            <input type="number" name="phone" id="phone" class="form-control mt-1" >
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <label for="mobile-2">Mobile Number 2</label>
                            <input type="number" name="phone2" id="phone2" class="form-control mt-1">
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <label for="pAddress" class="form-label">Present Address</label>
                            <textarea class="form-control" name="shop_manager_address" id="shop_manager_address" rows="3"></textarea>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                            <label for="perAddress" class="form-label">Permanent Address</label>
                            <textarea class="form-control" name="shop_manager_address2" id="shop_manager_address2" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-3">
                        <button type="submit" class="submitBtn">Submit</button>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </form>
        </div><!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
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
                url: `/${role}/manager/managerStore`,
                data: imagesData,
                contentType: false,
                processData: false,
                success: function(response) {
                    toastr.success(response.message.message);
                    console.log(response);
                    $("#add_supplier_form")[0].reset();
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
