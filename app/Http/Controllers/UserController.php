<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Nexmo\Laravel\Facade\Nexmo;
use DB;
use Hash;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request){
        Log::info($request);
        if(Auth::attempt(['mobile' => request('mobile'), 'password' => request('password')])){
            return redirect('/');
        }
        else{
            return Redirect::back();
        }
    }

    public function loginWithOtp(Request $request){
        Log::info($request);

        $user  = User::where([['mobile','=',request('mobile')],['otp','=',request('otp')]])->first();

        if( $user){
            Auth::login($user, true);
            User::where('mobile','=',$request->mobile)->update(['otp' => null]);
            return redirect('/checkout');
        }
        else{
            return Redirect::back();
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $supplier_code = User::count();
        $user = new User();
        if($supplier_code < 10){
            $user->customer_id = '#000000'. $supplier_code;
        }elseif($supplier_code <=100){
            $user->customer_id = '#00000'. $supplier_code;
        }
        elseif($supplier_code <=1000){
            $user->customer_id = '#0000'. $supplier_code;
        } elseif($supplier_code <=10000){
            $user->customer_id = '#000'. $supplier_code;
        } elseif($supplier_code <=100000){
            $user->customer_id = '#00'. $supplier_code;
        }
        else{
            $user->customer_id = '#0'. $supplier_code;
        }

    // ------------------------auto data create---------------------

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->password =  bcrypt($request->password);
        $user->save();
        return redirect('/');
    }


    public function sendOtp(Request $request){
        

        $otp = rand(1000,9999);
        Log::info("otp = ".$otp);
        
        $input = $request->all();
        $input['otp'] = $otp;
        
        

        $user = DB::table('users')->where('mobile', $request->mobile)->first();
        if($user == true){
          $updateUserOTP = User::where('mobile','=',$request->mobile)->update(['otp' => $otp]);
        }
        else{
            $user = new User();
            $supplier_code = User::count();
            if($supplier_code < 10){
                $user->customer_id = '#000000'. $supplier_code;
            }elseif($supplier_code <=100){
                $user->customer_id = '#00000'. $supplier_code;
            }
            elseif($supplier_code <=1000){
                $user->customer_id = '#0000'. $supplier_code;
            } elseif($supplier_code <=10000){
                $user->customer_id = '#000'. $supplier_code;
            } elseif($supplier_code <=100000){
                $user->customer_id = '#00'. $supplier_code;
            }
            else{
                $users->customer_id = '#0'. $supplier_code;
            }
            $user->mobile = $request->mobile;
            $user->otp = $otp;

            $user->save();

        }
        
        $url = "http://66.45.237.70/api.php";
        $number = $user->mobile;
        
        $text="Your Bpp Shops OTP Code is ".$otp;
        $data= array(
        'username'=>"ShahidMahmum",
        'password'=>"Shahid26@.",
        'number'=>"$number",
        'message'=>"$text"
        );


        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];


    }




    function loginWithEmail(Request $request){
        // return $request;

        $user = DB::table('users')->where('email', $request->email)->first();

        if($user == true){
            Log::info($request);
            if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){


                return true;
            }
            else{
                return false;
            }

        }
        else{


            $user = new User();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::login($user);

            if(Auth::check())
            {
                return true;
            }
            else
            {
                return false;
            }
            // return true;
        }
    }



// ==========================> API Login & Register Start <============================
        // Mobile OTP Start
       public function sendOtpApi(Request $request){
        $otp = rand(1000,9999);
        Log::info("otp = ".$otp);
        // $user = User::where('mobile','=',$request->mobile)->update(['otp' => $otp]);
        $input = $request->all();
        $input['otp'] = $otp;

        $user = DB::table('users')->where('mobile', $request->mobile)->first();
        if($user == true){
          $updateUserOTP = User::where('mobile','=',$request->mobile)->update(['otp' => $otp]);
        }
        else{
            $user = new User();

            $user->mobile = $request->mobile;
            $user->otp = $otp;

            $user->save();
        }
        $url = "http://66.45.237.70/api.php";
        $number=$request->mobile;
        $text="Your Bpp Shops OTP Code is ".$otp;
        $data= array(
        'username'=>"ShahidMahmum",
        'password'=>"Shahid26@.",
        'number'=>"$number",
        'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];
    }
    // End Mobile OTP

    // Mobile Login OTP API Start
       public function loginWithOtpApi(Request $request){
        Log::info($request);
        $user  = User::where([['mobile','=',request('mobile')],['otp','=',request('otp')]])->first();
        if( $user){
            Auth::login($user, true);
            User::where('mobile','=',$request->mobile)->update(['otp' => null]);
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];
            return response($response,201);
        }
        else{
            return response()->json(['message'=>'login failed'], 401);
        }
    }
    // Mobile Login OTP API End


    // Register API Start
     public function registerapi(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
        ]);
        $user = User::create([
            'name' => $fields['name'],
            'mobile' => $fields['mobile'],
        ]);
        $supplier_code = User::count();
        $users = new User();
        if($supplier_code < 10){
            $users->customer_id = '#000000'. $supplier_code;
        }elseif($supplier_code <=100){
            $users->customer_id = '#00000'. $supplier_code;
        }
        elseif($supplier_code <=1000){
            $users->customer_id = '#0000'. $supplier_code;
        } elseif($supplier_code <=10000){
            $users->customer_id = '#000'. $supplier_code;
        } elseif($supplier_code <=100000){
            $users->customer_id = '#00'. $supplier_code;
        }
        else{
            $users->customer_id = '#0'. $supplier_code;
        }
       // ------------------------auto data create---------------------
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response,201);
    }
    // Register API End

    // Login Mobile login start
      public function loginAPI(Request $request){
        Log::info($request);
        // ------------------NewAdd------------------
        $fields = $request->validate([
            'mobile' => 'required|string',
            'password' => 'required|string'
        ]);
        $user = User::where('mobile',$fields['mobile'])->first();
        if(Auth::attempt(['mobile' => request('mobile'), 'password' => request('password')])){
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = [

                            'token' => $token
                        ];
                        return response($response,201);
        }
        else{
            return response()->json(['message'=>'login failed'], 401);
        }
    }
    // Login Mobile Login End


// ==========================> API Login & Register End <============================


}
