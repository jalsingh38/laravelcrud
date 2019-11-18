<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz_title extends Model
{
    protected $fillable = [
        'title','description','time' ,'id','created_at','updated_at','is_deleted' 
    ];
}
