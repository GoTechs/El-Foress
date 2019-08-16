<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Users;
use App\annonce;
use App\categories;
use App\adEvent;
use App\adJoboffer;
use App\adJobapplication;
use App\adimmobilier;
use App\adCar;
use App\adPhone;
use App\adStorage;
use App\adComputer;
use App\imagead;

class ProfilController extends Controller
{
    public function home(){
        return view('profil.home');
    }

    public function myads(){
        $idUser = Auth::user()->id;

        $results = DB::table('users')
            ->join('annonces', 'users.id', '=', 'annonces.id_user')
            ->join('ad_storages', 'annonces.id', '=', 'ad_storages.id_annonce')
            ->where('users.id', '=', $idUser)
            ->get();

        dd($results);

        //return view('profil.myads', ['results' => $results]);
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
