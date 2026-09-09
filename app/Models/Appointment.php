<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Appointment extends Model
{
    protected $fillable = [
        'doctor_id',
        'categoy_id',
        'status_updated_by',
        'name',
        'phone',
        'message',
        'status',
        'status_updated_at',
        'reason',
        'appointment_date',
        'appointment_time',
    ];

    /**
     * Appointment belongs to Doctor
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    /**
     * Appointment belongs to Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoy_id');
    }


     public function statusUpdatedBy()
    {
        return $this->belongsTo(
            User::class,
            'status_updated_by'
        );

    /**
     * User/Admin who last updated status
     */
    // public function statusUpdatedBy()
    // {
    //     return $this->belongsTo(User::class, 'status_updated_by');
    // }

    /**
     * Appointment status history
     */
    // public function statusHistories()
    // {
    //     return $this->hasMany(
    //         AppointmentStatusHistory::class,
    //         'appointment_id'
    //     );
    // }
}
}
