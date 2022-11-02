@extends('admin.admin_master')
@section('css')

    <style>
    * {
        font-family: 'Merriweather Sans', sans-serif;
        margin: 0;
    }

    .mb-3px {
        margin-bottom: 3px !important;
    }

    .mb-10px {
        margin-bottom: 10px !important;
    }

    .text-center {
        text-align: center;
    }

    .fw-bold {
        font-weight: bold;
    }

    .pos-receipt.main {
        width: 80mm;
        /* background-color: rgb(184, 214, 214);        */
    }

    .pos-receipt .header {
        text-align: center;
    }

    .pos-receipt h4,
    .pos-receipt p {
        margin: 0;
    }

    .pos-receipt h4 {
        font-size: 20px;
    }

    .pos-receipt p {
        font-size: 13px;
    }

    .pos-receipt .products th {
        font-size: 14px;
        text-align: left;
    }

    .pos-receipt .products td {
        font-size: 14px;
    }

    .pos-receipt .total td {
        font-size: 15px;
        text-align: right;
    }

    .pos-receipt .total td:first-child {
        width: 100%;
        padding-right: 20px;
    }

    .footer h5 {
        margin-top: 5px;
        font-size: 15px;
    }

    .footer ul {
        /* padding-left: 10px; */
        padding-left: 22px;
        font-size: 14px;
        margin-bottom: 20px;
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
                                                 <td><button class="btn btn-success">
                                    <a href="{{ route('role.agent_panel.single_order_history_ajax2', [config('fortify.guard'), $order->id]) }}"  title="Edit Data">Order Invoice </a>

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
      @php
        $info = App\Models\SiteSetting::get();
   
    @endphp
    <div class="pos-receipt main">
        <!-- ----------  Receipt Header ------------- -->
        @foreach ($info as $item)
            <div class="header">
                <h4 class="mb-3px">{{ $item->company_name }} POS</h4>
                <p>{{ $item->company_address }}

                </p>
                <p>{{ $item->phone_one }}</p>
                <p>BIN: {{ $item->phone_two }}</p>
                <p>BIN: {{ $item->email }}</p>
                <p>Mushak-6.3</p>
            </div>
        @endforeach
        @php
            $name = Auth::guard('admin')->user()->name;
        @endphp
        <div class="customer-bill mb-10px ">
            
          
            
            <p>Invoice: {{ $order->invoice_no}}</p>
            <p>Bill Date: {{ Carbon\Carbon::now() }}</p>
            -------------------------------
            <p class="text-center" style="font-weight:bold;">Customer  Address</p>
            <p>Customer Name: {{ optional($order->user)->name }}</p>
            <p>ID: {{ optional($order->user)->customer_id }}</p>
            <p>Address:Floor No: {{ $order->floor_no }},Apt No:{{ $order->appartment_no }}, {{ $order->street_address }},<br> {{ optional(optional($order)->postCodes)->postOffice}}</p>  
               
               <p> Mobile: {{ $order->user->mobile}}</p>                             
            
            
            @php
                date_default_timezone_set('Asia/Dhaka');
            @endphp
            <p>Print Time: {{ date('Y-m-d h:i:sa') }}</p>
        </div>

        <!-- ----------  Product Table  ------------- -->
        <div class="products">
            <table>
              <div class="border-1">

                                <tr>
                                      <th style="font-size: 10px">Sl.No</th>
                                    <th style="font-size: 10px;" >Name</th>
                                    
                                </tr>

                            <tr class="border-top border-left border-right" style="font-size: 6px">
                              
                                <th style="font-size: 10px; padding-left: 26px">       Color</th>
                                <th style="font-size: 10px; padding-left: 17px">       Size</th>
                                <th style="font-size: 10px">Weight</th>
                                <th style="font-size: 10px">QTY</th>
                                <th style="font-size: 10px">Price</th>
                                <th style="font-size: 10px">Total Price</th>
                            </tr>
                        </div>

                     
                     <div>
                           
                       
                        
                            <tr>
                                
                                <td  colspan="4"><span style="font-size: 10px"></span></td>
                            </tr>
                            
                            
                            <tr>
                               
                              <td style="font-size: 11px; padding-left:26px;"></td>
                              
                              <td style="font-size: 11px"></td>
                               <td style="font-size: 11px"> </td>
                              <td> </td>
                             <td style="font-size: 12px">
                                  
                                </td>
                                
                                 <td style="font-size: 12px">TK.</td>
                             </tr>
                         
                        </div>
                
            </table>
            <p></p>
        </div>
          -------------------------------
        <div class="total">
            <table>
                <tr>
                    <td>     Sub Total:</td>
               
                       <td>TK.</td>
                </tr>
                
                
                <tr>
                    <td>     Delivery Charge:</td>
               
                       <td> TK.</td>
                </tr>
                
                <tr class="payableamount">
                    <td>     Total: </td>
                    <td>TK.</td>
                </tr>
       
                
            </table>
            <p>---------------------------------------</p>
        </div>

        <!-- ----------  Return and Footer  ------------- -->
        <div class="footer">
            <h5>Return Policy:</h5>
            <ul>
                <li>Please bring your receipt as proof of purchase for return or exchange within 3 days</li>
                <li>Cash refund is discouraged</li>
            </ul>
            <p class="text-center">*** Thank you for Shopping with us ***</p>
        </div>

    </div>
            <!--<div id="check"></div>-->
        
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
            
               
                 checkdata += `
                 <div class="pos-receipt main">
        <!-- ----------  Receipt Header ------------- -->
      
            <div class="header">
                <h4 class="mb-3px"> POS</h4>
                <p>

                </p>
                <p></p>
                <p>BIN: </p>
                <p>BIN: </p>
                <p>Mushak-6.3</p>
            </div>

        <div class="customer-bill mb-10px ">
            
          
            
            <p>Invoice: </p>
            <p>Bill Date: </p>
            -------------------------------
            <p class="text-center" style="font-weight:bold;">Customer  Address</p>
            <p>Customer Name: </p>
            <p>ID: </p>
            <p>Address:Floor No: ,Apt No:, ,<br> </p>  
               
               <p> Mobile: </p>                             
            
            
        
            <p>Print Time: </p>
        </div>

        <!-- ----------  Product Table  ------------- -->
        <div class="products">
            <table>
              <div class="border-1">

                                <tr>
                                      <th style="font-size: 10px">Sl.No</th>
                                    <th style="font-size: 10px;" >Name</th>
                                    
                                </tr>

                            <tr class="border-top border-left border-right" style="font-size: 6px">
                              
                                <th style="font-size: 10px; padding-left: 26px">       Color</th>
                                <th style="font-size: 10px; padding-left: 17px">       Size</th>
                                <th style="font-size: 10px">Weight</th>
                                <th style="font-size: 10px">QTY</th>
                                <th style="font-size: 10px">Price</th>
                                <th style="font-size: 10px">Total Price</th>
                            </tr>
                        </div>
                     <div>
                            <tr>
                                
                                <td  colspan="4"><span style="font-size: 10px"></span></td>
                            </tr>
                            
                            
                            <tr>
                               
                              <td style="font-size: 11px; padding-left:26px;"></td>
                              
                              <td style="font-size: 11px"></td>
                               <td style="font-size: 11px"></td>
                              <td> </td>
                             <td style="font-size: 12px">
                                
                                </td>
                                
                                 <td style="font-size: 12px">TK.</td>
                             </tr>
                          
                        </div>
                         </table>
            <p></p>
        </div>
          -------------------------------
        <div class="total">
            <table>
                <tr>
                    <td>     Sub Total:</td>
               
                       <td>TK.</td>
                </tr>
                
                
                <tr>
                    <td>     Delivery Charge:</td>
               
                       <td>  TK.</td>
                </tr>
                
                <tr class="payableamount">
                    <td>     Total: </td>
                    <td>TK.</td>
                </tr>
       
                
            </table>
            <p>---------------------------------------</p>
        </div>

        <!-- ----------  Return and Footer  ------------- -->
        <div class="footer">
            <h5>Return Policy:</h5>
            <ul>
                <li>Please bring your receipt as proof of purchase for return or exchange within 3 days</li>
                <li>Cash refund is discouraged</li>
            </ul>
            <p class="text-center">*** Thank you for Shopping with us ***</p>
        </div>
   </div>
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

        //         checkdata += `</tbody>
        //             </table>
        //       </div>
        //       <p
        //         style="display: flex; justify-content: end; font-weight: 700; border-bottom: 1px solid #000; margin: 8px">
        //         Bill Summary</p>
        //       <div class="row">
        //           <div class="col-lg-7 col-md-6 col-8 text-end">
        //             <p>Sub Total (Qty x Price) :</p>
        //             <p>Total Discount :</p>
        //             <p>Special  Discount :</p>
        //             <p>Total Vat  :</p>
        //             <p>Delivery Charge :</p>
        //             <p>Net Amount :</p>
        //           </div>
        //           <div class="col-lg-5 col-md-6 col-4 text-end" >
        //             <p id="subtotal_price">${kk}TK</p>
        //             <p id="t_discount">(-) ${parseFloat(totaldiscount)}TK</p>
        //             <p id="spe_discount">00.00TK</p>
        //             <p id="t_vat">${vat}TK</p>
        //             <p id="d_charge">${response.delivery_charge}</p>
        //             <p id="net_amount">${netamount+parseFloat(response.delivery_charge)}TK</p>
        //           </div>
        //           <div><p style="border-bottom: 1px solid #000;"></p></div>
        //       </div>
        //       <div class="row">
        //           <div class="col-lg-7 col-md-6 col-8 text-end">
        //             <p style="font-weight: 700;">Net Payable Amount :</p>
        //           </div>
        //           <div class="col-lg-5 col-md-6 col-4 text-end">
        //             <p style="font-weight: 700;" id="net_pamount"></p>
        //             <p class="mt-1" style="font-weight: 700;">Payment Details</p>
        //           </div>
        //           <div><p style="border-bottom: 1px solid #000;"></p></div>
        //       </div>
        //       <div class="row">
        //           <div class="col-lg-7 col-md-6 col-8 text-end">
        //             <p style="font-weight: 700;">Cash Paid :</p>
        //           </div>
        //           <div class="col-lg-5 col-md-6 col-4 text-end">
        //             <p style="font-weight: 700;">${netamount+parseFloat(response.delivery_charge)}TK</p>
        //           </div>
        //       </div>
        //       <div class="row">
        //           <div class="col-lg-7 col-md-6 col-8 text-end">
        //             <p style="font-weight: 700;">Change Amount :</p>
        //           </div>
        //           <div class="col-lg-5 col-md-6 col-4 text-end">
        //             <p style="font-weight: 700;">00.00TK</p>
        //           </div>
        //       </div>
        //       <div class="row">
        //         <h5 style="background-color: #b7b6b6; margin: 30px 0px; padding: 7px; width: 80%; margin-left: 10%;">
        //           Call For Free Home Delivery-09678822444</h5>
        //       </div>
        //       <div class="row text-start">
        //         <h4>Recycle Offer :</h4>
        //         <ul style="padding: 0px 30px;">
        //           <li>Recycle our shopping bag and get cash for each bag as discount on your purchase.</li>
        //         </ul>
        //         <h4>Return Policy :</h4>
        //         <ul style="padding: 0px 30px;">
        //           <li>Please bring your receipt as proof of purchase for return of exchange within 3 days.</li>
        //           <li>No pershable return or exchange after 3 hrs of purchase.</li>
        //           <li>Money refund is not available.</li>
        //         </ul>
        //       </div>
        //       <div class="row lastpart">
        //         <h3>Share Your Opinion at customerservice@bppshop.com</h3>
        //         <p>*244578*</p>
        //         <p>***Thank You For Being With Us***</p>
        //       </div>
        //     </div>
        //   </div>`;
                $("#check").append(checkdata);
               // alada===============================================================================

               
            }


        });
    });

</script>

@endsection


