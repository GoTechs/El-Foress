<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class imagead extends Model
{
    protected $table = 'imageads';

    protected $guarded = [];

    public static function images(){

    	$imageAd = DB::table('imageads')->groupBy('id_annonce')->get(); 

    	return $imageAd;

    }
}
