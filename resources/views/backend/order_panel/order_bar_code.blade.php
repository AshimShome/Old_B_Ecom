<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mukta&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <style>
    .verticalLine1 {
      border-right: 3px solid #000;
    }
    .readyShippedInvoice1{
      width: 400px;
      height: 380px;
  
      border: 1px solid #000;
      margin-right:10px;
    }
    .left-side .title{
      font-family: 'Montserrat';
      font-size:20px;
      color: black;
      margin-bottom: 5px;
    }
    .left-side h4{
      font-family: 'Montserrat';
      font-weight: 600;
      font-size: 20px;
      color: black;
      margin-bottom: 5px;
    }
    .right-side .title{
      font-family: 'Montserrat';
      font-weight: 600;
      font-size: 14px;
      color: black;
      
      margin-bottom: 5px;
    }
    .right-side h4{
      font-family: 'Montserrat';
      font-weight: 700;
      font-size: 14px;
      color: black;
      margin-bottom: 5px;
    }
    .right-side .price{
      font-family: 'Montserrat';
      font-weight: 700;
      font-size: 14px;
      color: black;
      margin-bottom: 5px;
    }
    hr{
      width: 75px;
      margin: 10px;
    }
    .line{
      border-bottom: 2px solid #000;
      width: 64%;
      margin-left: 18%;
    }
    .barcode-img{
      display: flex;
      justify-content: center;
    }
    .barcode-img img{
      width: 90px;
      margin: 5px;
      
    }
    
   


  </style>
</head>
<body  style="margin-top: 3px; margin-bottom: 0px; width: 288px; height: 144px;">
  <div class="container" style="padding: 0px; margin: 0px">
    <div class="readyShippedInvoice1 p-2">
      <div class="row" style="margin-top: 2px;">
        <div class="col-lg-5 col-5 left-side verticalLine1">
          <h3 class="title" style="font-size: 16px">Customer Name: </h3>
          <h4 style="font-size: 16px; height: 35px;">{{optional($order->user)->name}}</h4>
          <h3 class="title" style="font-weight:bold; font-size: 18px">Address</h3>
          
          <h4 style="font-size: 16px; height: 109px;">Floor: {{$order->floor_no}}, Apt: {{$order->appartment_no}},{{$order->street_address}}, {{optional($order->postCodes)->postOffice}}, {{ $order->postCodes->upazila}}</h4>
          
        
          
          
          <h3 class="title" style="font-size: 20px">Mobile no.</h3>
          <h4 style="font-size: 16px">{{optional($order->user)->mobile}}</h4>
        </div>
        <div class="col-lg-7 col-7 right-side">
          <h3 class="title" style="font-size: 16px">Invoice/Order No</h3>
          <h4 style="font-size: 20px">{{$order->invoice_no}}</h4>
          <div class="row">
              
            <div class="col-lg-4 col-4 pe-0">
              <h3 class="title" style="font-size: 16px">Order Price: </h3>
            </div>
            
            
            <div class="col-lg-8 col-8 ">
              <h4 class="price" style="font-size:  16px; padding-top: 10px;">{{$order->amount}} Tk</h4>
            </div>
            
          <div class="col-lg-4 col-4 pe-0">
              <h3 class="title" style="font-size:  16px">Delivery fee:  </h3>
            </div>
           <div class="col-lg-8 col-8 ">
              <h4 class="price" style="font-size:  16px; padding-top: 10px;">{{$order->delivery_charge}} Tk</h4>
            </div>
          <div class="col-lg-4 col-4 pe-0">
              <h3 class="title" style="font-size:  16px">Vat:   </h3>
            </div>
             <div class="col-lg-8 col-8 ">
              <h4 class="price" style="font-size:  16px">{{$order->vat}} Tk</h4>
            </div>
            <div class="row">
              <hr>
            </div>
           <div class="col-lg-4 col-4 pe-0">
              <h3 class="title" style="font-size: 20px">Total:</h3>
            </div>
            
            @php
             
             $price = $order->amount+$order->vat+$order->delivery_charge;
             
            @endphp
            
             <div class="col-lg-8 col-8 ">
              <h4 class="price" style="font-size: 20px">{{ $price }} Tk</h4>
            </div>
            
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="line">
        </div>
        <div class="barcode-img">
             <img style="margin-top: 16px; margin-left: -10px; width:330px; height:45px" src="data:image/png;base64,{{ DNS1D::getBarcodePNG(strval($order->invoice_no), 'C128', 2.0, 30, [1, 1, 1]) }}"
                            alt="barcode" />
        </div>
      </div>
      
      <!--<button class="btn btn-success" onclick="window.print()" style="margin-left: 100px; margin-top: 20px;">Print </button>-->
      
      

    </div>
  </div>
  
   <script>
          onclick="window.print()" 
   </script>
  
  
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>