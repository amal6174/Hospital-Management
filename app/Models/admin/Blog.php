<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{

     use Sluggable;

    protected $fillable = [
        'image',
        'title',
        'slug',
        'small_description',
        'description'



    ];

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
