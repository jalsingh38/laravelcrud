<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puzzle extends Model
{
    protected $fillable = [
        'title', 'options', 'id','question','created_at','updated_at','is_deleted' , 'right_answer'
    ];
}
