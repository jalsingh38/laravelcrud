<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = ['id','title', 'name', 'description' , 'added_by','image'];

}
