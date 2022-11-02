<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\DealsTime;
use App\Models\Product;
use App\Models\supplerPaymentHistory;

use App\Models\EmployeeDeleteHistory;

use App\Models\EmployeeTecking;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Ecommerce_Name;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\MultiImg;
use Intervention\Image\Facades\Image;
use App\Models\Admin;
use App\Models\Employee;
use Auth;
use DB;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    // Auto category select
     public function AutoSelectCategory($role, $category_id){
          $autoselect_cat = Category::where('ecom_id', $category_id)->orderBy('category_name', 'DESC')->get();
        return json_encode($autoselect_cat);
     } // end


    // product Details view
     public function ViewProduct($id)
    {

        $category = Category::latest()->get();
        $supplier = Supplier::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::all();
        return view('backend.product.product_add', compact('category', 'brands', 'subcategory', 'subsubcategory', 'supplier'));
    }
       // sub category auto method
        public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('sub_category_name', 'ASC')->get();
        return json_encode($subcat);
      }// end mathod

// ==================> Product Add Start <======================================================================
    public function ProductAdd()
    {
        // $purchase_product = Purchase::whereNotNull('new_product')->orderBy('id','DESC')->get();
        $category = Category::latest()->get();
        $supplier = Supplier::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::all();
        return view('backend.product.product_add', compact('category', 'brands', 'subcategory', 'subsubcategory', 'supplier'));
    }
