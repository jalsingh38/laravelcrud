<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::select('id','title','description','size','image','created_at','updated_at')->where('is_delete',0)->get();
    }

      public function headings(): array
    {
        return [
            'id',
            'title',
            'description',
            'size',
            'image',
            'created_at',
            'updated_at',
           
        ];
    }
}
