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
        .eyeIcon, .editIcon, .replyIcon, .deleteIcon, .pdfIcon, .printIcon {
            border: transparent;
            background: transparent;
            color: #6c757d;
            font-size: 20px;
        }
        .pdfIcon {
            color: #6658DD;
        }
        .printIcon {
            color: #F88443;
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
    tbody, td, tfoot, th, thead, tr{
        border-style : none !important;
    }
    .border-top{
        border-top: 1px solid grey!important;
    }
    .border-bottom{
        border-bottom: 1px solid grey!important;
    }
    .border-right{
        border-right: 1px solid grey!important;
    }
    .border-left{
        border-left: 1px solid grey!important;
    }
    #aViewModal table tbody tr td{
        padding: 0 5px !important;
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
                                <h4 class="header-title">Single Customer Order History</h4>
                            </div>
                        </div>
                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="datatable-buttons_length"><label
                                            class="form-label">Show <select name="datatable-buttons_length"
                                                aria-controls="datatable-buttons" class="form-select form-select-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                    <div class="dt-buttons btn-group flex-wrap"> <button
                                            class="btn btn-secondary buttons-copy buttons-html5 btn-light" tabindex="0"
                                            aria-controls="datatable-buttons" type="button"><span>Copy</span></button>
                                        <button class="btn btn-secondary buttons-print btn-light" tabindex="0"
                                            aria-controls="datatable-buttons" type="button"><span>Print</span></button>
                                        <button class="btn btn-secondary buttons-pdf buttons-html5 btn-light" tabindex="0"
                                            aria-controls="datatable-buttons" type="button"><span>PDF</span></button>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="datatable-buttons"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" style="overflow-x: auto;">
                                    <table id="datatable-buttons"
                                        class="table table-striped nowrap w-100 dataTable no-footer" role="grid"
                                        aria-describedby="datatable-buttons_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0"
                                                    aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                    aria-sort="descending"
                                                    aria-label="Customer ID: activate to sort column descending"
                                                    style="width: 152.672px;">Order Date & Time </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Customer Name: activate to sort column ascending"
                                                    style="width: 191.812px;">Order Invoice ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Total Order: activate to sort column ascending"
                                                    style="width: 141.594px;">Total Order QTY</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Total Commission: activate to sort column ascending"
                                                    style="width: 210px;">Order Amount</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Total Commission: activate to sort column ascending"
                                                    style="width: 210px;">Order Sales Commission</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending"
                                                    style="width: 132.953px;">Action</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                         
                                             @foreach($customerOrder as $order)
                                          
                                             <tr>
                                                 
                         @php
                         $orderid=$order->id;
                         $totalamount=$order->amount;
                         
                         /* all items for order */
                         
                          $order_items_all =App\Models\OrderItem::where('order_id',$order->id)->select('qty')->sum('qty');
                          
                          $agentcommission=App\Models\AgentCommission::where('order_id',$order->id)->first();
                         @endphp
                                                 
                                                 
                                                 <td>{{$order->order_date}}</td>
                                                 <td>{{$order->invoice_no}}</td>
                                                  <td>{{ $order_items_all }}</td>
                                                   <td>{{$totalamount}}</td>
                                                 <td>{{optional($agentcommission)->commission_amount}}</td>
                                                 <td><button class="eyeIcon123" style="background-color:green; color:white" 
                                                 data-bs-toggle="modal" data-bs-target="#aViewModal" value="{{$order->id}}">
                                                   Order Invoice
                                               </button></td>
                                             </tr>
                                             @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

    </div>
    
    <!-- supplier Product Invoice modal start-->
     <div class="modal fade" id="aViewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="check"></div>
        
        </div>
      </div>
    </div>
  </div>
  <!-- supplier Product Invoice modal end-->
@endsection

@section('script')
<script type = "text/JavaScript" src = " https://MomentJS.com/downloads/moment.js"></script>

         <script>
    $(document).on('click', '.eyeIcon123', function() {

        let order_id = $(this).val();

        var checkdata = ''
            , data = 0
            , data1 = 0;
        $("#check").empty();
        var kk = 0;
                var totaldiscount = 0;
                var vat = 0;
                var netamount = 0;
                var desc = 0;
        //  var current_date = new Date().toLocaleString("en-US", {timeZone: "Asia/Dhaka"});
        //  let current_date = new Date().toLocaleDateString();
        // let current_time = new Date().toLocaleTimeString();

        $('#aViewModal').modal('show');

       

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET"
            , url: `/{{ config('fortify.guard') }}/agent/single_order/history/next/ajax/${order_id}`
            , success: function(response) {
            var cc= 
            
               
                 checkdata += `                 <div class="row text-center justify-content-center">
            <div class="col-lg-12">
              <h3>BPP Shops</h3>
              <p>Alhaz Samssuddin Mansion (9thfloor),Moghbazar,
                New Eskaton, Ramna Dhaka-1217</p>
              <p>Office Phone: 01611815656</p>
              <p>BIN - 001181565-5566</p>
              <p>Mushak- 6.3</p>
              <h4 class="h-design">BPP Shops Cash Memo</h4>
              <div class="d-flex">
                <div class="col-lg-6 col-6">
                  <p>Invoice# : <span id="invoice">${response.invoice_no}</span></p>
                  <p>Bill Date: <span id="current_date"> ${response.created_at.slice(0,10)}</span></p> 
                </div>
                <div class="col-lg-6 col-6">
                  <p class="text-start">User : <span>{{Auth::user()->name}}</span></p>
                  <p class="text-start">Time : <span id="current_time">${response.created_at.slice(11)}</span></p> 
                </div>
              </div>
              <div class="table-responsive m-2">
                <table class="table">
                        <tbody>
                            <tr class="border-top border-left border-right">
                                <th>Sl.Article</th>
                                <th>Description</th>
                                <th colspan="3" class="text-end">UM</th>
                            </tr>

                            <tr class="border-bottom border-left border-right">
                                <th>Quantity</th>
                                <th>UnitPrice</th>
                                <th>Vat</th>
                                <th style = "padding: 0px 8px">Discount </th>
                                <th>Total(TK.)</th>
                            </tr>
                               `;
                

                $.each(response.order_items, function(key, value) {
                   


                    if (value.product.discount_price == 0 || value.product.discount_price == 0.00 || value.product.discount_price == '0' || value.product.discount_price == '0.00') {

                        data = parseFloat(value.product.discount_price)
                       
                    } else {
                        data = parseFloat(value.product.selling_price) - parseFloat(value.product.discount_price)
                    }
                     if (value.product.discount_price == 0 || value.product.discount_price == 0.00 || value.product.discount_price == '0' || value.product.discount_price == '0.00') {

                        discountprice = parseFloat(value.product.selling_price)
                       
                    } else {
                        discountprice = parseFloat(value.product.discount_price) 
                    }
                    data1 = parseFloat((value.product.selling_price - data) * value.qty) + parseFloat(value.product.vat);
                    console.log(data1);
                    checkdata += `<tr>
                                <td><b>${key+1}.<span id="p_code"></span></b>${value.product.product_code}</td>
                                <td id="p_des"></td>
                              </tr>
                            <tr>
                                <td id="qty">${value.qty}</td>
                                <td id="u_price"><span>${value.product.product_name}</span><br>${discountprice}</td>
                                <td id="vat">${value.product.vat}</td>
                                 <td >${data}</td>
                                 <td >${data1}</td>
                            </tr>`
                    desc=value.product.discount_price;
                    console.log(desc);
                     if (value.product.discount_price != 0 || value.product.discount_price != 0.00 || value.product.discount_price != '0' || value.product.discount_price != '0.00') {
                         
                          totaldiscount += parseFloat(value.qty) * parseFloat(data)
                    }
                     
                   
                    kk += parseFloat(value.product.selling_price * value.qty)
                    vat += parseFloat(value.product.vat)
                    netamount += parseFloat(data1)
                });
                console.log(totaldiscount);
                var cashpaid=parseFloat(response.cashPaid_show) + parseFloat(response.delivery_charge)
                console.log('cagsh'+cashpaid)

                checkdata += `</tbody>
                    </table>
              </div>
              <p
                style="display: flex; justify-content: end; font-weight: 700; border-bottom: 1px solid #000; margin: 8px">
                Bill Summary</p>
              <div class="row">
                  <div class="col-lg-7 col-md-6 col-8 text-end">
                    <p>Sub Total (Qty x Price) :</p>
                    <p>Total Discount :</p>
                    <p>Special  Discount :</p>
                    <p>Total Vat  :</p>
                    <p>Delivery Charge :</p>
                    <p>Net Amount :</p>
                  </div>
                  <div class="col-lg-5 col-md-6 col-4 text-end" >
                    <p id="subtotal_price">${kk}TK</p>
                    <p id="t_discount">(-) ${parseFloat(totaldiscount)}TK</p>
                    <p id="spe_discount">00.00TK</p>
                    <p id="t_vat">${vat}TK</p>
                    <p id="d_charge">${response.delivery_charge}</p>
                    <p id="net_amount">${netamount+parseFloat(response.delivery_charge)}TK</p>
                  </div>
                  <div><p style="border-bottom: 1px solid #000;"></p></div>
              </div>
              <div class="row">
                  <div class="col-lg-7 col-md-6 col-8 text-end">
                    <p style="font-weight: 700;">Net Payable Amount :</p>
                  </div>
                  <div class="col-lg-5 col-md-6 col-4 text-end">
                    <p style="font-weight: 700;" id="net_pamount"></p>
                    <p class="mt-1" style="font-weight: 700;">Payment Details</p>
                  </div>
                  <div><p style="border-bottom: 1px solid #000;"></p></div>
              </div>
              <div class="row">
                  <div class="col-lg-7 col-md-6 col-8 text-end">
                    <p style="font-weight: 700;">Cash Paid :</p>
                  </div>
                  <div class="col-lg-5 col-md-6 col-4 text-end">
                    <p style="font-weight: 700;">${netamount+parseFloat(response.delivery_charge)}TK</p>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-7 col-md-6 col-8 text-end">
                    <p style="font-weight: 700;">Change Amount :</p>
                  </div>
                  <div class="col-lg-5 col-md-6 col-4 text-end">
                    <p style="font-weight: 700;">00.00TK</p>
                  </div>
              </div>
              <div class="row">
                <h5 style="background-color: #b7b6b6; margin: 30px 0px; padding: 7px; width: 80%; margin-left: 10%;">
                  Call For Free Home Delivery-09678822444</h5>
              </div>
              <div class="row text-start">
                <h4>Recycle Offer :</h4>
                <ul style="padding: 0px 30px;">
                  <li>Recycle our shopping bag and get cash for each bag as discount on your purchase.</li>
                </ul>
                <h4>Return Policy :</h4>
                <ul style="padding: 0px 30px;">
                  <li>Please bring your receipt as proof of purchase for return of exchange within 3 days.</li>
                  <li>No pershable return or exchange after 3 hrs of purchase.</li>
                  <li>Money refund is not available.</li>
                </ul>
              </div>
              <div class="row lastpart">
                <h3>Share Your Opinion at customerservice@bppshop.com</h3>
                <p>*244578*</p>
                <p>***Thank You For Being With Us***</p>
              </div>
            </div>
          </div>`;
                $("#check").append(checkdata);
               // alada===============================================================================

               
            }


        });
    });

</script>

@endsection


