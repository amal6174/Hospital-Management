<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctrAchhivement extends Model
{
    use SoftDeletes;
     protected $fillable = [
        'doctor_id',
        'image',
        'name',
        'status'
     ];



// public function doctor(): BelongsTo
// {
//     return $this->belongsTo(Doctor::class, 'doctor_id');
// }

     public function doctor(): BelongsTo
       {
           return $this->belongsTo(Doctor::class, 'doctor_id');
       }


}
