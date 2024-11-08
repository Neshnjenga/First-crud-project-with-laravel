<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todomodel extends Model
{
    protected $fillable = [
        'user_id','name','date'
    ];
}
