<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Asset;
use App\Models\Employee;
use App\Models\OrderItem;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\Admin;
use Auth;
use DB;

class NewOrderController extends Controller
{
    //order list method start here

    public function allOrderList()
    {
        $orders = Order::with(['user' => function ($query) {
            $query->get('name', 'customer_id');
        }])->orderBy('id', 'DESC')->get();
       

        return view('backend.order_panel.all_order_list', compact('orders'));
    }

    public function pendingOrderList()
    {
        $orders = Order::with(['user' => function ($query) {
            $query->get('name');
        }])->where('status', 'Pending')->orderBy('id', 'DESC')->get();
        
        return view('backend.order_panel.pending_orders_list', compact('orders'));
    }


    public function confirmedOrdersList()
    {
        $orders = Order::with(['user' => function ($query) {
            $query->get('name');
        }])->where('status', 'confirm')->orderBy('id', 'DESC')->get();
        return view('backend.order_panel.confirmed_orders_list', compact('orders'));
    }

    public function processingOrdersList()
    {
        $orders = Order::with(['user' => function ($query) {
            $query->get('name');
        }])->where('status', 'processing')->orderBy('id', 'DESC')->get();

        return view('backend.order_panel.processing_orders_list', compact('orders'));
    }

    public function pickedOrdersList()
    {
        $orders = Order::with(['user' => function ($query) {
            $query->get('name');
        }])->where('status', 'picked')->orderBy('id', 'DESC')->get();

        return view('backend.order_panel.picked_orders_list', compact('orders'));
    }


    public function cancelOrderList()
    {
        $orders = Order::with(['user' => function ($query) {
            $query->get('name');
        }])->where('status', 'cancel')->orderBy('id', 'DESC')->get();

        return view('backend.order_panel.cancel_order_list', compact('orders'));
    }

//========================= Picked Orders Processing List start ============================

    public function pickedOrdersProcessingList()
    {
        $orders = Employee::with(['zone','orderItem'=>function($q)
        {
            $q->where('order_items.picked_complete_status',NULL);
        }])->whereHas('orderItem',function($q)
        {
            $q->where('order_items.picked_complete_status',NULL);
        })->withCount(['orderItem'=>function($q)
        {
            $q->where('order_items.picked_complete_status',NULL);
        }])->where('department_id',6)->get();
        
        return view('backend.order_panel.picked_orders_processing_list',compact('orders'));
    }
    
    
    
    
//========================= Picked Orders Processing List End ============================




    public function pickedOrdersCompleteList()
    {
        $orderItems = OrderItem::with(['product.supplier.zone','order','pickedOrderEmployee',
        'checkedOrderEmployee'])->where('picked_complete_status','1')->where('ready_to_ship_status',NULL)->get();
        
        // $barcode_status_product_supplier = 
        
        
        return view('backend.order_panel.picked_orders_complete_list',compact('orderItems'));
    }





    public function readyToShipList()
    {
        $orders = Order::whereHas('orderItems',function($q)
        {
            $q->where('ready_to_ship_status',1);
        })->withCount(['orderItems'=>function($q)
        {
            $q->where('ready_to_ship_status',1);
            
        }])->with('user')->orderBy('id', 'DESC')->paginate(10);

        
        return view('backend.order_panel.ready_to_ship_list',compact('orders'));
    }



    //order details method start ****

    public function allOrdersDetails($role, $order_id)
    {
        $order = Order::with('orderItems.product', 'user', 'postCodes','confirmOrderEmployee','processingOrderEmployee','pickOrderEmployee','readyOrderEmployee','cancelOrderEmployee')->find($order_id);


        return view('backend.order_panel.all_order_details', compact('order'));
    }

    public function pendingOrdersDetails($role, $order_id)
    {
        $order = Order::with('orderItems.product.supplier')->withSum('orderItems','pending_status',function($query)
        {
            $query->where('pending_status',1);
        })->withCount('orderItems')->where('status', 'Pending')->find($order_id);

        return view('backend.order_panel.pending_order_details', compact('order'));
    }

