<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = [
        'qualification_name',
        'status',
    ];



    public function doctors()
    {
        return $this->belongsToMany(
            Doctor::class,
            'doctor_qualifications',
            'qualification_id',
            'doctor_id'
        );
    }

}
