<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginWithFacebookController extends Controller
{
    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        try {
        
            $user = Socialite::driver('facebook')->user();
         
            $finduser = User::where('facebook_id', $user->id)->first();
        
            if($finduser){
         
                Auth::login($finduser);
        
                return redirect()->intended('heme');
         
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => encrypt('Test123456')
                ]);
        
                Auth::login($newUser);
        
                return redirect()->intended('heme');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