// ==================> Product Add End <======================================================================
// ==================> Product Store Start <==================================================================
    public function StoreProduct(Request $request)
    {

        // dd($request->all());
          $request->validate([
                'product_thambnail' => 'required',
                    'multi_img.*' => 'required',
                    'ecom_name' => 'required',
                    'product_name'=>'required',
                    'supplier_id'=>'required',
                    'brand_id'=>'required',
                    'category_id'=>'required',
                    'sub_category_id'=>'required',
                    'product_qty'=>'required',
                    'unit_price'=>'required',
                    'selling_price'=>'required',
                    'product_descp'=>'required',
                ],[
                     'multi_img.*.mimes:webp' => 'Multi Image must be type of format:webp',
                    'ecom_name.required' => 'Input Ecommerce Name First',
                    'product_name.required'=>'Product Name required',
                    'supplier_id.required'=>'Supplier Name is required',
                    'brand_id.required'=>'Brand Name is required',
                    'category_id.required'=>'Category Name is required',
                    'sub_ctaegory_id.required'=>'Sub Category Name is required',
                    //  'sub_sub_category_id.required'=>'Sub Sub Category Name  required',
                    'product_qty.required'=>'Product Quantity is required',
                    'unit_price.required'=>'Unit Price is required',
                    'selling_price.required'=>'Selling Price is required',
                    'product_descp.required'=>'Product Description is required',

                ]);

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
            $colors = $request->file('product_color');
           $product = new Product();
            $product->ecom_name = $request->input('ecom_name');
            $product->product_name = $request->input('product_name');
            $product->product_code = '#' . $grn;
            $product->brand_id = $request->input('brand_id');
            $product->supplier_product_code = $request->input('supplier_product_code');
            $product->product_slug_name =  strtolower(str_replace(' ', '-', $request->input('product_name'))).$grn;
            $product->supplier_id = $request->input('supplier_id');
            $product->category_id = $request->input('category_id');
            $product->sub_category_id = $request->input('sub_category_id');
            $product->sub_sub_category_id = $request->input('sub_sub_category_id');
            $product->product_tags = $request->input('product_tags');
            $product->barCode = $request->input('barCode');
            if ($request->refundable == "on") {
                $product->refundable =  "1";
            } else {
                $product->refundable =  "0";
            }

            $product->video_link = $request->input('video_link');
            if ($request->product_color) {
                $colorString = implode(",",$request->get('product_color'));
                $product->product_color=$colorString;
            }
            if ($request->product_size) {
                $sizerString = implode(",",$request->get('product_size'));
                $product->product_size=$sizerString;
            }
            $product->selling_price = $request->input('selling_price');
            $product->discount_price = $request->input('discount_price');
            $product->start_date = $request->input('start_date');
            $product->end_date = $request->input('end_date');
            $product->long_info = $request->input('long_info');

            $product->product_qty = $request->input('product_qty');
            $product->product_descp = $request->input('product_descp');
            $product->meta_title = $request->input('meta_title');
            $product->meta_desc = $request->input('meta_desc');
            if($request->vat==NUll){
                $product->vat = 0.00;

            }else{
            $product->vat = $request->input('vat');

            }
            $product->unit = $request->input('unit');
            $product->purchase_qty = $request->input('purchase_qty');
            $product->unit_price = $request->input('unit_price');
            $product->purchase_price = $request->input('purchase_price');

            $product->old_purchase_price = $request->input('purchase_price');

            $product->purchase_date = $request->input('purchase_date');
            $product->product_expire_date = $request->input('product_expire_date');
            $product->product_expire_alert_date = $request->input('product_expire_alert_date');
            $product->product_stock_alert = $request->input('product_stock_alert');
            $product->shipping_fee = $request->input('shipping_fee');
            $product->sku_code = $request->input('sku_code');
            if ($request->shipping == "on") {
                $product->shipping =  "1";
            } else {
                $product->shipping =  "0";
            }
            if ($request->cash_on_delivery == "on") {
                $product->cash_on_delivery =  "1";
            } else {
                $product->cash_on_delivery =  "0";
            }
            if ($request->hot_deals == "on") {
                $product->hot_deals =  "1";
            } else {
                $product->hot_deals =  "0";
            }
            if ($request->featured == "on") {
                $product->featured =  "1";
            } else {
                $product->featured =  "0";
            }
            if ($request->special_offer == "on") {
                $product->special_offer =  "1";
            } else {
                $product->special_offer =  "0";
            }
            if ($request->special_deals == "on") {
                $product->special_deals =  "1";
            } else {
                $product->special_deals =  "0";
            }
            $product->status = 1;

            // img main
             if ($request->file('product_thambnail')) {
            $image = $request->file('product_thambnail');
            $name_gen = $product->product_slug_name . '.' .'webp';
            Image::make($image)->resize(1024, 1024)->encode('webp', 90)->save('upload/products/thambnail/' . $name_gen);
            $save_url = 'upload/products/thambnail/' . $name_gen;
            $product->product_thambnail = $save_url;
            }
            //end
            $product->save();
            if ($request->file('multi_img')) {
                // Multiple img upload start
                $MultiImg = new MultiImg;
                $images = $request->file('multi_img');
                foreach ($images as $loop=>$img) {
            $make_name = $product->product_slug_name .$loop. '.' .'webp';
            Image::make($img)->resize(1024, 1024)->encode('webp', 90)->save('upload/products/multi-image/' . $make_name);
                    $uploadPath = 'upload/products/multi-image/' . $make_name;

                    $MultiImg= MultiImg::insert([
                        // product_id is all info make single id
                        'product_id' => $product->id,
                        'photo_name' => $uploadPath,
                        'created_at' => Carbon::now(),
                    ]);
                } // end loop
            }

              $supplerPaymentHistory= supplerPaymentHistory::insert([
                        'date'=>date("Y/m/d"),
                        'supplier_id' => $product->supplier_id,
                        'product_id' => $product->id,
                        'supplier_return_product_id' => $product->id,
                        'withdrawal_amount' => 0.00,
                        'due_amount' =>$product->purchase_price,
                        'created_at' => Carbon::now(),

                    ]);


                      $employeeTecking= EmployeeTecking::insert([
                        'employee_date'=>date("Y-m-d h:i:sa"),
                        'employee_id' =>Auth::user()->employee_id,
                        'product_id' => $product->id,
                        'working_info' =>'productAdd',
                        'today_date' =>date("Y-m-d"),


                    ]);



            $notification =
             array(
                    'message' => 'Product Added Successfully',
                    'alert-type' => 'success'
                );
                // dd($product);
            return redirect()->route('role.manage-product', config('fortify.guard'))->with($notification);

    }

