<?php

namespace App\Models;

// use App\Models\admin\appointment;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Doctor extends Model
{
    protected $fillable = [
        'category_id',
        'image',
        'name',
        'slug',
        'designation',
        'experience',
        'consultant_fee',
        'email',
        'phone',
        'gender',
        'address',
        'status',
    ];


    // Doctor belongs to Category
    public function category()
    {
        return $this->belongsTo( Category::class,'category_id');
    }


    // Doctor belongs to many Qualifications
    public function qualifications()
    {
        return $this->belongsToMany(
            Qualification::class,
            'doctor_qualifications',
            'doctor_id',
            'qualification_id'
        );
    }


    public function sluggable() : array
    {
   return [
            'slug' => [
                'source' => 'name',
            ],
        ];

    }

    public function appointments(){
        return $this->hasMany(Appointment::class, 'doctor_id');
    }


}



