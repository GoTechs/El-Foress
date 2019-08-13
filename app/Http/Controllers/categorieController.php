<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

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
}
