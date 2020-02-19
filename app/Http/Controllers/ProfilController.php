<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\Users;
use App\annonce;
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
use Illuminate\Support\Facades\Validator;

//use mysql_xdevapi\Session;

class ProfilController extends Controller
{
    public function home(){
        return view('profil.home');
    }

    public function myads(){
        
        $idUser = Auth::user()->id;

        $annonce = DB::table('annonces')
            ->select(['id as id_annonce','titre','created_at','wilaya','prix','numberViews'])
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
                ['annonces.nameTable','=',''],
            ])->get()->toArray();

        $storage = DB::table('annonces')
            ->join('ad_storages', 'annonces.id', '=', 'ad_storages.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $car = DB::table('annonces')
            ->join('ad_cars', 'annonces.id', '=', 'ad_cars.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $jobOffer = DB::table('annonces')
            ->join('ad_joboffers', 'annonces.id', '=', 'ad_joboffers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $computer = DB::table('annonces')
            ->join('ad_computers', 'annonces.id', '=', 'ad_computers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $event = DB::table('annonces')
            ->join('ad_events', 'annonces.id', '=', 'ad_events.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $immobilier = DB::table('annonces')
            ->join('adimmobiliers', 'annonces.id', '=', 'adimmobiliers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $jobApp = DB::table('annonces')
            ->join('ad_jobapplications', 'annonces.id', '=', 'ad_jobapplications.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $phone = DB::table('annonces')
            ->join('ad_phones', 'annonces.id', '=', 'ad_phones.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','1'],
            ])->get()->toArray();

        $result = array_merge($storage,$jobOffer,$car,$computer,$event,$immobilier,$jobApp,$phone,$annonce);
        
        return view('profil.myads', [
            'result' => $result
        ]);
    }

    public function favorits(){
        $idUser = Auth::user()->id;

        $storage = DB::table('annonces')
            ->join('favoris', 'annonces.id', '=', 'favoris.id_annonce')
            ->where([
                ['favoris.idUser', '=', $idUser],
            ])->get()->toArray();

        //$result = array_merge($storage,$jobOffer,$car,$computer,$event,$immobilier,$jobApp,$phone);

        return view('profil.favorits', [
            'result' => $storage
        ]);
    }

    public function archives(Request $request){
        $idUser = Auth::user()->id;

        $annonce = DB::table('annonces')
            ->select(['id as id_annonce','titre','created_at','wilaya','prix','numberViews'])
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
                ['annonces.nameTable','=',''],
            ])->get()->toArray();

        $storage = DB::table('annonces')
            ->join('ad_storages', 'annonces.id', '=', 'ad_storages.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $car = DB::table('annonces')
            ->join('ad_cars', 'annonces.id', '=', 'ad_cars.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $jobOffer = DB::table('annonces')
            ->join('ad_joboffers', 'annonces.id', '=', 'ad_joboffers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $computer = DB::table('annonces')
            ->join('ad_computers', 'annonces.id', '=', 'ad_computers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $event = DB::table('annonces')
            ->join('ad_events', 'annonces.id', '=', 'ad_events.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $immobilier = DB::table('annonces')
            ->join('adimmobiliers', 'annonces.id', '=', 'adimmobiliers.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $jobApp = DB::table('annonces')
            ->join('ad_jobapplications', 'annonces.id', '=', 'ad_jobapplications.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $phone = DB::table('annonces')
            ->join('ad_phones', 'annonces.id', '=', 'ad_phones.id_annonce')
            ->where([
                ['annonces.id_user', '=', $idUser],
                ['annonces.stateAd','=','0'],
            ])->get()->toArray();

        $result = array_merge($storage,$jobOffer,$car,$computer,$event,$immobilier,$jobApp,$phone,$annonce);

        return view('profil.archives', [
            'result' => $result
        ]);
    }

    public function create(){
        return view('profil.addAd');
    }

    public function update($id){
        $annonce = annonce::findOrFail($id);
        $annonce->stateAd = '0';
        $annonce->save();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }

    public function repost($id){
        $annonce = annonce::find($id);
        $annonce->stateAd = '1';
        $annonce->save();
        return redirect('archives');
    }

    public function updateUser($id, Request $request){

        $validator = Validator::make($request->all(),[
            "nom" => "required|string",
            "phone" => "regex:/^[0-9\s+-]*$/|nullable",
        ]);

        if ($validator->fails()) {
            return redirect('home')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Users::find($id);

        $user->nom = request('nom');
        $user->phone = request('phone');

        $user->save();

        return redirect('home');
    }

    public function updatePassword($id, Request $request){

        $validator = Validator::make($request->all(),[
            "currentpassword" => ["required",new MatchOldPassword],
            "password" => "bail|required|min:8|max:30|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/",
            "confirmPassword" => "required|same:password",
        ]);

        if ($validator->fails()) {
            return redirect('home#error')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Users::find($id);

        $user->password = bcrypt(request('password'));

        $user->save();

        return redirect('home')->with('message', 'Votre mot de passe a bien été modifié.');
    }

    public function addtofav($id){

           if (Auth::check()) {

                $idUser = Auth::user()->id;

                $checkAd = annonce::where('id_user', $idUser)->where('id', $id)->count();

                if ($checkAd == 0){

                    $result = favoris::where('idUser', $idUser)->where('id_annonce', $id)->count();

                    if ($result == 0){

                        $favoris = favoris::create([
                            'idUser' => $idUser,
                            'id_annonce' => $id
                        ]);  
                        
                    } else {

                        return $result;

                    }
                } else {
                    return 'owner';
                }                          

           } else {  return 'Unauthenticated';     }
        
    }

    public function deleteFav($id){

        $idUser = Auth::user()->id;
        $result = favoris::where('idUser', $idUser)->where('id_annonce', $id)->delete();

    }

    public function deleteallFav(Request $request){

        $idUser = Auth::user()->id;
        $ids = $request->input('ids');            
        favoris::where('idUser', $idUser)->whereIn('id_annonce', $ids)->delete();
        return redirect('favorites');        
    }

}
