<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Analytics;
use Spatie\Analytics\Period;
use App\Models\annonce;
use App\Users;
use App\Models\categories;
use App\Models\adEvent;
use App\Models\adJoboffer;
use App\Models\adJobapplication;
use App\Models\adimmobilier;
use App\Models\adCar;
use App\Models\adPhone;
use App\Models\adStorage;
use App\Models\adComputer;
use App\Models\imagead;
use App\Models\favoris;
use App\Models\domainemploi;
use App\Models\typebien;
use App\Models\marqueveh;
use App\Models\marquecomputer;
use App\Models\marquephone;

class searchController extends Controller
{
   public function showCat(){

      //Retreive Total visitors and pageviews
       $analyticsData = Analytics::performQuery(
          Period::years(1),
          'ga:sessions',
          [
              'metrics' => 'ga:sessions, ga:pageviews, ga:users, ga:newUsers'
          ]
      );

            if ($analyticsData == []){
              $analyticsData = 0;
            }

      $nbrVisitors = $analyticsData->totalsForAllResults['ga:users'];


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
        
	    return view('index', ['categorie'=>$categorie,'search'=>$search,'annonces'=>$annonce, 'nbrAds'=>$nbrAds, 'nbrVisitors' => $nbrVisitors]);

   }

   public function search(Request $request){

      $search = categories::all();
      $sousCat = DB::table('categories')
                    ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
                    ->get();    

   		$categorie =  request('categorie');
   		$wilaya =  request('wilaya');
   		$keyword =  request('keyword');

   	  $imageAd = DB::table('imageads')->groupBy('id_annonce')->get()->toArray();

      $data = DB::table('annonces');

	    if (request('categorie')) {
	        $data = $data->where('id_Cat', '=',  request('categorie'));
        }
        
	    if (request('wilaya')) {
	        $data = $data->where('wilaya', 'LIKE', "%" . request('wilaya') . "%");
        }
        
	    if (request('keywordPhone')) {
	        $data = $data->where('titre', 'LIKE', "%" . request('keywordPhone') . "%")
	        			 ->orWhere('description','LIKE',"%" . request('keywordPhone') . "%");
        }
        
        if (request('keyword')) {
	        $data = $data->where('titre', 'LIKE', "%" . request('keyword') . "%")
	        			 ->orWhere('description','LIKE',"%" . request('keyword') . "%");
        }

       $data = $data->where('stateAd', '=',  '1')
                    ->orderBy('created_at','desc') 
                    ->paginate(8);        

      $cat = 'Catégorie'; 
      if (request('categorie')) { $filterKey  = request('categorie'); }
      else { $filterKey = '';  } 
      $orderSelected = '';

		  return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'catégorie'=>$cat,'search'=>$search,'sousCat'=>$sousCat,'filter'=>$filterKey,'orderSelected'=>$orderSelected]);
   }

   public function searchPerCat($idCat){

        $filterKey = $idCat;

        $imageAd = DB::table('imageads')->groupBy('id_annonce')->get();

        $search = categories::all();
        $sousCat = DB::table('categories')
                    ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
                    ->get();                                                                                       

        $data = DB::table('annonces')->where([['id_Cat','=',$idCat],['stateAd','=','1'],])
                                           ->paginate(8);  

        $orderSelected = '';    
                 
     
        return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'catégorie'=>'Catégorie','filter'=>$filterKey,'search'=>$search,'sousCat'=>$sousCat,'orderSelected'=>$orderSelected]);
   }

      public function searchPerSousCat($idCat,$idSousCat){

        $dataSelected = '';
        $state = '';

        $imageAd = DB::table('imageads')->groupBy('id_annonce')->get();

        $search = categories::all();
        $sousCat = DB::table('categories')
                    ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
                    ->get(); 

        $data = DB::table('annonces')->where([['id_sous_Cat','=',$idSousCat],['stateAd','=','1'],])
                                           ->paginate(8);

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

        if ($idCat == '3' || $idCat == '2' || $idSousCat == '16' || $idSousCat == '36' || $idSousCat == '37' || $idSousCat == '2' ||
            $idSousCat == '6' || $idSousCat == '7' || $idSousCat == '8' || $idSousCat == '9' || $idSousCat == '10' ||
            $idSousCat == '11' || $idSousCat == '12' || $idSousCat == '13'){             
            $state = 'show';
        }

        $orderSelected = '';

        return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'catégorie'=>'sousCatégorie','idCat'=>$idCat,'idSousCat'=>$idSousCat,'search'=>$search,'sousCat'=>$sousCat,'dataSelected'=>$dataSelected,'orderSelected'=>$orderSelected, 'state'=>$state]);
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
     
      $relatedAd = DB::table('annonces')->where([
            ['id_sous_Cat', '=', $idSousCat],
            ['id', '<>', $id],
            ['stateAd','=','1'],
        ])->paginate(5);

        $imageAd = DB::table('imageads')->groupBy('id_annonce')->get();
        $search = categories::all();
      
 		return view('details',[
          'annonce' => $annonce,
          'result' => $result,
          'categorie' => $idCat,
          'sousCategorie' => $idSousCat,
          'user' => $user,
          'images' => $images,
          'relatedAds' => $relatedAd,
          'imageAd' => $imageAd,
          'search' => $search
      ]);
   }

   public function myAdsDetails($id){

        $annonce = annonce::find($id);

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

        $relatedAd = DB::table('annonces')->where([
            ['id_sous_Cat', '=', $idSousCat],
            ['id', '<>', $id],
            ['stateAd','=','1'],
        ])->paginate(5);

        $imageAd = DB::table('imageads')->groupBy('id_annonce')->get();
        $search = categories::all();
        
      return view('details',[
            'annonce' => $annonce,
            'result' => $result,
            'categorie' => $idCat,
            'sousCategorie' => $idSousCat,
            'user' => $user,
            'images' => $images,
            'relatedAds' => $relatedAd,
            'imageAd' => $imageAd,
            'search' => $search
        ]);
     }
}
