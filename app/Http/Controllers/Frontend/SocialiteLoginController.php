<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
class SocialiteLoginController extends Controller
{

// Google Login
public function redirectToGoogle(Request $request)
    {
        if (!$request->session()->has('redirectUrlAfterLogin')) {
            
            Session::put('redirectUrlAfterLogin', url()->previous());
    
        }
        
        return Socialite::driver('google')->redirect();
    }

// Google callback
public function handleGoogleCallback(Request $request)
{

    $user = Socialite::driver('google')->stateless()->user();
    $this->_registerOrLoginUser($user);
    
    $redirectUrlAfterLogin = Session::get('redirectUrlAfterLogin');
    
    $request->session()->forget('redirectUrlAfterLogin');
    
    return redirect($redirectUrlAfterLogin);
    
}
// Google Login
public function redirectToGoogleAPI(Request $request)
    {
          $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if (!$request->session()->has('redirectUrlAfterLogin')) {
            
            Session::put('redirectUrlAfterLogin', url()->previous());
    
        }
        
        return Socialite::driver('google')->redirect();
    }

// Google callback
public function handleGoogleCallbackAPI(Request $request)
{

    $user = Socialite::driver('google')->stateless()->user();
    $this->_registerOrLoginUser($user);
    
    $redirectUrlAfterLogin = Session::get('redirectUrlAfterLogin');
    
    $request->session()->forget('redirectUrlAfterLogin');
    
    return redirect($redirectUrlAfterLogin);
    
}
// Facebook Login
    public function redirectToFacebook()
    {
        
     
        return Socialite::driver('facebook')->redirect();
    }

// Facebook callback
    public function handleFacebookCallback()
    {
        
        $user = Socialite::driver('facebook')->stateless()->user();
        
        $this->_registerOrLoginUser($user);

        return redirect('/');
        
    }
    
// Twitter Login Section

// Twitter Login
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

// Twitter callback
    public function handleTwitterCallback()
    {

        $user = Socialite::driver('twitter')->stateless()->user();
        $this->_registerOrLoginUser($user);

        return redirect()->route('islamic');
        
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=',  $data->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }

}
