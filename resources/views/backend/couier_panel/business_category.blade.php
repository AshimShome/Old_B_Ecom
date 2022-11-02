@extends('admin.admin_master')

@section('css')
<style>
.tableSize{
margin-top: 40px;
border-radius: 10px;
box-shadow: 3px 3px 3px 3px #888888;
}
.formInput{
    border-radius: 10px;
  box-shadow: 3px 3px 3px 3px #888888;
}
#header{
    font-size: 25px;
}
.tableRowSize{
    width: 700px;
}

</style>
@endsection

@section('main-content')
<div class="container">

<div class="row  tableRowSize ">
    <div class="col-sm-12">

      <div class="card  tableSize">
        <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-plus"></i> Add Category </button>
        <div class="card-body">
          <h5 id="header">All Business Category  </h5>
          <table class="table">
            {{-- <table id="datatable-buttons" class="table datatable-buttons table-striped nowrap w-100"> --}}
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th class="text-end" scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="doctorShowData">


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- ============model add data ========= --}}
<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content formInput">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div  class="modal-body  ">
            <form id="add_supplier_form">
                <div class="mb-3">
                  <label for="business_category" class="form-label">Category Name</label>
                  <input type="text" class="form-control" name="business_name" id="business_category" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>

  {{-- =================edit model================= --}}
  <div class="modal fade " id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content formInput">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div  class="modal-body  ">
            <form id="edit_supplier_form">
                <div class="mb-3">
                  <label for="business_category" class="form-label">Update Category Name</label>
                  <input type="text" class="form-control" name="business_name" id="edit_business_name" >
                  <input type="hidden" class="form-control" id="id" >
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
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
                url: `/${role}/courrier_panel/category/add`,
                data: imagesData,
                contentType: false,
                processData: false,
                success: function(response) {
                    categoryShow();
                    ClearFunction();
                    $('#exampleModal').modal('hide');
                     toastr.success("Category Add Successfully");
                },
            });
        });

// ------------category show --------------------
function categoryShow() {
    const role = "{{ config('fortify.guard') }}";
            $.ajax({
                type: "GET",
                url: `/${role}/courrier_panel/category/all/show`,
                success: function(response) {
                    $('#doctorShowData').empty();
                    var data = '';
                    $.each(response, function(key, value) {
                        console.log(value.gender);
                        data += ` <tr>
                                    <td>${value.business_name}</td>
                                    <td class="text-end" > <a href="#" class="btn btn-danger" onclick="categoryShowDataDelete(${value.id})"><i class="fas fa-trash-alt"></i></a>
                                    <a href="#" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#exampleModaledit" onclick="categoryShowDataEdit(${value.id})">
                                        <i class="fas fa-marker"></i></a></td>
                                </tr>`;
                    });
                    $('#doctorShowData').append(data);
                },

            })
        }


        // -----------------Category Data Delete--------------------
        function categoryShowDataDelete(id) {
            const role = "{{ config('fortify.guard') }}";
            var data = id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/courrier_panel/business/delete/` + data,
                success: function(response) {
                    categoryShow();
                  toastr.success("Business Delete Successfully");
                },
            });
        }

        // ---------------------edit category------------------------
        function categoryShowDataEdit(id) {
            const role = "{{ config('fortify.guard') }}";
            var data = id;
            $.ajax({
                type: "GET",
                dataType: "json",
                url: `/${role}/courrier_panel/business/edit/` + data,
                success: function(response) {
                    $('#id').val(response.id);
                    $('#edit_business_name').val(response.business_name);


                },
            });

        }

        $(document).on('submit', '#edit_supplier_form', function(event) {
            event.preventDefault();
            const role = "{{ config('fortify.guard') }}";
            let id = $('#id').val();
            let DataUpdate = new FormData($('#edit_supplier_form')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: `/${role}/courrier_panel/business/updateData/` + id,
                data: DataUpdate,
                contentType: false,
                processData: false,
                success: function(response) {

                    $('#exampleModaledit').modal('hide');
                     toastr.success("Category Update Successfully");

                },
            });
        });

        function ClearFunction() {
            $('#business_category').val('');

        }

</script>
{{-- --------------formDataAdd modal end -------------------- --}}
@endsection


