@extends('frontend.main_master')

@section('islamic')

<div class="profile main-content">
	<div class="container">
		<div class="row profile-wrapper">
    
            <div class="col-md-3">
                @include('frontend.common.user_sidebar')
            </div>
         
         <div class="col-md-5" style="padding-top:124px;" >
         <div>
            @if($order->status =='cancel')
                <div class="text-danger">
                     <h3>Your Order Has Been Canceled</h3>
                </div>
                @else
                @if($order->status =='delivered')
                <button  type="button" class="btn btn-danger mb-3" onclick="myFunction()">Cancel Order</button>
                <br>
                    <b id="demo" class="text-danger">
                    </b>
                    @else
                    <a href="{{ url('user/cancelorder/'.$order->id ) }}" type="button" class="btn btn-danger mb-3" id="cancel" >Cancel Order
                    </a>
                    @endif
                    @endif
            </div>
           <div class="card">
              <div class="card-header"><h4>Shipping Details</h4></div>
              <hr>
              <div class="card-body" style="background: #E9EBEC;">

              <table class="table">
               <tr>
                 <th> Shipping Name : </th>
                  <th> {{ $order->name }} </th>
               </tr>

                <tr>
                 <th> Shipping Phone : </th>
                  <th> {{ $order->phone }} </th>
               </tr>

                <tr>
                 <th> Shipping Email : </th>
                  <th> {{ $order->email }} </th>
               </tr>

                <tr>
                 <th> Division : </th>
                  <th> {{ $order->division->name }} </th>
               </tr>

                <tr>
                 <th> District : </th>
                  <th> {{ $order->district->name }} </th>
               </tr>

                <tr>
                 <th> State : </th>
                 <th>{{ $order->state->name }} </th>
               </tr>

               <tr>
                 <th> Post Code : </th>
                  <th> {{ $order->post_code }} </th>
               </tr>

               <tr>
                 <th> Order Date : </th>
                  <th> {{ $order->order_date }} </th>
               </tr>

              </table>


              </div>

           </div> <!-- card end -->

         </div> <!-- end col md -5 -->

         <div class="col-md-4"  style="padding-top: 180px">
            <div class="card">
              <div class="card-header"><h4>Order Details 
               <span class="text-danger" id="clicktextCopy_invoice"> Invoice : {{ $order->invoice_no }}</span></h4>
              </div>
             <hr>
             <div class="card-body" style="background: #E9EBEC;">
               <table class="table">
                <tr>
                  <th>  Name : </th>
                   <th> {{ $order->user->name }} </th>
                </tr>

                 <tr>
                  <th>  Phone : </th>
                   <th> {{ $order->user->phone }} </th>
                </tr>

                 <tr>
                  <th> Payment Type : </th>
                   <th> {{ $order->payment_method }} </th>
                </tr>

                 <tr>
                  <th> Tranx ID : </th>
                   <th> {{ $order->transaction_id }} </th>
                </tr>

                 <tr>
                  <th> Invoice  : </th>
                   <th class="text-danger"> {{ $order->invoice_no }} </th>
                </tr>

                 <tr>
                  <th> Order Total : </th>
                   <th>{{ $order->amount }} </th>
                </tr>

                <tr>
                  <th> Order : </th>
                   <th>
                    <span class="badge badge-pill badge-warning" style="background: #07a195;">{{ $order->status }} </span> </th>
                </tr>



               </table>


             </div>

            </div>

          </div> <!-- // 2ND end col md -5 -->


          <div class="col-md-2"></div>


		</div> <!-- // end row -->




        <div class="row">
            <h4>Product Details</h4>
            <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table">
                        <tbody>

                          <tr style="background: #e2e2e2;">
                            <td class="col-md-1">
                              <label for=""> Product Image</label>
                            </td>

                            <td class="col-md-3">
                              <label for=""> Product Name </label>
                            </td>

                            <td class="col-md-2">
                              <label for=""> Product Code</label>
                            </td>


                            <td class="col-md-2">
                              <label for=""> Color </label>
                            </td>

                             <td class="col-md-2">
                              <label for=""> Size </label>
                            </td>

                             <td class="col-md-1">
                              <label for=""> Quantity </label>
                            </td>

                            <td class="col-md-1">
                              <label for=""> Price </label>
                            </td>

                          </tr>


                          @foreach($orderItem as $item)
                   <tr>
                            <td class="col-md-1">
                              <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                            </td>

                            <td class="col-md-3">
                              <label for=""> {{ $item->product->product_name }}</label>
                            </td>


                             <td class="col-md-3">
                              <label for=""> {{ $item->product->product_code }}</label>
                            </td>

                            <td class="col-md-2">
                              <label for=""> {{ $item->color }}</label>
                            </td>

                            <td class="col-md-2">
                              <label for=""> {{ $item->size }}</label>
                            </td>

                             <td class="col-md-2">
                              <label for=""> {{ $item->qty }}</label>
                            </td>

                      <td class="col-md-2">
                              <label for=""> ${{ $item->price }}   (${{ $item->price * $item->qty}}) </label>
                            </td>

                          </tr>
                          @endforeach




                        </tbody>

                      </table>

                    </div>

                   </div> <!-- / end col md 12 -->
     </div> <!-- // END ORDER ITEM ROW -->




          @if($order->status !== "delivered")

          @else

         @php

          $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();

          @endphp

           @if($order)

          <form action="{{ route('return.order',$order->id) }}" method="post">
            @csrf

      <div class="form-group">
        <label for="label"> Order Return Reason:</label>
        <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Return Reason</textarea>
      </div>

            <button type="submit" class="btn btn-danger">Order Return</button> <br>

           </form>

           @else

           <span class="badge badge-pill badge-warning" style="background: red">
            You Have send return request for this product</span>


          @endif

          @endif

          <br><br>


	       </div>
        </div>
      </div>
@endsection
@section('script')
<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "You can not cancel the the product Now.Beccause it has already been shipped for delivery.  For more details contact to <i>Support</i> ";
}




  const span = document.querySelector("#clicktextCopy_invoice");

span.onclick = function() {
  document.execCommand("copy");
}

span.addEventListener("copy", function(event) {
  event.preventDefault();
  if (event.clipboardData) {
    event.clipboardData.setData("text/plain", span.textContent);
    console.log(event.clipboardData.getData("text"))
  }
});




</script>




@endsection