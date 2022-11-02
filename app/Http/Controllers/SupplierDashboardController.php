<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\SupplierReturnProduct;

use App\Models\Order;
use Auth;
use Illuminate\Http\Request;
use DB;

class SupplierDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function supplierDashboard(){
        $totalProduct = Product::where('supplier_id',Auth::user()->supplier_id)->sum('purchase_qty');
        
         $current_total_stock = Product::where('supplier_id',Auth::user()->supplier_id)->sum('product_qty');
         
                // $total_selling = Order::with('products')->selectRaw('orders.*, sum(order_items.qty) quantity')->where('status','delivered')->get();
                
            //   $total_selling_2 = Product::where($total_selling->supplier_id,Auth::user()->supplier_id)->sum('product_qty');
        
               
            //   $total_selling_products = Product::with(['orderedProduct'],function($q){
            //       $q->orderedProduct->order->where('status','delivered');
            //   })->where('supplier_id',Auth::user()->supplier_id)
            //     ->withSum('orderedProduct','qty')
            //     ->has('orderedProduct')
            //   ->get();
               
            //   $total_selling_products_count = 0;
            //   foreach($total_selling_products as $item){
            //       $total_selling_products_count += $item->ordered_product_sum_qty;
            //   }
           
            
                $total_selling_products_count =$totalProduct - $current_total_stock ;
               
      
        $totalProductreturn = Product::with('supplier')->where('supplier_id',Auth::user()->supplier_id)->count();
        return view('backend.supplier.dashboard',compact('totalProduct','totalProductreturn','current_total_stock','total_selling_products_count'));
        
        
    }
    /// Owner Pages Supplier Dashboard 
    public function supplierDashboardForOwner(){
        $totalSupplier = Supplier::count();
        $totalProduct = Product::sum('purchase_qty');
        $currentProductQty= Product::sum('product_qty');
        $SellingNumberOfProduct =  Product::sum('purchase_qty') - $currentProductQty;
        $totalReturnProduct = SupplierReturnProduct::count();
        $totalProductSellingPrice = Product::sum('selling_price');
        $totalReturnProductPrice = SupplierReturnProduct::sum('return_amount');
        $totalSupplierProductBuyingPurchase = Product::sum('old_purchase_price');
        $currentTotalStockProductPrice = Product::sum('purchase_price');
        
        //Grocery Supplier Dashboard 
        
        $grocerytotalSupplier = Supplier::where('ecom_id', 2)->count();
        $grocerytotalProduct = Product::where('ecom_name', 2)->sum('purchase_qty');
        $grocerycurrentProductQty= Product::where('ecom_name', 2)->sum('product_qty');
        $grocerySellingNumberOfProduct =  Product::where('ecom_name', 2)->sum('purchase_qty') - $currentProductQty;
        $grocerytotalProductSellingPrice = Product::where('ecom_name', 2)->sum('selling_price');
        $grocerytotalReturnProduct = SupplierReturnProduct::where('ecom_name', 2)->count();
        $grocerytotalReturnProductPrice = SupplierReturnProduct::where('ecom_name', 2)->sum('return_amount');
        $grocerytotalSupplierProductBuyingPurchase = Product::where('ecom_name', 2)->sum('old_purchase_price');
        $grocerycurrentTotalStockProductPrice = Product::where('ecom_name', 2)->sum('purchase_price');


   //Islamic Supplier Dashboard 
        
        $islamictotalSupplier = Supplier::where('ecom_id', 1)->count();
        $islamictotalProduct = Product::where('ecom_name', 1)->sum('purchase_qty');
        $islamiccurrentProductQty= Product::where('ecom_name', 1)->sum('product_qty');
        $islamicSellingNumberOfProduct =  Product::where('ecom_name', 1)->sum('purchase_qty') - $currentProductQty;
        $islamictotalProductSellingPrice = Product::where('ecom_name',1)->sum('selling_price');
        $islamictotalReturnProduct = SupplierReturnProduct::where('ecom_name', 1)->count();
        $islamictotalReturnProductPrice = SupplierReturnProduct::where('ecom_name', 1)->sum('return_amount');
        $islamictotalSupplierProductBuyingPurchase = Product::where('ecom_name', 1)->sum('old_purchase_price');
        $islamiccurrentTotalStockProductPrice = Product::where('ecom_name', 1)->sum('purchase_price');


//Fashion Supplier Dashboard 
        
        $fashiontotalSupplier = Supplier::where('ecom_id', 3)->count();
        $fashiontotalProduct = Product::where('ecom_name',3)->sum('purchase_qty');
        $fashioncurrentProductQty= Product::where('ecom_name', 3)->sum('product_qty');
        $fashionSellingNumberOfProduct =  Product::where('ecom_name', 3)->sum('purchase_qty') - $currentProductQty;
        $fashiontotalProductSellingPrice = Product::where('ecom_name', 3)->sum('selling_price');
        $fashiontotalReturnProduct = SupplierReturnProduct::where('ecom_name', 3)->count();
        $fashiontotalReturnProductPrice = SupplierReturnProduct::where('ecom_name', 3)->sum('return_amount');
        $fashiontotalSupplierProductBuyingPurchase = Product::where('ecom_name', 3)->sum('old_purchase_price');
        $fashioncurrentTotalStockProductPrice = Product::where('ecom_name', 3)->sum('purchase_price');
        
 
        return view('backend.supplier.supplierDashboardForOwner',
        compact('totalSupplier','totalProduct','SellingNumberOfProduct','totalReturnProduct','currentProductQty','totalProductSellingPrice','totalReturnProductPrice','totalSupplierProductBuyingPurchase'
        ,'currentTotalStockProductPrice','grocerytotalSupplier','grocerytotalProduct','grocerycurrentProductQty','grocerySellingNumberOfProduct','grocerytotalReturnProduct','grocerycurrentProductQty'
        ,'grocerytotalSupplierProductBuyingPurchase','grocerytotalReturnProductPrice','grocerycurrentTotalStockProductPrice','grocerytotalProductSellingPrice',
        
        'islamictotalSupplier',
        'islamictotalProduct','islamiccurrentProductQty','islamicSellingNumberOfProduct','islamictotalReturnProduct','islamiccurrentProductQty'
        ,'islamictotalSupplierProductBuyingPurchase','islamictotalReturnProductPrice','islamiccurrentTotalStockProductPrice','islamictotalProductSellingPrice',
        
        'fashiontotalSupplier',
        'fashiontotalProduct','fashioncurrentProductQty','fashionSellingNumberOfProduct','fashiontotalReturnProduct','fashioncurrentProductQty'
        ,'fashiontotalSupplierProductBuyingPurchase','fashiontotalReturnProductPrice','fashioncurrentTotalStockProductPrice','fashiontotalProductSellingPrice'
        
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
        public function supplierProduct(){
         $productList = Product::where('supplier_id',Auth::user()->supplier_id)->with('returnHistory','paymentHistory')->get();
    //   dd($productList);
       
        return view('backend.supplier.product_list',compact('productList'));
          }
          
         // Supplier Return Payment start
         public function supplierPayment(){
             
        $productInformations = Product::where('supplier_id',Auth::user()->supplier_id)->with('supplier','brand','returnHistory','paymentHistory')->get();
        
        $supplierInformation=Supplier::where('id',Auth::user()->supplier_id)->first();
        return view('backend.supplier.payment_history',compact('productInformations','supplierInformation'));
          }
         // Supplier Return Payment end
  
     // Supplier Return Product start
       public function supplierReturnProduct(){
      $returnPrductInformation=Product::where('supplier_id',Auth::user()->supplier_id)->with('brand','returnHistory','paymentHistory')->get();
            return view('backend.supplier.supplier_return_product',compact('returnPrductInformation'));
          }
      // Supplier Return Product start
       
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
