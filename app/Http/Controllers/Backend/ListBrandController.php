<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Ecommerce_Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class ListBrandController extends Controller
{
    //
     // List view
     public function ListView(){
         $ecoms = Ecommerce_Name::all();
        $brands = Brand::paginate(10);
        $category = Category::latest()->paginate(10);
        $subcategory = SubCategory::latest()->paginate(10);
        $subsubcategory = SubSubCategory::latest()->paginate(10);
        $employeePermision = json_decode(Auth::guard('admin')->user()->permission,true);
        $employee= Auth::guard('admin')->user()->employee_id;
        return view('backend.bannerCatagory.list_brand_category',compact('brands','ecoms','category','subcategory','subsubcategory','employeePermision','employee'));

    } // end mathod

      public function EcommerceStore(Request $request){
        $validator = Validator::make($request->all(), [
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }
        else {
            $ecom = new Ecommerce_Name;
            $ecom->ecom_name = $request->input('ecom_name');
            $ecom->save();
            return response()->json([
                'message' => 'Ecommerce Added Successfully',
                'ecom'=>$ecom
            ]);
        }

    } // end mathod


      // Edit Method
    public function EcommerceEdit($role, $id)
    {
        $ecom = Ecommerce_Name::find($id);
        return response()->json([
            'status' => 200,
            'ecom' => $ecom,
        ]);
    } // end edit
    // update

    //update
    public function EcommerceUpdate(Request $request, $role, $id)
    {

        $ecom = Ecommerce_Name::find($id);
        if (!$ecom) {
            return response()->json(['message' => ' Not Found'], 404);
        }
        $validator = Validator::make($request->all(), [
            // 'brand_name_cats_eye' => 'required',
            // 'brand_image'         =>'required|image',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            $ecom->ecom_name = $request->input('ecom_name');
            $ecom->update();
            return response()->json(['message' => 'Ecommerce Name Updated Successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    } //end update
     //  auto method
        public function AutoloadAll($role,$category_id){

         $brand = Brand::where('ecom_id',$category_id)->orderBy('brand_name_cats_eye', 'ASC')->get();
            $cat = Category::where('ecom_id',$category_id)->orderBy('category_name', 'ASC')->get();
            $subcat = SubCategory::where('ecom_id',$category_id)->orderBy('sub_category_name', 'ASC')->get();
          $subsubcat = SubSubCategory::where('ecom_id',$category_id)->orderBy('subsubcategory_name', 'ASC')->get();
           $supplier = Supplier::where('ecom_id',$category_id)->orderBy('supplyer_name', 'ASC')->get();
            return response()->json([
            'brand' => $brand,
            'subcat' => $subcat,
            'cat' => $cat,
            'subsubcat' => $subsubcat,
            'supplier' => $supplier,
        ]);

      }// end mathod
        //delete
    public function EcommerceDelete($role, $id)
    {
        $ecom = Ecommerce_Name::find($id);
        $ecom->delete();
        return redirect()->back();
    } // end delete method

}
