<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect($service) {
        return Socialite::driver( $service )->redirect();
    }

    public function callback($service) {
                
        try {
            $serviceUser = Socialite::with($service)->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/connexion');
        }
        $today = date("Y-m-d H:i:s"); 
        $existingUser = Users::where('email', $serviceUser->email)->first();  
        if($existingUser){
            auth()->login($existingUser);
        } else {    
            $user = Users::create([
                'nom' => $serviceUser->getName(),
                'email' => $serviceUser->getEmail(),
                'email_verified_at' => $today,
            ]);
            auth()->login($user);
        }
        return redirect()->action('ProfilController@myads');
    }
}