// ==================> Product Store End <====================================================================
// ==================> Product View Start <===================================================================
    public function ManageProduct()
    {
        $workpermits = Product::select('product_expire_date')->where('product_expire_date', '<', Carbon::now()->subDays(7))->get();
        $category = Category::latest()->get();
        $supplier = Supplier::get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::all();

        $employeePermision = json_decode(Auth::guard('admin')->user()->permission,true);
        $employee= Auth::guard('admin')->user()->employee_id;

        $product = Product::with('brand', 'category', 'subcategory', 'subsubcategory', 'supplier')->orderBy('updated_at','DESC')->paginate(10);

        return view('backend.product.product_view', compact('product','category','supplier','brands','subcategory','subsubcategory','employeePermision','employee'));
    }
// ==================> Product View End <=====================================================================
// ==================> Product All Info Show Start <==========================================================
    public function ProductAllInfoView($role, $id)
    {
        $product_edit = Product::with('supplier','brand','category','subcategory','subsubcategory')->findOrFail($id);

         $multiimgs = MultiImg::where('product_id', $id)->get();
         return response()->json([
            'status' =>200,
            'product_edit' => $product_edit,
             'multiimgs' => $multiimgs,
        ]);

    }

// ==================> Product All Info Show End <===========================================================
// ==================> Product Edit Start <==================================================================
    public function EditProduct($role, $id)
    {
        $products = Product::find($id);
          $ecoms=Ecommerce_Name::latest()->get();

         $category = Category::where('ecom_id',$products->ecom_name)->latest()->get();

        $supplier = Supplier::latest()->where('ecom_id',$products->ecom_name)->get();
        $brands = Brand::latest()->where('ecom_id',$products->ecom_name)->get();
        $subcategory = SubCategory::latest()->where('ecom_id',$products->ecom_name)->get();
        $subsubcategory = SubSubCategory::where('ecom_id',$products->ecom_name)->latest()->get();
        $multiimgs = MultiImg::where('product_id', $id)->get();
        return view('backend.product.product_edit',compact('products','multiimgs','category','supplier','brands','subcategory','subsubcategory','ecoms'));
    }

