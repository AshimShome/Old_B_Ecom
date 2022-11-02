<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Models\MerchantBusinessCategory;
use App\Models\MerchantPackage;
use App\Models\PostCode;
use Illuminate\Support\Facades\Auth;

class MarchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowCatgoryBusiness()
    {
      return view('backend.couier_panel.business_category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MarchantControllerStore($role,Request $request)
    {
           $businessCategory = new MerchantBusinessCategory();
           $businessCategory->business_name = $request->business_name;
           $businessCategory->save();
           return response($businessCategory);
    }

    public function MarchantControllerShow(){
            $businessCategory = MerchantBusinessCategory::all();
            return response($businessCategory);
}

    public function MarchantControllerDelete($role,$id){

            $data = MerchantBusinessCategory::find($id);
            $data->delete();
            return response($data);
}
    public function MarchantControllerEdit($role,$id){
            $data = MerchantBusinessCategory::find($id);
            return response($data);
}
    public function MarchantControllerUpdate($role,Request $request, $id){

            $data = MerchantBusinessCategory::find($id);
            $data->business_name = $request->business_name;
            $data->update();
            return response($data);
}
// ================marchant add marchant==================
      // MerchantListAdd
      public function MerchantListAdd(){
        $add_marchants = MerchantBusinessCategory::all();
        $post_codes = PostCode::all();

        return view('backend.couier_panel.add_merchant',compact('add_marchants','post_codes'));
    }

 // MerchantList store ==================
    public function MarchantControllerStoreData($role,Request $request){

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
        $businessCategoryMerchant = new Merchant();
        $businessCategoryMerchant->merchant_name = $request->merchant_name;
        $businessCategoryMerchant->merchant_owner_name = $request->merchant_owner_name;
        $businessCategoryMerchant->merchant_phone_one = $request->merchant_phone_one;
        $businessCategoryMerchant->merchant_phone_two = $request->merchant_phone_two;
        $businessCategoryMerchant->merchant_bank_details = $request->merchant_bank_details;
        $businessCategoryMerchant->merchant_mobile_bank_details = $request->merchant_mobile_bank_details;
        $businessCategoryMerchant->business_category_id  = $request->business_category_id ;
        $businessCategoryMerchant->merchant_zone_id  = $request->merchant_zone_id ;
        $businessCategoryMerchant->merchant_address  = $request->merchant_address ;
        $businessCategoryMerchant->merchant_id = '#'.$grn;
        $businessCategoryMerchant->save();
        return response($businessCategoryMerchant);
    }
     // MerchantList delete
        public function MarchantControllerDeleteData($role,$id){
            $data = Merchant::find($id);
            $data->delete();
            return response($data);
        }
        public function MarchantControllerEditData($role,$id){
            $data = Merchant::find($id);
            return response($data);
        }

//merchant update data=========================
public function MarchantControllerUpdateData($role,Request $request, $id){

    $businessCategoryMerchant = Merchant::find($id);
    $businessCategoryMerchant->merchant_name = $request->merchant_name;
    $businessCategoryMerchant->merchant_owner_name = $request->merchant_owner_name;
    $businessCategoryMerchant->merchant_phone_one = $request->merchant_phone_one;
    $businessCategoryMerchant->merchant_phone_two = $request->merchant_phone_two;
    $businessCategoryMerchant->merchant_bank_details = $request->merchant_bank_details;
    $businessCategoryMerchant->merchant_mobile_bank_details = $request->merchant_mobile_bank_details;
    $businessCategoryMerchant->merchant_address  = $request->merchant_address ;
    $businessCategoryMerchant->update();
    return response($businessCategoryMerchant);
}

// ==================marchant packeges  list===================
public function MerchantPackageList(){
    $post_codesPackages = MerchantBusinessCategory::with('merchantCategorysPackages')->get();
    $merchantAllDatas = Merchant::all();
    $last_row = MerchantPackage::select('merchant_package_id')->latest()->limit(1)->first();
    $data =+(optional($last_row)->merchant_package_id);

    return view('backend.couier_panel.merchant_package_list',compact('post_codesPackages','merchantAllDatas','data'));
}
// ==================marchant packeges  store===================
public function MarchantControllerPackageStoreData($role,Request $request){

    function generateRandomStrings($length = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $grn = generateRandomStrings();
    // $businessCategoryMerchantPackages = MerchantPackage::count();
    $businessCategoryMerchantPackage = new MerchantPackage();

    // if($businessCategoryMerchantPackages < 10){
    //      $businessCategoryMerchantPackage->merchant_package_id = 'sp100'. $businessCategoryMerchantPackages;
    // }elseif($businessCategoryMerchantPackages <=100){
    //      $businessCategoryMerchantPackage->merchant_package_id = 'sp100'. $businessCategoryMerchantPackages;
    // }
    // elseif($businessCategoryMerchantPackages <=1000){
    //      $businessCategoryMerchantPackage->merchant_package_id = 'sp100'. $businessCategoryMerchantPackages;
    // } elseif($businessCategoryMerchantPackages <=10000){
    //      $businessCategoryMerchantPackage->merchant_package_id = 'sp100'. $businessCategoryMerchantPackages;
    // } elseif($businessCategoryMerchantPackages <=100000){
    //      $businessCategoryMerchantPackage->merchant_package_id = 'sp100'. $businessCategoryMerchantPackages;
    // }
    // else{
    //      $businessCategoryMerchantPackage->merchant_package_id = 'sp100'. $businessCategoryMerchantPackages;
    // }



    $businessCategoryMerchantPackage->customer_name = $request->customer_name;
    $businessCategoryMerchantPackage->merchant_id = $request->merchant_id;
    $businessCategoryMerchantPackage->package_category_id = $request->package_category_id;
    $businessCategoryMerchantPackage->merchant_package_id = $request->merchant_package_id;
    $businessCategoryMerchantPackage->customer_id = '#@'.$grn;
    $businessCategoryMerchantPackage->customer_phone = $request->customer_phone;
    $businessCategoryMerchantPackage->package_weight = $request->package_weight;
    $businessCategoryMerchantPackage->customer_expected_delivery_time = $request->customer_expected_delivery_time;
    $businessCategoryMerchantPackage->payment_type = $request->payment_type;
    $businessCategoryMerchantPackage->product_price  = $request->product_price ;
    $businessCategoryMerchantPackage->delivery_fee  = $request->delivery_fee ;
    $businessCategoryMerchantPackage->customer_address  = $request->customer_address ;
    $businessCategoryMerchantPackage->save();
    return response($businessCategoryMerchantPackage);
}
// =====================packages data show==========================
public function MarchantControllerPackageShowData(){
    $businessCategory = MerchantPackage::with('merchantCategorysBusinessPackages')->get();
    // dd($businessCategory );
    return response($businessCategory);
}
// ======================packages Delete ==================================
public function MarchantControllerPackageDeleteData($role,$id){
    $data = MerchantPackage::find($id);
    $data->delete();
    return response($data);
}
// =====================edit package ==================
public function MarchantControllerPackageEditData($role,$id){
    $data= MerchantPackage::find($id);
    return response($data);
}
// ===================update packages========================
        public function MarchantControllerPackageUpdateData($role,Request $request, $id){
            // dd($request->all());
            function generateRandomStringss($length = 6)
            {
                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
            $grn = generateRandomStringss();


            function generateRandomStringeses($length = 6)
            {

                $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
            $grns = generateRandomStringeses();

            $businessCategoryMerchantPackage =MerchantPackage::find($id);
            $businessCategoryMerchantPackage->customer_name = $request->customer_name;
            // $businessCategoryMerchantPackage->package_category_id = $request->package_category_id;
            $businessCategoryMerchantPackage->merchant_package_id = '#'.$grns;
            $businessCategoryMerchantPackage->customer_id = '#@'.$grn;
            $businessCategoryMerchantPackage->customer_phone = $request->customer_phone;
            $businessCategoryMerchantPackage->package_weight = $request->package_weight;
            $businessCategoryMerchantPackage->customer_expected_delivery_time = $request->customer_expected_delivery_time;
            $businessCategoryMerchantPackage->payment_type = $request->payment_type;
            $businessCategoryMerchantPackage->product_price  = $request->product_price ;
            $businessCategoryMerchantPackage->delivery_fee  = $request->delivery_fee ;
            $businessCategoryMerchantPackage->customer_address  = $request->customer_address ;
            $businessCategoryMerchantPackage->update();
            return response($businessCategoryMerchantPackage);
        }


}
