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
		$cat = ''; 

    	$imageAd = DB::table('imageads')->groupBy('id_annonce')->get();
    	$search = categories::all();
        $sousCat = DB::table('categories')
                    ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
					->get(); 

    	$idSousCat = request('idSousCat');
    	$filterKey = $idSousCat;
    	$idCat = request('idCat');

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

		    if (request('type-Carburant')){
		    	$data = $data->where('typeCarb', '=', request('type-Carburant') );
		    }

		    if (request('vente')){
		    	$data = $data->where('vente', '=', request('vente') );
		    }


		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_cars.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	});

        	if (request('prix-de')){
		    	$data = $data->where('annonces.prix','>=',request('prix-de'));
			}

			if (request('prix-a')){
		    	$data = $data->where('annonces.prix','<=',request('prix-a'));
			}

			if (request('order')){
				$orderBy = request('order');
				if ($orderBy == 'mostrecent'){
					$data = $data->orderBy('annonces.created_at', 'desc');
					} elseif ($orderBy == 'lessrecent'){
						$data = $data->orderBy('annonces.created_at', 'asc');
					} elseif ($orderBy == 'priceAsc'){
						$data = $data->orderBy('annonces.prix', 'asc');
					} elseif ($orderBy == 'priceDesc'){
						$data = $data->orderBy('annonces.prix', 'desc');
					} else {
						$data = $data->orderBy('annonces.numberViews', 'desc');
					}
			}

			$data = $data->paginate(6);
        	
		  } 

/********************************************* FILTER PHONE *********************************************************/		  

		else if ($idSousCat == '16'){

			$dataSelected = marquephone::all();
    		
	    	$data = DB::table('ad_phones');

		    if (request('marque-telephone')) {
		        $data = $data->where('marque', '=',  request('marque-telephone'));
		    }


		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_phones.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	});

        	if (request('prix-de')){
		    	$data = $data->where('annonces.prix','>=',request('prix-de'));
			}

			if (request('prix-a')){
		    	$data = $data->where('annonces.prix','<=',request('prix-a'));
			}

			if (request('order')){
				$orderBy = request('order');
				if ($orderBy == 'mostrecent'){
					$data = $data->orderBy('annonces.created_at', 'desc');
					} elseif ($orderBy == 'lessrecent'){
						$data = $data->orderBy('annonces.created_at', 'asc');
					} elseif ($orderBy == 'priceAsc'){
						$data = $data->orderBy('annonces.prix', 'asc');
					} elseif ($orderBy == 'priceDesc'){
						$data = $data->orderBy('annonces.prix', 'desc');
					} else {
						$data = $data->orderBy('annonces.numberViews', 'desc');
					}
			}

			$data = $data->paginate(6);
        	
		  } 

/********************************************* FILTER STOCKAGE ******************************************************/		  

		else if ($idSousCat == '36'){
    		
	    	$data = DB::table('ad_storages');

		    if (request('type-Stockage')) {
		        $data = $data->where('type', '=',  request('type-Stockage'));
		    }


		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_storages.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	});

        	if (request('prix-de')){
		    	$data = $data->where('annonces.prix','>=',request('prix-de'));
			}

			if (request('prix-a')){
		    	$data = $data->where('annonces.prix','<=',request('prix-a'));
			}

			if (request('order')){
				$orderBy = request('order');
				if ($orderBy == 'mostrecent'){
					$data = $data->orderBy('annonces.created_at', 'desc');
					} elseif ($orderBy == 'lessrecent'){
						$data = $data->orderBy('annonces.created_at', 'asc');
					} elseif ($orderBy == 'priceAsc'){
						$data = $data->orderBy('annonces.prix', 'asc');
					} elseif ($orderBy == 'priceDesc'){
						$data = $data->orderBy('annonces.prix', 'desc');
					} else {
						$data = $data->orderBy('annonces.numberViews', 'desc');
					}
			}

			$data = $data->paginate(6);
        	
		  } 

