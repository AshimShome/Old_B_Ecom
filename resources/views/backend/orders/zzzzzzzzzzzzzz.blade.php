   <style>
    .invoice-content {
         border: 2px solid #e5a8344f; 
         border-radius: 5px;
         font-family: Ubuntu;
    }
    p {
        margin: 0;
    }
    .billing {
        margin: 15px;
        font-size: 16px;
    }
     
    hr {
        color: #e5a8344f;
        margin: 20px 15px 20px 15px;
    }
    .bill-to {
        background: balck;
    }
    .invoice-body {
        background-color: #ffbf99; 
        border-radius: 10px;
        transform: translate(-38px, 0px);
        print-color-adjust: exact;
    }
    .table-body {
        margin: 40px 20px 0 20px;
    }
    .t-head {
        background-color: #ffbf99;
        color: fff;
    }
    .table {
        margin-bottom: 8px;
        print-color-adjust: exact;
    }
    table th:first-child{
      border-radius:10px 0 0 10px;
    }
    table th:last-child{
      border-radius:0 10px 10px 0;
    }
    tr.no-bottom-border td {
      border-bottom: none
    }
    #subtotal {
        padding-bottom: 5px;
         
    }
    #total {
        padding-top: 0px;
        
    }
    #wrapper{
        height: 0px !important;
    }
    #bill{
        font-weight:bold;
        font-size: 20px;
        color: black;
    }
    #bpp{
        font-size: 20px;
        color: black;
        font-weight:bold;
    }
    .img{
        padding-left: 70px;
        margin-top: 110px;
    }
    .details{
        font-size: 18px;
        color: black;
    }
    #invbody {
        font-weight: bold;
        color: black;
    }
    #inv{
        color: fff;
    }
    .totalbpp {
        font-weight: bold;
        color: black;
    }
    @media(max-width: 1394px){
        .invoice-body{
            width: 75% !important;
        }
        
    }
    @media(max-width: 811px){
        .invoice-body{
             width: 75% !important;
        }
        
    }
    @media(min-width: 280px){
        .invoice-body{
            /*width: 100% !important;*/
             
        }
         
    }
 
</style>
   
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-light mb-2 justifi-content-end" onclick="printpage()" id="printpagebutton"><i class="fa fa-print" style="font-size:28px;color:red">Print</i></button>
                        <div class="invoice-content">
                            <div class="row invoice mt-2">
                                <div class="col-lg-6 col-md-6 col-sm-6 invioce-body">
                                    @foreach($bppshops as $bppshop)
                                    <p class="billing"><span id="bpp">BPP SHOPS</span><br>{{$bppshop->company_address}}<br>Email: {{$bppshop->email}}</p>
                                    @endforeach
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 m-auto">
                                    <p class="d-flex justify-content-end">
                                        @php
                                        $setting = App\Models\SiteSetting::select('logo')->first();
                                        @endphp
                                        <img src="{{asset(optional($setting)->logo)}}" alt="bpp-shops image">
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 col-sm-6 invioce-body">
                                    <p class="billing"><span id="bill">Customer Details:</span><br>{{ optional($order->user)->name }}<br>{{  optional($order)->street_address }}<br>{{ optional($order->user)->email }}</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 invoice-wrapper">
                                    <div class="row invoice-body d-flex justify-content-between w-50 ms-auto p-3 mt-2">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            
                                            <p id="invbody">Invoice#</p>
                                            <p id="invbody">Order Date:</p>
                                            
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-end">
                                            <p id="inv">{{$order->invoice_no}}</p>
                                            <p id="inv">{{Carbon\Carbon::parse($order->order_date)->format('j F Y')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table-body mb-5">
                                <table class="table">
                                    <thead class="t-head">
                                    <tr>
                                      <th scope="col">Item</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">QTY</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $sub_total = 0;
                                    @endphp
                                    
                                    @foreach($orderItem as $orderItems)
                                        @php
                                        $sub_total += optional($orderItems->product)->selling_price * optional($orderItems)->qty;
                                        @endphp
                                    @endforeach
                                    
                                    @foreach($orderItem as $item)
                                    <tr>
                                      <td scope="row">{{ optional($item->product)->product_name }}</td>
                                      <td>{!! optional($item->product)->product_descp !!}</td>
                                      <td>{{ optional($item)->qty }}</td>
                                      <td>{{optional($item->product)->selling_price}}TK.</td>
                                      <td>{{optional($item->product)->selling_price * optional($item)->qty }}.00TK.</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="no-bottom-border">
                                          <td colspan="2" id="subtotal" class="text-end"></td>
                                          <td colspan="2" id="subtotal" class="text-start">Sub Total:</td>
                                          <td id="subtotal"> {{$sub_total }}.00TK.</td>
                                        </tr>
                                        <tr class="no-bottom-border">
                                          <td colspan="2" id="total" class="text-end"></td>
                                          <td colspan="2" id="total" class="text-start">Delivery Charge:</td>
                                          <td id="total"> {{$item->order->delivery_charge}}TK.</td>
                                        </tr>
                                        <tr class="no-bottom-border">
                                          <td colspan="2" id="total" class="text-end"></td>
                                          <td colspan="2" id="total" class="text-start totalbpp">Total:</td>
                                          <td id="total" class="totalbpp"> {{ $sub_total + optional($item->order)->delivery_charge}}.00TK.</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row mb-4">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                                    <p class="d-flex justify-content-center">
                                        <img src="{{ asset('frontend/assets/images/barcode.jpg')}}" alt="bpp-shops image" height="200px" width="300px">
                                    </p>
                                     
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-7">
                                    <p class="d-flex justify-content-start img">
                                        <img src="{{ asset('frontend/assets/images/bpp_shops2.png')}}" alt="bpp-shops image" height="80px" width="80px">
                                    </p>
                                    <p class="text-start pt-1 details">Invoice Powered By BPP Shops</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </div> <!-- container -->
    
    
    
    
    
    
    
    
    
    
    
    
    <script>
    function printpage(){
        var printButton = document.getElementById("printpagebutton");
         printButton.style.visibility = 'hidden';
         window.print();
         printButton.style.visibility = 'visible';
    }
</script>
     
     
     