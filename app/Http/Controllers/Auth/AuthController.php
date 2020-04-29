<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function create (){
        return view('inscription');
    }

    public function store (Request $request){

        $data = DB::table('users')
                 ->where('email','=', request('email'))
                 ->get()->toArray();
        
        //dd($data[0]->email_verified_at);
               
        if($data == []){
            $validateEmail = "";
        } else {
            if(is_null($data['0']->email_verified_at)){                
                Users::where('email','=', request('email'))->delete();
                $validateEmail = "";
            } else {                
                $validateEmail = "|unique:users";
            }
        }         
        
        $validator = Validator::make($request->all(),[
            "nom" => "required|string",
            "email" => "required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|max:255".$validateEmail,
            "password" => "bail|required|min:8|max:30|regex:/^(?=.*?[a-z])(?=.*?[0-9]).{6,}$/",
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
        
        return redirect('/connexion')->with('Verification', 'Un email a été envoyé à l\'adresse fournie. Veuillez suivre les instructions dans l\'email pour vous inscrire.');
    }

}