/********************************************* FILTER IMMOBILER ******************************************************/		  

		else if ($idSousCat == '55' or $idSousCat == '56' or $idSousCat == '57' or $idSousCat == '58'){

			$dataSelected = typebien::all();
    		
	    	$data = DB::table('adimmobiliers');

		    if (request('type-bien')) {
		        $data = $data->where('typeBien', '=',  request('type-bien'));
		    }

		    if (request('superficie')) {
		        $data = $data->where('superficie', '=',  request('superficie'));
		    }

		    if (request('nbre-piece')) {
		        $data = $data->where('nbrePiece', '=',  request('nbre-piece'));
		    }

		    if (request('etage')) {
		        $data = $data->where('etage', '=',  request('etage'));
		    }


		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'adimmobiliers.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	});

        	if (request('prix-de')){
		    	$data = $data->where('annonces.prix','>=',request('prix-de'));
			}

			if (request('prix-a')){
		    	$data = $data->where('annonces.prix','<=',request('prix-a'));
			}

			if (request('order')){
				$orderBy = request('order');
				if ($orderBy == 'mostrecent'){
					$data = $data->orderBy('annonces.created_at', 'desc');
					} elseif ($orderBy == 'lessrecent'){
						$data = $data->orderBy('annonces.created_at', 'asc');
					} elseif ($orderBy == 'priceAsc'){
						$data = $data->orderBy('annonces.prix', 'asc');
					} elseif ($orderBy == 'priceDesc'){
						$data = $data->orderBy('annonces.prix', 'desc');
					} else {
						$data = $data->orderBy('annonces.numberViews', 'desc');
					}
			}

			$data = $data->paginate(6);
        	
		  } 

/********************************************* FILTER ORDINATEURS ******************************************************/	  

		else if ($idSousCat == '37'){

			$dataSelected = marquecomputer::all();
    		
	    	$data = DB::table('ad_computers');

		    if (request('marque-ordinateur')) {
		        $data = $data->where('marque', '=',  request('marque-ordinateur'));
		    }

		    if (request('taille-ordinateur')) {
		        $data = $data->where('tailleEcran', '=',  request('taille-ordinateur'));
		    }

		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_computers.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
        	});

        	if (request('prix-de')){
		    	$data = $data->where('annonces.prix','>=',request('prix-de'));
			}

			if (request('prix-a')){
		    	$data = $data->where('annonces.prix','<=',request('prix-a'));
			}

			if (request('order')){
				$orderBy = request('order');
				if ($orderBy == 'mostrecent'){
					$data = $data->orderBy('annonces.created_at', 'desc');
					} elseif ($orderBy == 'lessrecent'){
						$data = $data->orderBy('annonces.created_at', 'asc');
					} elseif ($orderBy == 'priceAsc'){
						$data = $data->orderBy('annonces.prix', 'asc');
					} elseif ($orderBy == 'priceDesc'){
						$data = $data->orderBy('annonces.prix', 'desc');
					} else {
						$data = $data->orderBy('annonces.numberViews', 'desc');
					}
			}

			$data = $data->paginate(6);
        	
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
			});    
			
			if (request('order')){
				$orderBy = request('order');
				if ($orderBy == 'mostrecent'){
					$data = $data->orderBy('annonces.created_at', 'desc');
					} elseif ($orderBy == 'lessrecent'){
						$data = $data->orderBy('annonces.created_at', 'asc');
					} elseif ($orderBy == 'priceAsc'){
						$data = $data->orderBy('annonces.prix', 'asc');
					} elseif ($orderBy == 'priceDesc'){
						$data = $data->orderBy('annonces.prix', 'desc');
					} else {
						$data = $data->orderBy('annonces.numberViews', 'desc');
					}
			}

			$data = $data->paginate(6);
			
		  } 

/****************************************** FILTER Offre D'emploi ************************************************/	  

		else if ($idSousCat == '53'){

			$dataSelected = domainemploi::all();
    		
	    	$data = DB::table('ad_joboffers');

		    if (request('domaine-emploi')) {
		        $data = $data->where('domaine', '=',  request('domaine-emploi'));
		    }

		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_joboffers.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
			});
			
			if (request('order')){
				$orderBy = request('order');
				if ($orderBy == 'mostrecent'){
					$data = $data->orderBy('annonces.created_at', 'desc');
					} elseif ($orderBy == 'lessrecent'){
						$data = $data->orderBy('annonces.created_at', 'asc');
					} elseif ($orderBy == 'priceAsc'){
						$data = $data->orderBy('annonces.prix', 'asc');
					} elseif ($orderBy == 'priceDesc'){
						$data = $data->orderBy('annonces.prix', 'desc');
					} else {
						$data = $data->orderBy('annonces.numberViews', 'desc');
					}
			}

			$data = $data->paginate(6);
		  } 

