<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect($service) {
        return Socialite::driver( $service )->redirect();
    }

    public function callback($service) {

        $serviceUser = Socialite::with($service)->stateless()->user();
        $today = date("Y-m-d H:i:s");         
        $user = Users::create([
            'nom' => $serviceUser->getName(),
            'email' => $serviceUser->getEmail(),
            'email_verified_at' => $today,
        ]);
        auth()->login($user);
        return redirect()->action('ProfilController@myads');
    }
}
