<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\annonce;
use App\Users;
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
use App\favoris;
use App\domainemploi;
use App\typebien;
use App\marqueveh;
use App\marquecomputer;
use App\marquephone;

class advancedSearchController extends Controller
{
    public function search(Request $request){

    	$dataSelected = '';

    	$imageAd = DB::table('imageads')->groupBy('id_annonce')->get();
    	$cat = 'sousCatégorie';
    	$search = categories::all();
        $sousCat = DB::table('categories')
                    ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
                    ->get(); 


    	$idSousCat = request('idSousCat');
    	$filterKey = $idSousCat;

/********************************************* FILTER CAR *********************************************************/

    	if ($idSousCat == '6' or $idSousCat == '7' or $idSousCat == '8' or $idSousCat == '9' or $idSousCat == '10' or $idSousCat == '11' or $idSousCat == '12' or $idSousCat == '13'){

    		$dataSelected = marqueveh::all();
    		
	    	$data = DB::table('ad_cars');

		    if (request('anne')) {
		        $data = $data->where('annee', '=',  request('anne'));
		    }

		    if (request('kilom')) {
		        $data = $data->where('kilometrage', 'LIKE', "%" . request('kilom') . "%");
		    }

		    if (request('marque')){
		    	$data = $data->where('marque', '=', request('marque') );
		    }

		    if (request('typeCarb')){
		    	$data = $data->where('typeCarb', '=', request('typeCarb') );
		    }

		    if (request('vente')){
		    	$data = $data->where('vente', '=', request('vente') );
		    }


		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_cars.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	});

        	if (request('priceDe')){
		    	$data = $data->where('annonces.prix','>=',request('priceDe'));
			}

			if (request('priceA')){
		    	$data = $data->where('annonces.prix','<=',request('priceA'));
			}

			$data = $data->paginate(3);
        	
		  } 

/********************************************* FILTER PHONE *********************************************************/		  

		else if ($idSousCat == '16'){

			$dataSelected = marquephone::all();
    		
	    	$data = DB::table('ad_phones');

		    if (request('marquePhone')) {
		        $data = $data->where('marque', '=',  request('marquePhone'));
		    }


		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_phones.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	});

        	if (request('priceDe')){
		    	$data = $data->where('annonces.prix','>=',request('priceDe'));
			}

			if (request('priceA')){
		    	$data = $data->where('annonces.prix','<=',request('priceA'));
			}

			$data = $data->paginate(3);
        	
		  } 

/********************************************* FILTER STOCKAGE ******************************************************/		  

		else if ($idSousCat == '36'){
    		
	    	$data = DB::table('ad_storages');

		    if (request('typeStockage')) {
		        $data = $data->where('type', '=',  request('typeStockage'));
		    }


		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_storages.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	});

        	if (request('priceDe')){
		    	$data = $data->where('annonces.prix','>=',request('priceDe'));
			}

			if (request('priceA')){
		    	$data = $data->where('annonces.prix','<=',request('priceA'));
			}

			$data = $data->paginate(3);
        	
		  } 

/********************************************* FILTER IMMOBILER ******************************************************/		  

		else if ($idSousCat == '55' or $idSousCat == '56' or $idSousCat == '57' or $idSousCat == '58'){

			$dataSelected = typebien::all();
    		
	    	$data = DB::table('adimmobiliers');

		    if (request('typeBien')) {
		        $data = $data->where('typeBien', '=',  request('typeBien'));
		    }

		    if (request('superficie')) {
		        $data = $data->where('superficie', '=',  request('superficie'));
		    }

		    if (request('nbrePiece')) {
		        $data = $data->where('nbrePiece', '=',  request('nbrePiece'));
		    }

		    if (request('etage')) {
		        $data = $data->where('etage', '=',  request('etage'));
		    }


		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'adimmobiliers.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	});

        	if (request('priceDe')){
		    	$data = $data->where('annonces.prix','>=',request('priceDe'));
			}

			if (request('priceA')){
		    	$data = $data->where('annonces.prix','<=',request('priceA'));
			}

			$data = $data->paginate(3);
        	
		  } 

/********************************************* FILTER ORDINATEURS ******************************************************/	  

		else if ($idSousCat == '37'){

			$dataSelected = marquecomputer::all();
    		
	    	$data = DB::table('ad_computers');

		    if (request('marqueOrd')) {
		        $data = $data->where('marque', '=',  request('marqueOrd'));
		    }

		    if (request('tailleOrd')) {
		        $data = $data->where('tailleEcran', '=',  request('tailleOrd'));
		    }

		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_computers.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	});

        	if (request('priceDe')){
		    	$data = $data->where('annonces.prix','>=',request('priceDe'));
			}

			if (request('priceA')){
		    	$data = $data->where('annonces.prix','<=',request('priceA'));
			}

			$data = $data->paginate(3);
        	
		  } 

/********************************************* FILTER EVENT ******************************************************/	  

		else if ($idSousCat == '2'){
    		
	    	$data = DB::table('ad_events');

		    if (request('datetimeEvent')) {
		        $data = $data->where('dateHeureEvent', '=',  request('datetimeEvent'));
		    }

		    if (request('du')) {
		        $data = $data->where('du', '=',  request('du'));
		    }

		    if (request('au')) {
		        $data = $data->where('au', '=',  request('au'));
		    }

		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_events.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	})->paginate(3);        	
		  } 

/****************************************** FILTER Offre D'emploi ************************************************/	  

		else if ($idSousCat == '53'){

			$dataSelected = domainemploi::all();
    		
	    	$data = DB::table('ad_joboffers');

		    if (request('domaineEmolploi')) {
		        $data = $data->where('domaine', '=',  request('domaineEmolploi'));
		    }

		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_joboffers.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	})->paginate(3);        	
		  } 

/****************************************** FILTER Demande d'Emploi ************************************************/	  

		else if ($idSousCat == '54'){

			$dataSelected = domainemploi::all();
    		
	    	$data = DB::table('ad_jobapplications');

		    if (request('domaineEmolploi')) {
		        $data = $data->where('domaine', '=',  request('domaineEmolploi'));
		    }

		    if (request('sexe')) {
		        $data = $data->where('sexe', '=',  request('sexe'));
		    }

		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_jobapplications.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	})->paginate(3);        	
		  } 	

        return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'catégorie'=>$cat,'filter'=>$filterKey,'search'=>$search,'sousCat'=>$sousCat,'dataSelected'=>$dataSelected]);
    }
}