    public function confirmOrdersDetails($role, $order_id)
    {
        $orders = Order::with('orderItems.product.supplier')->withCount(['orderItems','orderItems as assignedEmployee'=>function($q)
        {
            $q->where('comfirm_processed_employee_id','!=', NULL);
        }])->where('status', 'confirm')->find($order_id);
        $employees = Employee::all();
        return view('backend.order_panel.confirm_order_details', compact('orders','employees'));

    }

    public function processingOrdersDetails($role, $order_id)
    {
        $orders = Order::with('orderItems.product.supplier.zone')->withCount(['orderItems','orderItems as assignedEmployee'=>function($q)
        {
            $q->where('picked_employee_id','!=', NULL);
        }])->where('status', 'processing')->find($order_id);

        $employees = Employee::where('department_id',6)->get();

        return view('backend.order_panel.processing_order_details', compact('orders','employees'));
    }
    
    public function cancelOrdersDetails($role, $order_id)
    {
        $order = Order::with('orderItems.product.supplier')->find($order_id);
        
        return view('backend.order_panel.cancel_order_details', compact('order'));
    }
    
    




    // status change methods of order


    public function setStatusToConfirm($role, $order_id)
    {
        
        Order::findOrFail($order_id)->update(['status' => 'confirm', 'confirmed_date' => Carbon::now(),'confirm_order_employee_id'=>Auth::user()->employee_id]);
        $orderItems = OrderItem::with('product')->where('order_id',$order_id)->get();
        foreach($orderItems as $orderItem)
        {
            $orderItem->product->product_qty = $orderItem->product->product_qty - $orderItem->qty;
            $orderItem->product->save();
        }

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.order.pendingOrdersList', config('fortify.guard'))->with($notification);
    }

    public function setStatusToCancel($role, $order_id)
    {
        $totalsale = Order::where('id', $order_id)->where('status', '=', 'delivered')->pluck('amount');
        $order = Order::findOrFail($order_id)->update(['status' => 'cancel','cancel_order_employee_id'=>Auth::user()->employee_id,'cancel_date'=>Carbon::now()]);
        if ($totalsale->count() == 0) {
            $totalsale[0] = 0;
        }
        $asset = Asset::find(1);
        $devit  = $asset->debit;
        $devit  += (float) $totalsale[0];
        $asset->debit = $devit;
        //    dd($asset);
        $asset->save();
        $notification = array(
            'message' => 'Order Cancel Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.order.pendingOrdersList', config('fortify.guard'))->with($notification);
    }

