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
      Width: 350px;
      Height: 160px;
      margin: auto;
      border: 1px solid #000;
    }
    .left-side .title{
      font-family: 'Montserrat';
      font-size:8px;
      color: #000000;
      margin-bottom: 5px;
    }
    .left-side h4{
      font-family: 'Montserrat';
      font-weight: 600;
      font-size: 8px;
      color: #000000;
      margin-bottom: 5px;
    }
    .right-side .title{
      font-family: 'Montserrat';
      font-weight: 400;
      font-size: 8px;
      color: #000000;
      margin-bottom: 5px;
    }
    .right-side h4{
      font-family: 'Montserrat';
      font-weight: 700;
      font-size: 8px;
      color: #000000;
      margin-bottom: 5px;
    }
    .right-side .price{
      font-family: 'Montserrat';
      font-weight: 700;
      font-size: 8px;
      color: #000000;
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
<body>
  <div class="container mt-4">
    <div class="readyShippedInvoice1 p-2">
      <div class="row">
        <div class="col-lg-6 col-6 left-side verticalLine1">
          <h3 class="title">Customer Name</h3>
          <h4>{{optional($order->user)->name}}</h4>
          <h3 class="title">Address</h3>
          
          <h4>{{$order->floor_no}}, {{$order->appartment_no}},{{$order->street_address}}, {{optional($order->postCodes)->postOffice}}, {{ $order->postCodes->upazila}}</h4>
          
        
          
          
          <h3 class="title">Mobile no.</h3>
          <h4>{{optional($order->user)->mobile}}</h4>
        </div>
        <div class="col-lg-6 col-6 right-side">
          <h3 class="title">Invoice/ Order No</h3>
          <h4>{{$order->invoice_no}}</h4>
          <div class="row">
            <div class="col-lg-6 col-6 pe-0">
              <h3 class="title">Order Price: </h3>
            </div>
            <div class="col-lg-6 col-6 ">
              <h4 class="price">{{$order->amount}} Tk</h4>
            </div>
            <div class="col-lg-6 col-6 pe-0">
              <h3 class="title">Delivery fee:  </h3>
            </div>
            <div class="col-lg-6 col-6">
              <h4 class="price">{{$order->delivery_charge}} Tk</h4>
            </div>
            <div class="col-lg-6 col-6 pe-0">
              <h3 class="title">Vat:   </h3>
            </div>
            <div class="col-lg-6 col-6">
              <h4 class="price">{{$order->vat}} Tk</h4>
            </div>
            <div class="row">
              <hr>
            </div>
            <div class="col-lg-6 col-6 pe-0">
              <h3 class="title">Total Taka:</h3>
            </div>
            
            @php
             
             $price = $order->amount+$order->vat+$order->delivery_charge;
             
            @endphp
            
            <div class="col-lg-6 col-6">
              <h4 class="price">{{ $price }} Tk</h4>
            </div>
            
            
          </div>
        </div>
      </div>
      <div class="row pb-5 mt-2">
        <div class="line">
        </div>
        <div class="barcode-img">
             <img style="margin-top: 10px" width="200" height="20" src="data:image/png;base64,{{ DNS1D::getBarcodePNG(strval($order->invoice_no.$order->user->name), 'C128', 2.0, 30, [1, 1, 1]) }}"
                            alt="barcode" />
        </div>
      </div>
      
      <button class="btn btn-success" onclick="window.print()" style="margin-left: 100px; margin-top: 20px;">Print </button>
      
      

    </div>
  </div>
  
   
  
  
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>