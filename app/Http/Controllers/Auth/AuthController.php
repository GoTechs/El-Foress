<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Users;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function create (){
        return view('inscription');
    }

    public function store (Request $request){

        $validator = Validator::make($request->all(),[
            "nom" => "required|string",
            "email" => "required|email|max:255|unique:users",
            "password" => "bail|required|min:8|max:30|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/",
            "confirmPassword" => "required|same:password",
        ]);

        if ($validator->fails()) {
            return redirect('admin/inscription')
                ->withErrors($validator)
                ->withInput();
        }

        $nom = $request->nom;
        $email = $request->email;
        $request['password']= bcrypt($request->password);

		event(new Registered($user = Users::create([
            'nom' => request('nom'),
            'email' => request('email'),
            'password' => request('password'),
        ])));


        //$lastID = $user->id;

        //return redirect()->route('verification.verify', ['id' => $lastID]);
        
        return view('auth.verify');
    }

}
