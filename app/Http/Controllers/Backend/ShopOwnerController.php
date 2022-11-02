<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShopOwner;
use App\Models\Supplier;
use App\Models\SupplierReturnProduct;
use App\Models\supplerPaymentHistory;

use Auth;
use Illuminate\Http\Request;
use Svg\Tag\Rect;
use Validator;


class ShopOwnerController extends Controller
{
    public function view()
    {
        return view('backend.shop_owner.view');
    }

    public function dashboard()
    {
        return view('backend.shop_owner.dashboard');
    }

    public function paymentHistory()
    {
        $tatalSuppliers = Supplier::all();
        // $tatalSuppliers = Supplier::with('products',)->get();
         $ownerListsHistory= Product::with('brand', 'category','supplier')->get();
        return view('backend.shop_owner.paymentHistory',compact('tatalSuppliers','ownerListsHistory'));
    }

    public function ownerProductList()
    {
        $ownerLists = Product::with('brand', 'category','supplier')->get();
        return view('backend.shop_owner.productList',compact('ownerLists'));
    }

    public function profitReport()
    {
        return view('backend.shop_owner.profitReport');
    }
    public function ownerReturnProduct()
    {
         $supplierReturnProducts = SupplierReturnProduct::all();
        return view('backend.shop_owner.returnProduct',compact('supplierReturnProducts'));
    }
    public function ownerSupplierList()
    {
        
        return view('backend.shop_owner.supplierList');
    }

    public function ownerStore($role, Request  $request)
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
            $supplier = new Supplier();
            $supplier->supplyer_id_code = '#' . $grn;
            $supplier->supplyer_name = $request->supplyer_name;
            $supplier->company_name = $request->company_name;
            $supplier->supplyer_email = $request->supplyer_email;
            $supplier->supplyer_phone2 = $request->supplyer_phone2;
            $supplier->supplyer_phone = $request->supplyer_phone;
            $supplier->supplyer_bank_info = $request->supplyer_bank_info;
            $supplier->supplyer_mobile_bank_info = $request->supplyer_mobile_bank_info;
            $supplier->supplyer_address = $request->supplyer_address;
            $supplier->supplyer_status = '1';
            $supplier->save();
        $notification = array(
            'message' =>  'Suppliers Add Sucessyfuly',
            'alert-type' => 'success'
        );
        return response([
            'supplier' => $supplier,
            'message' => $notification
        ]);
    }

// -----------------supplier data delete---------------------
    public function SupplierDataDeleteAll($role, $id){
        $supplier = Supplier::find($id)->delete();
        return response( $supplier);
    }

    public function getAll()
    {
        $shopOwners = ShopOwner::all();
        return response($shopOwners);
    }

    public function store($role,Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'company_name' => 'required|alpha_num',
            'email' => 'email',
            'phone' => 'numeric',
            'phone2' => 'numeric',
            'address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
        ]);

        $shopOwners = new ShopOwner();
        $shopOwners->shop_owner_id_code = '#' . $this->generateRandomString();
        $shopOwners->name = $request->name;
        $shopOwners->company_name = $request->company_name;
        $shopOwners->email = $request->email;
        $shopOwners->phone = $request->phone;
        $shopOwners->phone2 = $request->phone2;
        $shopOwners->shop_owner_address = $request->address;
        $shopOwners->shop_owner_status = '1';


        $shopOwners->save();

        $notification = array(
            'message' =>  'Shop Owner Add Sucessyfuly',
            'alert-type' => 'success'
        );

        return response([
            'shopOwner' => $shopOwners,
            'message' => $notification
        ]);

    }


    public function edit($role,$id)
    {

        $shopOwner = ShopOwner::findOrFail($id);

        return response($shopOwner);

    }

    public function update($role, Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'company_name' => 'required|alpha_num',
            'email' => 'email',
            'phone' => 'numeric',
            'phone2' => 'numeric',
            'address' => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
        ]);

        $shopOwner = ShopOwner::find($request->edit_id);
        $shopOwner->name = $request->name;
        $shopOwner->company_name = $request->company_name;
        $shopOwner->email = $request->email;
        $shopOwner->phone = $request->phone;
        $shopOwner->phone2 = $request->phone2;
        $shopOwner->shop_owner_address = $request->address;
        $shopOwner->save();

        return response(true);
    }



    public function destroy($role,Request $request,$id)
    {
        $shopOwner = ShopOwner::find($id);
        $shopOwner->delete();
        return response(true);
    }

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

//////owner return product show controller//
public function returnProductGet($role, $id){
    
    $data = Product::where('id',$id)->with('ecommerce','brand', 'supplier')->first();
    return response($data);
    
}
public function returnProductCeate($role,Request $request){
 

    $validated = $request->validate([
        'return_qty' => 'required',

    ]);

    $ownerReturnData = new SupplierReturnProduct();
    $ownerReturnData->product_id = $request->product_id;
    $ownerReturnData->supplier_id = $request->supplier_id;
    $ownerReturnData->ecom_name = $request->ecom_name;
    $ownerReturnData->product_code = $request->product_code;
    $ownerReturnData->product_name = $request->product_name;
    $ownerReturnData->brand_name = $request->brand_name;
    $ownerReturnData->return_qty = $request->return_qty;
    $ownerReturnData->return_amount = $request->return_amount;
    $ownerReturnData->save();
    
 

    $product =Product::where('id',$request->product_id)->where('supplier_id',$request->supplier_id)->first();
    $product->product_qty = $product->product_qty - $request->return_qty;
    $product->purchase_price = $product->purchase_price - $request->return_amount;
    $product->update();
    
    $supplerPaymentHistory =supplerPaymentHistory::where('product_id',$request->product_id)->where('supplier_id',$request->supplier_id)->first();
    
    
    
    $supplerPaymentHistory->supplier_return_product_id = $ownerReturnData->id;
    
    $supplerPaymentHistory->due_amount = $product->purchase_price;
    
    $supplerPaymentHistory->update();
    
    return response($ownerReturnData);
}

}