/****************************************** FILTER Demande d'Emploi ************************************************/	  

		else if ($idSousCat == '54'){

			$dataSelected = domainemploi::all();
    		
	    	$data = DB::table('ad_jobapplications');

		    if (request('domaine-emploi')) {
		        $data = $data->where('domaine', '=',  request('domaine-emploi'));
		    }

		    if (request('sexe')) {
		        $data = $data->where('sexe', '=',  request('sexe'));
		    }

		    $data = $data->join('annonces', function ($join) {
            $join->on('annonces.id', '=', 'ad_jobapplications.id_annonce')
                 ->where('annonces.stateAd','=','1')
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
			});   
			
			if (request('order')){
				$orderBy = request('order');
				if ($orderBy == 'mostrecent'){
					$data = $data->orderBy('annonces.created_at', 'desc');
					} elseif ($orderBy == 'lessrecent'){
						$data = $data->orderBy('annonces.created_at', 'asc');
					} elseif ($orderBy == 'priceAsc'){
						$data = $data->orderBy('annonces.prix', 'asc');
					} elseif ($orderBy == 'priceDesc'){
						$data = $data->orderBy('annonces.prix', 'desc');
					} else {
						$data = $data->orderBy('annonces.numberViews', 'desc');
					}
			}

			$data = $data->paginate(6);
		  } 	

/****************************************** Autre ************************************************/	  

		else {		    

		    $data = DB::table('annonces')
				 ->where('annonces.stateAd','=','1')
				 ->where('annonces.id_Cat','=', request('idCat'))
                 ->where('annonces.id_sous_Cat','=', request('idSousCat'));
			  
			
			if (request('order')){
				$orderBy = request('order');
				if ($orderBy == 'mostrecent'){
					$data = $data->orderBy('annonces.created_at', 'desc');
					} elseif ($orderBy == 'lessrecent'){
						$data = $data->orderBy('annonces.created_at', 'asc');
					} elseif ($orderBy == 'priceAsc'){
						$data = $data->orderBy('annonces.prix', 'asc');
					} elseif ($orderBy == 'priceDesc'){
						$data = $data->orderBy('annonces.prix', 'desc');
					} else {
						$data = $data->orderBy('annonces.numberViews', 'desc');
					}
			}

			$data = $data->paginate(6);
		  } 
		  
		  if(request('filterPerCat')){

			if(request('filterKey')){
				$data = DB::table('annonces')
					->where('annonces.id_Cat','=',request('filterKey'))
					->where('annonces.stateAd','=','1');
				$filterKey = request('filterKey');
			} else {
				$data = DB::table('annonces')
					->where('annonces.stateAd','=','1');
					$filterKey = '';
			}

			if(request('wilaya')){
				$data = $data->where('annonces.wilaya', 'LIKE', "%" . request('wilaya') . "%");
			}
			  
			
			if (request('order')){
				$orderBy = request('order');
				if ($orderBy == 'mostrecent'){
					$data = $data->orderBy('annonces.created_at', 'desc');
					} elseif ($orderBy == 'lessrecent'){
						$data = $data->orderBy('annonces.created_at', 'asc');
					} elseif ($orderBy == 'priceAsc'){
						$data = $data->orderBy('annonces.prix', 'asc');
					} elseif ($orderBy == 'priceDesc'){
						$data = $data->orderBy('annonces.prix', 'desc');
					} else {
						$data = $data->orderBy('annonces.numberViews', 'desc');
					}
			}

			$data = $data->paginate(6);

			$cat = 'Catégorie'; 

		  }

		  if($cat == ''){
			return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'catégorie'=>'sousCatégorie','idSousCat'=>$filterKey,'idCat'=>$idCat,'search'=>$search,'sousCat'=>$sousCat,'dataSelected'=>$dataSelected]);
		  } else {
			return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'filter'=>$filterKey,'idCat'=>$idCat,'search'=>$search,'sousCat'=>$sousCat,'dataSelected'=>$dataSelected,'catégorie'=>$cat]);
		  }

        
    }
}
