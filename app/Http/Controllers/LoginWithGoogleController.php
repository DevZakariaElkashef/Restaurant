<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGoogleController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        try {
        
            $user = Socialite::driver('google')->stateless()->user();

         
            $finduser = User::where('google_id', $user->id)->first();
        
            if($finduser){
         
                Auth::login($finduser);
        
                return redirect()->intended('home');
         
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => 'customer',
                    'google_id'=> $user->id,
                    'password' => encrypt('Test123456')
                ]);
        
                Auth::login($newUser);
        
                return redirect()->intended('home');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
