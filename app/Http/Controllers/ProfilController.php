<?php

namespace App\Http\Controllers;


class ProfilController extends Controller
{
    public function home(){
        return view('profil.home');
    }

    public function myads(){
        return view('profil.myads');
    }

    public function favorits(){
        return view('profil.favorits');
    }

    public function archives(){
        return view('profil.archives');
    }

    public function create(){
        return view('profil.addAd');
    }

    public function store(){

    }
}
