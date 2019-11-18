<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey_basic extends Model
{
    protected $fillable = [
        'title', 'description', 'id','custom_css','created_at','updated_at','is_deleted'
    ];
}
