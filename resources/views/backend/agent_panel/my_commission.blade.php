@extends('admin.admin_master') @section('css')
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
    
    .date {
        margin-top: 130px;
    }
    
    table tfoot {
        border: none;
        border-color: transparent;
    }
    
    table tfoot td {
        font-size: 15px;
    }
    
    .agentInfo p {
        margin-bottom: 0.3rem !important;
    }
    
    #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
        width: 100%;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-top: 50px;
    }
    
    #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
        position: absolute;
        right: 20px;
        top: 198px;
    }
    
    @media (max-width: 767px) {
        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
            justify-content: center;
            margin-top: 30px;
        }
        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
            right: 0;
            left: 0;
            margin-top: 10px;
        }
    }
    
    @media (max-width: 991px) {
        .date {
            margin-top: 0px;
        }
    }
    
    @media (max-width: 576px) {
        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
            justify-content: center;
            margin-top: 50px;
        }
        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
            right: 0;
            left: 0;
            margin-top: 30px;
        }
    }
    
    @media (max-width: 320px) {
        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(1) {
            justify-content: center;
            margin-top: 70px;
        }
        #datatable-buttons_wrapper .row:nth-child(1)>.col-sm-12:nth-child(2) .dataTables_filter {
            right: 0;
            left: 0;
            margin-top: 120px;
        }
    }
</style>
@endsection @section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex justify-content-lg-between mb-2">
                    </div>
                     @php
                     $agent = Auth::guard('admin')->user()->agent_id;
                                        
  
                     $customerOrderHistoryGet = App\Models\User::with('customerOrderHistory')->withCount('customerOrderHistory')->where('agent_id',$agent)->get();
                     $totalorderofagent=$customerOrderHistoryGet->sum('customer_order_history_count');
                     
                     
                     $OrderHistorytotalamount = App\Models\User::with('customerOrderHistory')->where('agent_id',$agent)->withSum('customerOrderHistory','amount')->get();
               
                     
                     $totalamount=$OrderHistorytotalamount->sum('customer_order_history_sum_amount');
                     
                    $qty= App\Models\User::with('orderItemsthrough')->where('agent_id',$agent)->withSum('orderItemsthrough','qty')->get();
                    $agenttotalqty=$qty->sum('order_itemsthrough_sum_qty');
                    $order=App\Models\Order::where('agent_id',$agent)->first();
                      $dd=App\Models\AgentCommission::where('agent_id',$agent)->first();
                    if($dd !=null)
                    {
                     $totalsalescommission=App\Models\AgentCommission::where('agent_id',$agent)->first();
                    $totalsalescommission123=App\Models\User::where('agent_id',$agent)->where('agent_id',$totalsalescommission->agent_id)->with('agentcommission')->withSum('agentcommission','commission_amount')->first();
                    }
                    else
                    {
                    $totalsalescommission123 =0;
                    }
                       $cc=App\Models\AgentPaymentStatement::where('agent_id',$agent)->first();
                  if($cc !=null )
                    {
     
                       $paymentstatement=App\Models\AgentPaymentStatement::where('agent_id',$agent)->first();
                        $totalwithdrawamount=App\Models\User::where('agent_id',$agent)->where('agent_id',$paymentstatement->agent_id)
                        ->with(['agentpaymnent'=>function($query){$query->latest()->first(); }])->first(); 
                        
                        }   
                        
                      else{
                      $paymentstatement=0;
                      $totalwithdrawamount=0;
                      }
                    

                 @endphp
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Total History</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-primary mb-0" style="font-size: 20px">
                                                <thead>
                                                    <tr>
                                                       <th>Total Order </th>
                                                        <th> Total Sales Qty </th>
                                                        <th> Total Sales Amount </th>
                                                        <th> Total Sales Commission</th>
                                                        <th> Total Deposit Amount </th>
                                                        <th> Total Withdraw Amount </th>
                                                        <th> Total Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> {{$totalorderofagent}}</td>
                                                        <td>{{$agenttotalqty}} </td>
                                                        <td>{{$totalamount}} Tk.</td>
                                                        <td> {{optional($totalsalescommission123)->agentcommission_sum_commission_amount}} Tk.</td>
                                                        <td>NOTHING</td>
                                                       
                                                        <td> {{optional(optional($totalwithdrawamount)->agentpaymnent)->total_withdrawal_amount }}Tk.</td>
                                                   
                                                        <td>  {{optional(optional($totalwithdrawamount)->agentpaymnent)->due_amount }}tk</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- end .table-responsive-->
                       
                    <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                <h4 class="header-title text-center text-danger">All Payment History</h4>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="datatable-buttons_length">
                                    <label class="form-label">Show
                    <select
                      name="datatable-buttons_length"
                      aria-controls="datatable-buttons"
                      class="form-select form-select-sm"
                    >
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                    entries</label
                  >
                </div>
                <div class="dt-buttons btn-group flex-wrap">
                  <button
                    class="btn btn-secondary buttons-copy buttons-html5 btn-light"
                    tabindex="0"
                    aria-controls="datatable-buttons"
                    type="button"
                  >
                    <span>Copy</span>
                  </button>
                  <button
                    class="btn btn-secondary buttons-print btn-light"
                    tabindex="0"
                    aria-controls="datatable-buttons"
                    type="button"
                  >
                    <span>Print</span>
                  </button>
                  <button
                    class="btn btn-secondary buttons-pdf buttons-html5 btn-light"
                    tabindex="0"
                    aria-controls="datatable-buttons"
                    type="button"
                  >
                    <span>PDF</span>
                  </button>
                </div>
              </div>
              
              
              
              
              
              <div class="col-sm-12 col-md-6">
                <div id="datatable-buttons_filter" class="dataTables_filter">
                  <label
                    >Search:<input
                      type="search"
                      class="form-control form-control-sm"
                      placeholder=""
                      aria-controls="datatable-buttons"
                  /></label>
                                </div>
                            </div>
                        </div>
                        <!-- Total Status status-->

                        <!-- Total Status End-->
             
                        <div class="row">
                            
                            <div class="col-sm-12" style="overflow-x: auto">
                                <table id="datatable-buttons" class="table table-striped nowrap w-100 dataTable" role="grid" aria-describedby="datatable-buttons_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="descending" aria-label="Date: activate to sort column descending" style="width: 118.781px">
                                                Payment Date
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Order ID: activate to sort column ascending" style="width: 97.6719px">
                                                Withdraw Amount
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Deposit Amount: activate to sort column ascending" style="width: 175.031px">
                                                Deposit Amount
                                            </th>
                                        
                                            <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Remaining Balance: activate to sort column ascending" style="width: 202.156px">
                                                 Balance
                                            </th>
                                        </tr>
                                        <!--Remaining-->
                                    </thead>
                                     <tbody>
                                     @foreach($paymentstatementget as $payment)

                                        <tr class="odd">
                                           
                                            <td class="sorting_1">
                                               {{$payment->created_at}}
                                            </td>
                                            <td>{{$payment->withdrawal_amount}}</td>
                                             <td>nothing</td>
                                              <td>{{$payment->due_amount}}</td>
                                          
                                        </tr>
                                        @endforeach
                                     
                                    </tbody>
                                 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->
</div>
@endsection