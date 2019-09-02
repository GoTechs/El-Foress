<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\categories;
use App\annonce;

class searchController extends Controller
{
   public function showCat(){

	   	$categorie = categories::all();
	    return view('index', compact('categorie'));

   }

   public function search(Request $request){

   		$categorie =  request('categorie');
   		$wilaya =  request('wilaya');
   		$keyword =  request('keyword');

   		$data = DB::table('annonces');

	    // Search for a user based on their name.
	    if (request('categorie')) {
	        $data = $data->where('id_Cat', '=',  request('categorie'));
	    }

	    // Search for a user based on their company.
	    if (request('wilaya')) {
	        $data = $data->where('wilaya', '=',  request('wilaya'));
	    }

	    // Search for a user based on their city.
	    if (request('keyword')) {
	        $data = $data->where('titre', 'LIKE', "%" . request('keyword') . "%")
	        			 ->where('description','LIKE',"%" . request('keyword') . "%");
	    }

	    $data = $data->where('stateAd', '=',  '1')
	            ->leftJoin('imageads', 'annonces.id', '=', 'imageads.id_annonce')
	    		->paginate(3);

	
		return view('categorie',['data'=>$data]);
   }
}