// ==================> Product Edit End <===================================================================
// ================== > Product New Update start <=======================================================
 public function UpdateProduct(Request $request)
    {


       $request->validate([
            //  'product_thambnail' => 'required',
                    'ecom_name' => 'required',
                    'product_name'=>'required',
                    'supplier_id'=>'required',
                    'brand_id'=>'required',
                    'category_id'=>'required',
                    'sub_category_id'=>'required',
                    // 'sub_sub_category_id'=>'required',
                    'product_qty'=>'required',
                    'unit_price'=>'required',
                    'selling_price'=>'required',
                    'product_descp'=>'required',
                ],[
                    'ecom_name.required' => 'Input Ecommerce Name First',
                    'product_name.required'=>'Product Name required',
                    'supplier_id.required'=>'Supplier Name is required',
                    'brand_id.required'=>'Brand Name is required',
                    'category_id.required'=>'Category Name is required',
                    'sub_ctaegory_id.required'=>'Sub Category Name is required',
                    //  'sub_sub_category_id.required'=>'Sub Sub Category Name  required',
                    'product_qty.required'=>'Product Quantity is required',
                    'unit_price.required'=>'Unit Price is required',
                    'selling_price.required'=>'Selling Price is required',
                    'product_descp.required'=>'Product Description is required',

                ]);





         //======================== product_thambnail Start ======================================================
        $product_id = $request->id;
        $old_img2  = $request->old_image2;
        $product = Product::find($product_id);
        if ($request->file('product_thambnail') )
         {
              if(file_exists($old_img2)){
                  unlink($old_img2);
              }
            $image = $request->file('product_thambnail');
             $name_gen = $product->product_slug_name .'.' .'webp';
            Image::make($image)->resize(1024, 1024)->encode('webp', 90)->save('upload/products/thambnail/'.$name_gen);
            $save_url = 'upload/products/thambnail/' . $name_gen;
              $product->product_thambnail = $save_url;
       }
//======================== product_thambnail End ======================================================





            $product->ecom_name = $request->input('ecom_name');
            $product->product_name = $request->input('product_name');
            $product->brand_id = $request->input('brand_id');
            $product->supplier_id = $request->input('supplier_id');
            $product->category_id = $request->input('category_id');
            $product->sub_category_id = $request->input('sub_category_id');
            $product->sub_sub_category_id = $request->input('sub_sub_category_id');
            $product->product_tags = $request->input('product_tags');
            $product->barCode = $request->input('barCode');
            if ($request->refundable == "on") {
                $product->refundable =  "1";
            } else {
                $product->refundable =  "0";
            }
            $product->video_link = $request->input('video_link');
            if ($request->product_size) {

                $sizerString = implode(",",$request->get('product_size'));

                $product->product_size=$sizerString;
            }else{
                $product->product_size="null";
            }


            if ($request->product_color) {

                $colorString = implode(",",$request->get('product_color'));

                $product->product_color=$colorString;
            }else{
                $product->product_color="null";
            }







            $product->selling_price = $request->input('selling_price');
            $product->discount_price = $request->input('discount_price');
            $product->start_date = $request->input('start_date');
            $product->end_date = $request->input('end_date');
            $product->product_slug_name = $request->input('product_slug_name');
            $product->product_expire_date = $request->input('product_expire_date');
            $product->product_expire_alert_date = $request->input('product_expire_alert_date');
            $product->product_stock_alert = $request->input('product_stock_alert');
            $product->purchase_date = $request->input('purchase_date');
            $product->shipping_fee = $request->input('shipping_fee');
            $product->product_qty = $request->input('product_qty');
            $product->unit_price = $request->input('unit_price');
            $product->long_info = $request->input('long_info');
            $product->purchase_qty = $request->input('purchase_qty');
            $product->product_descp = $request->input('product_descp');
            $product->meta_title = $request->input('meta_title');
            $product->meta_desc = $request->input('meta_desc');
            $product->unit = $request->input('unit');
            $product->purchase_price = $request->input('purchase_price');
           if($request->vat==NUll){
                $product->vat = 0.00;

            }else{
            $product->vat = $request->input('vat');

            }
            $product->sku_code = $request->input('sku_code');
            if ($request->shipping == "on") {
                $product->shipping =  "1";
            } else {
                $product->shipping =  "0";
            }
            if ($request->cash_on_delivery == "on") {
                $product->cash_on_delivery =  "1";
            } else {
                $product->cash_on_delivery =  "0";
            }
            if ($request->hot_deals == "on") {
                $product->hot_deals =  "1";
            } else {
                $product->hot_deals =  "0";
            }
            if ($request->featured == "on") {
                $product->featured =  "1";
            } else {
                $product->featured =  "0";
            }
            if ($request->special_offer == "on") {
                $product->special_offer =  "1";
            } else {
                $product->special_offer =  "0";
            }
            if ($request->special_deals == "on") {
                $product->special_deals =  "1";
            } else {
                $product->special_deals =  "0";
            }

            $product->updated_at = Carbon::now();
            $product->status = 1;
            $product->update();
            $check=supplerPaymentHistory::where('product_id',$product_id)->first();
            if($check==null){

                 $supplerPaymentHistory= supplerPaymentHistory::insert([
                        'date'=>date("Y/m/d"),
                        'supplier_id' => $product->supplier_id,
                        'product_id' => $product->id,
                        'supplier_return_product_id' =>$product_id,
                        'withdrawal_amount' => 0.00,
                        'due_amount' =>$product->purchase_price,
                        'created_at' => Carbon::now(),

                    ]);

            }




                     $employeeTecking= EmployeeTecking::insert([
                        'employee_date'=>date("Y-m-d h:i:sa"),
                        'employee_id' =>Auth::guard('admin')->user()->employee_id ? Auth::guard('admin')->user()->employee_id : null,
                        'product_id' =>$product_id ,
                        'working_info' =>'productUpdate',
                        'today_date' =>date("Y-m-d"),

                    ]);


              $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );




             return redirect()->route('role.manage-product', config('fortify.guard'))->with($notification);
                 }
// ====================> Product New Update Ends <=======================================================

