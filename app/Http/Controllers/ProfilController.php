<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
//use mysql_xdevapi\Session;

class ProfilController extends Controller
{
    public function home(){
        return view('profil.home');
    }

    public function myads(Request $request){
        $idUser = Auth::user()->id;

        $idCat = $request->session()->get('idCat');
        $idSousCat = $request->session()->get('idSousCat');

        $results = DB::table('users')
            ->join('annonces', 'users.id', '=', 'annonces.id_user')
            ->join('ad_events', 'annonces.id', '=', 'ad_events.id_annonce')
            ->join('ad_cars', 'annonces.id', '=', 'ad_cars.id_annonce')
            ->where('users.id', '=', $idUser)
            ->get();

        /*if ($idSousCat == '2'){
            $results = DB::table('users')
                ->join('annonces', 'users.id', '=', 'annonces.id_user')
                ->join('ad_events', 'annonces.id', '=', 'ad_events.id_annonce')
                ->where('users.id', '=', $idUser)
                ->get();
        }

        elseif ($idSousCat == '53') {
            $results = DB::table('users')
                ->join('annonces', 'users.id', '=', 'annonces.id_user')
                ->join('ad_joboffers', 'annonces.id', '=', 'ad_joboffers.id_annonce')
                ->where('users.id', '=', $idUser)
                ->get();
        }

        elseif ($idSousCat == '54') {
            $results = DB::table('users')
                ->join('annonces', 'users.id', '=', 'annonces.id_user')
                ->join('ad_jobapplications', 'annonces.id', '=', 'ad_jobapplications.id_annonce')
                ->where('users.id', '=', $idUser)
                ->get();
        }

        elseif ($idCat == '3') {
            $results = DB::table('users')
                ->join('annonces', 'users.id', '=', 'annonces.id_user')
                ->join('adimmobiliers', 'annonces.id', '=', 'adimmobiliers.id_annonce')
                ->where('users.id', '=', $idUser)
                ->get();
        }

        elseif ($idSousCat <> '14' and $idCat == '4') {
            $results = DB::table('users')
                ->join('annonces', 'users.id', '=', 'annonces.id_user')
                ->join('ad_cars', 'annonces.id', '=', 'ad_cars.id_annonce')
                ->where('users.id', '=', $idUser)
                ->get();
        }

        elseif ($idSousCat == '16') {
            $results = DB::table('users')
                ->join('annonces', 'users.id', '=', 'annonces.id_user')
                ->join('ad_phones', 'annonces.id', '=', 'ad_phones.id_annonce')
                ->where('users.id', '=', $idUser)
                ->get();
        }

        elseif ($idSousCat == '36') {
            $results = DB::table('users')
                ->join('annonces', 'users.id', '=', 'annonces.id_user')
                ->join('ad_storages', 'annonces.id', '=', 'ad_storages.id_annonce')
                ->where('users.id', '=', $idUser)
                ->get();
        }

        elseif ($idSousCat == '37') {
            $results = DB::table('users')
                ->join('annonces', 'users.id', '=', 'annonces.id_user')
                ->join('ad_computers', 'annonces.id', '=', 'ad_computers.id_annonce')
                ->where('users.id', '=', $idUser)
                ->get();
        } else {
            $results = DB::table('users')
                ->join('annonces', 'users.id', '=', 'annonces.id_user')
                ->where('users.id', '=', $idUser)
                ->get();
        }*/

        return view('profil.myads', ['results' => $results]);
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
