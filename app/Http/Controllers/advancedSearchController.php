<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\annonce;
use App\adCar;
use App\adPhone;

class advancedSearchController extends Controller
{
    public function search(Request $request){

    	$data = DB::table('ad_cars');

	    // Search for a user based on their name.
	    if (request('anne')) {
	        $data = $data->where('annee', '=',  request('anne'));
	    }

	    // Search for a user based on their company.
	    if (request('kilom')) {
	        $data = $data->orWhere('kilometrage', 'LIKE', "%" . request('kilom') . "%");
	    }

	    $data = $data->join('annonces', 'annonces.id', '=', 'ad_cars.id_annonce')
                ->get();

        return $data;
    }
}
