<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BPPSHOPS</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Merriweather+Sans:wght@400;500;600;700&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>
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

<body>
 
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
                           
                        @foreach ($orderItem as $key => $product)
                        
                            <tr>
                                
                                <td  colspan="4"><span style="font-size: 10px"> {{$key+1}}.{{$product->product->product_name}}</span></td>
                            </tr>
                            
                            
                            <tr>
                               
                              <td style="font-size: 11px; padding-left:26px;">        {{$product->color}}</td>
                              
                              <td style="font-size: 11px">        {{$product->size}}</td>
                               <td style="font-size: 11px"> {{  optional($product->product)->unit}}</td>
                              <td>  {{  $product->qty}}</td>
                             <td style="font-size: 12px">
                                    @if($product->product->discount_price == 0)
                                    {{$product->product->selling_price}}
                                   @else
                                    {{$product->product->discount_price}}
                                   @endif
                                </td>
                                
                                 <td style="font-size: 12px">{{$product->price}}TK.</td>
                             </tr>
                            @endforeach
                        </div>
                
            </table>
            <p></p>
        </div>
          -------------------------------
        <div class="total">
            <table>
                <tr>
                    <td>     Sub Total:</td>
               
                       <td>     {{$order->amount}}TK.</td>

                </tr>
                
                
                <tr>
                    <td>     Delivery Charge:</td>
               
                       <td>     {{$order->delivery_charge}}TK.</td>
                </tr>
                
                <tr class="payableamount">
                    <td>     Total: </td>
                    <td>     {{$order->amount+$order->delivery_charge}}TK.</td>
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
    
    <script type="text/javascript">
    //   var myWindow = window.open('','','width=200,height=100')
    window.print();
        </script>
    
</body>

</html>
