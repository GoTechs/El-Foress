<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class annonce extends Model
{
    protected $table = 'annonces';

    protected $guarded = [];

    public static function recentlyAdd(){

         $annonces = DB::table('annonces')
             ->orderBy('created_at', 'desc')
             ->limit(6)
             ->get();
         return $annonces;
    }
}
