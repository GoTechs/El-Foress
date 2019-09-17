<?php

namespace App\Http\Controllers;


use App\marquecomputer;
use App\marquephone;
use App\souscategories;
use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class insertAdController extends Controller
{

    public function store(Request $request){

        $idUser = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            "fileToUpload.*" => "image|mimes:jpeg,png,jpg,gif,svg",
            "categorie" => "required",
            "sousCat" => "required",
            "wilaya" => "required",
            "Adtitle" => "required|min:6",
            "descrp" => "required",
            "condition" => "required",
        ]);

        if ($validator->fails()) {
            return redirect('addAd')
                ->withErrors($validator)
                ->withInput();
        }

      //Add fields in common

        $annonce = annonce::create([
            'titre' => request('Adtitle'),
            'description' => request('descrp'),
            'prix' => request('prix'),
            'email' => request('email'),
            'phoneNumber' => request('phone'),
            'etat' => request('etat'),
            'id_Cat' => request('categorie'),
            'id_sous_Cat' => request('sousCat'),
            'id_user' => $idUser ,
            'phoneHide' => request('phoneHide'),
            'wilaya' => request('wilaya'),
            'stateAd' => '1'
        ]);

        $lastID = $annonce->id;
        $idCat =  request('categorie');
        $idSousCat =  request('sousCat');
        $nameTable =  '';

        // Save and upload picture if exist

        if($request->hasfile('fileToUpload'))
        {

            foreach($request->fileToUpload as $image)
            {
                $name = $image->getClientOriginalName();
                $currentDate = date('YmdHis');
                $name = $currentDate.$name;
                $image->move(public_path().'/images/', $name);
                $fileModel = new imagead();
                $fileModel->imagename = $name;
                $fileModel->id_annonce = $lastID;
                $fileModel->save();
            }
        }

        if ($idSousCat == '2'){
            $event = adEvent::create([
                'dateHeureEvent' => request('datetimeEvent'),
                'du' => request('du'),
                'au' => request('au'),
                'id_annonce' => $lastID
            ]);
            $nameTable = 'ad_events';
        }

        elseif ($idSousCat == '53') {
            $jobOffer = adJoboffer::create([
                'domaine' => request('domaineOffre'),
                'entreprise' => request('entreprise'),
                'adresse' => request('adresse'),
                'poste' => request('posteOffre'),
                'salaire' => request('salaire'),
                'diplomeRequis' => request('diplomeRequis'),
                'id_annonce' => $lastID
            ]);
            $nameTable = 'ad_joboffers';
        }

        elseif ($idSousCat == '54') {
            $jobApplication = adJobapplication::create([
                'sexe' => request('sexe'),
                'domaine' => request('domaineDemande'),
                'age' => request('age'),
                'poste' => request('posteDemande'),
                'niveau' => request('niveauEducation'),
                'diplome' => request('diplomeDemande'),
                'anneExp' => request('anneExp'),
                'id_annonce' => $lastID
            ]);
            $nameTable = 'ad_jobapplications';
        }

        elseif ($idCat == '3') {
            $immobilier = adimmobilier::create([
                'typeBien' => request('typeBien'),
                'superficie' => request('superficie'),
                'nbrePiece' => request('nbrePiece'),
                'etage' => request('etage'),
                'id_annonce' => $lastID
            ]);
            $nameTable = 'adimmobiliers';
        }

        elseif ($idSousCat <> '14' and $idCat == '4') {
            $car = adCar::create([
                'vente' => request('vente'),
                'marque' => request('marqueVeh'),
                'modele' => request('modeleVeh'),
                'annee' => request('anneVeh'),
                'kilometrage' => request('kilomVeh'),
                'typeCarb' => request('typeCarb'),
                'id_annonce' => $lastID
            ]);
            $nameTable = 'ad_cars';
        }

        elseif ($idSousCat == '16') {
            $phone = adPhone::create([
                'marque' => request('marquePhone'),
                'modele' => request('modelePhone'),
                'id_annonce' => $lastID
            ]);
            $nameTable = 'ad_phones';
        }

        elseif ($idSousCat == '36') {
            $storage = adStorage::create([
                'type' => request('typeStockage'),
                'marque' => request('marqueStockage'),
                'capacite' => request('capaciteStock'),
                'id_annonce' => $lastID
            ]);
            $nameTable = 'ad_storages';
        }

        elseif ($idSousCat == '37') {
            $computer = adComputer::create([
                'marque' => request('marqueOrd'),
                'tailleEcran' => request('tailleOrd'),
                'processeur' => request('processeur'),
                'ram' => request('memoireRAM'),
                'tailleDisque' => request('tailleDisque'),
                'id_annonce' => $lastID
            ]);
            $nameTable = 'ad_computers';
        }

        $annonce = annonce::find($lastID);

        $annonce->nameTable = $nameTable;

        $annonce->save();

        return redirect('myads')->with('message','Success');

    }

    public function edit($id){

        $annonce = DB::table('annonces')->where('id', '=', $id)->first();

        $idCat = $annonce->id_Cat;
        $idSousCat = $annonce->id_sous_Cat;

        if ($idSousCat == '2'){
            $result = DB::table('ad_events')->where('id_annonce', '=', $id)->first();
        }

        elseif ($idSousCat == '53') {
            $result = DB::table('ad_joboffers')->where('id_annonce', '=', $id)->first();
        }

        elseif ($idSousCat == '54') {
            $result = DB::table('ad_jobapplications')->where('id_annonce', '=', $id)->first();
        }

        elseif ($idCat == '3') {
            $result = DB::table('adimmobiliers')->where('id_annonce', '=', $id)->first();
        }

        elseif ($idSousCat <> '14' and $idCat == '4') {
            $result = DB::table('ad_cars')->where('id_annonce', '=', $id)->first();
        }

        elseif ($idSousCat == '16') {
            $result = DB::table('ad_phones')->where('id_annonce', '=', $id)->first();
        }

        elseif ($idSousCat == '36') {
            $result = DB::table('ad_storages')->where('id_annonce', '=', $id)->first();
        }

        elseif ($idSousCat == '37') {
            $result = DB::table('ad_computers')->where('id_annonce', '=', $id)->first();
        } else {
            $result = "NULL";
        }

        $categorie = categories::all();
        $sousCategorie = souscategories::all();
        $marquePhone = marquephone::all();
        $marqueComputer = marquecomputer::all();

        return view('profil.updateAd',[
            'annonce' => $annonce,
            'result' => $result,
            'categorie' => $categorie,
            'sousCategorie' => $sousCategorie,
            'marquePhone' => $marquePhone,
            'marqueComputer' => $marqueComputer
        ]);

    }

    public function update($id){

        $annonce = annonce::find($id);

        $annonce->titre = request('Adtitle');
        $annonce->description = request('descrp');
        $annonce->prix = request('prix');
        $annonce->email = request('email');
        $annonce->phoneNumber = request('phone');
        $annonce->etat = request('etat');
        $annonce->phoneHide = request('phoneHide');
        $annonce->wilaya = request('wilaya');

        $annonce->save();

        $idCat = request('categorie');
        $idSousCat = request('sousCat');

        if ($idSousCat == '2'){
            $event = adEvent::find($id);

            $event->dateHeureEvent = request('datetimeEvent');
            $event->du = request('du');
            $event->au = request('au');

            $event->save();
        }

        elseif ($idSousCat == '53') {
            $jobOffer = adJoboffer::find($id);

            $jobOffer->domaine = request('domaineOffre');
            $jobOffer->entreprise = request('entreprise');
            $jobOffer->adresse = request('adresse');
            $jobOffer->poste = request('posteOffre');
            $jobOffer->salaire = request('salaire');
            $jobOffer->diplomeRequis = request('diplomeRequis');

            $jobOffer->save();
        }

        elseif ($idSousCat == '54') {
            $jobApp = adJobapplication::find($id);

            $jobApp->sexe = request('sexe');
            $jobApp->domaine = request('domaineDemande');
            $jobApp->age = request('age');
            $jobApp->poste = request('posteDemande');
            $jobApp->niveau = request('niveauEducation');
            $jobApp->diplome = request('diplomeDemande');
            $jobApp->anneExp = request('anneExp');

            $jobApp->save();
        }

        elseif ($idCat == '3') {
            $immobilier = adimmobilier::find($id);

            $immobilier->typeBien = request('typeBien');
            $immobilier->superficie = request('superficie');
            $immobilier->nbrePiece = request('nbrePiece');
            $immobilier->etage = request('etage');

            $immobilier ->save();
        }

        elseif ($idSousCat <> '14' and $idCat == '4') {
            $adcar = adCar::find($id);

            $adcar->vente = request('vente');
            $adcar->marque = request('marqueVeh');
            $adcar->modele = request('modeleVeh');
            $adcar->annee = request('anneVeh');
            $adcar->kilometrage = request('kilomVeh');
            $adcar->typeCarb = request('typeCarb');

            $adcar->save();
        }

        elseif ($idSousCat == '16') {
            $adPhone = adPhone::find($id);

            $adPhone->marque = request('marquePhone');
            $adPhone->modele = request('modelePhone');

            $adPhone->save();
        }

        elseif ($idSousCat == '36') {
            $adStorage = adStorage::find($id);

            $adStorage->type = request('typeStockage');
            $adStorage->marque = request('marqueStockage');
            $adStorage->capacite = request('capaciteStock');

            $adStorage->save();
        }

        elseif ($idSousCat == '37') {
            $adComputer = adComputer::find($id);

            $adComputer->marque = request('marqueOrd');
            $adComputer->tailleEcran = request('tailleOrd');
            $adComputer->processeur = request('processeur');
            $adComputer->ram = request('memoireRAM');
            $adComputer->tailleDisque = request('tailleDisque');

            $adComputer->save();
        }


        return redirect('myads');
    }

    public function destroy($id){
        
            $annonce = annonce::find($id);
            $annonce->delete();     

    }

    public function deleteAll(Request $request){
        
            $ids = $request->input('ids');
            annonce::whereIn('id',$ids)->delete();
            return redirect('myads');  
    }
}
