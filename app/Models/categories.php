<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class categories extends Model
{
    protected $table = 'categories';

    protected $guarded = [];

    public static function allCategory(){

         $allCategory = DB::table('categories')
             ->get();
         return $allCategory;
    }
}
