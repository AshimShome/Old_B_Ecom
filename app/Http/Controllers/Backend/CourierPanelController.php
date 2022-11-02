<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Merchant;

use App\Models\MerchantPackage;
use App\Models\PostCode;
use Illuminate\Http\Request;

class CourierPanelController extends Controller
{


    // Courier Panel Dashboard Start============================
     public function CourierDashboard (){
        // $data = Merchant::join('post_codes','merchants.merchant_zone_id','post_codes.id')->where('upazila','Dhaka')->count();
        $datas = PostCode::where('upazila','!=','Dhaka')->where('upazila','!=','Dhaka City')->count();
        // dd($datas);


        // $data = Merchant::with('PostCodes')->whereHas('PostCodes',function($q)
        // {
        //     $q->where('upazila','Dhaka');})->count();
        // dd($data);

        return view('backend.couier_panel.courierdashboard');
    }
     // Courier Panel Dashboard end



         // MerchantList============================
     public function MerchantListNew(){
            $marchents=Merchant::with('merchantCategorys')->get();
        return view('backend.couier_panel.merchantlist',compact('marchents'));
    }
     // MerchantList===============================




    // MerchantPackageListAdd========================
     public function MerchantPackageListAdd(){

        return view('backend.couier_panel.merchant_package_list_add');
    }
     // MerchantPackageListAdd==========================


           // sendbymerchantpercellist====================
     public function SendByMerchantPercelList(){

        return view('backend.couier_panel.sendbymerchantpercellist');
    }
     // Courier Panel Merchant List end==========================

      // all_parcel_received_list_from_merchant==================
     public function AllParcelReceivedListFromMerchant(){
        $businessCategorys = MerchantPackage::with('merchantCategorysBusinessPackages','Merchant')->get();
        // dd($businessCategorys);
        return view('backend.couier_panel.all_parcel_received_list_from_merchant',compact('businessCategorys'));
    }
     // Courier Panel Merchant List end


       // all_parcel_received_list_from_merchant================================
     public function AllPackageDetailsListfromMerchant(){

        return view('backend.couier_panel.all_package_details_frommerchant');
    }
     // Courier Panel Merchant List end=============================




       // vehicle_driver_confirmationlist===========================
     public function VehicleDriverConfirmationList(){

        return view('backend.couier_panel.vehicle_driver_confirmationlist');
    }
     // vehicle_driver_confirmationlist

       // zone_supervisor_parcel_receive_driver==========================
     public function ZoneSupervisorParcelReceiveDriver(){

        return view('backend.couier_panel.zone_supervisor_parcel_receive_driver');
    }
     // zone_supervisor_parcel_receive_driver




       // ZoneWisePackagesDeliveryComplete============================
     public function ZoneWisePackagesDeliveryComplete(){

        return view('backend.couier_panel.zone_wise_ackages_delivery_complete');
    }
     // ZoneWisePackagesDeliveryComplete


       // PaymentReceivedDepositStatement================================
     public function PaymentReceivedDepositStatement(){

        return view('backend.couier_panel.payment_received_deposit_statement');
    }
     //PaymentReceivedDepositStatement
}
