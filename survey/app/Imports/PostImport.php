<?php

namespace App\Imports;

use App\Post;
use Maatwebsite\Excel\Concerns\ToModel;

class PostImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Post([
            'id'             => $row[0],
            'title'          => $row[1], 
            'description'    => $row[2], 
            'size '          => $row[3], 
            'image'          => $row[4], 
            'created_at'     =>isset($row[5])?$row[5]:null,
            'updated_at'     => isset($row[6])?$row[6]:null,
            'added_by'       => 1
           
        ]);
    }
}
