<?php

namespace App\Http\Controllers;


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

class insertAdController extends Controller
{

    public function validation($request){
        $request->validate([
            "fileToUpload" => "required",
            "fileToUpload.*" => "image|mimes:jpeg,png,jpg,gif,svg",
        ]);
    }

    public function store(Request $request){

        //dd(request()->all());

      $this -> validation($request);

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
            'phoneHide' => request('phoneHide')
        ]);

        $lastID = $annonce->id;
        $idCat =  request('categorie');
        $idSousCat =  request('sousCat');
        //$nameCat = categories::where('idCat', '=', $idCat)->get();

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
        }

        elseif ($idCat == '3') {
            $immobilier = adimmobilier::create([
                'typeBien' => request('typeBien'),
                'superficie' => request('superficie'),
                'nbrePiece' => request('nbrePiece'),
                'etage' => request('etage'),
                'id_annonce' => $lastID
            ]);
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
        }

        elseif ($idSousCat == '16') {
            $phone = adPhone::create([
                'marque' => request('marquePhone'),
                'modele' => request('modelePhone'),
                'id_annonce' => $lastID
            ]);
        }

        elseif ($idSousCat == '36') {
            $storage = adStorage::create([
                'type' => request('typeStockage'),
                'marque' => request('marqueStockage'),
                'capacite' => request('capaciteStock'),
                'id_annonce' => $lastID
            ]);
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
        }

        return redirect('myads')->with('message','Success');

    }
}