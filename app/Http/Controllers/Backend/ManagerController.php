<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\ManagerPanel;
use App\Models\AgentCommission;
use App\Models\Admin;
use App\Models\AgentPanel;
use App\Models\AgentPaymentStatement;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

class ManagerController extends Controller
{
   
     
    public function index()
    {
       return view('backend.manager_panel.add_customer');
    }
    
    
    public function ManagerView(){
        return view('backend.manager_panel.edit_customer');
    }
    public function addShow(){
        $managerShow= ManagerPanel::all();
        return response($managerShow);
    }
    
  //==================== Delete Customer  start ===========================
    public function deleteCustomer($role, $id){
        $managerDelete = ManagerPanel::find($id);
        unlink(public_path($managerDelete->shop_manager_photo));
        $managerDelete->delete();
        return response( $managerDelete);
    }
  //==================== Delete Customer end ===========================

 //==================== Agent Store start ===========================
    public function managerStore($role, Request  $request)
    {
        function generateRandomString($length = 6)
        {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
          $grn = generateRandomString();
            $supplier = new ManagerPanel();
            $supplier->shop_manager_id_code = '#' . $grn;
            $supplier->name = $request->name;
            if($request->shop_manager_photo){
                $imageName = 'picture/'.time().'.'.$request->shop_manager_photo->extension();
                $request->shop_manager_photo->move(public_path('picture'), $imageName);
                $supplier->shop_manager_photo = $imageName;
            }
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->phone2 = $request->phone2;
            $supplier->shop_manager_address = $request->shop_manager_address;
            $supplier->shop_manager_address2 = $request->shop_manager_address2;
            $supplier->shop_manager_status = '1';
            $supplier->save();
            $notification = array(
            'message' =>  'Data Add Successfully',
            'alert-type' => 'success'
        );
        return response([
            'supplier' => $supplier,
            'message' => $notification
        ]);
    }
  //==================== Agent Store End ===========================
  
//==================== Agent edit start ===========================
    public function agentManagerEdit($role,$id){
        $data =ManagerPanel::find($id);
        return response($data);
    }
//==================== Agent edit end ===============================

 //==================== Agent Update start ===========================
    public function agentManagerUpdate(Request $request,$role,$id){
        $supplier =  ManagerPanel::find($id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        if($request->shop_manager_photo){
            unlink($supplier->shop_manager_photo);
            $imageName = 'picture/'.time().'.'.$request->shop_manager_photo->extension();
            $request->shop_manager_photo->move(public_path('/picture'), $imageName);
            $supplier->shop_manager_photo = $imageName;
        }
        $supplier->phone = $request->phone;
        $supplier->phone2 = $request->phone2;
        $supplier->shop_manager_address = $request->shop_manager_address;
        $supplier->shop_manager_address2 = $request->shop_manager_address2;
        $supplier->update();
        $notification = array(
            'message' =>  'Data Update Successfully',
            'alert-type' => 'success'
        );
        return response([
            'supplier' => $supplier,
            'message' => $notification
        ]);
    }

 // =================== Agent Update End ===========================


//================== Agent all customer list start ===================   
    public function customerList()
    {
        $agent_all_customer = User::where('agent_id', '!=', 'null')->get();
        
        return view('backend.manager_panel.list_customer', compact('agent_all_customer'));
    }
//================== Agent all customer list end ===================   
   
   
   

//================== Agent Dashboard start 101010 ===================
    public function managerDashboard()
    {
        $totalagent=AgentPanel::select('id')->count();
     
        $totalagent_customer = User::where('agent_id','!=','null')->count() ;
        
       
        
        $totalagent_sale_amount = AgentCommission::select('total_sale_amount')->sum('total_sale_amount');
         
        
        $totalagent_comisssion = AgentCommission::select('commission_amount')->sum('commission_amount');
       
        
 return view('backend.manager_panel.dashboard_customer', compact('totalagent', 'totalagent_customer', 'totalagent_sale_amount', 'totalagent_comisssion' ));
    }
//================== Agent Dashboard start ===================     
     


  //================== agentCommission  start ===================  
    public function agentCommission()
    {
        $agentpanel = AgentPanel::with(['agentcommission','agentpayment'=>function($query)
        {
            $query->latest()->first();
          }])->get();

        return view('backend.manager_panel.agent_commission',compact('agentpanel'));
    }
 //================== agentCommission  end ===================   
    
 //================== agent Commission Payment start ===================   
    public function agentCommissionPayment( Request $request,$role,$id)
    {
        
        $validator = Validator::make($request->all(),
        [
            //  'dueamount' => 'required|float|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }
        else {
                 $data=floatval($request->input('total_withdrawal_amount')) +floatval($request->input('withdrawal_amount'));
            $payment = new AgentPaymentStatement;
            $payment->agent_id = $id;
            $payment->total_withdrawal_amount = $data;
            $payment->withdrawal_amount = $request->input('withdrawal_amount');
            $payment->due_amount = $request->input('dueamount');
            $payment->created_at=Carbon::now();
            $payment->save();
            return response()->json([
                'message' => 'Payment statement Added Successfully',
                'payment'=> $payment
            ]);
        }
    }
 //================== agent Commission Payment  end===================   
 
 
 //================== Agent Commission Payment History view start ===================   
    public function agentCommissionPaymentview($role,$id)
    {
     $paymentview1=AgentPaymentStatement::where('agent_id',$id)->with('agentpanel')->get();
     
        return response()->json([
            'status' => 200,
            'paymentview1' => $paymentview1,
           
        ]);
        
    }
// ======================= Agent Commission Payment History view  ========================  
    
// ======================= Agent Commission Payment History view Data Start ========================     
    public function agentCommissionPaymentViewData($role,$id)
    { 
        $agentcommission=AgentCommission::where('agent_id',$id)->select('commission_amount')->sum('commission_amount');
   $cc=AgentPaymentStatement::where('agent_id',$id)->first();
  if($cc == null)
  {
    $viewdata =0.00;
  }
  else{
     $viewdata = AgentPaymentStatement::where('agent_id',$id)->latest()->first();
  }

        return response()->json([
            'status' => 200,
            'viewdata' => $viewdata,
            'agentcommission' => $agentcommission,
        ]);
    }
//======================= Agent Commission Payment History view Data end ========================  





//======================= agent Order History start  ======================== 
    public function agentOrderHistory()
    {
        
        $all_customer_order_info = Order::where('agent_id','!=','null')->with('user','orderItems','agentcommission','agentpanel')->get() ;
        
        return view('backend.manager_panel.order_history',compact('all_customer_order_info'));
    }
 //======================= agent Order History end  ========================   
   
// ========================= Agent All Customer All Order List ====================
  public function AgentOrdercustomerList($role,$order_id)
    {
        
                  $order = Order::with('division','district','state','user','postCodes')->where('id',$order_id)->first();
        
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
     
		$bppshops = SiteSetting::all();
    	return view('backend.order_panel.customer_invoice', compact('orderItem', 'bppshops', 'order'));
    }

// ==========================end
   
   
   
   
   
   
   
   

}
