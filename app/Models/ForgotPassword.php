<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForgotPassword extends Model
{
    protected $fillable = [
        'user_id','token','createdAt'
    ];
}
