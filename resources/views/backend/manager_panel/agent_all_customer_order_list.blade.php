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

    #aViewModal .h-design {
      display: flex;
      flex-direction: row;
    }

    #aViewModal .h-design:before,
    .h-design:after {
      content: "";
      flex: 1 1;
      border: 1px dashed #000;
      margin: auto;
    }

    #aViewModal .h-design:before {
      margin-right: 10px
    }

    #aViewModal .h-design:after {
      margin-left: 10px
    }

    #aViewModal p {
      margin: 0px;
    }

    #aViewModal .table th {
      padding: 0px;
    }

    #mViewModal .table>thead tr,
    tbody tr {
      font-size: 14px;
    }

    #aViewModal .table>:not(caption)>*>* {
      padding: 0px;
    }

    #aViewModal .lastpart h3 {
      font-weight: 500;
      font-size: 19px;
      line-height: 18px;
      width: 80%;
      margin-left: 10%;
      color: #000000;
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
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-lg-flex justify-content-lg-between mb-2">
                    <div class="col-lg-6 col-md-6 col-12">
                      <h4 class="header-title">Order History</h4>
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
                        <th>Order Invoice</th>
                        <!--<th>Order ID</th>-->
                        <!--<th>Total Order</th>-->
                        <!--<th>Pay Amount</th>-->
                        <!--<th>Sales Commission</th>-->
                        <!--<th>Action</th>-->
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$all_order->invoice_no}}</td>
                        <!--<td># WS123</td>-->
                        <!--<td>12</td>-->
                        <!--<td>৳ 49,000</td>-->
                        <!--<td>৳ 1,500</td>-->
                        <!--<td class="d-flex gap-2">-->
                        <!--  <button class="eyeIcon" data-bs-toggle="modal" data-bs-target="#aViewModal"><i-->
                        <!--      class="fa fa-solid fa-eye"></i></button>-->
                        <!--  <button class="pdfIcon" data-bs-toggle="modal" data-bs-target="#aPdfModal"><i-->
                        <!--      class="far fa-file-pdf"></i></button>-->
                        <!--  <button class="printIcon" data-bs-toggle="modal" data-bs-target="#aPrintModal"><i-->
                        <!--      class="fas fa-print" aria-hidden="true"></i></button>-->
                        <!--</td>-->
                      </tr>
                      <!--<tr>-->
                      <!--  <td>10 Feb, 2023</td>-->
                      <!--  <td># WS123</td>-->
                      <!--  <td>12</td>-->
                      <!--  <td>৳ 49,000</td>-->
                      <!--  <td>৳ 1,500</td>-->
                      <!--  <td class="d-flex gap-2">-->
                      <!--    <button class="eyeIcon" data-bs-toggle="modal" data-bs-target="#aViewModal"><i-->
                      <!--        class="fa fa-solid fa-eye"></i></button>-->
                      <!--    <button class="pdfIcon" data-bs-toggle="modal" data-bs-target="#aPdfModal"><i-->
                      <!--        class="far fa-file-pdf"></i></button>-->
                      <!--    <button class="printIcon" data-bs-toggle="modal" data-bs-target="#aPrintModal"><i-->
                      <!--        class="fas fa-print" aria-hidden="true"></i></button>-->
                      <!--  </td>-->
                      <!--</tr>-->
                    
                     
                    </tbody>
                  </table>

                </div> <!-- end card body-->
              </div> <!-- end card -->
            </div><!-- end col-->
          </div>
          <!-- end row-->

        </div> <!-- container -->    
          
          
          
          
          
  @endsection
@section('script')
@endsection
