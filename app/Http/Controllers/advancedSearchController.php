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

class advancedSearchController extends Controller
{
    public function search(Request $request){

    	$imageAd = DB::table('imageads')->groupBy('id_annonce')->get();
    	$cat = 'sousCatégorie';
    	$search = categories::all();
        $sousCat = DB::table('categories')
                    ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
                    ->get(); 


    	$idSousCat = request('idSousCat');
    	$filterKey = $idSousCat;

    	if ($idSousCat == '6' or $idSousCat == '7' or $idSousCat == '8' or $idSousCat == '9' or $idSousCat == '10' or $idSousCat == '11' or $idSousCat == '12' or $idSousCat == '13'){
    		
	    	$data = DB::table('ad_cars');

		    // Search for a user based on their name.
		    if (request('anne')) {
		        $data = $data->where('annee', '=',  request('anne'));
		    }

		    // Search for a user based on their company.
		    if (request('kilom')) {
		        $data = $data->orWhere('kilometrage', 'LIKE', "%" . request('kilom') . "%");
		    }

		    if (request('marque')){
		    	$data = $data->orWhere('marque', '=', request('marque') );
		    }

		    if (request('typeCarb')){
		    	$data = $data->orWhere('typeCarb', '=', request('typeCarb') );
		    }
		  } else {
		  		$data = DB::table('ad_cars');
		  }

	   $data = $data->join('annonces', 'annonces.id', '=', 'ad_cars.id_annonce')
	    			 ->paginate(3);
		  //$data = $data->get();

	    	//dd($data);
		 /* $r = [];
           foreach ($data as $result){
            	$data2 = DB::table('annonces')->where([
                ['stateAd','=','1'],
                ['id','=',$result->id_annonce],
            	])->get()->toArray();
            	
            	$resultat = array_merge($r,$data2);


            }
            $test = $resultat->paginate(1);
            dd($test);*/

        return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'catégorie'=>$cat,'filter'=>$filterKey,'search'=>$search,'sousCat'=>$sousCat]);
    }
}
