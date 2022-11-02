<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Download pdf -- barcode details</title>
</head>


<body style="width: 210mm">

       @for($i = 0; $i < $print_quantity; $i++)

       <table style="width: 210mm; margin-top: 80px;">
           <tr>
               <td>
                   <div class="deliverycode">
                    <div class="container">

                        <div class="card">
                            <div class="row" style="display:flex; justify-content: center; margin-top: 15px; margin-bottom: 15px;">
                                <div>
                                   <button type="button" class="btn btn-info" style="color: black;">Sales Order</button>
                                   <button type="button" class="btn btn-info" style="color: black;">Market Place</button>
                                </div>

                            </div>
                            <div class="row" style="display:flex; justify-content: center;">
                                <div >
                                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG(strval($order->id), 'C128', 4.0, 50, [1, 1, 1]) }}"
                                            alt="barcode" />
                                </div>
                            </div>

                            <div class="row" style="display:flex; justify-content: center;">
                               <div style="padding : 1rem"> <span>  Tracking Number : {{ $order->invoice_no }}  </span> </div>
                            </div>

                            <hr style="color: black">

                            @php
                                $setting = App\Models\SiteSetting::select('logo')->first();
                            @endphp

                            <div style="display: flex">
                                <div style="margin-top: 20px; width: 50%; display:flex; justify-content: center;">
                                    <img src={{ asset(optional($setting)->logo) }} width="90" height="40" alt="">
                                </div>


                                <div style="width: 50%;">
                                        <p> Cash On Delivery </p>
                                        <p> BDT {{ $order->amount }} </p>
                                </div>

                            </div>
                            <hr style="color: black">

                            @php
                                $qrCodeString = '';

                                foreach($order->orderItems as $data)
                                {
                                    $qrCodeString .= 'Name: '.$data->product->product_name. ".\n";
                                    if(isset($data->qty))
                                    {
                                        $qrCodeString .= 'Quantity: '.$data->qty. ".\n";
                                    }

                                    if(isset($data->size))
                                    {
                                        $qrCodeString .= 'Product size: '. $data->size. ".\n";

                                    }


                                    $qrCodeString .= "\n";

                                }
                                $qrCodeString .= 'Order_date:' .$order->order_date. ".\n" ;
                                $qrCodeString .='Total Amount: BDT '. $order->amount;

                            @endphp

                            <div style="display: flex;">
                                <div style="width:50%; margin-top: 10px;">
                                    <div style="display:flex; justify-content: center;">
                                        {{ QrCode::size(200)->generate($qrCodeString) }}
                                    </div>

                                </div>


                                <div style="width:50%;">
                                    <p> <b>Recipient :</b>  {{  $order->user->name }}</p>
                                    <p> Floor no : {{ $order->floor_no }}, Appartment no : {{$order->appartment_no  }},
                                        <br>
                                        {{ $order->street_address }},
                                        {{ $order->postCodes->postOffice }},
                                        {{ $order->district->name }}
                                    </p>
                                    <p>Phone : {{ $order->user->mobile }}</p>
                                    <p>Email : {{ $order->user->email }}</p>
                                </div>
                            </div>




                        </div>
                    </div>



                   </div>
               </td>
           </tr>
       </table>

       @endfor



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
