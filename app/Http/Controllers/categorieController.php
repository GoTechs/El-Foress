<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\Models\categories;
use App\Models\souscategories;
use App\Models\domainemploi;

class categorieController extends Controller
{
    public function categories(){
        $categorie = categories::all();
        $domaineEmploi = domainemploi::all();
        return view('profil.addAd',['categorie'=>$categorie,'domaineEmploi'=>$domaineEmploi]);
    }

    public function sousCat(){
        $cat_id = Input::get('idCat');
        $sousCategorie = souscategories::where('id_Cat', '=', $cat_id)->get();
        return response()->json($sousCategorie);
    }

    public function apropos(){
    	$search = categories::all();
        $sousCat = DB::table('categories')
                    ->join('souscategories', 'categories.idCat', '=', 'souscategories.id_Cat')
                    ->get(); 

        return view('Apropos', ['search'=>$search,'sousCat'=>$sousCat]);
    }
}
