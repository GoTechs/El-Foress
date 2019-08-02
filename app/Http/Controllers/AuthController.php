<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;

class AuthController extends Controller
{

    public function create (){
        return view('inscription');
    }

    public function store (Request $request){

        $this -> validation($request);
        $nom = $request->nom;
        $prenom = $request->prenom;
        $adresse = $request->adresse;
        $phone = $request->phone;
        $email = $request->email;
        $username = $request->username;
        $request['password']= bcrypt($request->password);
        Users::create($request->all());

        return redirect('connexion');
    }

    public function validation($request){
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "adresse" => "nullable",
            "email" => "nullable|email|max:255|unique:users",
            "phone" => "nullable|regex:/(06)[0-9]{8}/",
            "username" => "required|min:6|max:55",
            "password" => "required|min:6|max:55",
            "confirmPassword" => "required|same:password",
        ]);
    }

    public function connexion(){
        return view('connexion');
    }

    public function checklogin(Request $request){

        $username = $request->username;
        $password = $request->password;

        if (Auth::attempt([
            'username'=> $username,
            'password'=> $password
        ]))
        {
            return view('profil.home');
        } else {
            return redirect('inscription');
        }
    }

}