// ==================> Product Multiple Image Update Start <==============================================
    public function UpdateProductMultiImg(Request $request)
    {
         $request->validate([
             'multi_img.*.*' => 'required',
        ],
    [
         'multi_img.required' => 'Atleast 1 image change is required for update',
    ]);

        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            if ($id != 'new' && $img!=null) {
                $imgDel = MultiImg::findOrFail($id);
                 $imgcheck = MultiImg::with('product')->where('id',$id)->first();
                if($imgDel->photo_name && file_exists($imgDel->photo_name))
                {
                    unlink($imgDel->photo_name);
                }
                $make_name = $imgcheck->product->product_slug_name.rand(110,1111). '.' .'webp';
                Image::make($img)->resize(600, 600)->encode('webp', 90)->save('upload/products/multi-image/' . $make_name);
                $uploadPath = 'upload/products/multi-image/' . $make_name;
                MultiImg::where('id', $id)->update([
                    'photo_name' => $uploadPath,
                    'updated_at' => Carbon::now(),

                ]);
            }
        } // end foreach


        $product = Product::find($request->product_id);
        if(array_key_exists('new', $imgs))
        {
            foreach ($imgs['new'] as $img) {
                 $make_name = $product->product_slug_name.rand(110,1111). '.' . 'webp';
                Image::make($img)->resize(1024, 1024)->encode('webp', 90)->save('upload/products/multi-image/' . $make_name);
                $uploadPath = 'upload/products/multi-image/' . $make_name;
                MultiImg::insert([
                    // product_id is all info make single id
                    'product_id' => $product->id,
                    'photo_name' => $uploadPath,
                    'created_at' => Carbon::now(),
                ]);
            }

        }


        $notification = array(
            'message' => 'Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
// ==================> Product Multiple Image Update End <==============================================
// ==================> Product Multiple Image Delete Start <============================================
    public function MultiImageDelete($role, $id)
    {
        $oldimg = MultiImg::findOrFail($id);
        if(file_exists($oldimg->photo_name))
        {
            unlink($oldimg->photo_name);
        }
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Multi Image Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
// ==================> Product Multiple Image Delete Start <============================================
// ==================> Product Main Thambnail Update Start <============================================
    public function ThambnailImageUpdate(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' .'webp';
        Image::make($image)->resize(917, 1000)->encode('webp', 90)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Image Thambnail Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
// ==================> Product Main Thambnail Update End <============================================
// ==================> Product  Active & Deactive Start <=============================================
    public function ProductDeactive($role, $id)
    {

        $test = Product::where('id',$id)->first();
        // dd($id,$test);
        $test->update(['status' => 0,]);
        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
// ==================> Product  Active & Deactive ENd <==============================================
// ==================> Product  Active Start <=======================================================
    public function ProductActive($role, $id)
    {


        $test =  Product::where('id',$id)->first();
        // dd($test);
        $test->update(['status' => 1,]);
        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
// ==================> Product  Active End <========================================================
// ==================> Product  Delete Start <======================================================
    public function ProductDelete($role, $id)
    {
        $product = Product::find($id);


         $employeeTecking= EmployeeTecking::create([
                        'employee_date'=>date("Y-m-d h:i:sa"),
                        'employee_id' =>Auth::user()->employee_id,
                        'product_id' =>$product->id,
                        'working_info' =>'productDelete',
                        'today_date' =>date("Y-m-d"),
                           ]);


        //################################################################################################################################################################################################
            $employeeDeleteHistory = new EmployeeDeleteHistory();
            $employeeDeleteHistory->employee_id =Auth::user()->employee_id;
            $employeeDeleteHistory->product_id =$product->id;
            $employeeDeleteHistory->product_code =$product->product_code;
            $employeeDeleteHistory->employee_tecking =$employeeTecking->id;
            $employeeDeleteHistory->workingInfo ='productDelete';
            $employeeDeleteHistory->employee_date =date("Y-m-d h:i:sa");
            $employeeDeleteHistory->today_date =date("Y-m-d");
            $employeeDeleteHistory->product_thambnail =$product->product_thambnail;
            $employeeDeleteHistory->ecom_name = $product->ecom_name;
            $employeeDeleteHistory->product_name = $product->product_name;
            $employeeDeleteHistory->brand_id = $product->brand_id;
            $employeeDeleteHistory->supplier_id = $product->supplier_id;
            $employeeDeleteHistory->category_id = $product->category_id;
            $employeeDeleteHistory->sub_category_id = $product->sub_category_id;
            $employeeDeleteHistory->sub_sub_category_id = $product->sub_sub_category_id;
            $employeeDeleteHistory->product_tags = $product->product_tags;
            $employeeDeleteHistory->barCode = $product->barCode;
            $employeeDeleteHistory->video_link = $product->video_link;
            $employeeDeleteHistory->product_size = $product->product_size;
            $employeeDeleteHistory->product_color = $product->product_color;
            $employeeDeleteHistory->selling_price = $product->selling_price;
            $employeeDeleteHistory->discount_price = $product->discount_price;
            $employeeDeleteHistory->start_date = $product->start_date;
            $employeeDeleteHistory->end_date = $product->end_date;
            $employeeDeleteHistory->product_slug_name = $product->product_slug_name;
            $employeeDeleteHistory->product_expire_date = $product->product_expire_date;
            $employeeDeleteHistory->product_expire_alert_date = $product->product_expire_alert_date;
            $employeeDeleteHistory->product_stock_alert = $product->product_stock_alert;
            $employeeDeleteHistory->purchase_date = $product->purchase_date;
            $employeeDeleteHistory->shipping_fee = $product->shipping_fee;
            $employeeDeleteHistory->product_qty = $product->product_qty;
            $employeeDeleteHistory->unit_price = $product->unit_price;
            $employeeDeleteHistory->purchase_qty = $product->purchase_qty;
            $employeeDeleteHistory->product_descp = $product->product_descp;
            $employeeDeleteHistory->meta_title = $product->meta_title;
            $employeeDeleteHistory->meta_desc = $product->meta_desc;
            $employeeDeleteHistory->unit = $product->unit;
            $employeeDeleteHistory->purchase_price = $product->purchase_price;
            $employeeDeleteHistory->vat = $product->vat;
            $employeeDeleteHistory->sku_code = $product->sku_code;
            $employeeDeleteHistory->shipping = $product->shipping;
            $employeeDeleteHistory->cash_on_delivery = $product->cash_on_delivery;
            $employeeDeleteHistory->hot_deals = $product->hot_deals;
            $employeeDeleteHistory->featured = $product->featured;
            $employeeDeleteHistory->special_offer = $product->special_offer;
            $employeeDeleteHistory->special_deals = $product->special_deals;
            $employeeDeleteHistory->status = $product->status;
            $employeeDeleteHistory->save();


        //################################################################################################################################################################################################



        if ($product->product_thambnail) {
             $multi= MultiImg::where('product_id',$id)->get();
            foreach ($multi as $multiimg) {
                if(isset($multiimg) && file_exists($multiimg->photo_name))
                {
                    unlink( $multiimg->photo_name );
                }
               $multiimg->delete();
            }
             unlink( $product->product_thambnail); }
        $product->delete();
        $notification = array(
            'message' =>  'Product Deleted Sucessfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
// ==================> Product  Delete End <========================================================
// ==================> Product  stock Manage Start <================================================
    public function ProductStock()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    }
// ==================> Product  stock Manage End <================================================
// ==================> Product  stock Manage start <==============================================
    public function HotDeals()
    {
        $products = Product::where('hot_deals', '1')->get();
        $tottal_offer = DealsTime::with('products')->latest()->get();
        return view('backend.product.product_deal', compact('products', 'tottal_offer'));
    }
// ==================> Product  stock Manage End <==============================================
// ==================> Product  stock Manage Start <============================================
    public function HotDealsID($role, $id)
    {
        $deals = DealsTime::where('product_id', $id)->get();
        return response()->json($deals);
        return view('backend.product.product_deal', compact('products', 'tottal_offer'));
    }
// ==================> Product  stock Manage End <==============================================
// ==================> Product  stock Manage Start <============================================
    public function HotDealsStore(Request $request, $role)
    {
        if (!isset($request->id)) {
            $notification = array(
                'message' => 'Please Select Product First',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
        $product_dealsData = array();
        if (isset($request->hot_deal)) {
            $product_dealsData['hot_deals'] = $request->hot_deal;
        }
        if (isset($request->special_offer)) {
            $product_dealsData['special_offer'] = $request->special_offer;
        }
        if (isset($request->special_deal)) {
            $product_dealsData['special_deals'] = $request->special_deal;
        }
        $hot_deals = DealsTime::where('product_id', $request->id)->first();
        if ($hot_deals) {
            $hot_deals->update($product_dealsData);
            $notification = array(
                'message' => 'Deals Time updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $product_dealsData['product_id']  = $request->id;
            DealsTime::create($product_dealsData);
            $notification = array(
                'message' => 'Deals Time created Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
// ==================> Product  stock Manage End <============================================
// ==================> Product  Barcode  <============================================
    public function Barcode($role, $id, $print_quantity)
    {
        $Purchase_item = Product::where('id', $id)->first();

        return view('backend.pdf.barcode', compact('print_quantity', 'id', 'Purchase_item'));
    }
 // ==================> Product  Barcode <============================================

 //===================== Add New Product Start ==================================//
 public function addNewProduct()
 {

        $workpermits = Product::select('product_expire_date')->where('product_expire_date', '<', Carbon::now()->subDays(7))->get();
        $ecom = Ecommerce_Name::latest()->get();
        $categorys = Category::latest()->get();
        $supplier = Supplier::get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::all();
        $product = Product::with('brand', 'category', 'subcategory', 'subsubcategory', 'supplier','ecommerce')->get();

     return view('backend.product.new_product',compact('product','ecom','categorys','supplier','brands','subcategory','subsubcategory'));
 }



 //===================== Add New Product End ==================================//
//=====================  New Product count start ==================================//
 public function productCount()
 {

     $Ecom_names=Ecommerce_Name::all();
       return view('backend.product.product_count',compact('Ecom_names'));
 }

  public function singleEcomProductCount(Request $request)
 {
    //  dd( $request->ecom_id);

     $Ecom_names=Ecommerce_Name::where('id',$request->ecom_id)->first();


     $brand_products=Brand::select('id','brand_name_cats_eye')->where('ecom_id',$request->ecom_id)->get();

      $all_Category_products=Category::select('id','category_name')->where('ecom_id',$request->ecom_id)->get();
      $all_supplier_products=Supplier::select('id','supplyer_name')->where('ecom_id',$request->ecom_id)->get();

       return view('backend.product.single_product_count',compact('Ecom_names','brand_products','all_Category_products','all_supplier_products'));
 }

 //=====================  New Product  count End ==================================//


 //  search product with ajax
    public function searchProductWithAjax($adminId, $value){


        $admin = Admin::where('id',$adminId)->first();
        $employeePermision = json_decode($admin->permission,true);
        $employee=$admin->employee_id;

        if($value === 'deactive' ||  $value === 'Deactive'){

             $product= Product::where('status', 'LIKE', 0)
                ->with('brand', 'category', 'subcategory', 'subsubcategory', 'supplier','ecommerce')->get();
        }else{
            $product= Product::select(['products.*','suppliers.supplyer_name','suppliers.supplyer_id_code','ecommerce__names.ecom_name', 'categories.category_name','sub_categories.sub_category_name'])
                ->join('suppliers','products.supplier_id','suppliers.id')
                ->join('ecommerce__names','products.ecom_name','ecommerce__names.id')
                ->join('categories','products.category_id','categories.id')
                ->join('sub_categories','products.sub_category_id','sub_categories.id')
                ->where('product_name', 'LIKE', "%$value%")
                ->orWhere('ecommerce__names.ecom_name', 'LIKE', "%$value%")
                ->orWhere('product_code', 'LIKE', "%$value%")
                ->orWhere('suppliers.supplyer_name', 'LIKE', "%$value%")
                ->orWhere('suppliers.supplyer_id_code', 'LIKE', "$value%")
                ->orWhere('categories.category_name', 'LIKE', "$value%")
                ->orWhere('sub_categories.sub_category_name', 'LIKE', "%$value%")
                ->with('brand', 'category', 'subcategory', 'subsubcategory', 'supplier','ecommerce')
                ->get();

        }

                if($product->count() == 0){

                    $product = Product::where('product_code', 'LIKE', "%$value%")->orWhere('product_name', 'LIKE', "%$value%")->with('brand', 'category', 'subcategory', 'subsubcategory', 'supplier','ecommerce')->get();
                }

        return response()->json(['employeePermision'=>$employeePermision,'employee'=>$employee,'product'=>$product]) ;

    } // end













}
