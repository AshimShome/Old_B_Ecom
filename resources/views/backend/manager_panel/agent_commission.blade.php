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
    table tfoot{
      border: none;
      border-color: transparent;
    }
    table tfoot td{
      font-size: 15px;
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
  </style>
@endsection
@section('main-content')
<!------------------------------------------------------------------Payamount History Start------------------------------------------------------->
 <div class="modal fade" id="Agent_Payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <form id="agentpaymentform">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Payment Statment</h4>
                        <button type="button" id="clickData" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="singleSupplierProductGet">
                        </div>
                        <table class="table" style="border: 1px solid #ced4da;">
                            <thead>
                                <tr class="text-center" style="border-bottom: 1px solid #ced4da; background: #F3F7F9;">
                                     <th scope="col">Total Withdrawal Amount
                                        <span class="text-danger">*</span>
                                    </th>
                                     <th scope="col">Withdrawal Amount
                                        <span class="text-danger">*</span>
                                    </th>
                                    <th scope="col">Due Amount</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr id="singleSupplierProductGets" class="text-center">
                                       <td>
                                        <input class="prdQty  total_withdrawal_amount1" type="text" value="" readonly name="total_withdrawal_amount" id="total_withdrawal_amountget" min="1" placeholder="0.00 TK.">
                                        
                                        <input class="prdQty " type="hidden" name="old_products_purchase_price" id="old_products_purchase_price" min="1"placeholder="0.00 TK.">
                                        <span class="text-danger error-text return_qty_error "></span>
                                    </td>
                                   
                                     <td>
                                        <input class="prdQty withdrawal_amount1" style="" type="number" name="withdrawal_amount" id="withdrawal_amountget"  min="1"
                                            placeholder="0.00 TK." value="">
                                        <span class="text-danger error-text return_qty_error "></span>
                                    </td>
                                  
                                   
                                    <td><input type="text" name="dueamount" id="dueamount1" class="dueget"
                                            style="border:none; background:transparent; width:100px; text-align:center;"
                                            readonly  placeholder="0.00">
                                            <span class="text-danger due_amount_error" ></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Payment Submit</button>
                    </div>
                </div>
            </form>
        </div>
</div>

<!------------------------------------------------------------------Payamount History End------------------------------------------------------->
<!------------------------------------------------------------------Commission History Start------------------------------------------------------->

<!-- Modal view -->
<div class="modal fade" id="Agent_commsstion_history" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product wise Payment Report</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <table id="datatable-buttons" class="table table-striped">
                    <thead >
                      <tr class="">
                        <th>Payment Date</th>
                        <th>Agent Name</th>
                         <th>Withdrawal Amount</th>
                        <th>Due Amount</th>
                    
                      </tr>
                    </thead>
                    <tbody id="dataview">
                        
                            
                        
                       
                       
                    </tbody>
                  </table>
      </div>
    </div>
  </div>
</div>
<!------------------------------------------------------------------Commission History ENd------------------------------------------------------->
 <!-- Start Content-->
 <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="d-lg-flex justify-content-lg-between mb-2">
              <div class="col-lg-6 col-md-6 col-12">
                <h4 class="header-title">Agent Commission</h4>
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
                  <th>Agent ID</th>
                  <th>Agent Name</th>
                  <th>Total Sale Amount </th>
                   <th>Commission Rate</th>
                  <th>Total Commission Amount</th>
                  <th>Commission Withdraw Amount </th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 
                  @foreach($agentpanel as $agent)
                   <tr>
                    @php
                    $agentcommission = DB::table('agent_commissions')
                    ->where('agent_id',$agent->id)
                    ->select('agent_id','commission_rate',DB::raw("SUM(commission_amount) as commission_amount"),DB::raw("SUM(total_sale_amount) as total_sale_amount"))
                    ->groupBy('agent_id')
                    ->first();
                    $agentpayment=App\Models\AgentPaymentStatement::where('agent_id',$agent->id)->orderBy('id','DESC')->first();
                    @endphp
                  <td>{{optional($agent)->id}}</td>
                  <td>{{optional($agent)->name}}</td>
                  <td> {{optional($agentcommission)->total_sale_amount}}TK.</td>
                  <td>{{ optional($agentcommission)->commission_rate}}%</td>
                  <td>{{optional($agentcommission)->commission_amount}}TK.</td>
                    <td>{{optional($agentpayment)->total_withdrawal_amount}} TK.</td>
                    <td>
     <button data-bs-toggle="modal" value="{{$agent->id}}" data-get="{{optional($agentcommission)->commission_amount}}"  data-bs-target="#Agent_Payment" type="button" class="btn btn-success waves-effect waves-light mb-2 me-2 editBtn dataget"><iclass="fas fa-plus pe-2"></i> Pay Amount</button>
                  
                    <button data-bs-toggle="modal" id="data" value="{{$agent->id}}" data-bs-target="#Agent_commsstion_history" type="button" class="btn btn-success waves-effect waves-light mb-2 me-2 view"><i class="fas fa-plus pe-2"></i>Commission History</button>
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
  @endsection
@section('script')
<script>
                            
</script>

    <!-- ------------------------------------------------------------for get---------------------------------------------------------->
    <script>
    var agentId = 0;
          $(document).on('click', '.editBtn', function() {

                var brand_id = $(this).val();
                agentId = brand_id;
         
                $('#total_withdrawal_amountget').val('');
                 $('#withdrawal_amountget').val('');
                  $('.dueget').val('');
             
              $('#Agent_Payment').modal('show');
                $.ajax({
                    type: "GET",
                    url: `/{{ config('fortify.guard') }}/manager/agent/commission/payment/view/data/${brand_id}`,
                    success: function(response) {
                        console.log(response.viewdata);
                        if(response.viewdata == 0)
                        {
                            $('#total_withdrawal_amountget').val(0.00);
                             var totalwithdraw=0.00;
                            
                        }
                        else{
                         $('#total_withdrawal_amountget').val(response.viewdata.total_withdrawal_amount);
                         var totalwithdraw=response.viewdata.total_withdrawal_amount?response.viewdata.total_withdrawal_amount:0.00;
                        }

                         
                                
                                console.log(totalwithdraw);
                                
                                var commissionamount=response.agentcommission?response.agentcommission:0.00;
                                 
                                var leftamount=parseFloat(commissionamount-totalwithdraw);
                                var withdrawalamount= $('.withdrawal_amount1').val();
                               var fornew = commissionamount- totalwithdraw;
                                $('.dueget').val(fornew);
                                $('.withdrawal_amount1').on('keyup',function(){
                                    $('.dueget').empty();
                                   var withdrawalamount= $('.withdrawal_amount1').val();
                                   var totalwithdraw=response.viewdata.total_withdrawal_amount?response.viewdata.total_withdrawal_amount:0.00;
                                     var due_amount=commissionamount - (parseFloat(totalwithdraw)+parseFloat(withdrawalamount));
                                    $('.dueget').val(due_amount);
                                   
                                  if(due_amount < 0)
                                  {
                                      $('.due_amount_error').text("You dont have this money in your balance.");
                                  }
                                  
                                  else{
                                      
                                      $('.due_amount_error').empty();
                                      
                                      
                                  }
                                });
                    }
                   
                })
            });
    </script>
    <!-- ------------------------------------------------------------for get---------------------------------------------------------->
<script>
    //Add Submit
            $(document).on('submit', '#agentpaymentform', function(e) {
                 
                e.preventDefault();
               
                let formData = new FormData($('#agentpaymentform')[0]);
                $.ajax({
                    type: "POST",
                    url: `/{{ config('fortify.guard') }}/manager/agent/commission/payment/${agentId}`,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        if (response.status == 400) {
                            // $('#due_amount_error').text(response.errors.dueamount);
                            // $('#error_image').text(response.errors.brand_image);
                        } else {
                           
                            toastr.success(response.message);
                            $('#Agent_Payment').modal('hide');
                            location.reload();
                        }
                    }
                });
        }); 
        
        // for view
         $(document).on('click', '.view', function() {
              $("#dataview").empty();
                console.log("okk");
                var get_id = $(this).val();
                console.log(get_id);
                 $('#date').empty();
                  $('#name').empty();
                   $('#withdrawamount').empty();
                   $('#dueamount_get').empty();
                  
                $('#Agent_commsstion_history').modal('show');
                $.ajax({
                    type: "GET",
                    url: `/{{ config('fortify.guard') }}/manager/agent/commission/payment/view/${get_id}`,
                    success: function(response) {
                        var data = '';
                       $.each(response.paymentview1, function(key, value) {
                      
                        data =`
                        <tr>
                      
                          <td> <span id="date">  ${value.created_at} </span></td>
                             <td><span id="name"></span>${value.agentpanel.name} </td>
                             <td><span id="withdrawamount"></span>${value.withdrawal_amount} TK. </td>
                             <td><span id="dueamount_get"></span>${value.due_amount} TK. </td>
                      </tr>
                        `;
                        
                        console.log(data);
                         $("#dataview").append(data);
                        });
                    }
                })
            });
    
    
</script>


@endsection
