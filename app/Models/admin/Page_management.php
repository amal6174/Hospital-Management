<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Page_management extends Model
{

   protected $table = 'page_managements';

     protected $fillable = [


        'page_name',
        'section_name',


        'small_title_1',
        'small_title_2',
        'small_title_3',
        'small_title_4',
        'small_title_5',


        'title_1',
        'title_2',
        'title_3',
        'title_4',
        'title_5',



        'small_description_1',
        'small_description_2',
        'small_description_3',
        'small_description_4',
        'small_description_5',


        'description_1',
        'description_2',
        'description_3',
        'description_4',
        'description_5',

        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',



    ];
}
