<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
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
use App\domainemploi;
use App\typebien;
use App\marqueveh;
use App\marquecomputer;
use App\marquephone;
use App\souscategories;


class insertAdController extends Controller
{

    public function store(Request $request){

        $idUser = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            "categorie" => "required",
            "sousCat" => "required",
            "Adtitle" => "required|min:6",
            "descrp" => "required",
            "wilaya" => "required",
            "email" => "regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|nullable",
            "phone" => "regex:/^[0-9\s+-]*$/|nullable",
            "condition" => "required"
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }

      //Add fields in common

        if($request->hasfile('fileToUpload')){
            $hasPicture = 1;
        } else {
            $hasPicture = 0;
        } 

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
            'address' => request('adresse'),
            'wilaya' => request('wilaya'),
            'stateAd' => '1',
            'hasPicture' => $hasPicture 
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
                Storage::disk('s3')->put($name, file_get_contents($image), 'public');

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

        return response()->json(['success'=>'Record is successfully added']);

    }

    public function edit($id){

        $annonce = DB::table('annonces')->where('id', '=', $id)->first();
        $image = DB::table('imageads')->where('id_annonce', '=', $id)->get();

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
        $domaineEmploi = domainemploi::all();
        $typeBien = typebien::all();
        $marqueVeh = marqueveh::all();

        return view('profil.updateAd',[
            'annonce' => $annonce,
            'result' => $result,
            'categorie' => $categorie,
            'sousCategorie' => $sousCategorie,
            'marquePhone' => $marquePhone,
            'marqueComputer' => $marqueComputer,
            'domaineEmploi' => $domaineEmploi,
            'typeBien' => $typeBien,
            'marqueVeh' => $marqueVeh,
            'images' => $image
        ]);

    }

    public function update(Request $request){   

        $validator = Validator::make($request->all(),[
            "Adtitle" => "required|min:6",
            "descrp" => "required",
            "wilaya" => "required",
            "email" => "regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|nullable",
            "phone" => "regex:/^[0-9\s+-]*$/|nullable",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()]);
        }   
        
        $id = request('idAnnonce');

        // Save and upload picture if exist

        if($request->hasfile('fileToUpload'))
        {
            $result = DB::table('imageads')->where('id_annonce', '=', $id)->get();

            $nbrePicture = $result->count();

            if ($nbrePicture <> '0'){
                foreach ($result as $picture) {
                    Storage::disk('s3')->delete($picture->imagename);
                    DB::table('imageads')->where('id', '=', $picture->id)->delete();                
                }
            }

            foreach($request->fileToUpload as $image)
            {

                $name = $image->getClientOriginalName();
                $currentDate = date('YmdHis');
                $name = $currentDate.$name;

                Storage::disk('s3')->put($name, file_get_contents($image), 'public');

                $fileModel = new imagead();
                $fileModel->imagename = $name;
                $fileModel->id_annonce = $id;
                $fileModel->save();               
                
            }          
             
        } 

        $annonce = annonce::find($id);

        $annonce->titre = request('Adtitle');
        $annonce->description = request('descrp');
        $annonce->prix = request('prix');
        $annonce->email = request('email');
        $annonce->phoneNumber = request('phone');
        $annonce->etat = request('etat');
        $annonce->phoneHide = request('phoneHide');
        $annonce->address = request('adresse');
        $annonce->wilaya = request('wilaya');

        $annonce->save();

        $idCat = request('categorie');
        $idSousCat = request('sousCat');

        if ($idSousCat == '2'){
            $event = adEvent::where('id_annonce', '=', $id)->first();

            $event->dateHeureEvent = request('datetimeEvent');
            $event->du = request('du');
            $event->au = request('au');

            $event->save();
        }

        elseif ($idSousCat == '53') {
            $jobOffer = adJoboffer::where('id_annonce', '=', $id)->first();

            $jobOffer->domaine = request('domaineOffre');
            $jobOffer->entreprise = request('entreprise');
            $jobOffer->adresse = request('adresse');
            $jobOffer->poste = request('posteOffre');
            $jobOffer->salaire = request('salaire');
            $jobOffer->diplomeRequis = request('diplomeRequis');

            $jobOffer->save();
        }

        elseif ($idSousCat == '54') {
            $jobApp = adJobapplication::where('id_annonce', '=', $id)->first();

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
            $immobilier = adimmobilier::where('id_annonce', '=', $id)->first();

            $immobilier->typeBien = request('typeBien');
            $immobilier->superficie = request('superficie');
            $immobilier->nbrePiece = request('nbrePiece');
            $immobilier->etage = request('etage');

            $immobilier ->save();
        }

        elseif ($idSousCat <> '14' and $idCat == '4') {
            $adcar = adCar::where('id_annonce', '=', $id)->first();

            $adcar->vente = request('vente');
            $adcar->marque = request('marqueVeh');
            $adcar->modele = request('modeleVeh');
            $adcar->annee = request('anneVeh');
            $adcar->kilometrage = request('kilomVeh');
            $adcar->typeCarb = request('typeCarb');

            $adcar->save();
        }

        elseif ($idSousCat == '16') {
            $adPhone = adPhone::where('id_annonce', '=', $id)->first();

            $adPhone->marque = request('marquePhone');
            $adPhone->modele = request('modelePhone');

            $adPhone->save();
        }

        elseif ($idSousCat == '36') {
            $adStorage = adStorage::where('id_annonce', '=', $id)->first();

            $adStorage->type = request('typeStockage');
            $adStorage->marque = request('marqueStockage');
            $adStorage->capacite = request('capaciteStock');

            $adStorage->save();
        }

        elseif ($idSousCat == '37') {
            $adComputer = adComputer::where('id_annonce', '=', $id)->first();

            $adComputer->marque = request('marqueOrd');
            $adComputer->tailleEcran = request('tailleOrd');
            $adComputer->processeur = request('processeur');
            $adComputer->ram = request('memoireRAM');
            $adComputer->tailleDisque = request('tailleDisque');

            $adComputer->save();
        }


        return response()->json(['success'=>'Record is successfully added']);
    }

    public function destroy($id){
        
            $annonce = annonce::find($id);
            $annonce->delete();     

    }

    public function deleteAll(Request $request){
        
        $ids = $request->input('ids');
        annonce::whereIn('id',$ids)->delete();
        return redirect()->back();
    }
}
