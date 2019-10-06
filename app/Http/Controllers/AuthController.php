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
            "prenom" => "required|string",
            "adresse" => "nullable|string",
            "email" => "required|email|max:255|unique:users",
            "phone" => "nullable",
            "username" => "required|min:6|max:55",
            "password" => "required|min:6|max:55",
            "confirmPassword" => "required|same:password",
        ]);

        if ($validator->fails()) {
            return redirect('inscription')
                ->withErrors($validator)
                ->withInput();
        }

        $nom = $request->nom;
        $prenom = $request->prenom;
        $adresse = $request->adresse;
        $phone = $request->phone;
        $email = $request->email;
        $username = $request->username;
        $request['password']= bcrypt($request->password);
        Users::create($request->all());

        return redirect('connexion')->with('message','Inscription réussie : Connectez-vous pour ajouter des annonces');
    }

    public function connexion(){
        return view('connexion');
    }

    public function checklogin(Request $request){

        $validator = Validator::make($request->all(),[
            "username" => "required",
            "password" => "required",
        ]);

        if ($validator->fails()) {
            return redirect('connexion')
                ->withErrors($validator)
                ->withInput();
        }

        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt([
            'username'=> $username,
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
