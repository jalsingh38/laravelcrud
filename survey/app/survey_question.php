<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey_question extends Model
{
    protected $fillable = [
        'survey_id','created_at','updated_at','is_deleted' , '',
    ];
}
