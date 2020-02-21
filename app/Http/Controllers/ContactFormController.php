<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Mail\replyToContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{
    public function create(){
    	return view('contact');
    }

    public function store(Request $request){

    	 $validator = Validator::make($request->all(),[
            "name" => "required|string",
            "email" => "required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",
            "subject" => "required|string",
            "message" => "required|string",
        ]);

        if ($validator->fails()) {
            return redirect('contact')
                ->withErrors($validator)
                ->withInput();
        }

        $data = request();

        Mail::to('gotechs.dev@gmail.com')->send(New ContactFormMail($data));

        Mail::to($request->email)->send(New replyToContactMail($data));

        return redirect('contact')->with('message', 'Votre message à bien été envoyé');

    }
}
