<?php

namespace App\Models;


use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'image',
        'category_name',
        'description',
        'status',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class,'category_id');
    }

    public function appointments(){
        return $this->hasMany(Appointment::class,'categoy_id');
    }
}
