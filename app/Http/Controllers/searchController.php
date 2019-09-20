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

      $search = categories::all();

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
	    		     ->paginate(3);

      $cat = 'Catégorie';       

		  return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'catégorie'=>$cat,'search'=>$search]);
   }

   public function searchPerCat($cat,$idCat){

        $filter = '';

        $imageAd = DB::table('imageads')->groupBy('id_annonce')->get();

        $search = categories::all();

        switch ($cat) {
          case 'Catégorie':

              $data = DB::table('annonces')->where([['id_Cat','=',$idCat],['stateAd','=','1'],])
                                           ->paginate(3); 
             /* $annonce = DB::table('annonces')->select(['id as id_annonce','titre','created_at','wilaya','prix','description'])
              ->where([['id_Cat','=',$idCat],['stateAd','=','1'],['nameTable','=',''],])
                                           ->paginate(3)->toArray();

              $storage = DB::table('annonces')
                ->join('ad_storages', 'annonces.id', '=', 'ad_storages.id_annonce')
                ->where([
                    ['annonces.id_Cat', '=', $idCat],
                    ['annonces.stateAd','=','1'],
                ])->paginate(3)->toArray();  

                $car = DB::table('annonces')
                    ->join('ad_cars', 'annonces.id', '=', 'ad_cars.id_annonce')
                    ->where([
                        ['annonces.id_Cat', '=', $idCat],
                        ['annonces.stateAd','=','1'],
                    ])->paginate(3)->toArray();

                $jobOffer = DB::table('annonces')
                    ->join('ad_joboffers', 'annonces.id', '=', 'ad_joboffers.id_annonce')
                    ->where([
                        ['annonces.id_Cat', '=', $idCat],
                        ['annonces.stateAd','=','1'],
                    ])->paginate(3)->toArray();

                $computer = DB::table('annonces')
                    ->join('ad_computers', 'annonces.id', '=', 'ad_computers.id_annonce')
                    ->where([
                        ['annonces.id_Cat', '=', $idCat],
                        ['annonces.stateAd','=','1'],
                    ])->paginate(3)->toArray();

                $event = DB::table('annonces')
                    ->join('ad_events', 'annonces.id', '=', 'ad_events.id_annonce')
                    ->where([
                        ['annonces.id_Cat', '=', $idCat],
                        ['annonces.stateAd','=','1'],
                    ])->paginate(3)->toArray();

                $immobilier = DB::table('annonces')
                    ->join('adimmobiliers', 'annonces.id', '=', 'adimmobiliers.id_annonce')
                    ->where([
                        ['annonces.id_Cat', '=', $idCat],
                        ['annonces.stateAd','=','1'],
                    ])->paginate(3)->toArray();

                $jobApp = DB::table('annonces')
                    ->join('ad_jobapplications', 'annonces.id', '=', 'ad_jobapplications.id_annonce')
                    ->where([
                        ['annonces.id_Cat', '=', $idCat],
                        ['annonces.stateAd','=','1'],
                    ])->paginate(3)->toArray();

                $phone = DB::table('annonces')
                    ->join('ad_phones', 'annonces.id', '=', 'ad_phones.id_annonce')
                    ->where([
                        ['annonces.id_Cat', '=', $idCat],
                        ['annonces.stateAd','=','1'],
                    ])->paginate(3)->toArray();

                $data = array_merge($storage,$jobOffer,$car,$computer,$event,$immobilier,$jobApp,$phone,$annonce);*/                                                             

              $filter = $idCat;

              break;
          case 'sousCatégorie':
              $data = DB::table('annonces')->where([['id_sous_Cat','=',$idCat],['stateAd','=','1'],])
                                           ->paginate(3); 
              $filter = $idCat;  
              break;         
      }

      return view('categorie',['data'=>$data,'imageAd'=>$imageAd,'catégorie'=>$cat,'filter'=>$filter,'search'=>$search]);
   }

   public function details($id){

      $nomTable = 'annonces';

   		//$annonce = DB::table($nomTable)->where('id', '=', $id)->first();
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
