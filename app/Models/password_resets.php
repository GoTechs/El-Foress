<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class password_resets extends Model
{
    protected $fillable = [
        'email', 'token'
    ];
}
