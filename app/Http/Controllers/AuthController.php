<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function create (){
        return view('inscription');
    }

    public function store (Request $request){

        $validator = Validator::make($request->all(),[
            "nom" => "required|string",
            "email" => "required|email|max:255|unique:users",
            "password" => "required|min:6|max:55",
            "confirmPassword" => "required|same:password",
        ]);

        if ($validator->fails()) {
            return redirect('inscription')
                ->withErrors($validator)
                ->withInput();
        }

        $nom = $request->nom;
        $email = $request->email;
        $request['password']= bcrypt($request->password);
        Users::create([
            'nom' => request('nom'),
            'email' => request('email'),
            'password' => request('password'),
        ]);

        return redirect('connexion')->with('message','Inscription réussie : Connectez-vous pour ajouter des annonces');
    }

    public function connexion(){
        return view('connexion');
    }

    public function checklogin(Request $request){

        $validator = Validator::make($request->all(),[
            "email" => "required|email",
            "password" => "required",
        ]);

        if ($validator->fails()) {
            return redirect('connexion')
                ->withErrors($validator)
                ->withInput();
        }

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt([
            'email'=> $email,
            'password'=> $password
        ]))
        {
            //return redirect('/my-ads');
            return redirect()->intended('my-ads');
        } else {
            return redirect()->back()->with('error', 'Nom d\'utilisateur ou mot de passe invalide.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/connexion');
    }

}
