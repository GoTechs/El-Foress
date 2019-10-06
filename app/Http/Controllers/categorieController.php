<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

use App\categories;
use App\souscategories;

class categorieController extends Controller
{
    public function categories(){
        $categorie = categories::all();
        return view('profil.addAd', compact('categorie'));
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
