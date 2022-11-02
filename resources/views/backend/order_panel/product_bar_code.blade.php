


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
      width: 250px;
      height: 160px;
     
      padding: 10px;
      border: 1px solid #000;
      /*margin-left: -20px;*/
    }
    .left-side .title{
      font-family: 'Montserrat';
      font-size:12px;
      color: black;
      margin-bottom: 5px;
      line-height: 0.5px;
    }
    .left-side h4{
      font-family: 'Montserrat';
      font-weight: 600;
      font-size: 10px;
      color: black;
      margin-bottom: 5px;
    }
    .right-side .title{
      font-family: 'Montserrat';
      font-weight: 600;
      font-size: 8px;
      color: black;
      
      margin-bottom: 5px;
    }
    .right-side h4{
      font-family: 'Montserrat';
      font-weight: 700;
      font-size: 8px;
      color: black;
      margin-bottom: 5px;
    }
    .right-side .price{
      font-family: 'Montserrat';
      font-weight: 700;
      font-size: 8px;
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
      
    }
    
   


  </style>
</head>
<body  style="margin-top: 3px; margin-bottom: 0px;">
  <div class="container">
    <div class="readyShippedInvoice1 p-2" style="text-align:center">
      <div class="row" style="margin-top: 2px;">
        <div class="col-lg-12 col-12">
          <h3 class="title" style="font-size: 16px; font-weight:bold; line-height: 0.5px; color: black">Invoice: {{$invoice_no}}</h3>
          <div class="row">
              <h3 class="title" style="font-size: 10px; color: black; font-weight:bold;  width: 230px; margin:auto">Item Name: <small style="display: block;font-size: 8px; word-wrap: break-word;" class="mx-3"> {{$product->product_name}}</small></h3>
              <h3 class="title" style="font-size:  10px; color: black; font-weight:bold; line-light: 12px">Product Price: {{$product->selling_price}} TK. </h3>
              <h3 class="title" style="font-size:  10px; color: black; font-weight:bold; line-height: 5px; margin-top: -6px">Product Code: {{$product->product_code}}   </h3>
          </div>
        </div>
      </div>
      <div class="row pb-5">
          <div class="col-12">
                <div class="barcode-img">
                    <img  class="px-2" style=" margin-left: -25px; margin-top: 0px; width:200px; height:30px; " src="data:image/png;base64,{{ DNS1D::getBarcodePNG(strval($product->product_code) ,'C128', 2.0, 33, [1, 1, 1]) }}" alt="barcode" />
                </div>
          </div>
        
      </div>
   

    </div>
  </div>
  
   <script>
          onclick="window.print()" 
   </script>
  
  
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>


























