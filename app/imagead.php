<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class imagead extends Model
{
    protected $table = 'imageads';

    protected $guarded = [];

    public static function images(){

        $images = DB::table('imageads')
            ->get();
        return $images;
   }

}
