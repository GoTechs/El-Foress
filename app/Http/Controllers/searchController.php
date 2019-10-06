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

class searchController extends Controller
{
   public function showCat(){

	   	$search = categories::all();
      $nbrAds = annonce::where('stateAd' ,'=', '1')->count();

      $categorie = DB::table('categories')
            ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
            ->get();

      // The most visited ads

      $annonce = DB::table('annonces')
                ->orderBy('numberViews', 'desc')
                ->limit(10)
                ->get();  

      //$test = annonce::recentlyAdd();

	    return view('index', ['categorie'=>$categorie,'search'=>$search,'annonces'=>$annonce, 'nbrAds'=>$nbrAds]);

   }

   public function search(Request $request){

      $search = categories::all();
      $sousCat = DB::table('categories')
                    ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
                    ->get();    

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
	        			 ->orWhere('description','LIKE',"%" . request('keyword') . "%");
	    }

	    $data = $data->where('stateAd', '=',  '1') 
	    		     ->paginate(6);

      $cat = 'Catégorie'; 
      if (request('categorie')) { $filterKey  = request('categorie'); }
      else { $filterKey = '';  } 

		  return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'catégorie'=>$cat,'search'=>$search,'sousCat'=>$sousCat,'filter'=>$filterKey]);
   }

   public function searchPerCat($idCat){

        $filterKey = $idCat;

        $imageAd = DB::table('imageads')->groupBy('id_annonce')->get();

        $search = categories::all();
        $sousCat = DB::table('categories')
                    ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
                    ->get();                                                                                       

        $data = DB::table('annonces')->where([['id_Cat','=',$idCat],['stateAd','=','1'],])
                                           ->paginate(6);      
                 
     
        return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'catégorie'=>'Catégorie','filter'=>$filterKey,'search'=>$search,'sousCat'=>$sousCat]);
   }

      public function searchPerSousCat($idCat,$idSousCat){

        $dataSelected = '';

        $imageAd = DB::table('imageads')->groupBy('id_annonce')->get();

        $search = categories::all();
        $sousCat = DB::table('categories')
                    ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
                    ->get(); 

        $data = DB::table('annonces')->where([['id_sous_Cat','=',$idSousCat],['stateAd','=','1'],])
                                           ->paginate(6);

        if ($idSousCat == '16'){
          $dataSelected = marquephone::all();

        } 
          else if ($idSousCat == '6' or $idSousCat == '7' or $idSousCat == '8' or $idSousCat == '9' or $idSousCat == '10' or $idSousCat == '11' or $idSousCat == '12' or $idSousCat == '13'){
              $dataSelected = marqueveh::all();
          }
            else if ($idSousCat == '55' or $idSousCat == '56' or $idSousCat == '57' or $idSousCat == '58'){
              $dataSelected = typebien::all();
            }
              else if ($idSousCat == '37'){
                $dataSelected = marquecomputer::all();
              }
                else if ($idSousCat == '53' or $idSousCat == '54'){
                $dataSelected = domainemploi::all();
              }

      return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'catégorie'=>'sousCatégorie','idCat'=>$idCat,'idSousCat'=>$idSousCat,'search'=>$search,'sousCat'=>$sousCat,'dataSelected'=>$dataSelected]);
   }


   public function details($id){

      $nomTable = 'annonces';

      $annonce = annonce::find($id);

      $idCat = $annonce->id_Cat;
      $idSousCat = $annonce->id_sous_Cat;
      $idUser = $annonce->id_user;
      $numberViews = $annonce->numberViews + 1 ;

      $annonce->numberViews = $numberViews;

      $annonce->save();
      
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
