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
use Illuminate\Support\Facades\Validator;

//use mysql_xdevapi\Session;

class ProfilController extends Controller
{
    public function home(){
        return view('profil.home');
    }

    public function myads(Request $request){
        
        $idUser = Auth::user()->id;

        $storage = DB::table('annonces')
            ->join('ad_storages', 'annonces.id', '=', 'ad_storages.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $car = DB::table('annonces')
            ->join('ad_cars', 'annonces.id', '=', 'ad_cars.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $jobOffer = DB::table('annonces')
            ->join('ad_joboffers', 'annonces.id', '=', 'ad_joboffers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $computer = DB::table('annonces')
            ->join('ad_computers', 'annonces.id', '=', 'ad_computers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $event = DB::table('annonces')
            ->join('ad_events', 'annonces.id', '=', 'ad_events.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $immobilier = DB::table('annonces')
            ->join('adimmobiliers', 'annonces.id', '=', 'adimmobiliers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $jobApp = DB::table('annonces')
            ->join('ad_jobapplications', 'annonces.id', '=', 'ad_jobapplications.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $phone = DB::table('annonces')
            ->join('ad_phones', 'annonces.id', '=', 'ad_phones.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $result = array_merge($storage,$jobOffer,$car,$computer,$event,$immobilier,$jobApp,$phone);

        $nbreAnnonce = count($result);

        // Count Nomber of posts not archived

        $annonceArchived = DB::table('annonces')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $nbreAnnonceArchived = count($annonceArchived);

        return view('profil.myads', [
            'result' => $result,
            'nbreResultAnnonce' => $nbreAnnonce,
            'nbreResultArchived' => $nbreAnnonceArchived
        ]);
    }

    public function favorits(){
        return view('profil.favorits');
    }

    public function archives(Request $request){
        $idUser = Auth::user()->id;

        $storage = DB::table('annonces')
            ->join('ad_storages', 'annonces.id', '=', 'ad_storages.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $car = DB::table('annonces')
            ->join('ad_cars', 'annonces.id', '=', 'ad_cars.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $jobOffer = DB::table('annonces')
            ->join('ad_joboffers', 'annonces.id', '=', 'ad_joboffers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $computer = DB::table('annonces')
            ->join('ad_computers', 'annonces.id', '=', 'ad_computers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $event = DB::table('annonces')
            ->join('ad_events', 'annonces.id', '=', 'ad_events.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $immobilier = DB::table('annonces')
            ->join('adimmobiliers', 'annonces.id', '=', 'adimmobiliers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $jobApp = DB::table('annonces')
            ->join('ad_jobapplications', 'annonces.id', '=', 'ad_jobapplications.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $phone = DB::table('annonces')
            ->join('ad_phones', 'annonces.id', '=', 'ad_phones.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $result = array_merge($storage,$jobOffer,$car,$computer,$event,$immobilier,$jobApp,$phone);

        $nbreArchived = count($result);

        // Count Nomber of posts not archived

        $annonce = DB::table('annonces')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $nbreAnnonce = count($annonce);

        return view('profil.archives', [
            'result' => $result,
            'nbreResultArchived' => $nbreArchived,
            'nbreresultAnnonce' => $nbreAnnonce
        ]);
    }

    public function create(){
        return view('profil.addAd');
    }

    public function update($id){
        $annonce = annonce::find($id);
        $annonce->stateAd = '0';
        $annonce->save();
        return redirect('myads');
    }

    public function repost($id){
        $annonce = annonce::find($id);
        $annonce->stateAd = '1';
        $annonce->save();
        return redirect('archives');
    }

    public function updateUser($id, Request $request){

        $validator = Validator::make($request->all(),[
            "nom" => "required",
            "prenom" => "required",
            "email" => "email|max:255|unique:users",
        ]);

        if ($validator->fails()) {
            return redirect('home')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Users::find($id);

        $user->nom = request('nom');
        $user->prenom = request('prenom');
        $user->adresse = request('adresse');
        $user->email = request('email');
        $user->phone = request('phone');

        $user->save();

        return redirect('home');
    }
}