    public function setStatusToProcessing($role, $order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'processing', 'processing_date' => Carbon::now(),'processing_order_employee_id'=>Auth::user()->employee_id]);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.order.confirmedOrdersList',config('fortify.guard'))->with($notification);
    }

    public function setStatusToPicked($role, $order_id)
    {
        Order::findOrFail($order_id)->update(['status' => 'picked', 'picked_date' => Carbon::now(),'pick_order_employee_id'=>Auth::user()->employee_id]);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.order.processingOrdersList',config('fortify.guard'))->with($notification);
    }



    // order item status changing methods

    public function setOrderItemStatus($role,Request $request)
    {
        $orderItem = OrderItem::find($request->id);
        $orderItem->pending_status = $request->status;
        $orderItem->save();
        return response($orderItem);
    }

    //add employee to order confirm processing

    public function setEmployeeToConfirmOrderProcessing($role, Request $request)
    {
        $orderItem = OrderItem::find($request->orderItemId);
        $orderItem->comfirm_processed_employee_id = $request->employeeId;
        $orderItem->save();
        return response($orderItem);

    }

    //add employee to order item picked

    public function setEmployeeToPickedOrder($role,Request $request)
    {
        $orderItem = OrderItem::find($request->orderItemId);
        $orderItem->picked_employee_id = $request->employeeId;
        $orderItem->save();
        return response($orderItem);
    }
    
    public function setEmployeeToCheckedItems($role,Request $request)
    {
        
        $orderItem = OrderItem::find($request->id);
        $orderItem->checked_employee_id = Auth::user()->employee_id;
        $orderItem->save();
        
        return response($orderItem);
    }
    
    public function setReadyToShippedStatus($role,Request $request)
    {
        
        $orderItem = OrderItem::find($request->id);
        $orderItem->ready_to_ship_status = 1;
        $orderItem->save();
        
        return response($orderItem);
    }


    //get the number of employee assigned to item

    public function checkEmployeeAssignedToAllItem($role,$order_id)
    {
        $ordersItem = OrderItem::where('order_id','=',$order_id)->select( DB::raw('COUNT(order_items.id) as totalItem'),DB::raw('COUNT(order_items.comfirm_processed_employee_id != "NULL") as assignedCount'))->get();
        
        return response($ordersItem);
    }

    public function checkPickBoyAssignedToAllItem($role,$order_id)
    {
        $ordersItem = OrderItem::where('order_id','=',$order_id)->select( DB::raw('COUNT(order_items.id) as totalItem'),DB::raw('COUNT(order_items.picked_employee_id != "NULL") as assignedCount'))->get();
        
        return response($ordersItem);
    }


    // Employee order Processing 
    public function employeeOrderProcessingList()
    {
        $orders = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
        ->where('order_items.comfirm_processed_employee_id',Auth::user()->employee_id)
        ->where('order_items.employee_processing_status', '=', NULL)
        ->where('orders.status','confirm')
        ->select('orders.id','orders.*')
        ->distinct('orders.id')
        ->get();

        return view('backend.order_panel.employee_processing_order_list',compact('orders'));
    }

    public function employeeOrderProcessingDetails($role,$order_id)
    {
        $order = Order::find($order_id);
        $orderItems = OrderItem::with('product')->where('comfirm_processed_employee_id',Auth::user()->employee_id)->where('order_id',$order_id)
        ->get();
        
        return view('backend.order_panel.employee_processing_order_details',compact(['orderItems','order']));
    }

    public function employeeOrderProcessingStatusSet($role,Request $request)
    {
        $orderItem = OrderItem::find($request->id);
        $orderItem->employee_processing_status = $request->status;
        $orderItem->save();
        return response($orderItem);
    }

    public function pickUpBoyOrderProcessing()
    {
        $orders = OrderItem::join('orders', 'order_items.order_id', '=', 'orders.id')
        ->where('order_items.picked_employee_id',Auth::user()->employee_id)
        ->where('order_items.picked_employee_status', '=', NULL)
        ->where('orders.status','processing')
        ->select('orders.id','orders.*')
        ->distinct('orders.id')
        ->get();
    
        return view('backend.order_panel.pickup_boy_order_processing_list',compact('orders'));
    }
    
    public function setStatusToPickedComplete($role,Request $request)
    {
        $orderItem = OrderItem::find($request->id);
        $orderItem->picked_complete_status = $request->status;
        $orderItem->save();
        return response($orderItem);
    }

    public function pickUpBoyOrderProcessingDetails($role,$order_id)
    {
        $order = Order::find($order_id);
        $orderItems = OrderItem::with('product')->where('picked_employee_id',Auth::user()->employee_id)->where('order_id',$order_id)
        ->get();
        // dd($orderItems);
        return view('backend.order_panel.pick_up_boy_order_details',compact(['orderItems','order']));
    }

    public function pickUpBoyOrderProcessingStatusSet($role,Request $request)
    {
        $orderItem = OrderItem::find($request->id);
        $orderItem->picked_employee_status = $request->status;
        $orderItem->save();
        return response($orderItem);
    }
    
    // single Supplier Invoice Method
    
    public function singleSupplierInvoice($role,$employee_id)
    {
        $allSupplier = Employee::with('orderItem.product.supplier')->where('id',$employee_id)->first();
        
        $allSupplier = Employee::join('order_items','employees.id', '=', 'order_items.picked_employee_id')
                    ->join('products','order_items.product_id','products.id')
                    ->join('suppliers','products.supplier_id','suppliers.id')
                    ->where('employees.id',$employee_id)
                    ->select('suppliers.supplyer_name','suppliers.supplyer_id_code','suppliers.id','employees.id as employee_id')
                    ->distinct('suppliers.id')
                    ->get();
        
        
        return view('backend.order_panel.single_supplier_invoice',compact('allSupplier'));
    }
    
    
    // supplier pick item list
    
    public function pickedSupplierItemDetails($role,$supplier_id,$employee_id)
    {
        $supplier = Supplier::with('zone')->find($supplier_id);
        $employee = Employee::find($employee_id);
        
        $orderItems = Product::join('suppliers','products.supplier_id','suppliers.id')
                    ->join('order_items','products.id', '=', 'order_items.product_id')
                    ->join('orders', 'order_items.order_id', '=', 'orders.id')
                    ->where('suppliers.id',$supplier_id)
                    ->where('order_items.picked_employee_id',$employee_id)
                    ->select('products.*','orders.invoice_no as orderItemInvoice','order_items.qty')
                    ->get();

        
        return view('backend.order_panel.picked_supplier_item_details',compact('supplier','employee','orderItems'));
    }
    
    // all supplier Invoice method
    
    public function allSupplierInvoice($role,$pickerBoy_id)
    {
        $pickerBoy = Employee::find($pickerBoy_id);
        
        $orders = Supplier::whereHas('orderItem',function($query) use ($pickerBoy_id)
        {
            $query->where('order_items.picked_employee_id',$pickerBoy_id)
            ->where('order_items.picked_complete_status',NULL);
            
        })->with(['orderItem'=>function($query) use ($pickerBoy_id)
        {
            $query->where('order_items.picked_employee_id',$pickerBoy_id)
            ->where('order_items.picked_complete_status',NULL)->with('product');
            
        }])->get();
        
       
        
        return view('backend.order_panel.all_supplier_invoice',compact('pickerBoy','orders'));
    }
    
 // =================================BppShops Product Barcode print=============================      
    public function BppShopsProductBarCode($role,$product_id, $invoice_no)
    {
        $product = Product::find($product_id);
        
        return view('backend.order_panel.bppshop_product_bar_code',compact(['product','invoice_no']));
    }
 // =================================BppShops Product Barcode print=============================      
    
    
    
    
    
 // =================================Supplier Product Barcode print End=============================  
     public function SupplierProductBarCode($role,$product_id, $invoice_no)
    {
        $product = Product::find($product_id);
        
        return view('backend.order_panel.product_bar_code',compact(['product','invoice_no']));
    }
 // =================================Supplier Product Barcode print End=============================      
    
    
    
    
    
    
    
    
    
    public function generateOrderBarCode($role,$order_id)
    {
        $order = Order::with(['user','postCodes'])->find($order_id);
        
        // dd($order);
        
        return view('backend.order_panel.order_bar_code', compact('order'));
    }
    
    public function backToPickedOrderProcessList($role)
    {
        return redirect()->route('role.order.pickedOrdersProcessingList','admin');
    }
    
    public function processDone($role,Request $request)
    {
        $order = Order::findOrFail($request->order)->update(['status' => 'picked', 'picked_date' => Carbon::now(),'ready_to_ship_employee_id'=>Auth::user()->employee_id]);
        $orderItem = OrderItem::where('order_id',$request->order)
                    ->update(['picked_complete_status'=>'1','checked_employee_id'=>'-1','ready_to_ship_status'=>'1','picked_employee_id'=>'1','picked_employee_status'=>'1']);
    }
    
    
    
    
    
    
    // customer invoice print start======================
    
        // pending orders details
     public function CustomerInvoicePrintBpp($role,$order_id){
         
        
       
        $order = Order::with('division','district','state','user','postCodes')->where('id',$order_id)->first();
        
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
     
		$bppshops = SiteSetting::all();
    	return view('backend.order_panel.customer_invoice', compact('orderItem', 'bppshops', 'order'));
     }// end mathod
     
    // customer invoice print  end ==================
    
    
    
    
}
