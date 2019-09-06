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

class searchController extends Controller
{
   public function showCat(){

	   	$search = categories::all();

      $categorie = DB::table('categories')
            ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
            ->get();

	    return view('index', ['categorie'=>$categorie,'search'=>$search]);

   }

   public function search(Request $request){

   		$categorie =  request('categorie');
   		$wilaya =  request('wilaya');
   		$keyword =  request('keyword');

   		$imageAd = DB::table('imageads')->groupBy('id_annonce')->get();

      $data = DB::table('annonces');

	    // Search for a user based on their name.
	    if (request('categorie')) {
	        $data = $data->where('id_Cat', '=',  request('categorie'));
	    }

	    // Search for a user based on their company.
	    if (request('wilaya')) {
	        $data = $data->where('wilaya', 'LIKE', "%" . request('wilaya') . "%");
	    }

	    // Search for a user based on their city.
	    if (request('keyword')) {
	        $data = $data->where('titre', 'LIKE', "%" . request('keyword') . "%")
	        			 ->where('description','LIKE',"%" . request('keyword') . "%");
	    }

	    $data = $data->where('stateAd', '=',  '1') 
	    		     ->paginate(3);

		  return view('categorie',['data'=>$data,'imageAd'=>$imageAd]);
   }

   public function searchPerCat($cat,$idCat){

        $imageAd = DB::table('imageads')->groupBy('id_annonce')->get();

        switch ($cat) {
          case 'Catégorie':
              $data = DB::table('annonces')->where([['id_Cat','=',$idCat],['stateAd','=','1'],])
                                           ->paginate(3);  
              break;
          case 'sousCatégorie':
              $data = DB::table('annonces')->where([['id_sous_Cat','=',$idCat],['stateAd','=','1'],])
                                           ->paginate(3);   
              break;         
      }

      return view('categorie',['data'=>$data,'imageAd'=>$imageAd]);
   }

   public function details($id){

      $nomTable = 'annonces';

   		$annonce = DB::table($nomTable)->where('id', '=', $id)->first();

        $idCat = $annonce->id_Cat;
        $idSousCat = $annonce->id_sous_Cat;
        $idUser = $annonce->id_user;
        
        $user = DB::table('users')->where('id','=', $idUser)->first();
        $images = DB::table('imageads')->where('id_annonce', '=', $id)->get();

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

       
dd($result);
   		return view('details',[
            'annonce' => $annonce,
            'result' => $result,
            'categorie' => $idCat,
            'sousCategorie' => $idSousCat,
            'user' => $user,
            'images' => $images
        ]);


   }
}
